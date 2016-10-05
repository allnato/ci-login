<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hello | Profile</title>

  <!-- Materialize stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/materialize.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/profile.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>

<body class="light-blue darken-1">
  <div class="wrapper">
    <div class="container">
      <div class="right-align">
        <h1 class="white-text header">profile.</h1>
      </div>
      <div class="row">
        <div class="col m6 s12 ">
          <h1 class="navigation header white-text">
            <a href="" class="white-text">home</a>
            //
            <a href="" class="white-text">logout</a>
          </h1>
        </div>
        <div class="col m6 s12 profile-form z-depth-2 grey lighten-4">
          <form id="profileForm" method="post" action="">

            <div class="input-field">
              <input type="text" id="firstname" name="firstname" value="Allendale" readonly
              class=""/>
              <label for="firstname">Firstname</label>
            </div>

            <div class="input-field">
              <input type="text" id="lastname" name="lastname" value="Nato" readonly
              class=""/>
              <label for="lastname">Lastname</label>
            </div>

            <div class="input-field">
              <input type="email" id="email" name="email" value="natoallendale@gmail.com" readonly
              class=""/>
              <label for="email">Email</label>
            </div>

            <div class="input-field">
              <textarea id="address" name="address" readonly
              class="materialize-textarea">Imus, Cavite</textarea>
              <label for="address">Address</label>
            </div>

            <button type="submit" id="formButton"></button>
          </form>

          <div class="input-field right-align">
            <button id="editButton"
            class="btn-floating btn-large waves-effect waves-light red">
            <i class="material-icons">mode_edit</i>
          </button>
        </div>

        <div class="input-field right-align">
          <button type="submit" id="saveButton"
          class="btn green waves-effect waves-light">Save Changes</button>
        </div>

      </div>
      </div>
    </div>
  </div>
</body>

<!-- Jquery & Materialize Scripts -->
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#saveButton').css('visibility', 'hidden');

    // Edit Button click function.
    $('#editButton').click(function(event) {
      $('#firstname').removeAttr('readonly');
      $('#lastname').removeAttr('readonly');
      $('#email').removeAttr('readonly');
      $('#address').removeAttr('readonly');
      // Add required Attr.
      $('#firstname').prop('required', 'true')
      $('#lastname').prop('required', 'true')
      $('#email').prop('required', 'true')
      $('#address').prop('required', 'true')
      // Add validate Class
      $('#firstname').addClass('validate');
      $('#lastname').addClass('validate');
      $('#email').addClass('validate');
      $('#address').addClass('validate');
      // Focus on the first name
      $('#firstname').focus();

      // Make the 'Save Changes' Button Visible.
      $('#saveButton').css('visibility', 'visible');
    });

    // Save Button click function.
    $('#saveButton').click(function(event) {

      if($('#profileForm')[0].checkValidity()){
        // Add readonly attr.
        $('#firstname').prop('readonly', 'true');
        $('#lastname').prop('readonly', 'true');
        $('#email').prop('readonly', 'true');
        $('#address').prop('readonly', 'true');

        // Remove required attr.
        $('#firstname').removeAttr('required');
        $('#lastname').removeAttr('required');
        $('#email').removeAttr('required');
        $('#address').removeAttr('required');

        // Remove validate class
        $('#firstname').removeClass('validate');
        $('#lastname').removeClass('validate');
        $('#email').removeClass('validate');
        $('#address').removeClass('validate');

        $('#saveButton').css('visibility', 'hidden');

         Materialize.toast('Changes Saved :)', 4000);
        // Create AJAX Here.
      } else{
         Materialize.toast('Invalid Changes.', 4000);
      }


    });

  });
</script>
</html>
