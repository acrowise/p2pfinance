<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
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

          <form action="/" method="post">

            <div class="top-row">
              <div class="field-wrap">
                <label>
                  First Name<span class="req">*</span>
                </label>
                <input type="text" required autocomplete="off" />
              </div>

              <div class="field-wrap">
                <label>
                  Last Name<span class="req">*</span>
                </label>
                <input type="text" required autocomplete="off"/>
              </div>
            </div>

            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Password<span class="req">*</span>
              </label>
              <input type="email" required autocomplete="off"/>
            </div>


            <div class="field-wrap">
              <label>
                Retype Password<span class="req">*</span>
              </label>
              <input type="password" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
               Phone Number<span class="req">*</span>
              </label>
              <input type="email" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                State<span class="req">*</span>
              </label>
              <input type="email" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
              <label>
                Payment Name<span class="req">*</span>
              </label>
              <input type="email" required autocomplete="off"/>
            </div>

            <div class="field-wrap">
                <select>
                  <option>Select Payment Method</option>
                  <option>MTN mobile money</option>
                  <option>Airtel money</option>
                  <option>Tigo Cash</option>
                  <option>Vodafone cash</option>
                </select>

            </div>


            <div class="field-wrap">
              <label>
                Payment Number<span class="req">*</span>
              </label>
              <input type="email" required autocomplete="off"/>
            </div>

            <button type="submit" class="button button-block"/>Get Started</button>

          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>
    <script src="js/auth.js"></script>



</body>

</html>