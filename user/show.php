<?php 

include("../shared/head.php");
include("../shared/header.php");
include("../function/connection.php");
include("../function/general.php");
$user_id=$_GET['show'];
if(isset($_GET['show']))
{
$user_id=$_GET['show'];

$s="SELECT informations.id AS info_id , informations.history, informations.pressure ,informations.blood_sugar ,informations.date ,informations.description ,informations.return, user.name  FROM `informations` JOIN user
ON informations.user_id=user.id where user.id=$user_id order by `date` desc";
$s_q=mysqli_query($con,$s);



}
if(isset($_GET['delete'])){
    
    $id_info=$_GET['delete'];
    $d="DELETE FROM `informations` WHERE id=$id_info";
    $q_d=mysqli_query($con,$d);
    if( $q_d){
        go("/");
    }
}

?>

<main id="main">
<section id="about" class="about">



<div class="container">

<div class="my_btn_group btn-group col-md-8" role="group" aria-label="Basic example">
  <a href="/clinic/user/info_add.php?add=<?php echo "$user_id"?>" class="btn btn-info"> Add info </a>
  <a href="/clinic/user/an_img.php?add=<?php echo "$user_id"?>" class="btn btn-light">   analysis_pictures </a>
  <a href="/clinic/user/pr_img.php?add=<?php echo "$user_id"?>" class="btn btn-dark">  prescription_image </a>
</div>
<?php foreach($s_q as $data)  { ?>
<div class="card col-md-8">
    <h1>informations about <span class="name_show"><?php echo "$data[name]" ?></span>  </h1>
    <hr>
    <div class="card-body">
        <h2> <span class="name_show"> history : </span>    <?php echo "$data[history]" ?> </h2>
        <hr>
        <h2> <span class="name_show"> pressure : </span>    <?php echo "$data[pressure]" ?> </h2>
        <hr>
        <h2>  <span class="name_show"> blood_sugar :</span>    <?php echo "$data[blood_sugar]" ?> </h2>
        <hr>
        <h2> <span class="name_show"> description :</span>    <?php echo "$data[description]" ?> </h2>
        <hr>
        <h2><span class="name_show"> date  :</span>     <?php echo "$data[date]" ?> </h2>
       
        <hr>
        <h2> <span class="name_show"> return  :</span>       <?php echo "$data[return]" ?> </h2>
        <hr>
      
       
            
        <a href="/clinic/user/show.php?delete=<?php echo "$data[info_id]"?>" class=" btn btn-danger" style="width:60px ;"><i class='bx bx-message-alt-x'></i></a>
        <a href="/clinic/user/info_update.php?update=<?php echo "$data[info_id]"?>" class="btn btn-warning" style="width:60px ;"><i class='bx bx-edit-alt'></i></a>
        <a href="/clinic/index.php" class="btn btn-info" style="width:60px ;"><i class='bx bx-arrow-back'></i></a>









    </div>

</div>
<div class="line"></div>
<?php } ?>

</div>




 


</section>
</main>





<?php 

include("../shared/footer.php");
include("../shared/script.php");




?>