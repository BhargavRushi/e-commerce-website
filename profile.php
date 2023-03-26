<?php
$id = $_SESSION['id'];
$sql = "select * from users where uid = '$id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
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
<form action = "db.php" method = "POST" enctype="multipart/form-data" class = "text-info">
	<h2 class = "card-title text-center text-info">Profile</h2>
	<p class = "text-center text-success"><?php if(isset($msg)) echo $msg;?></p>
	<div class = "row">
		<div class = "col-lg-3">
			<img src = '<?php echo $row['image'];?>' alt = "upload profile photo" class = "img img-thumbnail" height = 150 width = 150/><br><br>
			<input type = "file" name = "image" class = "form-control-file"><br>
			<?php
			if(empty($row['image']))
			{
				echo "<button type = 'submit' name = 'mpimg' class='btn button btn button-primary'>Upload image</button>";
			}
			else
			{
				echo"<button type = 'submit' name = 'mpimg' class='btn button btn button-primary'>Change image</button>";
			}
		?>
		</div>
	<div class = "col-lg-9">
		<div class = "from group row">
			<div class = "col-lg-2">
				<label>Name</label>
			</div>
			<div class = "col-lg-8">
				<input type = "text" class = "form-control p-3" value = "<?php echo $row['uname'];?>" name = "name" >
			</div>
		</div><br>
		<div class = "form group row">
			<div class = "col-lg-2">
				<label class = "control-label">Mobile </label>
			</div>
			<div class = "col-lg-8">
				<input type = "text" class = "form-control" name = "mobile" value = <?php echo $row['mobile'];?> />
			</div>
		</div><br>
		<div class = "form group row">
			<div class = "col-lg-2">
				<label class = "control-label">Email </label>
			</div>
			<div class = "col-lg-8">
				<input type = "text" class = "form-control" name = "email" value = <?php echo $row['email'];?> />
			</div>
		</div><br>
		<div class = "from group row">
			<div class = "col-lg-2">
				<label>Address</label>
			</div>
			<div class = "col-lg-8">
				<input type = "text" class = "form-control p-3" value = "<?php echo $row['address'];?>" name = "address" >
			</div>
		</div><br>
		<div class = "form group row">
			<div class = "col-lg-2">
				<label class = "control-label">City </label>
			</div>
			<div class = "col-lg-8">
				<input type = "text" class = "form-control" name = "city" value = <?php echo $row['city'];?> />
			</div>
		</div><br>
		<div class = "form group row">
			<div class = "col-lg-2">
				<label class = "control-label">State </label>
			</div>
			<div class = "col-lg-8">
				<input type = "text" class = "form-control" name = "state" value = <?php echo $row['state'];?> />
			</div>
		</div><br>
		<div class = "form group row">
			<div class = "col-lg-2">
				<label class = "control-label">Email </label>
			</div>
			<div class = "col-lg-8">
				<input type = "text" class = "form-control" name = "pincode" value = <?php echo $row['pincode'];?> />
			</div>
		</div><br>
		<a href = "db.php?edit" class="btn button btn button-success" name = "edit">Edit</a>
		<a href='db.php?changepassword' class="btn button btn button-danger" name='changepassword'>Change Password</a>
	</div>
</form>
</div>
</div>
</div>
</div>
</div>