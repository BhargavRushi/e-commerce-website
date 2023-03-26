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
            <h5 class="mb-0 text-primary">Items in the cart :  <?php  echo $row1['count'];?></h5>
            <h3 class = "text-center text-warning mt-5">
              <?php
                if($row1['count'] == 0)
                {
                  echo "Your cart is empty";
                }
              ?>
            </h3>
            <p class = "text-danger text-center"><?php if(isset($msg)) echo $msg;?></p>
          </div>
          <div class="card-body">
            <!-- Single item -->
            <?php 
            foreach($res2 as $row3)
            {
            echo '
                <div class="row my-4">
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
                    <a type="button" href = "db.php?delete_cart_item&id='.$row3['cid'].'" class="btn btn-primary btn button-sm me-1 mb-2" data-mdb-toggle="tooltip"
                    title="Remove item">
                    <i class="fas fa-trash"></i>
                    </a>
                    <button type="button" class="btn btn-danger btn button-sm mb-2" data-mdb-toggle="tooltip"
                    title="Move to the wish list">
                    <i class="fas fa-heart"></i>
                    </button>
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="d-flex mb-4" style="max-width: 300px">

                    <form action = "db.php" method = "POST">
                        <input id="form1" min="0" name="quantity" value='.$row3['quantity'].' type="number" class="form-control" />
                        <label class="form-label" for="form1">Quantity</label>
                        <input type = "hidden" name = "cid" value = '.$row3['cid'].'/>
                        <Button type = "submit" name = "update_quantity" class = "btn btn-success">Update Quantity</Button>
                    </form>
                    
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
            <a class = "btn button mt-2">Edit Shipping Address</a>
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
            <ol class="list-group list-group-flush p-2">
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-2 pb-0 ">
                  Products :
                <span>
                    <?php
                      $c = 1;
                      foreach($res2 as $val)
                      {
                        echo '<li style = "background-color : white;list-style-type : none;" class = "px-2">Item'.$c.' : '.$val['pname'].' x '.$val['quantity'].'</li>';
                        $c+=1;
                      }
                    ?>
                </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-2">
                Shipping
                <span>#</span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-2 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span><strong>
                    <?php
                      $total = 0;
                      foreach($res2 as $val)
                      {
                        $total = $total + $val['price'] * $val['quantity'];
                      }
                      echo $total;
                    ?>
                </strong></span>
              </li>
            </ol>

            <button type="button" class="btn button btn-lg btn-block">
              Go to checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>