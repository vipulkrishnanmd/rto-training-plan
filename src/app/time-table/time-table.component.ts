import { Component, OnInit, OnDestroy, Input } from "@angular/core";
import { TimeTableRow } from "../models/time-table-row.interface";
import { Unit } from "../models/unit.interface";
import { TimeTableService } from "./time-table.service";
import {
  Observable,
  Subscription,
  Subject,
  combineLatest,
  BehaviorSubject
} from "rxjs";
import { map, switchMap, tap, withLatestFrom } from "rxjs/operators";
import { FormControl } from "@angular/forms";
import { TrainingPlan } from "../models/training-plan.interface";

@Component({
  selector: "time-table",
  template: `
    <div id="rem1" [ngStyle]="display$ | async">
      <p>Give the starting monday of the course</p>
      <div id="dt0">
        <input type="date" value="14/03/2018" [formControl]="startDate" />
      </div>
    </div>
    <table id="myTable" align="center">
      <THEAD>
        <tr>
          <th>Week</th>
          <th width="40%">Unit Code and Name</th>
          <th>Training Dates</th>
          <th>Nominal Hours</th>
          <th>Core/Elective</th>
          <th>Expected Assessment Submission Dates</th>
          <th>RPL</th>
          <th>Credit transfer</th>
          <th>Assessment Methods</th>
          <th>Actual Submission Dates</th>
        </tr> </THEAD
      ><TBODY>
        <tr *ngFor="let row of rows">
          <ng-container *ngIf="!row.editing; else editing">
            <td>{{ row.order_number }}</td>
            <td width="40%">{{ row.unit_code }} : {{ row.unit_name }}</td>
            <td>
              <textarea rows="5" cols="15">{{
                getDate(row.order_number)
              }}</textarea>
            </td>
            <td>{{ row.nominal_hours }}</td>
            <td>{{ row.core === "1" ? "Core" : "Elective" }}</td>
            <td></td>
            <td>Yes / No</td>
            <td>Yes / No</td>
            <td>{{ row.assessment_methods }}</td>
            <td></td>
            <td [ngStyle]="display$ | async">
              <button (click)="editRow(row.id, trainingPlan.course_id)">
                Edit
              </button>
              <button (click)="addNewRow(trainingPlan?.id, row.order_number)">
                Add a Row Below
              </button>
              <button
                *ngIf="rows?.length > 1"
                (click)="removeRow(trainingPlan?.id, row.id, row.order_number)"
              >
                Remove
              </button>
            </td>
          </ng-container>
          <ng-template #editing>
            <td>
              <input
                type="number"
                value="{{ row.order_number }}"
                [formControl]="order"
              />
            </td>
            <td width="40%">
              <select [formControl]="unit">
                <option
                  *ngFor="let opt of unitOptions$ | async"
                  [ngValue]="opt"
                >
                  {{ opt.unit_name }}
                </option>
              </select>
            </td>
            <td>{{ getDate(row.order_number) }}</td>
            <td>{{ unit.value.nominal_hours }}</td>
            <td>{{ row.core === "1" ? "Core" : "Elective" }}</td>
            <td></td>
            <td>Yes / No</td>
            <td>Yes / No</td>
            <td>{{ row.assessment_methods }}</td>
            <td></td>
            <td>
              <button (click)="save(row.id, unit.value.id, order.value)">
                Save
              </button>
            </td>
          </ng-template>
        </tr>
      </TBODY>
    </table>

    <div [ngStyle]="display$ | async">
      <button (click)="rollOver(trainingPlan.id, 1)">Roll Over</button>
      <button (click)="rollOver(trainingPlan.id, -1)">Roll Back</button>
      <button (click)="printView()">Print View</button>
    </div>
  `,
  styleUrls: ["./time-table.component.css"]
})
export class TimeTableComponent implements OnInit, OnDestroy {
  title = "Timetable";
  rows: Array<TimeTableRow>;
  subscriptions: Subscription[];
  rows$: Observable<TimeTableRow[]>;
  editList: number[];
  editListSubject$: Subject<number[]>;
  editList$: Observable<number[]>;
  displayRows$: Observable<TimeTableRow[]>;
  unitOptions$: Observable<Unit[]>;
  reloader$ = new BehaviorSubject(null);
  days = [2, 3, 4];

