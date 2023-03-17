<?php include "header.php";?>
        <div class = "container-fluid mt-2 mt-5 row">
            <div class="card ml-4 shadow p-2 mt-2" id = "card-transform" style="width: 18rem;">
                  <img src="IMG\fruits.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Fruits</h5>
                    <a href="db.php?fruits" class="btn btn-warning">Buy Now</a>
                  </div>
            </div>
            <div class="card ml-4 shadow p-2 mt-2" id = "card-transform" style="width: 18rem;">
                  <img src="IMG\vegetables.jpg" class="card-img-top" height = "195" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Vegetables</h5>
                    <a href="db.php?vegetables" class="btn btn-warning">Buy Now</a>
                  </div>
            </div>
            <div class="card ml-4 shadow p-2 mt-2" id = "card-transform"  style="width: 18rem;">
                  <img src="IMG\meat.jpg" class="card-img-top" height = "195" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Meat and sea food</h5>
                    <a href="db.php?meat" class="btn btn-warning">Buy Now</a>
                  </div>
            </div>

            <div class="card ml-4 shadow p-2 mt-2" id = "card-transform" style="width: 18rem;">
                  <img src="IMG\offers.jpg" class="card-img-top" height = "195" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Our Special Offers</h5>
                    <a href="#" class="btn btn-warning">View offers</a>
                  </div>
            </div>
        </div>
        <div id="car1" class="carousel slide mt-5" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#car1" data-slide-to="0" class="active"></li>
            <li data-target="#car1" data-slide-to="1"></li>
            <li data-target="#car1" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="IMG\c1.jpg" height = 400 class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h1>Eat Fresh Vegetables</h1>
              </div>
            </div>
            <div class="carousel-item">
              <img src="IMG\c2.jpg" height = 400 class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h1>Eat Fresh Fruits</h1>
              </div>
            </div>
            <div class="carousel-item">
              <img src="IMG\c3.jpg" height = 400 class="d-block w-100" alt="...">
              <div class="carousel-caption d-none d-md-block">
                <h1>Meat</h1>
              </div>
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
<?php include "footer.php";?>