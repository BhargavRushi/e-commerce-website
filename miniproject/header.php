<html>
    <head>
        <title>BigBasket</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href = "https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" 
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> 
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="styles.css">
    </head>
    <body class = "container_fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="db.php?home">BiG<i class="fa fa-shopping-basket" aria-hidden="true"></i>Basket</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse expand" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="db.php?home">Home</a>
              </li>
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                  Items we provide
                </a>
                <div class="dropdown-menu bg-light">
                  <a class="dropdown-item text-dark" href="db.php?vegetables">Vegetables</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-dark" href="db.php?fruits">Fruits</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item text-dark" href="db.php?meat">Meat</a>
                </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="db.php?cart">Cart</a>
              </li>
              <?php 
              if(isset($_SESSION['id']))
              {
               echo '<li class="nav-item active">
                <a class="nav-link" href="db.php?logout">logout</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="db.php?dashboard">My Profile</a>
              </li>';
              }
              else
              {
                echo '<li class="nav-item active">
                <a class="nav-link" href="login.php">login</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="signup.php">Signup</a>
              </li>';
              }
              ?>
            </ul>
            <form  class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>