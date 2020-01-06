<?php
if(isset($_POST["submit"])){
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false)
  {
      $image = $_FILES['image']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));

      $user="ridishas_dimpi";
      $host="localhost";
      $pass="talisman@clove4";
      $db="ridishas_portfolio";
      $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);

      //$dataTime = date("Y-m-d H:i:s");
      $insert = $conn->query("INSERT into projects (admin_id,image) VALUES (1,'$imgContent')");
        if($insert){
            //echo "File uploaded successfully.";
            header("Location: dashboard.php");
        }else{
            echo "File upload failed, please try again.";
        }
  /*    $ins = "INSERT INTO projects (admin_id,image) VALUES (1,'$imgContent')";

      if(mysqli_query($conn,$ins)){
          echo "done";
      }
      else{
          echo "error ins";
      } */
  }
  else{
      echo "Please select an image file to upload.";
  }
}
?>
