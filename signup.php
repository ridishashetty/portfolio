<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/signupPage.css">
  </head>
  <body>
    <script type="text/javascript">
      function validateJS()
      {
        var fN=document.getElementById("name").value;
        var lN=document.getElementById("lname").value;
        var uN=document.getElementById("user").value;
        var em=document.getElementById("email").value;
        var pd=document.getElementById("pswd").value;
        var pd2=document.getElementById("Rpswd").value;
        //alert(fN+" "+lN+" "+uN);
        var nameExp=/^[a-zA-Z]*$/;
        var pdExp=/^[a-zA-Z0-9@._-]*$/;
        var emExp=/^[a-zA-Z0-9@._-]*$/;
        //validate first name
        if(nameExp.test(fN))
        {
          //alert("it is a match");
          document.getElementById("name").style.border="1px solid lightgray";
        }
        else {
          //alert("fname error");
          document.getElementById("name").style.border="1px solid red";
        }
        //validate last name
        if(nameExp.test(lN))
        {
          document.getElementById("lname").style.border="1px solid lightgray";
        }
        else {
            document.getElementById("lname").style.border="1px solid red";
        }
        //validate Username
        if(nameExp.test(uN))
        {
          document.getElementById("user").style.border="1px solid lightgray";
        }
        else {
            document.getElementById("user").style.border="1px solid red";
        }
        //validate Email
        if(emExp.test(em))
        {
          document.getElementById("email").style.border="1px solid lightgray";
        }
        else {
            document.getElementById("email").style.border="1px solid red";
        }
        //validate paswword
        if(pdExp.test(pd))
        {
          document.getElementById("pswd").style.border="1px solid lightgray";
        }
        else {
            document.getElementById("pswd").style.border="1px solid red";
        }
        //validate second paswword
        if(pdExp.test(pd2))
        {
          document.getElementById("Rpswd").style.border="1px solid lightgray";
        }
        else {
            document.getElementById("Rpswd").style.border="1px solid red";
        }
      }
    </script>
    <header>
      check in
    </header>
    <main>
      <form class="" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <table>
          <tr>
            <td colspan="3"><label for="name">Name:
              <p id="fMsg" style="display:inline-block"></p>
            </label></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" id="name" onkeyup="validateJS()" name="fname" class="input" required pattern="^[a-zA-Z]+$"
              oninvalid="this.setCustomValidity('A valid name must contain aphabets')"
              oninput="this.setCustomValidity('')"></td>
          </tr>
          <tr>
            <td colspan="3"><label for="lname">Last Name:
              <p id="lMsg" style="display:inline-block"></p>
            </label></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" id="lname" onkeyup="validateJS()" name="lname" class="input" pattern="^[a-zA-Z]+$"
              oninvalid="this.setCustomValidity('A valid last name must contain aphabets')"
              oninput="this.setCustomValidity('')"></td>
          </tr>
          <tr>
            <td colspan="3"><label for="email">Email:
              <p id="eMsg" style="display:inline-block"></p>
            </label></td>
          </tr>
          <tr>
            <td colspan="3"><input type="email" id="email" onkeyup="validateJS()" name="email" class="input" required
              oninvalid="this.setCustomValidity('Enter a valid email ID')"
              oninput="this.setCustomValidity('')"></td>
          </tr>
          <tr>
            <td colspan="3"><label for="user">User:
              <p id="uMsg" style="display:inline-block"></p>
            </label></td>
          </tr>
          <tr>
            <td colspan="3"><input type="text" id="user" onkeyup="validateJS()" name="user" class="input" required pattern="^[a-zA-Z]+$"
              oninvalid="this.setCustomValidity('Create a username using just aphabets')"
              oninput="this.setCustomValidity('')"></td>
          </tr>
          <tr>
            <td colspan="3"><label for="pswd">Password:
              <p id="pMsg" style="display:inline-block"></p>
            </label></td>
          </tr>
          <tr>
              <td colspan="3"><input type="password" name="pswd" id="pswd" onkeyup="validateJS()" class="input" required pattern="^[a-zA-Z0-9@_.-]+$"
              oninvalid="this.setCustomValidity('A valid password can contain alphanumeric values and only characters like @_-.')"
              oninput="this.setCustomValidity('')"></td>
          </tr>
          <tr>
            <td colspan="3"><label for="Rpswd">Repeat Password:
              <p id="rpMsg" style="display:inline-block"></p>
            </label></td>
          </tr>
          <tr>
            <td colspan="3"><input type="password" id="Rpswd" name="Rpswd" onkeyup="validateJS()" class="input" required pattern="^[a-zA-Z0-9@_.-]+$"
              oninvalid="this.setCustomValidity('A valid password can contain alphanumeric values and only characters like @_-.')"
              oninput="this.setCustomValidity('')"></td>
          </tr>
          <tr>
            <td><input type="button" value="Close" id="btnGray"></td>
            <td><p id="Msg"></p></td>
            <td><input type="submit" value="Save" id="btnGreen"></td>
          </tr>
        </table>
      </form>
    </main>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
    //  echo "posted";
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $uname=$_POST['user'];
      $pd=$_POST['pswd'];
      $pd2=$_POST['Rpswd'];
      $email=$_POST['email'];

      //echo "hey ".$fname." ".$lname." (".$uname."), your email is ".$email." and password is ".$pd."(".$pd2.")";
      if(!empty($fname) && !empty($lname) && !empty($uname) && !empty($email) && !empty($pd) && !empty($pd2))
      {
        //echo "hey";
        if($pd!==$pd2)
        {
          $res="Passwords dont match";
          echo "
          <script type='text/javascript'>
            document.getElementById('Msg').style.color='red';
            document.getElementById('Msg').textContent='".$res."';
            document.getElementById('pswd').style.border='1px solid red';
            document.getElementById('Rpswd').style.border='1px solid red';
          </script>
          ";
          //echo "hi";
        }
        else{
          //echo "Passwords match";
          $regexUser="/^[a-zA-Z]{4,}$/";
          $regexPswd="/^[a-zA-Z0-9@_.-]{5,}$/";
          $regexMail="/^[a-z0-9._-]{5,}@[a-z0-9.-]{3,}\.[a-z]{2,}$/"; //[com|in|edu|co|gov]
          if(preg_match($regexUser,$fname))
          {
            if(preg_match($regexUser,$lname))
            {
              if(preg_match($regexUser,$uname))
              {
                if(preg_match($regexPswd,$pd))
                {
                  if(preg_match($regexMail,$email))
                  {
                    //echo "All correct";
                    //header("Location:success.php");
                  }
                  else {
                    $res="Invalid email, A valid email should satisfy [a-z0-9._-]{5,}@[a-z0-9.-]{3,}\.[a-z]{2,}";
                    echo "
                    <script type='text/javascript'>
                      document.getElementById('eMsg').style.color='red';
                      document.getElementById('eMsg').textContent='".$res."';
                      document.getElementById('email').style.border='1px solid red';
                    </script>
                    ";
                  }
                }
                else {
                  if(strlen($pd)>=5)
                  {
                    $res="A password can only contain, letters, numbers, @, -, _ and .";
                  }
                  else {  //length too small
                    $res="Password should have atleast 5 characters";
                  }
                  echo "
                  <script type='text/javascript'>
                    document.getElementById('pMsg').style.color='red';
                    document.getElementById('pMsg').textContent='".$res."';
                    document.getElementById('pswd').style.border='1px solid red';
                    document.getElementById('Rpswd').style.border='1px solid red';
                  </script>
                  ";
              }
            }
            else {
              if(strlen($uname)>=4)
              {
                $res="A name can only contain alphabets";
              }
              else {  //length too small
                $res="Name should have atleast 3 characters";
              }
              echo "
              <script type='text/javascript'>
                document.getElementById('uMsg').style.color='red';
                document.getElementById('uMsg').textContent='".$res."';
                document.getElementById('user').style.border='1px solid red';
              </script>
              ";
            }
          }
          else {
            if(strlen($lname)>=4)
            {
              $res="A name can only contain alphabets";
            }
            else {  //length too small
              $res="Name should have atleast 3 characters";
            }
            echo "
            <script type='text/javascript'>
              document.getElementById('lMsg').style.color='red';
              document.getElementById('lMsg').textContent='".$res."';
              document.getElementById('lname').style.border='1px solid red';
            </script>
            ";
          }
        }
        else {
          if(strlen($fname)>=4)
          {
            $res="A name can only contain alphabets";
          }
          else {  //length too small
            $res="Name should have atleast 3 characters";
          }
          echo "
          <script type='text/javascript'>
            document.getElementById('fMsg').style.color='red';
            document.getElementById('fMsg').textContent='".$res."';
            document.getElementById('name').style.border='1px solid red';
          </script>
          ";
        }
          //header("Location:success.php");
        }
      }
      else {
        echo "All required fields must be filled";
      }
    }
    ?>
  </body>
</html>
