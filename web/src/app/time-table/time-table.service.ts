import { Injectable } from "@angular/core";
import {
  HttpClient,
  HttpHeaders,
  HttpParams,
  HttpRequest
} from "@angular/common/http";
import { TimeTableRow } from "../models/time-table-row.interface";
import { Observable } from "rxjs";
import { tap, map } from "rxjs/operators";
import { Unit } from "../models/unit.interface";

@Injectable()
export class TimeTableService {

  hello: Observable<TimeTableRow[]>;
  constructor(private http: HttpClient) {}
  root = './../';
  //root = 'http://localhost/dashboard/trainingplan/public/';

  getRows(id: number): Observable<TimeTableRow[]> {
    console.log(id);
    this.hello = this.http
      .get(this.root + "?controller=tp&do=getRows&id=" + id.toString())
      .pipe(
        //map(x => x["rows"]),
        tap((rows: TimeTableRow[]) => console.log(rows)),
      );

    return this.hello;
  }

  getUnits(courseId): Observable<Unit[]> {
    return this.http.get(
      this.root + "?controller=tp&do=getUnits&id=" + courseId
    ) as Observable<Unit[]>;
  }

  updateRow(rowId: number, unitId: number, orderNumber: number): any {
    const httpOptions = {
      headers: new HttpHeaders({
        "Content-Type": "application/json"
      })
    };
    const payload = {
      id: rowId,
      unit_id: unitId,
      order_number: orderNumber
    } as TimeTableRow;
    //console.log(JSON.stringify(payload));
    return this.http.post<TimeTableRow>(
      this.root + "?controller=tp&do=updateRow",
      payload,
      httpOptions
    );
  }

  addNewRow(timetableId: number, OrderNumber: number){
    const httpOptions = {
        headers: new HttpHeaders({
          'Content-Type': 'application/json'
        })
      };
    const payload = {
        timetable_id: timetableId,
        order_number: OrderNumber
      };
    return this.http.post(
        this.root + '?controller=tp&do=addNewRow',
        payload,
        httpOptions
      );
  }

  rollOver(timetableId: number, mode: number): any {
    const httpOptions = {
        headers: new HttpHeaders({
          "Content-Type": "application/json"
        })
      };
    const payload = {
        timetable_id: timetableId,
        mode: mode,
      };
    return this.http.post<TimeTableRow>(
        this.root + '?controller=tp&do=rollOver',
        payload,
        httpOptions
      );
  }

  removeRow(timetableId: number, rowId: number, orderNumber: number) {
    const httpOptions = {
      headers: new HttpHeaders({
        "Content-Type": "application/json"
      })
    };
    const payload = {
      timetable_id: timetableId,
      id: rowId,
      order_number: orderNumber,
    };
    return this.http.post<TimeTableRow>(
      this.root + '?controller=tp&do=removeRow',
      payload,
      httpOptions
    );
  }
}
