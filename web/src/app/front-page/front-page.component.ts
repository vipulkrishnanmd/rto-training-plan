import { Component, Input, OnInit } from "@angular/core";

@Component({
  selector: "front-page",
  template: `
    <div class="break">
      <h1 align="center">Training Plan</h1>
      <table width="1276" border="1" align="center">
        <tbody>
          <tr>
            <td width="130">
              <p><strong>COURSE CODE</strong></p>
            </td>
            <td width="378">
              <p>
                <strong>{{ trainingPlan?.course_code }}</strong>
              </p>
            </td>
            <td width="130">
              <p><strong>COURSE TITLE</strong></p>
            </td>
            <td colspan="3" width="638">
              <p>
                <strong>&nbsp;</strong
                ><strong>{{ trainingPlan?.course_name }}</strong>
              </p>
              <p><strong>&nbsp;</strong></p>
            </td>
          </tr>
          <tr>
            <td width="130">
              <p><strong>Student Name:</strong></p>
            </td>
            <td width="378">
              <p><strong>&nbsp;</strong></p>
            </td>
            <td width="130">
              <p><strong>Student Phone: </strong></p>
            </td>
            <td width="299">
              <p><strong>&nbsp;</strong></p>
            </td>
            <td width="174">
              <p><strong>Proposed Training Commencement Date:</strong></p>
            </td>
            <td width="165">
              <p>
                <strong
                  ><input type="date" value="{{ trainingPlan?.start_date }}"
                /></strong>
              </p>
            </td>
          </tr>
          <tr>
            <td width="130">
              <p><strong>Student ID:</strong></p>
            </td>
            <td width="378">
              <p><strong>&nbsp;</strong></p>
            </td>
            <td width="130">
              <p><strong>Student Email:</strong></p>
            </td>
            <td width="299">
              <p><strong>&nbsp;</strong></p>
            </td>
            <td width="174">
              <p><strong>Proposed Training Completion Date:</strong></p>
            </td>
            <td width="165">
              <p>
                <strong
                  ><input type="date" value="{{ trainingPlan?.end_date }}"
                /></strong>
              </p>
            </td>
          </tr>
          <tr>
            <td width="130">
              <p><strong>Address:</strong></p>
            </td>
            <td width="378">
              <p><strong>&nbsp;</strong></p>
              <p><strong>&nbsp;</strong></p>
              <p><strong>&nbsp;</strong></p>
              <p><strong>&nbsp;</strong></p>
              <p><strong>&nbsp;</strong></p>
              <p><strong>&nbsp;</strong></p>
              <p><strong>&nbsp;</strong></p>
            </td>
            <td width="130">
              <p><strong>LLN Completed:</strong></p>
            </td>
            <td width="299">
              <p>
                <strong
                  >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  No</strong
                >
              </p>
            </td>
            <td width="174">
              <p><strong>Time &amp; Day: </strong></p>
              <p>
                <strong>{{ trainingPlan?.time }}</strong>
              </p>
            </td>
            <td width="165">
              <p>
                <strong
                  >RPL/Credit Transfer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </strong>
              </p>
              <p><strong>&nbsp;</strong></p>
              <p>
                <strong
                  >Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  No</strong
                >
              </p>
            </td>
          </tr>
          <tr>
            <td width="130">
              <p><strong>Trainer&rsquo;s Name:</strong></p>
            </td>
            <td width="378">
              <p></p>
            </td>
            <td width="130">
              <p><strong>Trainer&rsquo;s email address:</strong></p>
            </td>
            <td width="299">
              <p></p>
            </td>
            <td width="174">
              <p><strong>Work placement Hours:</strong></p>
            </td>
            <td width="165">
              <p>
                <strong>{{ trainingPlan?.wp }}</strong>
              </p>
            </td>
          </tr>
          <tr>
            <td colspan="6" width="1276">
              <p>TOTAL PROGRAMME SUPERVISED HOURS= {{trainingPlan?.sup_hours}}</p>
              <p><strong>&nbsp;</strong></p>
            </td>
          </tr>
          <tr>
            <td width="130">
              <p><strong>Training Location:</strong></p>
            </td>
            <td colspan="5" width="1146">
              <p>
                <strong>{{ trainingPlan?.campus_name }}</strong
                ><br />
                {{ trainingPlan?.campus_address }}
              </p>
            </td>
          </tr>
          <tr>
            <td width="130">
              <p><strong>Training Methods</strong></p>
            </td>
            <td colspan="5" width="1146">
              <p>{{ trainingPlan?.training_method }}</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  `,
  styleUrls: ["./front-page.component.css"]
})
export class FrontPageComponent implements OnInit {
  title = "test-angular";
  @Input() trainingPlan;

  ngOnInit() {}
}
