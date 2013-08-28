<?php
/* @var $this RankingController */
/* @var $model Ranking */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ranking-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nm'); ?>
		<?php echo $form->textField($model,'nm',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nm'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'val'); ?>
		<?php echo $form->textField($model,'val',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'val'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rnk'); ?>
		<?php echo $form->textField($model,'rnk'); ?>
		<?php echo $form->error($model,'rnk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rg'); ?>
		<?php echo $form->textField($model,'rg',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rg'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ctr'); ?>
		<?php echo $form->textField($model,'ctr',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'ctr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time'); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->