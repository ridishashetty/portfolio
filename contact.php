<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/popupPage.css">
    <link rel="stylesheet" href="CSS/contactPage.css">
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
    <main>
      <form class="" action="email.php" method="post">
        <img src="image/bg2.jpg" alt="background" id="heroImg">
        <section id="wrapper">
          <center><h3>Contact Me</h3></center>
          <div class="tables">
            <table id="one">
              <tr>
                <th class="label">
                  Feel free to contact me
                </th>
              </tr>
              <tr>
                <td>
                  <input type="text" class="input" name="nm" id="nm" placeholder="&emsp;&nbsp;Name" required pattern="^[a-zA-Z ]+$"
                  oninvalid="this.setCustomValidity('A valid name can only contain aphabets')"
                  oninput="this.setCustomValidity('')">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" class="input" name="sub" id="sub" placeholder="&emsp;&nbsp;Subject" required pattern="^[a-zA-Z0-9 ]+$"
                  oninvalid="this.setCustomValidity('Subject can only contain aphabets or numbers')"
                  oninput="this.setCustomValidity('')">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="mail" name="eid" class="input" id="mail" placeholder="&emsp;&nbsp;E-mail" required>
                </td>
              </tr>
              <tr>
                <td>
                  <textarea name="msg" id="msg" rows="4" onchange="doIt()" placeholder="Your Message" required pattern="^[a-zA-Z0-9,-_.: ;]+$"></textarea>
                </td>
              </tr>
              <tr>
                <td>
                   <input type="submit" id="btn" value="Send" name="submit">
                </td>
              </tr>
            </table>
            <table class="label" id="two">
              <tr>
                <th>Address</th>
              </tr>
              <tr>
                <td id="adr"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <th>Phone</th>
              </tr>
              <tr>
                <td id="phone"></td>
              </tr>
              <tr>
                <td><br></td>
              </tr>
              <tr>
                <th>E-mail</th>
              </tr>
              <tr>
                <td id="em"></td>
              </tr>
            </table>
          </div>
        </section>
      </form>
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

        <footer>
          <section id="social">
            <a href="https://www.facebook.com/ridzzitis"><img src="image/fbDark.png" alt="" class="icon"></a>
            <a href="https://twitter.com/?lang=en"><img src="image/twDark.png" alt="" class="icon"></a>
            <a href="https://aboutme.google.com/u/0/?referer=gplus"><img src="image/gpDark.png" alt="" class="icon"></a>
            <a href="https://www.instagram.com/ridishashetty/"><img src="image/igDark.png" alt="" class="icon"></a>
          </section>
          <section id="detail">
            <p>Ridisha Shetty</p>
            &copy; Ridisha Shetty all rights reserved <br/>
            Design: <u> RApps </u>
          </section>
        </footer>
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
              $adr=$row["address"];
              $em=$row["email"];

              $ph=$row["phone"];
              echo "<script type='text/javascript'>
                document.getElementById('name').innerHTML='".strtoupper($name)."';
                document.getElementById('adr').innerHTML='".strtoupper($adr)."';
                document.getElementById('em').innerHTML='".$em."';
                document.getElementById('phone').innerHTML='".$ph."';
              </script>";
            }
          }
          mysqli_close($conn);
        ?>
  </body>
</html>
