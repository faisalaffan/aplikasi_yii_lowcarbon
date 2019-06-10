<?php
if (!Yii::app()->user->isGuest){
  $mdl_user = User::model()->findByPk(Yii::app()->user->getId());
  $nama_lengkap = $mdl_user->nama_user;
}else{
  $nama_lengkap = "Guest";
}
    

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Monitoring Sensor | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->

  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
            <?php
            if (Yii::app()->user->isGuest){ ?>
              <body class="hold-transition skin-blue sidebar-collapse">
            <?php
            }else{?>
              <body class="hold-transition skin-blue sidebar-mini">
            <?php
            }
            ?>

            <?php
            if (!Yii::app()->user->isGuest){ ?>

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Monitoring</b> UM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/foto/<?php echo Yii::app()->user->getFoto(Yii::app()->user->id); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $nama_lengkap ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/foto/<?php echo Yii::app()->user->getFoto(Yii::app()->user->id); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $nama_lengkap ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/user/detail/" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout/" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/foto/<?php echo Yii::app()->user->getFoto(Yii::app()->user->id); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nama_lengkap ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/station/admin"><i class="fa fa-area-chart"></i> <span>Station Monitoring</span></a></li>                                                                            
            <li class="treeview">
              <a href="#"><i class="fa fa-inbox"></i> <span>Posting</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/station/admin"><i class="fa fa-pencil"></i> <span>Konten Edukasi</span></a></li>                                                                    
              </ul>
            </li> 
            <?php if (Yii::app()->user->isAdmin()){ ?>  
            <li class="treeview">
              <a href="#"><i class="fa fa-database"></i> <span>Master</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/node/admin"><i class="fa fa-bullseye"></i> <span>Node</span></a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/skala/admin"><i class="glyphicon glyphicon-signal"></i> <span>Skala</span></a></li>
                  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/admin"><i class="fa fa-users"></i> <span>User</span></a></li>                                                                      
              </ul>
            </li> 
            <?php
            }
            ?>                                              
          <?php if (!Yii::app()->user->isGuest) {
          ?>            
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/detail/"><i class="fa fa-user"></i> <span>Profil</span></a></li>
          <?php
          }
          ?>                                        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quick Access Button
        <small>Sistem Monitoring</small>
      </h1>
    </section>

      <?php 

         $dLab1=User::model()->findAll('level=3');
         $jml_user = count($dLab1);


         $dLab2=User::model()->findAll('level=1');
         $sdh_kerja = count($dLab2);
  
         $dLab4=Node::model()->findAll();
         $blm_kerja = count($dLab4);   

         $dLab5=Station::model()->findAll();
         $jml_kritik = count($dLab5); 
                  
        ?>  

    <!-- Main content -->
            <?php
            }
            ?>
    <section class="content">
   <?php if (!Yii::app()->user->isGuest){ ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <a href="#">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jml_user; ?></h3>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
          </div>
        </div>      
        </a>
        <!-- ./col -->
        <a href="#">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $sdh_kerja; ?></h3>
              <p>Edukasi</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
          </div>
        </div>      
        </a>
        <!-- ./col -->
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/node/admin">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $blm_kerja; ?></h3>
              <p>Node</p>
            </div>
            <div class="icon">
              <i class="fa fa-bullseye"></i>
            </div>
          </div>
        </div>      
        </a>
        <!-- ./col -->
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/station/admin">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $jml_kritik; ?></h3>
              <p>Station</p>
            </div>
            <div class="icon">
              <i class="fa fa-area-chart"></i>
            </div>
          </div>
        </div>      
        </a>
        <!-- ./col -->
      </div>
      <?php
      }
      ?>
      <!-- /.row -->
      <!-- Main row -->
		<?php echo $content; ?>
      <!-- /.row (main row) -->
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.1
    </div>
    <strong>Copyright &copy; 2018 <a href="http://almsaeedstudio.com">Design By KLN UM Research Member</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php
Yii::app()->clientScript->registerCoreScript('jquery'); 
?>

<!-- Bootstrap 3.3.6 -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/app.min.js"></script>
</body>
</html>
