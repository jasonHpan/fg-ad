<?php
/* @var $this PersonController */
/* @var $model Person */
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
		<?php echo $form->label($model,'uid'); ?>
		<?php echo $form->textField($model,'uid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'news'); ?>
		<?php echo $form->textField($model,'news'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stock'); ?>
		<?php echo $form->textField($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lottery'); ?>
		<?php echo $form->textField($model,'lottery'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coupon'); ?>
		<?php echo $form->textField($model,'coupon'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'luck'); ?>
		<?php echo $form->textField($model,'luck'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poll'); ?>
		<?php echo $form->textField($model,'poll'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weather'); ?>
		<?php echo $form->textField($model,'weather'); ?>
	</div>

	<div class="row">
		<?php // echo $form->label($model,'update'); ?>
		<?php // echo $form->textField($model,'update'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->