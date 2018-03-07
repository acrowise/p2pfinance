<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link  rel="stylesheet" href="css/bootstrap.min.css">
  
      <link rel="stylesheet" href="css/style-login.css">

  
</head>

<body>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
      </ul>
      
      <div class="tab-content">

        <div id="login">   
          <h2>Welcome Back!</h2>
          
          <form action="/" method="post" id="loginForm">
              <div id="ack" align="center"></div>
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="username" id="username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password" id="password" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="forgot-password.html">Forgot Password?</a></p>
          
          <button type="submit" class="button button-block" id="loginBtn"/>Log In</button>
          
          </form>

        </div>
        <div id="signup">
          <h2>Sign Up for Free</h2>

          <form  method="post" id="signUpForm">
              <div id="sack" align="center"></div>
            <div class="top-row">
              <div class="field-wrap">
                <label>
                  First Name<span class="req" style="color: red;">*</span>
                </label>
                <input type="text" name="first_name" id="first_name" required autocomplete="off" />
              </div>

              <div class="field-wrap">
                <label>
                  Last Name<span class="req" style="color: red;">*</span>
                </label>
                <input type="text" name="last_name" id="last_name" required autocomplete="off"/>
              </div>
            </div>

            <div class="field-wrap">
              <label>
                Email Address<span class="req" style="color: red;">*</span>
              </label>
              <input type="email" name="email" id="email" required autocomplete="off"/>
            </div>

            <div class="field-wrap">

                <select  id="gender" name="gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>

                </select>
                <span id="genderError"></span>
            </div>
            <div class="field-wrap">
              <label>
               Phone Number<span class="req" style="color: red;">*</span>
              </label>
              <input type="text" name="mobile" id="mobile" required autocomplete="off"/>
            </div>
            <div class="field-wrap">
            
                <select  name="region" id="region" required>
                    <option value="">Region</option>
                    <?php require_once('classes/mysql.class.php');
                        $object = new MySQL();
                        $object->Query("Select * from regions ORDER BY id");
                        while(!$object->EndOfSeek()){
                            $row = $object->Row();
                            ?>
                    <option value="<?php echo $row->id ?>"><?php echo $row->region_name;?></option>
                    <?php
                        }
                    ?>
                </select>
                <span id="regionError" ></span>
            </div>

            <div class="field-wrap">
              <label>
                Payment Account Name<span class="req" style="color: red;">*</span>
              </label>
              <input type="text" name="pName" id="pName" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
                <select  id="pMethod" name="pMethod">
                  <option value="">Select Payment Method</option>
                    <?php
                    $object->Query("Select * from paymentType ORDER BY id");
                    while(!$object->EndOfSeek()){
                        $row = $object->Row();
                        ?>
                        <option value="<?php echo $row->id ?>"><?php echo $row->name;?></option>
                        <?php
                    }
                    ?>
                </select>
                <span id="pMethodError" ></span>
            </div>


            <div class="field-wrap">
              <label>
                Payment Number<span class="req" style="color: red;">*</span>
              </label>
              <input type="text" id="paymentAccount" name="paymentAccount" required autocomplete="off"/>
            </div>
                <div align="center" ><img src="img/spinner.gif" style="display: none" id="sspiner"/> </div>
              <br/>
            <button type="submit" id="signupbtn" class="button button-block"/>Get Started</button>
            <input type="hidden" name="do" value="signup"/>
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
    <script src="js/bootstrap.min.js"></script>
    <script  src="js/index.js"></script>
    <script src="js/auth.js"></script>
    <script src="js/parsley/parsley.js"></script>
<script>
    $(document).on('submit','#signUpForm',function (e) {
        e.preventDefault();
        $("#genderError").empty();
        $("#pMethodError").empty();
        $("#regionError").empty();

        var region = $.trim($("#region").val());
        var gender = $.trim($("#gender").val());
        var pMethod = $.trim($("#pMethod").val());
        if(region.length == 0){

            $("#regionError").html('<p><small style="color:red;">select a region.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }
        if(gender.length == 0){

            $("#genderError").html('<p><small style="color:red;">select a gender.</small><p/>');
            $("html, body").animate({ scrollTop: 0 }, "slow");

        }
         if(pMethod.length == 0){

                    $("#pMethodError").html('<p><small style="color:red;">select a payment method.</small><p/>');
                    $("html, body").animate({ scrollTop: 0 }, "slow");

         }
         else if(region.length != 0 && gender.length != 0 && pMethod.length != 0) {
             $("#sspiner").css('display', 'block');
             $("#signupbtn").attr('disabled', 'disabled');
             c = $(this).parsley().validate();
             if (c) {
                 $.ajax({
                     type: "POST",
                     url: "controller/signUpController.php",
                     data: $(this).serialize(),
                     success: function (msg) {
                         if (msg === 3) {
                             $('#sspiner').css('display', 'none');
                             $('#sack').html('<div class="alert alert-success" >Account created successfully, kindly check you email for further directions. </div>');
                         }
                         else if(msg === 2){
                             $("#sack").html('<div class="alert alert-danger"> Sorry and account already exist with this email.</div>');
                             $("#sspiner").css("display", "none");
                             $('#signupbtn').removeAttr("disabled");
                         }
                         else  if(msg === 1)
                         {
                             $("#sack").html('<div class="alert alert-danger"> Sorry and account already exist with this email.</div>');
                             $("#sspiner").css("display", "none");
                             $('#signupbtn').removeAttr("disabled");
                         }
                     }
                 });
                 return false;
             }
         }
    })
</script>
</body>

</html>
