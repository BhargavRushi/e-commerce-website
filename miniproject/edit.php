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
		<form action = "db.php" method = "POST" class = "text-info">
			<h2 class = "text-center">Edit Profile</h2>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Name</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text" class = "form-control p-3" name = "name" value = "<?php echo $row['uname'];?>"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Email</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text"  class = "form-control p-3" value = "<?php echo $row['email'];?>" name = "email"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Mobile</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text" class = "form-control p-3" value = "<?php echo $row['mobile'];?>" name = "mobile"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Address</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text" class = "form-control p-3" value = "<?php echo $row['address'];?>" name = "address"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>city</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text" class = "form-control p-3" value = "<?php echo $row['city'];?>" name = "city"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>State</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text" class = "form-control p-3" value = "<?php echo $row['state'];?>" name = "state"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Pin Code</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text" class = "form-control p-3" value = "<?php echo $row['pincode'];?>" name = "pincode"/>
			    </div>
			</div><br>
			<button type = "submit" class = "btn btn-primary col-lg-2" name = "savechanges">Edit</button>
			<a href = "db.php?back" class = "btn btn-danger col-lg-2">Cancel</a>
		</form>
	</div>
</div>
</div>
</div>