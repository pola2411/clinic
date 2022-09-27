<?php

if(isset($_GET['sign_out'])){
  session_unset();
  session_destroy();
  
}
?>

<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="/clinic/index.php">DR George</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/clinic/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="/clinic/user/add.php">new client</a></li>
          <li>
            <form action="">
              <button name="sign_out" class="sign_btn btn btn-danger"> <span class="sign">Sign Out</span><i class="bi bi-box-arrow-right"></i> </button>
              </form>

            </li>
          
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->