<?php
/* @var $this PersonController */
/* @var $model Person */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'person-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><br>欄位前有 <span class="required">*</span> 為必填欄位<br></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uid'); ?>
		<?php echo $form->textField($model,'uid'); ?>
		<?php echo $form->error($model,'uid'); ?>
	</div>
        
                   <div class="row">
		<?php echo $form->labelEx($model,'delay'); ?>
		<?php echo $form->textField($model,'delay'); ?>
		<?php echo $form->error($model,'delay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news'); ?>
		<?php echo $form->dropDownList($model, 'news',  
                                                                                array(
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->news=>array('selected'=>true)))                   
                                       )?>
		<?php echo $form->error($model,'news'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stock'); ?>
		<?php echo $form->dropDownList($model, 'stock',  
                                                                                array(
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->stock=>array('selected'=>true)))
                                                                               
                                       )?>
		<?php echo $form->error($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lottery'); ?>
		<?php echo $form->dropDownList($model, 'lottery',  
                                                                                array(
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->lottery=>array('selected'=>true)))
                                                                               
                                       )?>
		<?php echo $form->error($model,'lottery'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coupon'); ?>
		<?php echo $form->dropDownList($model, 'coupon',  
                                                                                array(
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->coupon=>array('selected'=>true)))
                                                                               
                                       )?>
		<?php echo $form->error($model,'coupon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'luck'); ?>
		<?php echo $form->dropDownList($model, 'luck',  
                                                                                array(
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->luck=>array('selected'=>true)))
                                                                               
                                       )?>
		<?php echo $form->error($model,'luck'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poll'); ?>
		<?php echo $form->dropDownList($model, 'poll',  
                                                                                array(
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->poll=>array('selected'=>true)))
                                                                               
                                       )?>
		<?php echo $form->error($model,'poll'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weather'); ?>
		<?php echo $form->dropDownList($model, 'weather',  
                                                                                array(
                                                                                    '1'=>'Y',
                                                                                    '0'=>'N',
                                                                                ),
                                                                                array('options' => array($model->weather=>array('selected'=>true)))
                                                                               
                                       )?>
		<?php echo $form->error($model,'weather'); ?>
	</div>

<!--	<div class="row">
		<?php // echo $form->labelEx($model,'update'); ?>
		<?php // echo $form->textField($model,'update'); ?>
		<?php // echo $form->error($model,'update'); ?>
	</div>-->
<?php echo $form->hiddenField($model,'upd',array('type'=>"hidden",'size'=>2,'maxlength'=>2,'value'=>1)); ?>
	<div class="row buttons">
		<?php echo TbHtml::submitButton($model->isNewRecord ? '新增' : '更新', array('color' => TbHtml::BUTTON_COLOR_SUCCESS)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->