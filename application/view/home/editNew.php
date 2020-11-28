<!DOCTYPE html>
<html>
<head>
<style>
.break { page-break-before: always; }

@page{
	margin: 29px;
	boarder: 0;
}

textarea { border: none; }
input { border: none; }
</style>
<link rel="stylesheet" type="text/css" href="myStyle.css">
<style>
table, td {
    border: 1px solid black;
}
</style>
</head>
<body onload="loadFun()">
<div class="break">
<h1 align='center'>Training Plan</h1>
<table width="1276" border='1' align='center'>
<tbody>
<tr>
<td width="130">
<p><strong>COURSE CODE</strong></p>
</td>
<td width="378">
<p><strong><?php echo $course -> course_code; ?></strong></p>
</td>
<td width="130">
<p><strong>COURSE TITLE</strong></p>
</td>
<td colspan="3" width="638">
<p><strong>&nbsp;</strong><strong><?php echo $course -> course_name; ?></strong></p>
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
<p><strong><input type = 'date' onchange='togglercdate(this,0);' value = '<?php echo $_GET['startdate']; ?>'></strong></p>
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
<p><strong><input type = 'date' value = '<?php echo $_GET['enddate']; ?>' onchange='datetoggler(this,0);'></strong></p>
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
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No</strong></p>
</td>
<td width="174">
<p><strong>Time &amp; Day: </strong></p>
<p><strong><?php echo $_GET['timing']; ?></strong></p>

</td>
<td width="165">
<p><strong>RPL/Credit Transfer&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></p>
<p><strong>&nbsp;</strong></p>
<p><strong>Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; No</strong></p>
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
<p><strong><?php echo $course -> wp; ?></strong></p>
</td>
</tr>
<tr>
<td colspan="6" width="1276">
<p>TOTAL PROGRAMME SUPERVISED HOURS= <?php echo $course -> sup_hours; ?></p>
<p><strong>&nbsp;</strong></p>
</td>
</tr>
<tr>
<td width="130">
<p><strong>Training Location:</strong></p>
</td>
<td colspan="5" width="1146">
<p><strong><?php echo $campus -> campus_name; ?></strong><br /> <?php echo $campus -> campus_address; ?></p>
</td>
</tr>
<tr>
<td width="130">
<p><strong>Training Methods</strong></p>
</td>
<td colspan="5" width="1146">
<p>Face to face, Self-study and Work Placement Observation</p>
</td>
</tr>

</tbody>
</table>
</div>


<br><br><br><br>
<table width="1300" align='center'>
<tbody>
<tr>
<td width="1300">
<p><strong>Orientation Day:<div id='orday'></div></strong></p>
<p>Language, Literacy and orientation including overview on Placement</p>
<p>LLN to be marked on the same day and student advised of LLN result</p>
</td>
</tr>
</tbody>
</table>




<div id='rem1'>

<p>Give the starting monday of the course</p>
<div id="dt0">
<textarea id = "dt1" rows="1" cols="20">Mon Apr 07 2014</textarea>
</div>
</div>
<table id="myTable" align='center'>
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
  </tr>
  <TBODY>

</table>
<br>
<div id='rem2'>
<button onclick="rFun()">Print View</button>
<button onclick="myFunction()">New week</button>
<button onclick="dupFunction()">New row in same week</button>
<button onclick="deleteFun()">Delete last row</button><br>
Manually set the next week as <textarea id="wkn" rows='1' cols='5'></textarea> 
<button onclick="setWkFun()">Set week number</button>
<button onclick="roFun()">Roll over</button>
<button onclick="rbFun()">Roll back</button>
<br>
</div>





