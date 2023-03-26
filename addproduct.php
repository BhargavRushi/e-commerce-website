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
		<form action = "db.php" method = "POST" class = "text-info" enctype="multipart/form-data">
			<h2 class = "text-center">Add Product</h2>
            <p class = "text-center text-success"><?php if(isset($msg)) echo $msg;?></p>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Product Name</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text" class = "form-control p-3" name = "pname"/>
			    </div>
			</div><br>
            <div class="form-group row">
                <label class = "col-lg-4">Product type</label>
                <div class = "col-lg-8">
                    <select class="form-control" name = "ptype">
                    <option value = "1">Vegetables</option>
                    <option value = "2" >Fruits</option>
                    <option value = "3">Meat</option>
                    <option value = "4">seafood</option>
                    </select>
                </div>
            </div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Image1</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "file" name = "image1" class = "form-control p-3"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Image2</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "file" name = "image2" class = "form-control p-3"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Image3</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "file" name = "image3" class = "form-control p-3"/>
			    </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Price Type</label>
				</div>
			    <div class = "col-lg-8">
                    <select class="form-control" name = "pricetype">
                        <option value = "kilo">Per kilo</option>
                        <option value = "single" >Per Piece</option>
                    </select>
                </div>
			</div><br>
			<div class = "from group row mt-2">
				<div class = "col-lg-4">
					<label>Price</label>
				</div>
			    <div class = "col-lg-8">
			    	<input type = "text" class = "form-control p-3" name = "price"/>
			    </div>
			</div><br>
			<button type = "submit" class = "btn btn-success col-lg-2" name = "addprod">Add Product</button>
		</form>
	</div>
</div>
</div>
</div>
