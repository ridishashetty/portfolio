<?php
  if($_POST["submit"])
  {
    $user="ridishas_dimpi";
    $host="localhost";
    $pass="talisman@clove4";
    $db="ridishas_portfolio";
    $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);

    $s="SELECT * FROM admin_details WHERE admin_id='1'";
    $r=mysqli_query($conn,$s);
    if(mysqli_num_rows($r)=='1')
    {
      while($t=mysqli_fetch_assoc($r))
      {
        $to = $t['email'];
      }
    }

    $sub = $_POST["sub"];
    $msg = "This mail is from ".$_POST["nm"].". ".$_POST["msg"];
    $name = $_POST["nm"];
    $head = "From:".$_POST["eid"];

    $val = mail ($to,$sub,$msg,$head);

    if( $val == true ) {
       //echo "Message sent successfully...";
       echo "
       <script type='text/javascript'>
         window.location.href = 'contact.php';
       </script>
       ";
    }
    else {
       echo "
       <script type='text/javascript'>
         alert('Message could not be sent...');
       </script>
       ";
    }
  }
?>
