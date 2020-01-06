<?php
session_start();
  $vari = $_SESSION["me"];
  //echo "hey";
  //echo $vari;
  if(isset($vari))
  {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/dashPage.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <title>Dashboard</title>
  </head>
  <body>
    <header>
      <p id="title">Welcome admin!</p>
      <p id="sub">Start editing your content here</p>
    </header>
    <?php
      if(isset($_POST['logout']))
      {
        //echo "hey";
        session_destroy();
        echo "
          <script type='text/javascript'>
              window.location.href = 'admin.php';
          </script>
        ";
      }
    ?>
    <main>
      <form action="" method="post">
        <div style="text-align:right;font-weight:bold">
          <input type='submit' value='LOGOUT' onClick="logout()" name="logout">
        </div>
      </form>
      <fieldset>
        <script type="text/javascript">
          function visible()
          {
            var what=document.getElementById("pswd").type;
            if(what=="text")
            {
              document.getElementById("pswd").type="password";
            }
            else {
              document.getElementById("pswd").type="text";
            }
          }
        </script>
        <legend>Your Information</legend>
        <form class="" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
          <p class="heading">Personal:</p>
          <table id="personal">
            <tr>
              <td>First Name:</td>
              <td><input class="field" type="text" id="fname" name="fname"></td>
            </tr>
            <tr>
              <td>Last Name:</td>
              <td><input class="field" type="text" id="lname" name="lname"></td>
            </tr>
            <tr>
              <td>Username:</td>
              <td><input class="field" type="text" id="uname" name="uname"></td>
            </tr>
            <tr>
              <td>Password:<img style='float:right;' src="image/show.png" height="20px" width="20px" onclick="visible()"></td>
              <td><input class="field" type="password" id="pswd" name="pswd"></td>
            </tr>
            <tr>
              <td>Email:</td>
              <td><input class="field" type="email" id="mail" name="mail"></td>
            </tr>
            <tr>
              <td>Phone:</td>
              <td><input class="field" type="text" id="phone" name="phone"></td>
            </tr>
            <tr>
              <td>Age:</td>
              <td><input class="field" type="text" id="age" name="age"></td>
            </tr>
            <tr>
              <td>Address:</td>
              <td><textarea id="adr" name="adr"></textarea></td>
            </tr>
            <tr>
              <td>Languages Known:</td>
              <td><input class="field" type="text" id="lang" name="lang"></td>
            </tr>
            <tr>
              <td>Positions:</td>
              <td><input class="field" type="text" id="post" name="post"></td>
            </tr>
            <tr>
              <td>About:</td>
              <td><textarea id="about" name="about"></textarea></td>
            </tr>
          </table>
          <br>
          <input type='submit' value='Update Details' name="up_det">
<!--PHP code to update personal details-->
          <?php
          //  These details are for the uta cloud
            $user="ridishas_dimpi";
            $host="localhost";
            $pass="talisman@clove4";
            $db="ridishas_portfolio";
          /*  These details are for the local xampp
          $user="root";
          $host="localhost";
          $pass="talisman@clove4";
          $db="portfolio";  */
          $con=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$con -> error);
          $sql1="SELECT * FROM admin WHERE id='1'";
          $sql2="SELECT * FROM admin_details WHERE admin_id='1'";

          $res1=mysqli_query($con,$sql1);
          $res2=mysqli_query($con,$sql2);
          if(mysqli_num_rows($res1)>0)
          {
            while($row1=mysqli_fetch_assoc($res1))
            {
              $uname=$row1["username"];
              $pswd=$row1["password"];

              echo "<script type='text/javascript'>
                document.getElementById('uname').value='".$uname."';
                document.getElementById('pswd').value='".$pswd."';
              </script>";
            }
          }
          if(mysqli_num_rows($res2)>0)
          {
            while($row2=mysqli_fetch_assoc($res2))
            {
              $f=$row2["fname"];
              $l=$row2["lname"];
              $em=$row2["email"];
              $ph=$row2["phone"];
              $post=$row2["position"];
              $lang=$row2["language"];
              $age=$row2["age"];
              $adr=$row2["address"];
              $abt=$row2["about"];

              echo "<script type='text/javascript'>
                document.getElementById('fname').value='".$f."';
                document.getElementById('lname').value='".$l."';
                document.getElementById('mail').value='".$em."';
                document.getElementById('phone').value='".$ph."';
                document.getElementById('post').value='".$post."';
                document.getElementById('lang').value='".$lang."';
                document.getElementById('age').value='".$age."';
                document.getElementById('adr').value='".$adr."';
                document.getElementById('about').value='".$abt."';
              </script>";
            }
          }
          if(isset($_POST["up_det"]))
          {
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
              //print_r($skill);
              //print_r($mark);
              $ip_fname=$_POST["fname"];
              $ip_lname=$_POST["lname"];
              $ip_uname=$_POST["uname"];
              $ip_pswd=$_POST["pswd"];
              $ip_age=$_POST["age"];
              $ip_mail=$_POST["mail"];
              $ip_phone=$_POST["phone"];
              $ip_adr=$_POST["adr"];
              $ip_lang=$_POST["lang"];
              $ip_pos=$_POST["post"];
              $ip_abt=$_POST["about"];

              $qry1="UPDATE admin SET username='".$ip_uname."', password='".$ip_pswd."' where id='1'";
              $qry2="UPDATE admin_details SET fname='".$ip_fname."',lname='".$ip_lname."',position='".$ip_pos."',age='".$ip_age."',
                email='".$ip_mail."',phone='".$ip_phone."',address='".$ip_adr."',language='".$ip_lang."',about='".$ip_abt."' where admin_id='1'";
              if(mysqli_query($con,$qry1))
              {
                header("Refresh:0");
                if(mysqli_query($con,$qry2))
                {
                  header("Refresh:0");
                }
                else {
                  echo "qry2 error";
                }
              }
              else {
                echo "qry1 error";
              }
            //To Update Skills
            //      $up_skill="UPDATE admin SET skill='', point='' WHERE sr=''";
            //    if(mysqli)
            }
          }
          mysqli_close($con);
          ?>
          </table>
        </form>

