<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nm'); ?>
		<?php echo $form->textField($model,'nm',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pwd'); ?>
		<?php echo $form->textField($model,'pwd',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ml'); ?>
		<?php echo $form->textField($model,'ml',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ml'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'plg'); ?>
		<?php echo $form->textField($model,'plg'); ?>
		<?php echo $form->error($model,'plg'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->