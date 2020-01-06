<?php
  if(isset($_POST['id']) && isset($_POST['skill']) && isset($_POST['mark']))
  {
    $t=$_POST['id'];
    $u=$_POST['skill'];
    $v=$_POST['mark'];

    $user="ridishas_dimpi";
    $host="localhost";
    $pass="talisman@clove4";
    $db="ridishas_portfolio";
    $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);
    for($i=0;$i<count($t);$i++)
    {
      //echo $t[$i]." ".$u[$i]." ".$v[$i]."\n";
      $query="UPDATE skills SET skill='".$u[$i]."',point='".$v[$i]."' WHERE sr='".$t[$i]."'";
      //echo $query;
      if(mysqli_query($conn,$query))
      {}
      else {
        echo "query skill update error";
      }
    }
    //echo "here";
    mysqli_close($conn);
  }
  else {
    echo "oops";
  }
?>
