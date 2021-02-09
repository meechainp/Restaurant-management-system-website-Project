<?php session_start();?>
<html>
  
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <title>Ruen Mallika</title>
      
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
        <!-- Custom styles for this template -->
        <link href="css/shop-homepage.css" rel="stylesheet">
      </head>
      
      <body>
      
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="#">Ruen Mallika</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>


                <li class="nav-item">
                <?php if(!empty($_SESSION["username"])){ ?>
                  <a class="nav-link" href="booking_table.php">Table</a>
                <?php } ?>
                </li>
                
                <li class="nav-item">
                <?php if(!empty($_SESSION["username"])){ ?>
                  <a class="nav-link" href="cart.php">Cart</a>
                <?php } ?>
                </li>

                <li class="nav-item">
                <?php if(!empty($_SESSION["username"])){ ?>
                  <a class="nav-link" href="member_myorder.php">MyOrder </a>
                <?php } ?>
                </li>
                
                <li class="nav-item">
                  <?php if(!empty($_SESSION["username"])){ ?>
                    <a class="nav-link" href="login_logout.php">Logout</a>
                  <?php }else{ ?>
                  <a class="nav-link" href="login_member_index.php">Login</a>
                  <?php } ?>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <br>
        <br>
</html>