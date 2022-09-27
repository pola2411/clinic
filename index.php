<?php

include("./shared/head.php");
include("./shared/header.php");
include("./function/connection.php");
include("./function/general.php");


$s = "SELECT * FROM `user`";
$qs = mysqli_query($con, $s);

$ser = false;
if (isset($_POST['search_send'])) {
  $search = $_POST['search'];
  $s_r = "SELECT * FROM `user` WHERE  id like'$search'  or `name` LIKE '%$search%' ";
  $q_s_r = mysqli_query($con, $s_r);

  $num = mysqli_num_rows($q_s_r);
  if ($num > 0) {
    $ser = true;
  } else {
    $ser = false;
  }
}
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $d = "DELETE FROM `user` WHERE id=$id";
  $q_d = mysqli_query($con, $d);
  if ($q_d) {
    go("");
  } else {
    go("");
  }
}





?>

<main id="main">
  <div class="container col-md-8">
    <form method="POST" class="form-inline col-md-4">
      <input class="form-control mr-sm-8" type="search" name="search" placeholder="Search" aria-label="Search">
      <button name="search_send" class="btn btn-outline-success my-18 my-sm-0 " type="submit">Search</button>
    </form>
    <table class="table">
      <thead>
        <tr>

          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <?php if ($ser) {
          foreach ($q_s_r as $data1) { ?>
            <tr>
              <td><?= $data1['id'] ?></td>
              <td><?= $data1['name'] ?></td>
              <td><?= $data1['phone'] ?></td>

              <td>
                <nav id="navbar" class="navbar">
                  <li class="dropdown"><a href="#"><span></span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li> <a class="dropdown-item " href="/clinic/user/info_add.php?add=<?php echo "$data1[id]" ?>"><i class='bx bxs-comment-add'></i></a></li>


                      <li><a class="dropdown-item" href="/clinic/user/show.php?show=<?php echo "$data1[id]" ?>"><i class='dropdown-item bx bx-show'></i></a></li>

                      <li><a href="/clinic/index.php?delete=<?php echo "$data1[id]" ?>" class=" btn btn-danger" style="width:34px ;"><i class='bx bx-message-alt-x'></i></a></li>


                    </ul>

                  </li>
                </nav>
              </td>



            </tr>
          <?php } ?>
          <?php } else {
          foreach ($qs as $data) { ?>
            <tr>
              <td><?= $data['id'] ?></td>
              <td><?= $data['name'] ?></td>
              <td><?= $data['phone'] ?></td>
              <td>
                <nav id="navbar" class="navbar">
                  <li class="dropdown"><a href="#"><span></span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                      <li> <a class="dropdown-item " href="/clinic/user/info_add.php?add=<?php echo "$data[id]" ?>"><i class='bx bxs-comment-add'></i></a>
                      </li>


                      <li> <a class="dropdown-item " href="/clinic/user/show.php?show=<?php echo "$data[id]" ?>"><i class='bx bx-show'></i></a>
                      </li>

                      <li> <a href="/clinic/index.php?delete=<?php echo "$data[id]" ?>" class=" btn btn-danger" style="width:34px ;"><i class='bx bx-message-alt-x'></i></a>
                      </li>


                    </ul>

                  </li>
                </nav>
              </td>


           





            </tr>



        <?php }
        } ?>
      </tbody>
    </table>

  </div>
</main>



<?php

include("./shared/footer.php");
include("./shared/script.php");




?>