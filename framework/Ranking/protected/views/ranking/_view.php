<?php
/* @var $this RankingController */
/* @var $data Ranking */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nm')); ?>:</b>
	<?php echo CHtml::encode($data->nm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('val')); ?>:</b>
	<?php echo CHtml::encode($data->val); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rnk')); ?>:</b>
	<?php echo CHtml::encode($data->rnk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rg')); ?>:</b>
	<?php echo CHtml::encode($data->rg); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ctr')); ?>:</b>
	<?php echo CHtml::encode($data->ctr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />


</div>