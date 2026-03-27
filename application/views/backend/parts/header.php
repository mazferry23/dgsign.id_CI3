<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?=base_url('public/backend/img/favicon.png')?>">

    <title>DGSIGN - <?=isset($title) ? $title : ''?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('public/backend/')?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('public/backend/')?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url('public/backend/')?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <?php
    if(isset($css) && is_array($css)){
      foreach($css as $s){
        ?>
    <link href="<?=$s?>" rel="stylesheet"/>
        <?php
      }
    }
    ?>

    <!--right slidebar-->
    <link href="<?=base_url('public/backend/')?>css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('public/backend/')?>css/style.css" rel="stylesheet">
    <link href="<?=base_url('public/backend/')?>css/style-responsive.css" rel="stylesheet" />
    <style type="text/css">
      .custom-select.custom-select-sm.form-control.form-control-sm{
        width: 60px;
      }
      .swal2-actions button {
        margin-right: 10px;
      }
      ul.sidebar-menu li.menu-header:before{

      }
      ul.sidebar-menu li.menu-header{
        padding-left: 5px;
        padding-top: 15px;
        padding-bottom: 15px;
        color: #71828a;
        font-size: 12px;
        margin:0;
        background: #1a2226;
      }
      td.details-control {
        background: url('<?=base_url('public/backend/assets/datatables/images/icon_plus.png')?>') no-repeat center center;
        cursor: pointer;
      }
      tr.shown td.details-control{
        background: url('<?=base_url('public/backend/assets/datatables/images/details_close.png')?>') no-repeat center center;
      }
    </style>
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="sidebar-toggle-box">
              <i class="fa fa-bars"></i>
          </div>
          <!--logo start-->
          <a href="<?=site_url('backend/dashboard')?>" class="logo">DG<span>SIGN</span></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
              <!--  notification start -->
              <ul class="nav top-menu">
                  <!-- inbox dropdown start-->
                  <!--li id="header_inbox_bar" class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <i class="fa fa-envelope-o"></i>
                          <span class="badge badge-danger">5</span>
                      </a>
                      <ul class="dropdown-menu extended inbox">
                          <div class="notify-arrow notify-arrow-red"></div>
                          <li>
                              <p class="red">You have 5 new messages</p>
                          </li>
                          <li>
                              <a href="#">
                                  <span class="photo"><img alt="avatar" src="<?=base_url('public/backend/')?>img/avatar-mini.jpg"></span>
                                  <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                  <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                              </a>
                          </li>

                          <li>
                              <a href="#">See all messages</a>
                          </li>
                      </ul>
                  </li-->
              </ul>
              <!--  notification end -->
          </div>
          <div class="top-nav ">
              <!--search & user info start-->
              <ul class="nav pull-right top-menu">

                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <!--img alt="" src="<?=base_url('public/backend/')?>img/avatar1_small.jpg"-->
                          <span class="username"><?=trim($_SESSION['auth_login']['backend']->admnFirstname.' '.$_SESSION['auth_login']['backend']->admnLastName)?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout dropdown-menu-right">
                          <div class="log-arrow-up"></div>
                          <li><a href="<?=site_url('backend/user/profile')?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
                          <li><a href="<?=site_url('backend/user/change_password')?>"><i class="fa fa-edit"></i> Change Password</a></li>
                          <!--li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li-->
                          <li><a href="<?=site_url('backend/dashboard/logout')?>"><i class="fa fa-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
              <!--search & user info end-->
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <?php
                $this->load->view('backend/parts/'.$sidebar);
              ?>
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
              <?=isset($breadcrumb) ? $breadcrumb : ''?>
