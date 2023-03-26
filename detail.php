<?php include "header.php";
$sql = "select * from product where pid = '$p'";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);
$sql1 = "select count(*) as count from review  where product = '$p'";
$res1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($res1);
?>
<div class = "container col-lg-10">
            <div id="car1" class="carousel slide mt-5" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#car1" data-slide-to="0" class="active"></li>
                  <li data-target="#car1" data-slide-to="1"></li>
                  <li data-target="#car1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src= '<?php echo $row["image1"]?>' height = 500 class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src= '<?php echo $row["image2"]?>' height = 500 class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src= '<?php echo $row["image3"]?>' height = 500 class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#car1" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#car1" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </button>
              </div>
              <div class = "mt-2 border p-10">
                <form action="db.php" method="POST" enctype="multipart/form-data">
                    <div class = "form-group row">
                        <?php 
                            $sql = "select * from product where pid = '$p'";
                            $res = mysqli_query($con,$sql);
                              $pr =$row['price'];
                              $pt=$row['pricetype'];
                        ?>
                            <h4 class = "col-lg-3 text-light">Price : <?php echo $pr;?> per <?php echo $pt;?></h4>
                    </div>
                    <input type = "hidden" name = "product" value = "<?php echo $row['pid'];?>">
                    <button type = "submit" class = "btn button btn button-warning">Buy Now</button>
                    <button type = "submit" class = "btn button btn button-warning" name="AddToCart">Add to Cart</button>
                </form>
                <h3 class = "mt-4 text-success text-center">Reviews : 
                    <?php 
                    echo $row1['count'];
                    ?>
                </h3>
                <div class = "mt-5">
                <div class = "col-lg-8 mx-auto">
                <?php
                    $sql = "select * from review where product = '$p' order by rating desc";
                    $res = mysqli_query($con,$sql);
                    foreach($res as $row)
                    {
                        $temp = 1;
                    ?>
                        <div class = "row border p-3">
                            <div class = "col-lg-8">
                                <p class = "col-lg-8 ml-5 text-light"><?php echo $temp;echo ". ";echo $row['review'];?></p>
                            </div>
                            <div class = "text-right col-lg-4">
                                    <?php
                                        $i= 0;
                                        $count = 0;
                                        while($i<$row['rating'])
                                        {
                                            echo '<i class="fa fa-star fa-2x text-primary" aria-hidden="true"></i>';
                                            $i = $i + 1;
                                            $count = $count + 1;
                                        }
                                        $temp = 5 - $count;
                                        $count = $count + $temp;
                                        while($i<$count)
                                        {
                                            echo '<i class="far fa-star fa-2x"></i>';
                                            $i = $i + 1;
                                        }
                                    ?>
                            </div>
                        </div>
                <?php
                    $temp = $temp + 1;
                    }
                ?>
                </div>
            </div>
                <form action = "db.php" method = "POST">
                    <div class = "card p-1 mt-5">
                        <div class = "card-body">
                            <p class = "text-success text-center"><?php if(isset($msg)) echo $msg; ?></p>
                            <input type = "hidden" name = "pid" value = "<?php echo $p?>"/>
                            <textarea class = "form-control" name = "comment">Leave Comments</textarea>
                            <div class="form-group row">
                                <label class = "col-lg-2">Rate Product</label>
                                <select class="form-control col-lg-1" id = "rate" name="rate">
                                    <option name = "rate" value = "1">1</option>
                                    <option name = "rate" value = "2">2</option>
                                    <option name = "rate" value = "3">3</option>
                                    <option name = "rate" value = "4">4</option>
                                    <option name = "rate" value = "5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class = "card-footer text-right">
                            <button type = "submit" name = "review" class = "btn button btn button-primary">Submit review</button>
                        </div>
                    </div>
                <form>
            </div>
        </div>
<?php include "footer.php";?>