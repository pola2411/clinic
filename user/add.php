<?php

include("../shared/head.php");
include("../shared/header.php");
include("../function/connection.php");
include("../function/general.php");
if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $i = "INSERT INTO `user` VALUES(NULL,'$name',$age,'$address','$phone')";
  $qi = mysqli_query($con, $i);
  if ($qi) {
    go("/");
  } else {
    go("/user/add.php");
  }
}




?>

<main id="main">
  <section id="about" class="about">
    <div class="container col-md-8">
      <div class="card">
        <h1>Add New Client</h1>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">age</label>
              <input type="number" name="age" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">address</label>
              <input type="text" class="form-control" name="address" id="exampleInputPassword1">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">phone</label>
              <input type="text" class="form-control" name="phone" id="exampleInputPassword1">
            </div>

            <button type="submit" name="send" class="my_btn btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

</main>



<?php

include("../shared/footer.php");
include("../shared/script.php");




?>