<?php
/* @var $this PersonController */
/* @var $data Person */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uid')); ?>:</b>
	<?php echo CHtml::encode($data->uid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('news')); ?>:</b>
	<?php echo CHtml::encode($data->news); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock')); ?>:</b>
	<?php echo CHtml::encode($data->stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lottery')); ?>:</b>
	<?php echo CHtml::encode($data->lottery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coupon')); ?>:</b>
	<?php echo CHtml::encode($data->coupon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('luck')); ?>:</b>
	<?php echo CHtml::encode($data->luck); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('poll')); ?>:</b>
	<?php echo CHtml::encode($data->poll); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weather')); ?>:</b>
	<?php echo CHtml::encode($data->weather); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update')); ?>:</b>
	<?php echo CHtml::encode($data->update); ?>
	<br />

	*/ ?>

</div>