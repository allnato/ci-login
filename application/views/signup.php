g<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hello | Sign-Up</title>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/materialize.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/signup.css">
</head>
<body class="teal accent-3">
  <div class="wrapper">
    <div class="container valign-wrapper">
      <div class="signup valign">
        <h1 class="logo grey-text text-lighten-3">Sign-Up</h1>

        <div class="row">
          <div class="signupForm z-depth-2 grey lighten-3 col m6 s12">
            <form action="<?php echo site_url('addUser');?>" method="post">

              <div class="input-field">
                <input type="text" id="firstname" name="firstname" class="validate" required>
                <label for="firstname">Firstname</label>
              </div>

              <div class="input-field">
                <input type="text" id="lastname" name="lastname" class="validate" required>
                <label for="lastname">Lastname</label>
              </div>

              <div class="input-field">
                <input type="email" id="email" name="email" class="validate" required>
                <label for="">Email</label>
              </div>

              <div class="input-field">
                <input type="password" id="password" name="password" class="validate" required>
                <label for="">Password</label>
              </div>

              <div class="input-field">
                <textarea id="address" name="address" class="validate materialize-textarea" required></textarea>
                <label for="">Address</label>
              </div>

              <div class="input-field right-align">
                <button type="submit" class="btn waves-effect waves-light btn-large pink">Submit</button>
              </div>

            </form>
          </div>
          <div class="col m5 offset-m1 s12 valign-wrapper z-depth-2 grey lighten-3">
            <div class="valign helloWrapper left-align">
              <h1 class="valign left-align hello grey-text text-darken-4 flow-text">Back to Login</h1>
              <a href="<?php echo site_url('login');?>" class="btn waves-effect waves-light btn-large col s12 amber grey-text text-darken-3">login</a>
            </div>


          </div>
        </div>
      </div>


    </div>
  </div>

</body>
<!-- Jquery & Materialize Scripts -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
</html>
