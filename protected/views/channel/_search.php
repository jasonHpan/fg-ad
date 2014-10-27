<?php
/* @var $this ChannelController */
/* @var $model Channel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tv_channel'); ?>
		<?php echo $form->textField($model,'tv_channel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'youtube_channel'); ?>
		<?php echo $form->textField($model,'youtube_channel',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'first_video'); ?>
		<?php echo $form->textField($model,'first_video',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remark'); ?>
		<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seq'); ?>
		<?php echo $form->textField($model,'seq'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vw'); ?>
		<?php echo $form->textField($model,'vw'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('搜尋'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->