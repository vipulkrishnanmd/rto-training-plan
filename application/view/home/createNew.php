
<form action="<?php echo URL; ?>public/" method=get>
<table border=0>
<tr><td>Name: </td><td> <input type='text' name='name' > </td></tr>
<tr><td>Course: </td><td> <select title="Course" name="course" id="course"> 
	<option value="--None--">--None--</option>
	<?php foreach($courseList as $course){ ?>
			<option value='<?php echo $course->course_id; ?>'><?php echo $course->course_name; ?></option>
		<?php } ?>
		</select>
		</td></tr>
<tr><td>Campus: </td><td><select title="campus" name="campus" id="campus"> 
	<option value="--None--">--None--</option>
	<?php foreach($campusList as $campus){ ?>
			<option value='<?php echo $campus->campus_id; ?>'><?php echo $campus->campus_name; ?></option>
		<?php } ?>
		</select>
		</td></tr>
<tr><td>Start Date: </td><td><input type='date' name='startdate'> </td></tr>
<tr><td>End Date: </td><td><input type='date' name='enddate'></td></tr>
<tr><td>Timing: </td><td><input type='text' name='timing'></td></tr>
<tr><td>Strength: </td><td><select name="strength">
    <?php for ($i = 1; $i <= 100; $i++) { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
	<?php } ?>
</select></td></tr>
<tr><td>Training Method: </td><td><select title="method" name="method" id="method">
			<option value="Online">Online</option>
			<option value="On campus">On campus</option>
			</select>
			</td></tr>	<tr>	<td>Select the days</td>	<td>			<input type="checkbox" name="days[]" value="1">Monday<br>			<input type="checkbox" name="days[]" value="2">Tuesday<br>			<input type="checkbox" name="days[]" value="3">Wednesday<br>			<input type="checkbox" name="days[]" value="4">Thursday<br>			<input type="checkbox" name="days[]" value="5">Friday<br>	</td>	</tr>
<input type='hidden' name='controller' value='home'>
<input type='hidden' name='do' value='createNew'>
<tr><td> </td><td> <input type='submit' value='Create'></td></tr>
</table>
</form>
