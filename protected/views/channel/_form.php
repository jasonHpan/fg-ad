<?php
/* @var $this ChannelController */
/* @var $model Channel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'channel-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><br>欄位前有 <span class="required">*</span> 為必填欄位<br></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
                                      <?php echo $form->dropDownList($model, 'category_id',  
                                                                                CHtml::listData(Category::model()->findAll(), 'id', 'name'),
                                                                                array('options' => array($model->category_id=>array('selected'=>true)))
                                                                                ) ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tv_channel'); ?>
		<?php echo $form->textField($model,'tv_channel'); ?>
		<?php echo $form->error($model,'tv_channel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'youtube_channel'); ?>
		<?php echo $form->textField($model,'youtube_channel',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'youtube_channel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_video'); ?>
		<?php echo $form->textField($model,'first_video',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_video'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'remark'); ?>
		<?php echo $form->textArea($model,'remark',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remark'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seq'); ?>
		<?php echo $form->textField($model,'seq'); ?>
		<?php echo $form->error($model,'seq'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vw'); ?>
                                      <?php echo $form->dropDownList($model, 'vw',  
                                                                                array(
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->vw=>array('selected'=>true)))
                                                                                ) ?>
		<?php echo $form->error($model,'vw'); ?>
	</div>

	<div class="row buttons">
		<?php echo TbHtml::submitButton($model->isNewRecord ? '新增' : '更新', array('color' => TbHtml::BUTTON_COLOR_SUCCESS)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->