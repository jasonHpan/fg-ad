<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><br>欄位前有 <span class="required">*</span> 為必填欄位<br></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'channel_id'); ?>
                                      <?php echo Channel::model()->findByPk($channel_id)->name?>
                                      <?php echo $form->hiddenField($model,'channel_id',array('value'=>$channel_id)); ?>
		<?php echo $form->error($model,'channel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_code'); ?>
		<?php echo $form->textField($model,'video_code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'video_code'); ?>
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