<table width="1300" align='center'>
<tbody>
<tr>
<td style="text-align: center;" width="1300">
<p><strong>Work placement Hours: <?php echo $course->wp ?></strong></p>
<p><strong><textarea rows=1 cols=20>Add weeks here</textarea> </strong></p>
</td>
</tr>
<tr>
<td style="text-align: center;" width="1252">
<p>WORK PLACEMENT BOOK NEEDS TO BE SUBMITTED&nbsp; TO THEIR TRAINER ON&nbsp; <strong><textarea rows=1 cols=15>Add date here</textarea></strong></p>
<p>&nbsp;All units should be completed, trainers to check on Moodle grade (one by one))</p>
<p><strong>Completion </strong></p>
<p><strong>&nbsp;(All students should attend for the final audit of files)</strong></p>
<p><strong>(Trainers to Audit Student Files and complete course summary with QAO)</strong></p>
<p><textarea rows=1 cols=20>Add weeks here</textarea></p>
<p>&nbsp;</p>
<p>Result process and declare &nbsp;within <textarea rows=1 cols=15>Add date here</textarea></p>
</td>
</tr>
</tbody>
</table>




<div class="break">
<p><strong><u>IMPORTANT NOTES:</u></strong></p>
<p><strong>*Times are set from 9:00am to 5:00 pm with 30 minutes break</strong></p>
<p><strong><u>RESPONSIBILITIES</u></strong></p>
<p><strong>The Student&rsquo;s responsibilities include, but not limited to:</strong></p>
<ul>
<li>Submit the documents for RPL or Credit Transfer along with the Training Plan</li>
<li>Submit assessments as per the Training plan and complete the course by the completion date: 12/12/2018</li>
</ul>
<p><strong>Inform JTI of any additional support required. If there is NONE, please write NONE in the space provided</strong></p>
<p><strong><u>ADDITIONAL SUPPORT ACTION PLAN:</u></strong></p>
<table width="1300" align='center'>
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
<p><strong>JTI&rsquo;s responsibilities include, but not limited to:</strong></p>
<ul>
<li>Provide training and assessment in accordance with the Training Plan</li>
<li>Provide training materials and necessary support to the student. English class is available for the student for additional support.</li>
<li>Maintain training records</li>
<li>Notify the students regarding issues that may affect successful completion of the Training Plan;</li>
<li>Implement action plan agreed upon to address additional support that the student requires.</li>
<li>Issue of Certificate and or Statement of Attainment following the policy on issuance of certificates and Statement of Attainment.</li>
</ul>
<p><strong><u>Training Plan Agreement</u></strong></p>
<p>This document forms a legally binding agreement between the Student and JTI leading to a nationally recognized qualification. In signing this agreement both parties are bound by the obligations detailed below and the legislation of the state or territory in which this Agreement is to be registered.</p>

<p><strong>For face to face student:</strong> I have received a copy of JTI student handbook during orientation and I agree to read and abide by all the policies and procedures found in the student handbook.</p>
<p>&nbsp;<strong>For online student:</strong>&nbsp; I have been given access for a copy of JTI student handbook on Moodle and I agree to read and abide by all policies and procedures found in the student handbook.</p>

<p><strong>Training Plan Agreement Declaration</strong></p>
<p><strong><em>I have agreed to adhere to the Training and Assessment plan provided. I have received the training materials necessary for me to complete the course.</em></strong></p>
</div>
<div class="break">
<table width="1300" align='center'>
<tbody>
<tr>
<td width="307">
<p><strong>Student&rsquo;s&nbsp; Printed Name</strong></p>
</td>
<td colspan="4" width="992">
</td>
</tr>
<tr>
<td width="307">
<p><strong>Student&rsquo;s Signature</strong></p>
</td>
<td colspan="2" width="496">
</td>
<td width="156">
<p><strong>Date</strong></p>
</td>
<td width="340">
</td>
</tr>
<tr>
<td width="307">
<p><strong>JTI Representative Printed Name</strong></p>
</td>
<td colspan="4" width="992">
</td>
</tr>
<tr>
<td width="307">
<p><strong>JTI Representative Signature</strong></p>
</td>
<td colspan="2" width="496">
</td>
<td width="156">
<p><strong>Date</strong></p>
</td>
<td width="340">
</td>
</tr>
<tr>
<td colspan="5" width="1300">
<p align='center'><strong>TRAINER USE ONLY</strong></p>
</td>
</tr>
<tr>
<td colspan="5" width="1300">
<p align='center'><strong>COURSE COMPETENCY SUMMARY</strong></p>
</td>
</tr>
<tr>
<td colspan="5" width="1300">
<p>I declare this student has completed all assessments and evidence has been submitted. The assessments meet the rules of evidence namely Fair, Reliable, Valid and Sufficient. Having assessed all the evidence the student submitted for the units of competency in this training plan , the student has been assessed as</p>
<p>&nbsp;</p>

