<?php include "header.php";?>
        <div class = "container-fluid my-4 row" id = "display_row">
          <?php 
            $sql = "select * from product where producttype = 3 or producttype = 4";
            $res = mysqli_query($con,$sql);
            foreach($res as $row)
            {
              $img = $row['image1'];
              $n = $row['pname'];
              $pid = $row['pid'];
              echo 
                  '<div class="card shadow p-2 my-3" id = "card-transform" style="width: 18rem;">
                        <img src='.$img.' height = "195" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">'.$n.'</h5>
                          <a href="db.php?detail='.$pid.'" class="btn button btn button-warning">Buy Now</a>
                        </div>
                  </div>';
            }
            ?>
        </div>
<?php include "footer.php";?>