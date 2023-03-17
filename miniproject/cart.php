<?php include "header.php" ;
$id = $_SESSION['id'];
$sql = "select * from users where uid = '$id'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$sql1 = "select count(cid) as count from cart where uid = '$id'";
$res1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($res1);
$sql3 = "select * from users natural join cart natural join product where users.uid = '$id'";
$res2 = mysqli_query($con,$sql3);
?>
<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0 text-primary">Cart <?php  echo $row1['count'];?> items</h5>
          </div>
          <div class="card-body">
            <!-- Single item -->
            <?php 
            foreach($res2 as $row3)
            {
            echo '
                <div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <img src='.$row3["image1"].'
                        class="w-100"/>
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <p><strong>Product : '.$row3['pname'].'</strong></p>
                    <p>Pricetype : '.$row3["pricetype"].'</p>
                    <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                    title="Remove item">
                    <i class="fas fa-trash"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                    title="Move to the wish list">
                    <i class="fas fa-heart"></i>
                    </button>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="d-flex mb-4" style="max-width: 300px">
                    <button class="btn btn-primary px-3 me-2"
                        onclick="this.parentNode.querySelector("input[type=number]").stepDown()">
                        <i class="fas fa-minus"></i>
                    </button>

                    <div class="form-outline">
                        <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
                        <label class="form-label" for="form1">Quantity</label>
                    </div>

                    <button class="btn btn-primary px-3 ms-2"
                        onclick="this.parentNode.querySelector("input[type=number]").stepUp()">
                        <i class="fas fa-plus"></i>
                    </button>
                    </div>
                    <p class="text-start text-md-center">
                    <strong>Price Per Quantity : '.$row3["price"].'</strong>
                    </p>
                </div>
                </div>';
            }
            ?>
            <hr class="my-4" />
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <p class = "text-primary"><strong>Shipping delivery Address</strong></p>
            <p class="mb-0"><?php echo $row['address'] ,' ' , $row['city'] , ' ' , $row['state'] , ' ' , $row['pincode']?></p>
            <a class = "btn mt-2">Edit Shipping Address</a>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body">
            <p class = "text-primary"><strong>We accept</strong></p>
            <img class="me-2" width="45px"
              src="img/visa.svg"
              alt="Visa" />
            <img class="me-2" width="45px"
              src="img/amex.svg"
              alt="American Express" />
            <img class="me-2" width="45px"
              src="img/mastercard.svg"
              alt="Mastercard" />
            <img class="me-2" width="45px"
              src="img/paypal.jpg"
              alt="PayPal acceptance mark" />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0 text-primary">Summary</h5>
          </div>
          <div class="card-body text-dark">
            <ul class="list-group list-group-flush p-2">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Products
                <span>#</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>#</span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span><strong>#</strong></span>
              </li>
            </ul>

            <button type="button" class="btn btn-primary btn-lg btn-block">
              Go to checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>