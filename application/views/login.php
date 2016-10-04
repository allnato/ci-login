<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello | Login</title>
    <!-- Materialize stylesheet -->
    <link rel="stylesheet" href="../../assets/css/materialize.min.css">
    <link rel="stylesheet" href="../../assets/css/login.css">
  </head>

  <body class="indigo darken-2">
    <div class="wrapper">
      <div class="container valign-wrapper">
        <div class="login valign">
          <!-- Logo -->
          <h1 class="center-align logo">Hello!</h1>

          <!-- Login Form -->

          <div class="loginForm z-depth-1 grey lighten-4">
            <form action="">

              <div class="input-field">
                <input type="email" id="email" name="email" class="validate" required>
                <label for="email">Email</label>
              </div>

              <div class="input-field">
                <input type="password" id="password" name="password" class="validate" required>
                <label for="email">Password</label>
              </div>

              <div class="input-field submitButton row">
                <button type="submit" class="col s12 btn waves-effect waves-light btn-large pink">Login</button>
              </div>

            </form>
          </div>

          <div class="createAccount center-align">
            <a class="waves-effect waves-light waves-red btn-flat center-align">Create an Account.</a>
          </div>


        </div>
      </div>
    </div>


  </body>

  <!-- Jquery & Materialize Scripts -->
  <script type="text/javascript" src="../../assets/js/jquery-3.1.0.min.js"></script>
  <script type="text/javascript" src="../../assets/js/materialize.min.js"></script>
</html>
