<?php
  if(isset($_POST['id']) && isset($_POST['price']) && isset($_POST['title']))
  {
    $id=$_POST['id'];
    $price=$_POST['price'];
    $title=$_POST['title'];
    $duty=$_POST['duty'];

    $user="ridishas_dimpi";
    $host="localhost";
    $pass="talisman@clove4";
    $db="ridishas_portfolio";
    $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);

    for($i=0;$i<count($id);$i++)
    {
      $query="UPDATE worth SET admin_id='1',price='".$price[$i]."',title='".$title[$i]."',duty='".$duty[$i]."' WHERE sr='".$id[$i]."'";
      if(mysqli_query($conn,$query))
      {
        echo "done";
      }
      else {
        echo "query error";
      }
    }
  }
?>
