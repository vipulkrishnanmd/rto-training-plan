import { Component, OnInit, OnDestroy } from "@angular/core";
import { ActivatedRoute } from "@angular/router";
import { Subscription, Observable, BehaviorSubject } from "rxjs";
import { AppService } from "./app.service";
import { map, switchMap, tap } from "rxjs/operators";
import { TrainingPlan } from "./models/training-plan.interface";

@Component({
  selector: "app-root",
  template: `
    <front-page [trainingPlan]="trainingPlan$ | async"> </front-page>
    <br /><br /><br /><br />
    <table width="1300" align="center">
      <tbody>
        <tr>
          <td width="1300">
            <p>
              <strong
                >Orientation Day:
                <div id="orday"></div
              ></strong>
            </p>
            <p>
              Language, Literacy and orientation including overview on Placement
            </p>
            <p>
              LLN to be marked on the same day and student advised of LLN result
            </p>
          </td>
        </tr>
      </tbody>
    </table>

    <time-table [trainingPlan$]="trainingPlan$"> </time-table>

    <br />

    <table width="1300" align="center">
      <tbody>
        <tr>
          <td style="text-align: center;" width="1300">
            <p><strong>Work placement Hours: 200</strong></p>
            <p>
              <strong
                ><textarea rows="1" cols="20">Add weeks here</textarea>
              </strong>
            </p>
          </td>
        </tr>
        <tr>
          <td style="text-align: center;" width="1252">
            <p>
              WORK PLACEMENT BOOK NEEDS TO BE SUBMITTED&nbsp; TO THEIR TRAINER
              ON&nbsp;
              <strong
                ><textarea rows="1" cols="15">Add date here</textarea></strong
              >
            </p>
            <p>
              &nbsp;All units should be completed, trainers to check on Moodle
              grade (one by one))
            </p>
            <p><strong>Completion </strong></p>
            <p>
              <strong
                >&nbsp;(All students should attend for the final audit of
                files)</strong
              >
            </p>
            <p>
              <strong
                >(Trainers to Audit Student Files and complete course summary
                with QAO)</strong
              >
            </p>
            <p><textarea rows="1" cols="20">Add weeks here</textarea></p>
            <p>&nbsp;</p>
            <p>
              Result process and declare &nbsp;within
              <textarea rows="1" cols="15">Add date here</textarea>
            </p>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="break">
      <p>
        <strong><u>IMPORTANT NOTES:</u></strong>
      </p>
      <p>
        <strong
          >*Times are set from 9:00am to 5:00 pm with 30 minutes break</strong
        >
      </p>
      <p>
        <strong><u>RESPONSIBILITIES</u></strong>
      </p>
      <p>
        <strong
          >The Student&rsquo;s responsibilities include, but not limited
          to:</strong
        >
      </p>
      <ul>
        <li>
          Submit the documents for RPL or Credit Transfer along with the
          Training Plan
        </li>
        <li>
          Submit assessments as per the Training plan and complete the course by
          the completion date: 12/12/2018
        </li>
      </ul>
      <p>
        <strong
          >Inform JTI of any additional support required. If there is NONE,
          please write NONE in the space provided</strong
        >
      </p>
      <p>
        <strong><u>ADDITIONAL SUPPORT ACTION PLAN:</u></strong>
      </p>
      <table width="1300" align="center">
        <tbody>
          <tr>
            <td width="1300">
              <p><strong>&nbsp;</strong></p>
            </td>
          </tr>
          <tr>
            <td width="1300">
              <p><strong>&nbsp;</strong></p>
            </td>
          </tr>
          <tr>
            <td width="1300">
              <p><strong>&nbsp;</strong></p>
            </td>
          </tr>
          <tr>
            <td width="1300">
              <p><strong>&nbsp;</strong></p>
            </td>
          </tr>
        </tbody>
      </table>
      <p><strong>&nbsp;</strong></p>
      <p>
        <strong
          >JTI&rsquo;s responsibilities include, but not limited to:</strong
        >
      </p>
      <ul>
        <li>
          Provide training and assessment in accordance with the Training Plan
        </li>
        <li>
          Provide training materials and necessary support to the student.
          English class is available for the student for additional support.
        </li>
        <li>Maintain training records</li>
        <li>
          Notify the students regarding issues that may affect successful
          completion of the Training Plan;
        </li>
        <li>
          Implement action plan agreed upon to address additional support that
          the student requires.
        </li>
        <li>
          Issue of Certificate and or Statement of Attainment following the
          policy on issuance of certificates and Statement of Attainment.
        </li>
      </ul>
      <p>
        <strong><u>Training Plan Agreement</u></strong>
      </p>
      <p>
        This document forms a legally binding agreement between the Student and
        JTI leading to a nationally recognized qualification. In signing this
        agreement both parties are bound by the obligations detailed below and
        the legislation of the state or territory in which this Agreement is to
        be registered.
      </p>

      <p>
        <strong>For face to face student:</strong> I have received a copy of JTI
        student handbook during orientation and I agree to read and abide by all
        the policies and procedures found in the student handbook.
      </p>
      <p>
        &nbsp;<strong>For online student:</strong>&nbsp; I have been given
        access for a copy of JTI student handbook on Moodle and I agree to read
        and abide by all policies and procedures found in the student handbook.
      </p>

      <p><strong>Training Plan Agreement Declaration</strong></p>
      <p>
        <strong
          ><em
            >I have agreed to adhere to the Training and Assessment plan
            provided. I have received the training materials necessary for me to
            complete the course.</em
          ></strong
        >
      </p>
    </div>
    <div class="break">
      <table width="1300" align="center">
        <tbody>
          <tr>
            <td width="307">
              <p><strong>Student&rsquo;s&nbsp; Printed Name</strong></p>
            </td>
            <td colspan="4" width="992"></td>
          </tr>
          <tr>
            <td width="307">
              <p><strong>Student&rsquo;s Signature</strong></p>
            </td>
            <td colspan="2" width="496"></td>
            <td width="156">
              <p><strong>Date</strong></p>
            </td>
            <td width="340"></td>
          </tr>
          <tr>
            <td width="307">
              <p><strong>JTI Representative Printed Name</strong></p>
            </td>
            <td colspan="4" width="992"></td>
          </tr>
          <tr>
            <td width="307">
              <p><strong>JTI Representative Signature</strong></p>
            </td>
            <td colspan="2" width="496"></td>
            <td width="156">
              <p><strong>Date</strong></p>
            </td>
            <td width="340"></td>
          </tr>
          <tr>
            <td colspan="5" width="1300">
              <p align="center"><strong>TRAINER USE ONLY</strong></p>
            </td>
          </tr>
          <tr>
            <td colspan="5" width="1300">
              <p align="center"><strong>COURSE COMPETENCY SUMMARY</strong></p>
            </td>
          </tr>
          <tr>
            <td colspan="5" width="1300">
              <p>
                I declare this student has completed all assessments and
                evidence has been submitted. The assessments meet the rules of
                evidence namely Fair, Reliable, Valid and Sufficient. Having
                assessed all the evidence the student submitted for the units of
                competency in this training plan , the student has been assessed
                as
              </p>
              <p>&nbsp;</p>

              <p>
                <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong
                ><strong>COMPETENT &nbsp;&nbsp;&nbsp;&#x25a2;</strong>
              </p>
              <p>
                <strong
                  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT YET COMPETENT
                  &nbsp;&nbsp;&nbsp;&#x25a2;</strong
                >
              </p>
            </td>
          </tr>
          <tr>
            <td colspan="2" width="390">
              <p><strong>TRAINER/ASSESSOR NAME</strong></p>
            </td>
            <td colspan="3" width="910">
              <p>&nbsp;</p>
            </td>
          </tr>
          <tr>
            <td colspan="2" width="390">
              <p><strong>TRAINER/ASSESOR SIGNATURE</strong></p>
            </td>
            <td colspan="3" width="910">
              <p>&nbsp;</p>
            </td>
          </tr>
          <tr>
            <td colspan="2" width="390">
              <p><strong>DATE </strong></p>
            </td>
            <td colspan="3" width="910">
              <p>&nbsp;</p>
            </td>
          </tr>
        </tbody>
      </table>
      <p>&nbsp;</p>
    </div>

    <form
      name="myForm"
      id="myForm"
      method="POST"
      action="//jti.edu.au/trainingplan/public/"
    >
      <input type="hidden" name="page" value="" />
      <input type="hidden" name="controller" value="home" />
      <input type="hidden" name="do" value="savePage" />
      <input type="hidden" name="name" value="77" />
    </form>
  `,
  styleUrls: ["./app.component.css"]
})
export class AppComponent implements OnInit, OnDestroy {
  title = "Training Plan";
  id: number;
  subscriptions: Subscription[];
  id$: Observable<number>;
  reloader$ = new BehaviorSubject(null);
  trainingPlan$: Observable<TrainingPlan>;

  constructor(private route: ActivatedRoute, private appService: AppService) {}

  ngOnInit(): void {
    this.subscriptions = [];
    this.subscriptions.push(
      this.route.queryParamMap.subscribe(queryParams => {
        this.id = (queryParams.get('id') as unknown) as number;
        //console.log(this.id);
      })
    );
    this.id$ = this.route.queryParamMap.pipe(
      map(q => (q.get('id') as unknown) as number)
    );
    this.trainingPlan$ = this.id$.pipe(
      tap(x=>console.log(x)),
      switchMap(id => this.appService.getTrainingPlan(id))
    );
    //this.trainingPlan$.subscribe(x => console.log(x));
  }
  ngOnDestroy(): void {
    this.subscriptions.forEach(s => s.unsubscribe());
  }
}
