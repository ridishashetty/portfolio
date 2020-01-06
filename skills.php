<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Professional Skills</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/popupPage.css">
    <link rel="stylesheet" href="CSS/skillPage.css">
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
    <main style="color:black">
      <center><h3>Professional Skills</h3></center>
      <section id="wrapper">
        <div id="in">
          <?php
          $user="ridishas_dimpi";
          $host="localhost";
          $pass="talisman@clove4";
          $db="ridishas_portfolio";

            $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);
            $q1="SELECT * FROM admin_details WHERE admin_id='1'";
            $q2="SELECT * FROM skills WHERE admin_id='1'";

            $r1=mysqli_query($conn,$q1);
            $r2=mysqli_query($conn,$q2);
            if(mysqli_num_rows($r1)>0)
            {
              while($i1=mysqli_fetch_assoc($r1))
              {
                $name=$i1["fname"]." ".$i1["lname"];
                echo "<script type='text/javascript'>
                  document.getElementById('name').innerHTML='".strtoupper($name)."';
                </script>";
              }
            }
            if(mysqli_num_rows($r2)>0)
            {
              while($i2=mysqli_fetch_assoc($r2))
              {
                if($i2['skill']!='' && $i2['point']!='0')
                {
                  echo "
                  <table>
                        <tr>
                          <td class='topic'>".strtoupper($i2['skill'])."</td>
                          <td class='percent'>".$i2['point']."%</td>
                        </tr>
                        <tr>
                          <td colspan='2' class='container'>
                            <div class='max'>

                            </div>
                            <div class='num' style='width:".$i2['point']."%'>

                            </div>
                          </td>
                        </tr>
                      </table>
                  ";
                }
              }
            }
          ?>
        </div>
      </section>
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
