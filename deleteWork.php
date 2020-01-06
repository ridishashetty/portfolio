<?php
  if(isset($_POST['id']))
  {
    $id=$_POST['id'];

    $user="ridishas_dimpi";
    $host="localhost";
    $pass="talisman@clove4";
    $db="ridishas_portfolio";
    $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);

    $regex='/[0-9]/';
    if(preg_match($regex,$id))
    {
      $s="SELECT * FROM work WHERE sr='".$id."'";
      $res=mysqli_query($conn,$s);
      if(mysqli_num_rows($res)==1)
      {
        //echo "done";
        $d="DELETE FROM work WHERE sr='".$id."'";
        if(mysqli_query($conn,$d))
        {
          echo "done";
        }
      }
      else {
        echo "No row with work id=".$id." found!";
      }
    }
  }
?>
