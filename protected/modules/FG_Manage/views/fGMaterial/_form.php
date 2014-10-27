<?php
/* @var $this FGMaterialController */
/* @var $model FGMaterial */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'fgmaterial-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textAreaControlGroup($model,'name',array('rows'=>6,'span'=>8)); ?>

    <?php echo $form->textFieldControlGroup($model,'type',array('span'=>5,'maxlength'=>10)); ?>

    <div class="row">
        <?php if(!$model->isNewRecord && $model->getImage()!="/../images/material/"){echo "<img src='".$model->getImagePath()."' />";}?>
        <?php if($model->getImage()=="/../images/material/"){echo "<span style='color:red'>*尚未上傳素材圖片!</span>";}?>
        <?php echo $form->fileFieldControlGroup($model,'image'); ?>
        <?php echo $form->error($model,'image'); ?>
    </div>

    <?php echo $form->textFieldControlGroup($model,'url',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->