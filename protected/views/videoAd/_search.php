<?php
/* @var $this VideoAdController */
/* @var $model VideoAd */
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
		<?php echo $form->label($model,'video_id'); ?>
		<?php echo $form->textField($model,'video_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'photo'); ?>
		<?php echo $form->textField($model,'photo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vw'); ?>
		<?php echo $form->textField($model,'vw'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'s_date'); ?>
		<?php echo $form->textField($model,'s_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'e_date'); ?>
		<?php echo $form->textField($model,'e_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->