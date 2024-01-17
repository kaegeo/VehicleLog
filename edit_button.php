<div style='width:40px; margin:auto;'>
<form action=<?php echo $table_name . '_edit.php' ?> method="POST" id=<?php echo $table_name . '_edit' ?> >
<input type="hidden" name=<?php echo $table_name . 'ID' ?> value=<?php echo $table_row[$columns[0]] ?> />
<button type="submit" class="button">Edit</button>
</form>
</div>