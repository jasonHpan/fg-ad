<?php
/* @var $this ChannelAdController */
/* @var $model ChannelAd */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'channel-ad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
                   'htmlOptions' => array('enctype' => 'multipart/form-data'),
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
		<?php echo $form->labelEx($model,'photo'); ?>
		<?php echo $form->fileField($model, 'photo');?>
		<?php echo $form->error($model,'photo'); ?>
	</div>
        
                <div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url'); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'s_date'); ?>
		<?php echo $form->textField($model,'s_date'); ?>
		<?php echo $form->error($model,'s_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'e_date'); ?>
		<?php echo $form->textField($model,'e_date'); ?>
		<?php echo $form->error($model,'e_date'); ?>
	</div>
        
                <div class="row">
		<?php echo $form->labelEx($model,'vw'); ?>
		<?php echo $form->dropDownList($model, 'vw',  
                                                                                array(
                                                                                    '1'=>'上架',
                                                                                    '0'=>'下架',
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