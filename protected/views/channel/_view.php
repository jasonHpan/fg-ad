<?php
/* @var $this ChannelController */
/* @var $data Channel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tv_channel')); ?>:</b>
	<?php echo CHtml::encode($data->tv_channel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('youtube_channel')); ?>:</b>
	<?php echo CHtml::encode($data->youtube_channel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_video')); ?>:</b>
	<?php echo CHtml::encode($data->first_video); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remark')); ?>:</b>
	<?php echo CHtml::encode($data->remark); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('seq')); ?>:</b>
	<?php echo CHtml::encode($data->seq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vw')); ?>:</b>
	<?php echo CHtml::encode($data->vw); ?>
	<br />

	*/ ?>

</div>