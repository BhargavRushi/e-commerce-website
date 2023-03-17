<?php
$id = $_SESSION['id'];
$role = $_SESSION['rid'];
if($role == 1)
{
	include 'adminheader.php';
}
else if($role == 2)
{
	include 'userheader.php';
}
?>

<form action = "db.php" method = "POST" enctype = "multipart/form-data">
	<p class = "text-success text-center"><?php if(isset($msg)) echo $msg; ?></p>
	<div class = "form group row">
		<div class = "col-lg-1">
			<label class = "control-label">To</label>
		</div>
		<div class = "col-lg-8">
			<input type = "email" name = "to_email" class = "form-control" required = "required"/>
		</div>
	</div><br>
	<div class = "form group row">
		<div class = "col-lg-1">
			<label class = "control-label">Subject</label>
		</div>
		<div class = "col-lg-8">
			<input type = "text" name = "subject" class = "form-control"/>
		</div>
	</div><br>
	<div class = "form group row">
		<div class = "col-lg-1">
			<label class = "control-label">Description</label>
		</div>
		<div class = "col-lg-8">
			<textarea class = "form-control" rows = "8" name = "desc" required = "required"></textarea>
		</div>
	</div><br>
	<div class = "form group row">
		<div class = "col-lg-1">
			<label class = "control-label">Attachment</label>
		</div>
		<div class = "col-lg-8">
			<input type = "file" name = "file" class = "form-control-file"/>
		</div>
	</div><br>
	<button type = "submit" name = "mail_send" class = "btn btn-success col-md-1">Send</button>
</form>
</div>
</div>
</div>
</div>