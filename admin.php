<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/adminPage.css">
  </head>
  <body style="padding-top:0px;margin-top:0px">
    <script type="text/javascript">
      function validateJS()
      {
        var uN=document.getElementById("user").value;
        var pd=document.getElementById("pswd").value;
        //alert(fN+" "+lN+" "+uN);
        var nameExp=/^[a-zA-Z]*$/;
        var pdExp=/^[a-zA-Z0-9@._-]*$/;
        //validate Username
        if(nameExp.test(uN))
        {
          document.getElementById("user").style.border="1px solid lightgray";
        }
        else {
            document.getElementById("user").style.border="1px solid red";
        }
        //validate paswword
        if(pdExp.test(pd))
        {
          document.getElementById("pswd").style.border="1px solid lightgray";
        }
        else {
            document.getElementById("pswd").style.border="1px solid red";
        }
      }
    </script>
    <header>
      <center>
        <img src="image/admin.png" alt="">
        <br>
        <u>Admin Log In</u>
      </center>
    </header>
    <main>
      <form class="" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <table>
          <tr>
            <td colspan="2"><label for="user">User:
              &emsp;
              <p id="userMsg" style="display:inline-block"></p>
            </label></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" id="user" onkeyup="validateJS()" name="user" class="input" required pattern="^[a-zA-Z]+$"
              oninvalid="this.setCustomValidity('A valid username can only contain aphabets')"
              oninput="this.setCustomValidity('')"></td>
          </tr>
          <tr>
            <td colspan="3"><label for="pswd">Password:
              &emsp;
              <p id="pswdMsg" style="display:inline-block"></p>
            </label></td>
          </tr>
          <tr>
            <td colspan="3"><input type="password" id="pswd" onkeyup="validateJS()" name="pswd" class="input" required pattern="^[a-zA-Z0-9@_.-]+$"
              oninvalid="this.setCustomValidity('A valid password can contain alphanumeric values and only characters like @_-.')"
              oninput="this.setCustomValidity('')"></td>
          </tr>
          <tr>
            <td><input type="reset" value="Clear" id="btnGray"></td>
            <td><p id="Msg"></p></td>
            <td><input type="submit" value="Get In" name='submit' id="btnGreen"></td>
          </tr>
        </table>
      </form>
    </main>
      <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
          //echo "in\n";
          $user=$_POST["user"];
          $pswd=$_POST["pswd"];
          //echo "hey ".$user." your pswd is ".$pswd;
          if(empty($user) && empty($pswd))  //true if 0
          {
            echo "All required fields must be filled";
          }
          else{
            //echo "hey";
            $regexUser="/^[a-zA-Z]{3,}$/";
            $regexPswd="/^[a-zA-Z0-9@_.-]{5,}$/";
            if(preg_match($regexUser, $user))
            {
              if(preg_match($regexPswd, $pswd))
              {
                if($user=="admin" && $pswd=="_secure@")
                {
                  $_SESSION["me"] = "admin";
                  echo "
                  <script type='text/javascript'>
                    window.location.href = 'dashboard.php';
                  </script>
                  ";
                }
                else
                {
                  echo "
                  <script type='text/javascript'>
                    alert('Invalid Username or Password');
                  </script>
                  ";
                }
              }
              else {
                //echo "error pswd";
                if(strlen($pswd)>=5)
                {
                  $result="A password can only contain, letters, numbers, @, -, _ and .";
                }
                else {  //length too small
                  $result="Password should have atleast 5 characters";
                }
                echo "
                <script type='text/javascript'>
                  document.getElementById('pswd').style.border='1px solid red';
                  document.getElementById('pswdMsg').style.color='red';
                  document.getElementById('pswdMsg').textContent='".$result."';
                </script>
                ";
              }
            }
            else{
              //echo "error user";
              if(strlen($user)>=3)
              {
                $result="A username can only contain alphabets";
              }
              else {  //length too small
                $result="Username should have atleast 3 characters";
              }
              echo "
              <script type='text/javascript'>
                document.getElementById('user').style.border='1px solid red';
                document.getElementById('userMsg').style.color='red';
                document.getElementById('userMsg').textContent='".$result."';
              </script>
              ";
            }
          }
        }
      ?>
    <footer>
    </footer>
  </body>
</html>
