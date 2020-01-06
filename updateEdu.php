<?php
  if(isset($_POST['id']) && $degree=$_POST['deg'])
  {
    $id=$_POST['id'];
    $degree=$_POST['deg'];
    $core=$_POST['core'];
    $clg=$_POST['clg'];
    $str=$_POST['str'];
    $end=$_POST['end'];

    $user="ridishas_dimpi";
    $host="localhost";
    $pass="talisman@clove4";
    $db="ridishas_portfolio";
    $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);

    for($i=0;$i<count($id);$i++)
    {
      $regex="/[a-zA-Z]{3,}/";
      if(preg_match($regex,$degree[$i]) && preg_match($regex,$clg[$i]))
      {
        //echo $id[$i]." ".$degree[$i]." ".$clg[$i]."\n";
        $check="SELECT * FROM experience WHERE sr='".$id[$i]."'";
        $res=mysqli_query($conn,$check);
        if(mysqli_num_rows($res)==1)
        {
          $upd="UPDATE experience SET start_year='$str[$i]',end_year='$end[$i]',degree='$degree[$i]',core='$core[$i]',college='$clg[$i]' WHERE sr='".$id[$i]."'";
          if(mysqli_query($conn,$upd))
          {
            echo "success";
          }
          else {
            echo "error";
          }
        }
        else if(mysqli_num_rows($res)==0){
          $ins="INSERT INTO experience(`sr`,`admin_id`,`degree`,`start_year`,`end_year`,`core`,`college`) VALUES ('$id[$i]',1,'$degree[$i]','$str[$i]','$end[$i]','$core[$i]','$clg[$i]')";
          if(mysqli_query($conn,$ins))
          {
            echo "success";
          }
          else {
            echo "error";
          }
        }
        else {
          echo "big error";
        }
      }
    }
  }
?>