<!--Skills-->
        <form class="" action="" method="post">
          <p class="heading">Skills:</p>

          <table id="personal">

            <?php
        //  These details are for the uta cloud
            $user="ridishas_dimpi";
            $host="localhost";
            $pass="talisman@clove4";
            $db="ridishas_portfolio";
            /*  These details are for the local xampp
                $user="root";
                $host="localhost";
                $pass="talisman@clove4";
                $db="portfolio";*/
            $conn=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$conn -> error);
              $q="SELECT * FROM skills WHERE admin_id='1'";

              $r=mysqli_query($conn,$q);
              if(mysqli_num_rows($r)>0)
              {
                $skill=array();
                $mark=array();
                $sr=array();
                while($i=mysqli_fetch_assoc($r))
                {
                  $sr[]=$i['sr'];
                  $skill[]=$i['skill'];
                  $mark[]=$i['point'];
                }
                for($i=0;$i<count($sr);$i++)
                {
                  echo "
                    <tr>
                      <td id='ip_sr[".$i."]'>".$sr[$i]."</td>
                      <td><input type='text' id='ip_sk[".$i."]' class='field' value='".$skill[$i]."'>:</td>
                      <td><input class='small_field' id='ip_mark[".$i."]' type='text' value='".$mark[$i]."'>/100</td>
                    </tr>
                    ";
                }
              }
              mysqli_close($conn);
              ?>
          </table>
          <br>
          <input type='submit' onClick="updateSki()" value='Update Skills' name="up_ski">
        </form>
        <script type="text/javascript">
          function updateSki(){
            //var th=document.getElementById("ip_mark[1]").value;
            var ar_sr=[];
            for(var i=0;i<8;i++)
            {
              //alert("ip_sr["+i+"]");
              ar_sr[i]=document.getElementById("ip_sr["+i+"]").innerHTML;
            }
            var ar_sk=[];
            for(var i=0;i<8;i++)
            {
              //alert("ip_sr["+i+"]");
              ar_sk[i]=document.getElementById("ip_sk["+i+"]").value;
            }
            var ar_ma=[];
            for(var i=0;i<8;i++)
            {
              ar_ma[i]=document.getElementById("ip_mark["+i+"]").value;
            }
          //  var th=document.getElementById("ip_sr[1]").innerHTML;
          //  var th=document.getElementById("ip_sk[1]").innerHTML;
            //alert(th);
            $.ajax({
               type: "POST",
               url: "updateSkill.php",
               data: { id:  ar_sr,
                      skill: ar_sk,
                      mark: ar_ma},
               success: function(data){
                 //location.reload();
                 //alert(data);
               }
             });
          }
        </script>
