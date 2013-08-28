<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>
<div class="form" align="center">
	<?php 
	$form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array('validateOnSubmit'=>true,),));
			$form->htmlOptions=array('class'=>'form-horizontal');
	?>
	<div class="row">
	<?php echo $form->textField($model,'username',array('placeholder'=>'username')); ?>
	<?php echo $form->error($model,'username'); ?>
	</div>
	<div class="row">
	<?php echo $form->passwordField($model,'password',array('placeholder'=>'password')); ?>
	<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
	<?php echo CHtml::submitButton('sign in'); ?>
	</div>
	<?php $this->endWidget(); ?>
</div>