<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>COMPETENT &nbsp;&nbsp;&nbsp;&#x25a2;</strong></p>
<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NOT YET COMPETENT &nbsp;&nbsp;&nbsp;&#x25a2;</strong></p>
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

<form name='myForm' id = 'myForm' method='POST' action='<?php echo URL; ?>public/'>
	<input type="hidden" name="page" value="">
	<input type="hidden" name="controller" value="home">
	<input type="hidden" name="do" value="savePage">
	<input type="hidden" name="name" value="<?php echo $name; ?>">
	
</form>
<div id='submitButton'>
	<button onclick="submitFun()">Save</button>
</div>



<script>
var week = 0;
var rcount = 0;
var mydate = new Date(document.getElementById("dt1").value);
var mydate2 = new Date(document.getElementById("hello").value);
var dummySeelct1 = "<div class='dropdown-wrapper'><select id='mySelect' onchange='sFun(";
var dummySelect2 = ", this.options[this.selectedIndex].value)'> <option value='Break Break'>Break<?php foreach($units as $unit){?> <option value='<?php echo $unit->c_hours." ".$unit->unit_type; ?>'><?php echo $unit->unit_code." ".$unit->unit_name;}?></select></div>";

function loadFun(){
	alert("rcount = " + rcount + " week = " + week);
	
	rcount = Number(document.getElementById("myTable").rows.length)-1;
	if(! isNaN(document.getElementById("myTable").rows[rcount].cells[0].innerHTML)){
		
		alert("hii");
		week = Number(document.getElementById("myTable").rows[rcount].cells[0].innerHTML);
		
	}
	
	alert("rcount = " + rcount + " week = " + week);
}
function myFunction() {
	mydate = new Date(document.getElementById("dt1").value);
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
	var cell2 = row.insertCell(2);
	var cell3 = row.insertCell(3);
	var cell4 = row.insertCell(4);
	var cell5 = row.insertCell(5);
	var cell6 = row.insertCell(6);
	var cell7 = row.insertCell(7);
	var cell8 = row.insertCell(8);
	var cell9 = row.insertCell(9);
	week = week + 1;
	rcount = rcount + 1;
	cell0.innerHTML = week;
	cell6.innerHTML = "Yes / No";
	cell7.innerHTML = "Yes / No";
	
	var c2 = "<textarea id ='ta' rows='5' cols='15'>"
	console.log(mydate.toDateString());
	for (i = 0; i < 7; i++) { 
		if(mydate.getDay() == 10 <?php $days = $_GET['days']; foreach($days as $day){?> || mydate.getDay() == <?php echo $day; }?> ){
			c2 = c2 + '\n' + mydate.toDateString();
		}
		mydate.setDate(mydate.getDate()+1);
	}
	document.getElementById("dt0").innerHTML = "<textarea id = 'dt1' rows='1' cols='20'>" + mydate + "</textarea>";
	c2 = c2 + "</textarea>";
	cell2.innerHTML = c2;
    cell1.innerHTML = "<div class='dropdown-wrapper'><select id='mySelect' onchange='sFun("+rcount+", this.options[this.selectedIndex].value)'> <option value='Break, Break, Break, Break, Break'>Break <option value='<textarea onchange = &quot;toggler(this)&quot;></textarea>, <textarea onchange = &quot;toggler(this)&quot;></textarea>, <textarea rows=4 cols=50 onchange = &quot;toggler(this)&quot;></textarea>, , <textarea onchange = &quot;toggler(this)&quot;></textarea>'>Manual<?php foreach($units as $unit){?> <option value='<?php echo $unit->c_hours.",".$unit->unit_type.",".$unit->unit_code.",".$unit->unit_name.",".$unit->a_methods; ?>'><?php echo $unit->unit_code." ".$unit->unit_name;}?></select></div>" ;
}