<!--Work Experience-->
        <form class="" action="" method="post">
          <p class="heading">Work Experience:</p>
          <div style="text-align:right;">
            <input type='number' class='med_field' id='thatWork' placeholder='Work ID'>&emsp;<input type='button' value='Delete an Experience' onClick='deleteWork()'>
          </div>
          <?php
          //for cloud
          $user="ridishas_dimpi";
          $host="localhost";
          $pass="talisman@clove4";
          $db="ridishas_portfolio";
          $con=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$con -> error);

          $get="SELECT * FROM work WHERE admin_id='1'";
          $rs=mysqli_query($con,$get);

          $maxim= mysqli_query($con, "SELECT MAX(sr) FROM work");
          $row = mysqli_fetch_array($maxim);

          //echo $row[0];
          $next=$row[0]+1;
          if(mysqli_num_rows($rs)>0)
          {
            $sr_work=array();
            $company=array();
            $title=array();
            $desc_work=array();
            $start_work=array();
            $end_work=array();
            while($s=mysqli_fetch_assoc($rs))
            {
              $sr_work[]=$s['sr'];
              $company[]=$s['company'];
              $title[]=$s['title'];
              $desc_work[]=$s['description'];
              $start_work[]=$s['start_date'];
              $end_work[]=$s['end_date'];
            }
            $it=count($sr_work);
            echo "<p id='total' style='visibility:hidden'>".($it+1)."</p>";
            for($p=0;$p<$it;$p++)
            {
              echo "
              <section class='work'>
                <table>
                  <tr>
                    <td>ID:</td>
                    <td><input type='text' id='sr_work[".$p."]' class='field' value='".$sr_work[$p]."' readonly></td>
                  </tr>
                  <tr>
                    <td>Company:</td>
                    <td><input type='text' id='cmp[".$p."]' class='field' value='".$company[$p]."'></td>
                  </tr>
                  <tr>
                    <td>Position:</td>
                    <td><input type='text' id='pos[".$p."]' class='field' value='".$title[$p]."'></td>
                  </tr>
                  <tr>
                    <td>Description:</td>
                    <td><textarea id='work_des[".$p."]'>".$desc_work[$p]."</textarea></td>
                  </tr>
                  <tr>
                    <td>Start date:</td>
                    <td><input type='text' class='field' value='".$start_work[$p]."' id='str_work[".$p."]'></td>
                  </tr>
                  <tr>
                    <td>End date:</td>
                    <td><input type='text' class='field' value='".$end_work[$p]."' id='end_work[".$p."]'></td>
                  </tr>
                </table>
              </section>
              <br>
              ";
            }
          }
          mysqli_close($con);
          ?>
          <section class='work'>
            <table>
              <tr>
                <td>ID:</td>
                <td><input type='text' id='sr_work[<?php echo $it; ?>]' class='field' value='<?php echo $next ?>' readonly></td>
              </tr>
              <tr>
                <td>Company:</td>
                <td><input type='text' id='cmp[<?php echo $it; ?>]' class='field'></td>
              </tr>
              <tr>
                <td>Position:</td>
                <td><input type='text' id='pos[<?php echo $it; ?>]' class='field'></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea id='work_des[<?php echo $it; ?>]'></textarea></td>
              </tr>
              <tr>
                <td>Start date:</td>
                <td><input type='text' id='str_work[<?php echo $it; ?>]' class='field'></td>
              </tr>
              <tr>
                <td>End date:</td>
                <td><input type='text' id='end_work[<?php echo $it; ?>]' class='field'></td>
              </tr>
            </table>
          </section>
          <br>
          <input type='submit' onClick="updateWork()" value='Update Work' name="up_work">
        </form>
        <script type="text/javascript">
          function updateWork(){
          //document.write(document.getElementById("sr_work[2]").value);
          var ary_sr=[];
          var ary_cmp=[];
          var ary_pos=[];
          var ary_des=[];
          var ary_start=[];
          var ary_end=[];
          var n=document.getElementById("total").innerHTML;
          for(var l=0;l<n;l++)
           {
             //alert("ip_sr["+i+"]");
             ary_sr[l]=document.getElementById("sr_work["+l+"]").value;
             ary_cmp[l]=document.getElementById("cmp["+l+"]").value;
             ary_pos[l]=document.getElementById("pos["+l+"]").value;
             ary_des[l]=document.getElementById("work_des["+l+"]").value;
             ary_start[l]=document.getElementById("str_work["+l+"]").value;
             ary_end[l]=document.getElementById("end_work["+l+"]").value;
           }
           $.ajax({
              type: "POST",
              url: "updateWork.php",
              data: { id:  ary_sr,
                     cmp: ary_cmp,
                     pos: ary_pos,
                     des: ary_des,
                     str: ary_start,
                     end: ary_end},
              success: function(data){
                //alert(data);
                //location.reload();
              }
            });
          }
          function deleteWork(){
            var id=document.getElementById('thatWork').value;
            //alert(id);
            $.ajax({
               type: "POST",
               url: "deleteWork.php",
               data: { id:  id},
               success: function(data){
                 if(data=="done")
                 {
                   location.reload();
                 }
                 else if(data==""){
                   //location.reload();
                 }
                 else {
                   alert(data);
                 }
               }
             });
          }
        </script>

