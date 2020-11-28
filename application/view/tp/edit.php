<script src="https://code.jquery.com/jquery-1.11.3.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script>
jQuery(document).ready(function() {
	jQuery('#date').datepicker({
		beforeShowDay: function(date){
          return [date.getDay()===1];
        }
	});
});
</script>
<?php
	echo $tp -> tp_name; ?>
<br>
<br>
<table border = 1>
<tr>
<th>Week (Start Date)</th><th>Unit Code and Name</th><th>Nominal Hours</th><th><Expected Assessment Submission Dates</th><th>RPL</th><th>Credit transfer</th><th>Theory</th><th>Work Placement</th><th>Competent</th> 
</tr>
<form action="<?php echo URL; ?>public/" method='GET'>
<tr>
<td><input type='text' id="date" /></td>

<td>
<select>
<option value="none">None</option>
<?php
	foreach($unitOfferings as $uo){
		?><option value = <?php $uo -> $unit -> $unit_name?> ><?php $uo -> unit_offering_id?></option>
		<?php
	}
 ?>
</select>
</td>

<td>Nominal Hours</td><td><Expected Assessment Submission Dates</td><td>RPL</td><td>Credit transfer</td><td>Theory</td><td>Work Placement</td><td>Competent</td> 
</tr>
</form>
</table>