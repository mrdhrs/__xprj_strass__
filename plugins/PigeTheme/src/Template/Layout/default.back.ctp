<!doctype html>
<html lang="fr">
<head>
	<?= $this->Html->charset(); ?>
	<link rel="icon" type="image/png" href="/botheme/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title><?= $this->fetch('title'); ?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    
    <?php echo $this->Html->css([
		'Botheme.bootstrap.min', 
		'Botheme.animate.min', 
		'Botheme.light-bootstrap-dashboard'
	]); ?>


    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <?php echo $this->Html->css('Botheme.pe-icon-7-stroke'); ?>
    
    <style type="text/css">
		<?php echo $this->fetch('customCss'); ?>
	</style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure">
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="/bo" class="simple-text">
                    Okoont - BO
                </a>
            </div>
			
            <?= $this->element('navleft'); ?>
            
    	</div>
    </div>

    <div class="main-panel">
        
		<?= $this->element('content-header'); ?>

        <div class="content">
            <div class="container-fluid">
                <?= $this->Flash->render(); ?>
 
        		<?= $this->fetch('content'); ?>
            </div>
        </div>

    </div>
</div>


</body>
	
    <?php echo $this->Html->script([
		'Botheme.jquery-1.10.2', 
		'Botheme.bootstrap.min', 
		'Botheme.bootstrap-checkbox-radio-switch',
		'Botheme.chartist.min',
		'Botheme.bootstrap-notify',
		'light-bootstrap-dashboard'
	]); ?>

	<script type="text/javascript">
    	$(document).ready(function(){

        	//demo.initChartist();

        	/*$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });*/
			
			<?php echo $this->fetch('jQueryReadyJs'); ?>

    	});
	</script>

</html>
