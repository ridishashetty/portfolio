<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/popupPage.css">
    <link rel="stylesheet" href="CSS/expPage.css">
    <link rel="stylesheet" href="CSS/menu.css">
    <title>Experience</title>
  </head>
  <body>
    <script type="text/javascript">
    /*LOGIN*/
      function popUp(){
        document.getElementById('blur').style.display="block";
        document.getElementById('pop').style.display="block";
      }
      function closed(){
          document.getElementById('blur').style.display="none";
          document.getElementById('pop').style.display="none";
          document.getElementById('webpage').src="login.php";
      }
    /*SIGN UP*/
      function popUp2(){
        document.getElementById('blur2').style.display="block";
        document.getElementById('pop2').style.display="block";
      }
      function closed2(){
          document.getElementById('blur2').style.display="none";
          document.getElementById('pop2').style.display="none";
          document.getElementById('webpage2').src="signup.php";
      }
    </script>
    <header>
      <section id="head">
        <a id="name"></a>
        <a id="bar">&#9776;</a>
      </section>
      <?php
      $user="ridishas_dimpi";
      $host="localhost";
      $pass="talisman@clove4";
      $db="ridishas_portfolio";

        $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);

        $sql="SELECT * FROM admin_details WHERE admin_id='1'";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
          while($row=mysqli_fetch_assoc($result))
          {
            $name=$row["fname"]." ".$row["lname"];
            $post=$row["position"];
            echo "<script type='text/javascript'>
              document.getElementById('name').innerHTML='".strtoupper($name)."';
            </script>";
          }
        }
        //echo "hey";
        mysqli_close($conn);
      ?>
      <nav id="dropdown">
        <p class="opt"><a href="about.php">ABOUT</a></p>
        <p class="opt"><a href="skills.php">SKILLS</a></p>
        <p class="opt"><a href="project.php">PORTFOLIO</a></p>
        <p class="opt"><a href="experience.php">EXPERIENCE</a></p>
        <p class="opt"><a href="http://ridishashetty.uta.cloud/shetty_portfolio/blog/">BLOG</a></p>
        <p class="opt"><a href="hireme.php">HIRE ME</a></p>
        <p class="opt"><a href="contact.php">CONTACT</a></p>
        <p class="opt"><a href="#" onClick="popUp();">LOGIN</a></p>
        <p class="opt"><a href="#" onClick="popUp2();">SIGN UP</a></p>
      </nav>
    </header>
    <main>
<!--WORK EXPERIENCE-->
      <center><h3 style="color:black">Work Experience</h3></center>
      <?php
      $user="ridishas_dimpi";
      $host="localhost";
      $pass="talisman@clove4";
      $db="ridishas_portfolio";

      $con=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$con -> error);

      $qry="SELECT * FROM work WHERE admin_id='1'";
      $res=mysqli_query($con,$qry);
      if(mysqli_num_rows($res)>0)
      {
        while($j=mysqli_fetch_assoc($res))
        {
          //$j['start_date']
          echo "
          <section class='wrapper'>
                <div class='title'>
                  <center>
                    <p class='duration'>".$j['start_date']." - ".$j['end_date']."</p>
                    <p class='company'>".$j['company']."</p>
                  </center>
                </div>
                <div class='description'>
                  <p class='post'>".$j['title']."</p>
                  <p class='about'>".$j['description']."</p>
                </div>
              </section>
          ";
        }
      }
      //mysqli_close($con);
      ?>

<!--EDUCATION-->
      <center><h3 style="color:black">Education</h3></center>
      <?php

      $q="SELECT * FROM experience WHERE admin_id='1'";
      $final=mysqli_query($con,$q);
      if(mysqli_num_rows($final)>0)
      {
        while($l=mysqli_fetch_assoc($final))
        {
          //$l['start_year']
          echo "
          <section class='wrapper'>
            <div class='title'>
              <center>
                <p class='duration'>".$l['start_year']." - ".$l['end_year']."</p>
                <p class='degree'>".$l['degree']."</p>
              </center>
            </div>
            <div class='description'>
              <p class='post'>".$l['core']."</p>
              <p class='about'>".$l['college']."</p>
            </div>
          </section>
          ";
        }
      }
      mysqli_close($con);
      ?>
    </main>
    <!--POPUP LOGIN-->
        <section id="blur"></section>
        <div id="pop" align="center">
          <div id="enclose">
            <a href="#" onclick='closed()' id="cross">&#10006;</a>
          </div>
            <iframe src="login.php" id="webpage" align="center">
            </iframe>
        </div>
<!--POPUP SIGNUP-->
        <section id="blur2"></section>
        <div id="pop2" align="center">
          <div id="enclose2">
            <a href="#" onclick='closed2()' id="cross2">&#10006;</a>
          </div>
            <iframe src="signup.php" id="webpage2" align="center" scrolling="no">
            </iframe>
        </div>
  </body>
</html>