  unit = new FormControl("");
  startDate = new FormControl("");
  startDateValue: Date;
  order = new FormControl("");
  orderChanged: boolean;
  display$: Observable<Object>;
  displaySubject$: Subject<Object>;
  trainingPlan: any;
  @Input() trainingPlan$: Observable<TrainingPlan>;
  currentRows: any;

  constructor(private tService: TimeTableService) {}

  ngOnInit() {
    // TODO days
    this.displaySubject$ = new Subject<Object>();
    this.display$ = this.displaySubject$.asObservable();
    //this.display$.subscribe(x => console.log(x));
    this.displaySubject$.next();
    this.editListSubject$ = new Subject<number[]>();
    this.editList$ = this.editListSubject$.asObservable();
    this.rows$ = this.reloader$.pipe(
      withLatestFrom(this.trainingPlan$),
      switchMap(([_, t]) => {
        console.log(t);
        return this.tService.getRows(t.id);
      })
    );
    this.editList = [];
    this.startDate.valueChanges.pipe(map(x => new Date(x))).subscribe(x => {
      this.startDateValue = x;
      //console.log(this.startDateValue);
    });
    //console.log(this.startDateValue);

    this.displayRows$ = combineLatest(this.rows$, this.editList$).pipe(
      map(([rows, e]) => {
        rows.forEach(x => (x.editing = e.includes(x.id))); // to check if the row is being edited.
        return rows;
      }),
      map(rows => rows.sort((x, y) => x.order_number - y.order_number)), // just sorting https://stackoverflow.com/a/21689268
      tap(rows => (this.currentRows = rows))
    );

    this.displayRows$.subscribe(x => {
      this.rows = x;
      this.orderChanged = false;
    });
    this.editListSubject$.next([-1]);
    //console.log(this.rows);

    this.order.valueChanges.subscribe(_ => (this.orderChanged = true));
    this.trainingPlan$.subscribe(x => {
      this.trainingPlan = x;
      console.log(x);
      this.reloader$.next(null);
    });
  }

  ngOnDestroy() {
    this.subscriptions.forEach(x => {
      x.unsubscribe();
    });
  }

  editRow(id: number, courseId: number) {
    //console.log(id);
    this.editList.push(id);
    //console.log(this.editList);
    this.editListSubject$.next(this.editList);
    this.unitOptions$ = this.tService.getUnits(courseId);
  }

  save(rowId: number, unitId: number, orderNumber: number) {
    orderNumber = this.orderChanged && orderNumber ? orderNumber : -1;
    this.tService.updateRow(rowId, unitId, orderNumber).subscribe(_ => {
      this.editList = this.editList.filter(x => x !== rowId);
      this.editListSubject$.next(this.editList);
      this.orderChanged = false;
      this.reload();
    });
  }

  addNewRow(timetableId: number, orderNumber: number) {
    //console.log(orderNumber);
    this.tService
      .addNewRow(timetableId, ++orderNumber)
      .subscribe(_ => this.reload());
  }

  removeRow(timetableId: number, rowId: number, orderNumber: number) {
    //console.log(orderNumber);
    this.tService
      .removeRow(timetableId, rowId, orderNumber)
      .subscribe(_ => this.reload());
  }

  rollOver(timetableId: number, mode: number) {
    this.tService.rollOver(timetableId, mode).subscribe(_ => {
      this.reload();
      this.startDate.setValue(
        new Date(
          this.startDateValue.getTime() + 1000 * 60 * 60 * 24 * 7
        ).toDateString()
      );
    });
  }

  reload() {
    this.reloader$.next(null);
  }

  getDate(order_number) {
    this.days = this.trainingPlan
      ? this.trainingPlan.days.split("").map(x => x as number)
      : this.days;
    let returnString = "";
    if (!this.startDateValue) {
      return "";
    }
    this.days.forEach(
      x => {
        (returnString =
          returnString +
          new Date(
            this.startDateValue.getTime() +
              1000 * 60 * 60 * 24 * (7 * (order_number - 1) + Number(x) - 1)
          ).toDateString() +
          '\n');
      }
    );
    return returnString;
  }

  printView() {
    this.displaySubject$.next({ display: "none" });
  }
}
