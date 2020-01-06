<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/aboutPage.css">
    <link rel="stylesheet" href="CSS/popupPage.css">
    <link rel="stylesheet" href="CSS/menu.css">
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

    <section id="main">
        <table id="about">
          <tr>
            <th><h1>About</h1></th>
          </tr>
          <tr>
            <td id="describe"></td>
          </tr>
        </table>
        <table id="detail">
          <tr>
            <th colspan="2"><h1>Basic Information</h1></th>
          </tr>
          <tr>
            <th>AGE:</th>
            <td id="age"></td>
          </tr>
          <tr>
            <th>EMAIL:</th>
            <td id="email"></td>
          </tr>
          <tr>
            <th>PHONE:</th>
            <td id="phone"></td>
          </tr>
          <tr>
            <th>ADDRESS:</th>
            <td id="adr"></td>
          </tr>
          <tr>
            <th>LANGUAGE:</th>
            <td id="lang"></td>
          </tr>
        </table>
    </section>
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
  <!--PHP CODE-->
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
              $about=$row["about"];
              $mail=$row["email"];
              $phone=$row["phone"];
              $adr=$row["address"];
              $lang=$row["language"];
              $age =$row["age"];

              echo "<script type='text/javascript'>
                document.getElementById('name').innerHTML='".strtoupper($name)."';
                document.getElementById('describe').innerHTML='".$about."';
                document.getElementById('email').innerHTML='".$mail."';
                document.getElementById('phone').innerHTML='".$phone."';
                document.getElementById('adr').innerHTML='".$adr."';
                document.getElementById('lang').innerHTML='".$lang."';
                document.getElementById('age').innerHTML='".$age."';
              </script>";
            }
          }
          //echo "hey";
          mysqli_close($conn);
        ?>
  </body>
</html>
