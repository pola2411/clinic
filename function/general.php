<?php
function go($path){
echo "<script>

window.location.replace('/clinic/$path')

</script>";


}

function auth(){
if(isset($_SESSION['admin'])){

}
else{
    go("/login.php");
}


}
auth();
?>
