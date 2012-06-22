<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <style type="text/css">
	      body {
	        padding-top: 60px;
	        padding-bottom: 40px;
	      }
     </style>
</head>

<body>


<header role="banner">
	<?php $this->widget('bootstrap.widgets.BootNavbar',array(
		'brand'=>CHtml::encode(Yii::app()->name),
		'collapse'=>true,
		'items'=>array(
			array(
				'class'=>'bootstrap.widgets.BootMenu',
				'items'=>array(
					array('label'=>'Manage Companies', 'url'=>array('company/index', 'view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Manage Receipts', 'url'=>array('receipt/index','view'=>'index'),'visible'=>!Yii::app()->user->isGuest),
					array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
					array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
					array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
				),
			),
		),
	)); ?>
	
</header>

<div class="container">
	<div class="hero-unit">
		<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>								
	</div>
		<?php echo $content; ?>
	
	<hr />

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->
</div><!-- page -->
</body>
</html>