<!--Education-->
        <form class="" action="" method="post">
          <p class="heading">Education:</p>
          <div style="text-align:right;">
            <input type='number' class='med_field' id='thatEdu' placeholder='Edu ID'>&emsp;<input type='button' value='Delete an Education' onClick='deleteEdu()'>
          </div>
        <?php
          //for cloud
          $user="ridishas_dimpi";
          $host="localhost";
          $pass="talisman@clove4";
          $db="ridishas_portfolio";
          $con=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$con -> error);
          $find="SELECT * FROM experience WHERE admin_id='1'";
          $res=mysqli_query($con,$find);

          $maxim= mysqli_query($con, "SELECT MAX(sr) FROM experience");
          $ro = mysqli_fetch_array($maxim);

          $nxt=$ro[0]+1;
          //echo $nxt;
          if(mysqli_num_rows($res)>0)
          {
            $sr_exp=array();
            $degree=array();
            $core=array();
            $str_yr=array();
            $end_yr=array();
            $clg=array();
            while($u=mysqli_fetch_array($res))
            {
              $sr_exp[]=$u['sr'];
              $degree[]=$u['degree'];
              $core[]=$u['core'];
              $str_yr[]=$u['start_year'];
              $end_yr[]=$u['end_year'];
              $clg[]=$u['college'];
            }
            $g=count($sr_exp);
            echo "<p id='ttl' style='visibility:hidden'>".($g+1)."</p>";
            for($e=0;$e<$g;$e++)
            {
              echo "
              <section class='work'>
              <table>
                <tr>
                  <td>ID:</td>
                  <td><input type='text' id='sr_exp[".$e."]' class='field' value='".$sr_exp[$e]."' readonly></td>
                </tr>
                <tr>
                  <td>Degree:</td>
                  <td><input type='text' id='degree[".$e."]' class='field' value='".$degree[$e]."'></td>
                </tr>
                <tr>
                  <td>Specialization:</td>
                  <td><input type='text' id='core[".$e."]' class='field' value='".$core[$e]."'></td>
                </tr>
                <tr>
                  <td>College:</td>
                  <td><input type='text' id='clg[".$e."]' class='field' value='".$clg[$e]."'></td>
                </tr>
                <tr>
                  <td>Start Year:</td>
                  <td><input type='text' id='str_yr[".$e."]' class='field' value='".$str_yr[$e]."'></td>
                </tr>
                <tr>
                  <td>End Year:</td>
                  <td><input type='text' id='end_yr[".$e."]' class='field' value='".$end_yr[$e]."'></td>
                </tr>
              </table>
            </section>
            <br>
              ";
            }
          }
          mysqli_close($con);
        ?>
        <section class='work'>
        <table>
          <tr>
            <td>ID:</td>
            <td><input type='text' id='sr_exp[<?php echo $g; ?>]' class='field' value='<?php echo $nxt ?>' readonly></td>
          </tr>
          <tr>
            <td>Degree:</td>
            <td><input type='text' id='degree[<?php echo $g; ?>]' class='field'></td>
          </tr>
          <tr>
            <td>Specialization:</td>
            <td><input type='text' id='core[<?php echo $g; ?>]' class='field'></td>
          </tr>
          <tr>
            <td>College:</td>
            <td><input type='text' id='clg[<?php echo $g; ?>]' class='field'></td>
          </tr>
          <tr>
            <td>Start Year:</td>
            <td><input type='text' id='str_yr[<?php echo $g; ?>]' class='field'></td>
          </tr>
          <tr>
            <td>End Year:</td>
            <td><input type='text' id='end_yr[<?php echo $g; ?>]' class='field'></td>
          </tr>
        </table>
      </section>
      <br>
          <input type='submit' onClick="updateEdu()" value='Update Education' name="up_edu">
        </form>
        <script type="text/javascript">
          function updateEdu()
          {
            //alert(document.getElementById("sr_exp[0]").value);
            var ary_sr=[];
            var ary_deg=[];
            var ary_core=[];
            var ary_clg=[];
            var ary_start=[];
            var ary_end=[];
            var n=document.getElementById("ttl").innerHTML;
            for(var l=0;l<n;l++)
             {
               //alert("ip_sr["+i+"]");
               ary_sr[l]=document.getElementById("sr_exp["+l+"]").value;
               ary_deg[l]=document.getElementById("degree["+l+"]").value;
               ary_core[l]=document.getElementById("core["+l+"]").value;
               ary_clg[l]=document.getElementById("clg["+l+"]").value;
               ary_start[l]=document.getElementById("str_yr["+l+"]").value;
               ary_end[l]=document.getElementById("end_yr["+l+"]").value;
             }
             $.ajax({
                type: "POST",
                url: "updateEdu.php",
                data: { id:  ary_sr,
                       deg: ary_deg,
                       core: ary_core,
                       clg: ary_clg,
                       str: ary_start,
                       end: ary_end},
                success: function(data){
                  //location.reload();
                  //alert(data);
                }
              });
          }
          function deleteEdu()
          {
            var id=document.getElementById('thatEdu').value;
            //alert(id);
            $.ajax({
               type: "POST",
               url: "deleteEdu.php",
               data: { id:  id},
               success: function(data){
                 if(data=="done")
                 {
                   //location.href="dashboard.php";
                   location.reload();
                 }
                 else if(data==""){

                 }
                 else {
                   alert(data);
                 }
               }
             });
          }
        </script>

