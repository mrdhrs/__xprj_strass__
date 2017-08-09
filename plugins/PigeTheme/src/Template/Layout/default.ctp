<?php if($this->request->session()->read('Auth.User.username') ){ ?>
<!DOCTYPE html>
<html>
<head>
  <?php echo $this->Html->charset(); ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->fetch('title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <?php echo $this->Html->css([
		'PigeTheme.bootstrap.min', 
		'PigeTheme.font-awesome.min', 
		'PigeTheme.ionicons.min',
		'PigeTheme./plugins/jvectormap/jquery-jvectormap-1.2.2',
		'PigeTheme.AdminLTE.min',
		'PigeTheme.skins/_all-skins.min',
	]); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <style type="text/css">
  	<?php echo $this->fetch('customCss'); ?>
  </style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Pg</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Pige</b>Média</span>
    </a>
	
    <?php echo $this->element('header-bar'); ?>
    
  </header>
  
  <?php echo $this->element('sidebar-left'); ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $this->element('content-header'); ?>

    <!-- Main content -->
    <?php echo $this->Flash->render(); ?>
    <?php echo $this->fetch('content'); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2017 <a href="#">Strass Agency</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <?php //echo $this->element('sidebar-right.ctp'); ?>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<?php echo $this->Html->script([
	'PigeTheme./plugins/jQuery/jquery-2.2.3.min', 
	'PigeTheme.bootstrap.min.js', 
	'PigeTheme./plugins/fastclick/fastclick',
	'PigeTheme.app.min',
	'PigeTheme./plugins/sparkline/jquery.sparkline.min',
	'PigeTheme./plugins/jvectormap/jquery-jvectormap-1.2.2.min',
	'PigeTheme./plugins/jvectormap/jquery-jvectormap-world-mill-en',
	'PigeTheme./plugins/slimScroll/jquery.slimscroll.min',
	'PigeTheme./plugins/chartjs/Chart.min',
	'PigeTheme./plugins/chartjs/Chart.min',
	'PigeTheme.demo',
]); ?>

<script type="text/javascript">
	$(document).ready(function(){		
		<?php echo $this->fetch('jQueryReadyJs'); ?>
	});
</script>
</body>
</html>
<?php }else{ ?>
<!------------Login form----------->
<!DOCTYPE html>
<html>
<head>
  <?php echo $this->Html->charset(); ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Connexion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <?php echo $this->Html->css([
	'PigeTheme.bootstrap.min', 
	'PigeTheme.font-awesome.min', 
	'PigeTheme.ionicons.min',
	'PigeTheme.AdminLTE.min',
	'PigeTheme.skins/_all-skins.min',
  ]); ?>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <style>
  	.message.error{
		display:block;
		text-align:center;
		color:#F00;
		padding:10px;
	}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#" onClick="return false;"><b>Pige</b>Média</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Connectez-vous</p>
	<?php echo $this->Flash->render() ?>
    <?php echo $this->Form->create(null, ['url' => '/users/login', 'data-toggle' => 'validator', 'role' => 'form']); ?>
      <div class="form-group has-feedback">
        <?php echo $this->Form->control('username', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Non d\'utilisateur', 'required' => true]); ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->control('password', ['label' => false, 'type' => 'password', 'class' => 'form-control', 'placeholder' => 'Mot de passe', 'required' => true]); ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-6 pull-right">
          <?php echo $this->Form->button('Se Connecter', ['type' => 'submit', 'class' => 'btn btn-primary btn-block btn-flat']); ?>	
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php echo $this->Html->script([
	'PigeTheme./plugins/jQuery/jquery-2.2.3.min', 
	'PigeTheme.bootstrap.min.js', 
	'PigeTheme.validator.min', 
]); ?>

</body>
</html>

<!------------/Login form----------->
<?php } ?>