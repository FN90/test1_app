<?php
/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-02-28
 * Time: 10:01 PM
 */
$base_url =  base_url();
$assets_url = $base_url."assets/";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test 1</title>

    <!-- Bootstrap -->
    <link href="<?php print $assets_url; ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php print $assets_url; ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php print $assets_url; ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php print $assets_url; ?>vendors/animate.css/animate.min.css" rel="stylesheet">

      <!-- validator -->
      <script src="<?php print $assets_url; ?>vendors/validator/validator.js"></script>

    <!-- Custom Theme Style -->
    <link href="<?php print $assets_url; ?>css/custom.css" rel="stylesheet">
  </head>

  <body class="login">

    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="<?php print base_url().'index.php/login/log_user'; ?>">
              <h1><?php print lang('connection'); ?></h1>
                <h5 style="color:red;">
                    <?php
                    print $this->session->userdata('login_message') ? $this->session->userdata('login_message'):'';
                    // delete message from the session
                    $this->session->unset_userdata('login_message');?>
                </h5>
              <div>
                <input type="text" class="form-control" placeholder="<?php print lang('email'); ?>" required="true" name="email" value='ncibi.fehmi@gmail.com'/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="<?php print lang('password'); ?>" name="password" required="true" value='demo' />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit"><?php print lang('login'); ?></button>
               <!-- <a class="reset_pass" href="#" style="color:blue;">Mot de passe oublié?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                  <!--
                <p class="change_link">Nouveau ici?
                  <a href="#signup" class="to_register"> Créer un compte </a>
                </p>
                    -->
                    <p class="change_link">
                    <?php
                    if($this->session->userdata('admin_language')=='spanich')
                    {
                        print '<a class="to_register" href="'.base_url().'login/switch_lang/french"">  '.lang('french').'</a></li>';
                    }
                    else
                    {
                        print '<a class="to_register" href="'.base_url().'login/switch_lang/spanich"> '.lang('spanich').'</a>';
                    }
                    ?>
                    </p>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-institution"></i> <?php print lang('student_management_system'); ?></h1>
                  <p>© 2017 All Rights Reserved. </p>
                    <h2 style="color:red;"> Demo - Fahmi Ncibi</h2>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
