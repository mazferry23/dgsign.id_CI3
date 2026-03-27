<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="GiNK Technology">
    <meta name="keyword" content="GiNK Inventory">
    <link rel="shortcut icon" href="<?=base_url('public/backend/')?>img/favicon.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('public/backend/')?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('public/backend/')?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url('public/backend/')?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=base_url('public/backend/assets/toastr-master/toastr.css')?>" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?=base_url('public/backend/')?>css/style.css" rel="stylesheet">
    <link href="<?=base_url('public/backend/')?>css/style-responsive.css" rel="stylesheet" />
</head>
  <body class="login-body">
    <div class="container">
      <form id="form_login" autocomplete="off" class="form-signin" action="<?=site_url('backend/login/do_login')?>" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <div class="login-wrap">
            <input required type="text" name="username" class="form-control" placeholder="User ID" autofocus>
            <input required type="password" name="password" class="form-control" placeholder="Password">
            <button class="btn btn-lg btn-login btn-block" id="submitbtn" type="submit">Login</button>
        </div>
      </form>
    </div>
    <script src="<?=base_url('public/backend/')?>js/jquery.js"></script>
    <script src="<?=base_url('public/backend/')?>js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?=base_url('public/backend/js/jquery.validate.min.js')?>"></script>
    <script type="text/javascript" src="<?=base_url('public/backend/assets/toastr-master/toastr.js')?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.options = {
              "closeButton": true,
              "debug": true,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "1000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            $('#form_login').validate({
                submitHandler:function(form,e){
                    e.preventDefault();
                    $('#submitbtn').attr('disabled','disabled');
                    $('#submitbtn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing');
                    $.ajax({
                        url:$('form').attr('action'),
                        type:'POST',
                        data:new FormData(document.getElementById('form_login')),
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: 'JSON',
                        statusCode:{
                            200:function(data){
                                toastr.success(data.message,'Success')
                                setTimeout(function(){
                                    $('#submitbtn').removeAttr('disabled');
                                    $('#submitbtn').html('Login');
                                    //let url_redir = '<?=isset($_GET['redir']) ? $this->input->get('redir') : site_url('backend/dashboard') ?>';
                                    location.href='<?php if($dataUser->admnLevel == 'operator scanner')
                                                            {
                                                                echo site_url('backend/scanner');
                                                            }else {
                                                                echo site_url('backend/dashboard');
                                                            }?>';
                                    //location.href = url_redir;
                                },1000);
                            },
                            401:function(resp){
                                $('#submitbtn').removeAttr('disabled');
                                $('#submitbtn').html('Login');
                                toastr.error(resp.responseJSON.message,'Error');
                            },
                            500:function(resp){
                                $('#submitbtn').removeAttr('disabled');
                                $('#submitbtn').html('Login');
                                toastr.error(resp.responseJSON.message,'Error');
                            }
                        }
                    })
                }
            })
        })
    </script>
  </body>
</html>
