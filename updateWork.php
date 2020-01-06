<?php
if(isset($_POST['id']) && isset($_POST['cmp']) && isset($_POST['pos']))
{
  $id=$_POST['id'];
  $cmp=$_POST['cmp'];
  $pos=$_POST['pos'];
  $des=$_POST['des'];
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
    if(preg_match($regex,$cmp[$i]) && preg_match($regex,$pos[$i]))
    {
      //echo $id[$i]." ".$cmp[$i]." ".$pos[$i]."\n";
      $check="SELECT * FROM work WHERE sr='".$id[$i]."'";
      $res=mysqli_query($conn,$check);
      if(mysqli_num_rows($res)==1)
      {
        //echo "1 row \n";
        $upd="UPDATE work SET start_date='$str[$i]',end_date='$end[$i]',company='$cmp[$i]',description='$des[$i]',title='$pos[$i]' WHERE sr='".$id[$i]."'";
        if(mysqli_query($conn,$upd))
        {
          echo "success";
        }
        else {
          echo "error";
        }
      }
      else if(mysqli_num_rows($res)==0){
        //echo "0 row \n";
        $ins="INSERT INTO work(`sr`,`admin_id`,`company`,`start_date`,`end_date`,`title`,`description`) VALUES ('$id[$i]',1,'$cmp[$i]','$str[$i]','$end[$i]','$pos[$i]','$des[$i]')";
        //echo "\n".$ins."\n";
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
