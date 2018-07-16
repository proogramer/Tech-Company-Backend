<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Log-in</title>

  <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>

    <link rel="stylesheet" href="<?php echo site_url()?>assets/css/admin_css/login_style.css" media="screen" type="text/css" />

</head>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/admin_js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/admin_js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/admin_js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/admin_js/login.js"></script>
<body>
<div class="messge_style_contact" id="myDiv_contact_add" style="color: #ff8800;font-size: 17px; margin: 0 485px 10px; display:none"> <font>Your are Login into the User Admin</font> </div>
  <div class="login-card">
    <h1>Admin Log-in</h1><br>
 <?php 
 $attributes = array('id' => 'login_form');
 echo form_open('',$attributes)
 ?>
    <input type="text" name="email" placeholder="E-mail">
    <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>

  <div class="login-help">
    <a href="#">Register</a> • <a href="#">Forgot Password</a>
  </div>
</div>
</body>

</html>
<script>
  //Validation
$().ready(function(){
   $("#login_form").validate({
      rules:
      {
        email:
        {
          required:true,
          email:true,
        },
        pass:
        {
          required:true,

        },
      },
      messages:
      {
        email:
        {
          required:"please enter the E-mail Id",
          email:"Please enter the correct email id",
        },
        pass:
        {
          required:"Please enter the Password",
        }
      }
  });
});

//Insertion Values using ajax
$.validator.setDefaults({
    submitHandler: function() 
    {
      var proceed=true;
      if(proceed)
      {
        var f_data= new FormData();
        f_data.append('email', $('input[name=email]').val());
        f_data.append('pass', $('input[name=pass]').val());
        $.ajax
        ({
          url:'<?php echo base_url(); ?>admin_controller/login_action',
          data:f_data,
          processData: false,
          contentType: false, 
          type: 'POST',
          dataType:'json',
          success: function(response)
          {
            if(response.type =='success')
            { 
              $('#myDiv_contact_add').show().delay(5000).fadeOut();
                    $('body,html').animate({
                scrollTop: 100
                }, 600);
                    setTimeout(function(){window.location.href="<?php echo base_url()?>admin"},5000);
                2
            }
            if(response.type == 'error')
            { 
              alert('E-mail and Password is wrong');
            }
          }
        });
      }
    }
});
</script>