function dupFunction() {
	mydate = new Date(document.getElementById("dt1").value);
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
	var cell2 = row.insertCell(2);
	var cell3 = row.insertCell(3);
	var cell4 = row.insertCell(4);
	var cell5 = row.insertCell(5);
	var cell6 = row.insertCell(6);
	var cell7 = row.insertCell(7);
	var cell8 = row.insertCell(8);
	var cell9 = row.insertCell(9);
	rcount = rcount + 1;
	cell0.innerHTML = week;
	cell6.innerHTML = "Yes / No";
	cell7.innerHTML = "Yes / No";
	
	var c2 = "<textarea id ='ta' rows='5' cols='15'>"
	console.log(mydate.toDateString());
	mydate.setDate(mydate.getDate()-7);
	for (i = 0; i < 7; i++) { 
		if(mydate.getDay() == 10 <?php $days = $_GET['days']; foreach($days as $day){?> || mydate.getDay() == <?php echo $day; }?> ){
			c2 = c2 + '\n' + mydate.toDateString();
		}
		mydate.setDate(mydate.getDate()+1);
	}
	c2 = c2 + "</textarea>";
	cell2.innerHTML = c2;
    cell1.innerHTML = "<div class='dropdown-wrapper'><select id='mySelect' onchange='sFun("+rcount+", this.options[this.selectedIndex].value)'> <option value='Break, Break, Break, Break, Break'>Break<?php foreach($units as $unit){?> <option value='<?php echo $unit->c_hours.",".$unit->unit_type.",".$unit->unit_code.",".$unit->unit_name.",".$unit->a_methods; ?>'><?php echo $unit->unit_code." ".$unit->unit_name;}?></select></div>" ;
	
}

function roFun() {
	var flagTW = false;
	if(Number(document.getElementById("myTable").rows[1].cells[0].innerHTML) == Number(document.getElementById("myTable").rows[2].cells[0].innerHTML)){
		flagTW = true;
	}
	mydate = new Date(document.getElementById("dt1").value);
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
	var cell2 = row.insertCell(2);
	var cell3 = row.insertCell(3);
	var cell4 = row.insertCell(4);
	var cell5 = row.insertCell(5);
	var cell6 = row.insertCell(6);
	var cell7 = row.insertCell(7);
	var cell8 = row.insertCell(8);
	var cell9 = row.insertCell(9);
	week = week+1;
	rcount = rcount + 1;
	cell0.innerHTML = week;
	cell6.innerHTML = "Yes / No";
	cell7.innerHTML = "Yes / No";
	var c2 = "<textarea id ='ta' rows='5' cols='15'>"
	console.log(mydate.toDateString());
	for (i = 0; i < 7; i++) { 
		if(mydate.getDay() == 10 <?php $days = $_GET['days']; foreach($days as $day){?> || mydate.getDay() == <?php echo $day; }?> ){
			c2 = c2 + '\n' + mydate.toDateString();
		}
		mydate.setDate(mydate.getDate()+1);
	}
	document.getElementById("dt0").innerHTML = "<textarea id = 'dt1' rows='1' cols='20'>" + mydate + "</textarea>";
	c2 = c2 + "</textarea>";
	cell2.innerHTML = c2;
    cell1.innerHTML = "<div class='dropdown-wrapper'><select id='mySelect' onchange='sFun("+rcount+", this.options[this.selectedIndex].value)'> <option value='Break, Break, Break, Break, Break'>Break<?php foreach($units as $unit){?> <option value='<?php echo $unit->c_hours.",".$unit->unit_type.",".$unit->unit_code.",".$unit->unit_name.",".$unit->a_methods; ?>'><?php echo $unit->unit_code." ".$unit->unit_name;}?></select></div>" ;
	cell3.innerHTML =  document.getElementById("myTable").rows[1].cells[3].innerHTML;
	cell4.innerHTML =  document.getElementById("myTable").rows[1].cells[4].innerHTML;
	
	
	for (i = 1; i<rcount+1; i++){
		document.getElementById("myTable").rows[i].cells[1].innerHTML = document.getElementById("myTable").rows[i].cells[1].innerHTML.split(':')[0] + ": <button onclick='scFun("+ (i-1) +")'> Edit </button>";
	}
	rcount = rcount - 1;
	week = week-1;
	document.getElementById("myTable").deleteRow(1);
	
	if (flagTW == true){
		roFun();
	}else{
		reduceWeekFun();
	}
	
}

