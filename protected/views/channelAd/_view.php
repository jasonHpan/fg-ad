<?php
/* @var $this ChannelAdController */
/* @var $data ChannelAd */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('channel_id')); ?>:</b>
	<?php echo CHtml::encode($data->channel_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo')); ?>:</b>
	<?php echo CHtml::encode($data->photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vw')); ?>:</b>
	<?php echo CHtml::encode($data->vw); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('s_date')); ?>:</b>
	<?php echo CHtml::encode($data->s_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('e_date')); ?>:</b>
	<?php echo CHtml::encode($data->e_date); ?>
	<br />


</div>