<!--Hire Me-->
        <form class="" action="" method="post">
          <p class="heading">Hiring Details:</p>
          <?php
          $user="ridishas_dimpi";
          $host="localhost";
          $pass="talisman@clove4";
          $db="ridishas_portfolio";
            $con=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$con -> error);

            $pop="SELECT * FROM worth WHERE admin_id='1'";
            $r_pop=mysqli_query($con,$pop);
            if(mysqli_num_rows($r_pop)>0)
            {
              $id_hire=array();
              $price=array();
              $title=array();
              $duty=array();
              while($p=mysqli_fetch_array($r_pop))
              {
                $id_hire[]=$p[0];
                $price[]=$p[2];
                $hr_title[]=$p[3];
                $duty[]=$p[4];
              }
              for($w=0;$w<count($id_hire);$w++)
              {
                echo "
                <section class='work'>
                  <table>
                    <tr>
                      <td>ID:</td>
                      <td><input type='text' id='id_hire[".$w."]' class='field' value='".$id_hire[$w]."' readonly></td>
                    </tr>
                    <tr>
                      <td>Price:</td>
                      <td><input type='text' id='price[".$w."]' class='field' value='".$price[$w]."'></td>
                    </tr>
                    <tr>
                      <td>Title:</td>
                      <td><input type='text' id='hr_title[".$w."]' class='field' value='".$hr_title[$w]."'></td>
                    </tr>
                    <tr>
                      <td>Duty:</td>
                      <td><input type='text' id='duty[".$w."]' class='field' value='".$duty[$w]."'></td>
                    </tr>
                  </table>
                </section>
                <br>
                ";
              }
            }
            mysqli_close($con);
          ?>
          <input type='submit' onClick="updateHire()" value='Update Hiring Details' name="up_hire">
        </form>
        <script type="text/javascript">
          function updateHire()
          {
            //alert(document.getElementById('duty[0]').value);
            var id_hire=[];
            var price=[];
            var hr_title=[];
            var duty=[];

            for(var l=0;l<3;l++)
             {
               //alert("ip_sr["+i+"]");
               id_hire[l]=document.getElementById("id_hire["+l+"]").value;
               price[l]=document.getElementById("price["+l+"]").value;
               hr_title[l]=document.getElementById("hr_title["+l+"]").value;
               duty[l]=document.getElementById("duty["+l+"]").value;
             }
             $.ajax({
                type: "POST",
                url: "updateHire.php",
                data: { id:  id_hire,
                       price: price,
                       title: hr_title,
                       duty: duty},
                success: function(data){
                  //location.reload();
                  //alert(data);
                }
              });
          }
        </script>