function reduceWeekFun(){
	for (i = 1; i<document.getElementById("myTable").rows.length; i++){
		document.getElementById("myTable").rows[i].cells[0].innerHTML = Number(document.getElementById("myTable").rows[i].cells[0].innerHTML) - 1;
	}
}

function sFun(w, h){
	var x = document.getElementById("mySelect").value;
	var ar = h.split(",");
    document.getElementById("myTable").rows[w].cells[3].innerHTML = ar[0];
	document.getElementById("myTable").rows[w].cells[4].innerHTML = ar[1];
	document.getElementById("myTable").rows[w].cells[8].innerHTML = ar[4];
	
	
	document.getElementById("myTable").rows[w].cells[1].innerHTML = ar[2] + " " + ar[3] + ": <button onclick='scFun("+w+")'> Edit </button>"; 
	
	}
	
function scFun(w){
	document.getElementById("myTable").rows[w].cells[1].innerHTML = "<div class='dropdown-wrapper'><select id='mySelect' onchange='sFun("+rcount+", this.options[this.selectedIndex].value)'> <option value='Break, Break, Break, Break, Break'>Break<?php foreach($units as $unit){?> <option value='<?php echo $unit->c_hours.",".$unit->unit_type.",".$unit->unit_code.",".$unit->unit_name.",".$unit->a_methods; ?>'><?php echo $unit->unit_code." ".$unit->unit_name;}?></select></div>";
}
function rFun(){
	document.getElementById("rem1").innerHTML = "";
	document.getElementById("rem2").innerHTML = "";
	document.getElementById("submitButton").innerHTML = "";
	
	for (i = 1; i < rcount+1; i++){
			document.getElementById("myTable").rows[i].cells[1].innerHTML = document.getElementById("myTable").rows[i].cells[1].innerHTML.split(":")[0];
	}
	
}
function deleteFun() {
    document.getElementById("myTable").deleteRow(-1);
	rcount = rcount-1;
	week = Number(document.getElementById("myTable").rows[rcount].cells[0].innerHTML);
}
function setWkFun() {
	week = Number(document.getElementById("wkn").value) - 1;
	alert("Next week is set as "+ (week+1));
}

function submitFun(){
	var pcode = document.getElementsByTagName("html")[0].innerHTML;
	document.myForm.page.value = pcode;
	document.getElementById("myForm").submit();
}

function toggler(a,i=1){
	if(i==1){
		a.outerHTML = "<p ondblclick = 'toggler(this,0);'>"+a.value+"</p>";
    }
    else{
    	a.outerHTML = "<textarea onchange = 'toggler(this,1);'></textarea>";
    }
}

function togglercdate(a,i=1){
	if(i==0){
		a.outerHTML = "<p ondblclick = 'togglercdate(this,1);'>"+a.value+"</p>";
		document.getElementById("orday").innerHTML = a.value;
    }
    else{
    	a.outerHTML = "<input type = 'date' onchange='togglercdate(this,0);'>";
    }
}

function datetoggler(a,i=1){
	if(i==0){
		a.outerHTML = "<p ondblclick = 'togglercdate(this,1);'>"+a.value+"</p>";
    }
    else{
    	a.outerHTML = "<input type = 'date' onchange='togglercdate(this,0);'>";
    }
}


</script>

</body>
</html>
