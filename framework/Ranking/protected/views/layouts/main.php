<?php /* @var $this Controller */
$baseUrl = $this->assetsBase;
//echo Yii::app()->assetManager->baseUrl;
$cs = Yii::app()->clientScript;
$rs =  $cs->registerCoreScript('jquery.ui');
$rs = $cs->registerCssFile($baseUrl.'/css/jquery-ui-1.9.2.custom.css');
$rs = $cs->registerCssFile($baseUrl.'/css/ms.css');
$cs->registerScriptFile($baseUrl.'/js/JQueryFormPlugin.js');
$cs->registerScriptFile($baseUrl.'/js/fhconvert.js');
$cs->registerScriptFile($baseUrl.'/js/jquery.formtips.1.2.6.js');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="language" content="en" />
<link rel="shortcut icon" href="<?php echo $baseUrl.'/img/favicon.ico'?>">
<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css"
	href="<?php echo $baseUrl; ?>/css/screen.css"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo $baseUrl; ?>/css/print.css"
	media="print" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
<link rel="stylesheet" type="text/css"
	href="<?php echo $baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo $baseUrl; ?>/css/form.css" />
<title>
	<?php 
		$this->pageTitle =Yii::t(Yii::app()->getLanguage(),$this->pageTitle); 
		echo CHtml::encode($this->pageTitle); 
	?>
</title>
</head>
<body>
	<div class="container" id ="page">
		<div id="theader">
			<div id="logo">
			<img src="<?php echo $baseUrl."/img/logo.png";?>"/>
			</div>
		</div>
		<!-- header -->
		<div>
		<div id="language-selector" style="float: right; margin: 2px;">
			<?php $this->widget('application.components.widgets.LanguageSelector');?>
		</div>
			<?php 
			$this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
				array('label'=>'home','url'=>array('/site/index')),
				array('label'=>'chart', 'url'=>array('/ranking/index')),
				array('label'=>'login','url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'manage', 'url'=>array('/ranking/admin'), 'visible'=>Yii::app()->user->getRole() > 1),
				array('label'=>'user', 'url'=>array('/user/index'), 'visible'=>Yii::app()->user->getRole() > 2),
				array('label'=>'logout'.'('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
    )); ?>
		</div>
		<!-- mainmenu -->
		<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
		)); ?>
		<!-- breadcrumbs -->
		<?php endif?>
		<?php echo $content; ?>
		<div class="clear"></div>
		<div id="footer">
			Copyright &copy;
			<?php
			date_default_timezone_set('Asia/Tokyo');
			echo date('Y');
			?>
			by Kumcheol Park <br /> All Rights Reserved.<br />
			Powerd by Yiiframework.
		</div>
		<!-- footer -->
	</div>
	<!-- page -->
</body>
</html>