<!--Project Pics-->
        <form class="" action="uploadImg.php" method="post" enctype="multipart/form-data">
          <p class="heading">Project Pictures:</p>
          <div style="text-align:right;">
            <input type='number' class='med_field' id='thatPic' placeholder='Pic ID'>&emsp;<input type='button' value='Delete a Picture' onClick='deletePic()'>
          </div>
          <?php
            $user="ridishas_dimpi";
            $host="localhost";
            $pass="talisman@clove4";
            $db="ridishas_portfolio";

            $con=new mysqli($host, $user, $pass, $db) or die("Connection failed: ".$con -> error);
            $sql="SELECT * FROM projects WHERE admin_id ='1'";
            $res=mysqli_query($con,$sql);
            if(mysqli_num_rows($res)>0)
            {
              while($r=mysqli_fetch_array($res))
              {
                echo '<div>';
                echo '<p style="font-size:1.5em">ID: '.$r['sr'].'</p>';
                echo '<img style="width:50%;" src="data:image/jpeg;base64,'.base64_encode( $r['image'] ).'"/>';
                echo '</div><br>';
              }
            }
            mysqli_close($con);
          ?>
          <div style="text-align:right">
            <input type="file" name="image"/>
            <input type="submit" name="submit" value="UPLOAD"/>
          </div>
        </form>
        <script type="text/javascript">
        function deletePic()
        {
          var id=document.getElementById('thatPic').value;
          //alert(id);
          $.ajax({
             type: "POST",
             url: "deletePic.php",
             data: { id:  id},
             success: function(data){
               if(data=="done")
               {
                 //location.href="dashboard.php";
                 location.reload();
               }
               else if(data==""){

               }
               else {
                 alert(data);
               }
             }
           });
        }
        </script>
      </fieldset>
    </main>
  </body>
</html>
<?php
}
?>
