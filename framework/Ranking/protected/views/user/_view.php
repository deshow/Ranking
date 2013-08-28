<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm')); ?>:</b>
	<?php echo CHtml::encode($data->nm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pwd')); ?>:</b>
	<?php echo CHtml::encode($data->pwd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ml')); ?>:</b>
	<?php echo CHtml::encode($data->ml); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plg')); ?>:</b>
	<?php echo CHtml::encode($data->plg); ?>
	<br />


</div>