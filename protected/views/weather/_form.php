<?php
/* @var $this WeatherController */
/* @var $model Weather */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'weather-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note"><br>欄位前有 <span class="required">*</span> 為必填欄位<br></p>

        <?php echo $form->errorSummary($model); ?>
        <div class="row">
             <?php echo $form->labelEx($model,'city_id'); ?>
             <?php echo $form->dropDownList($model, 'city_id',  
                                            CHtml::listData(City::model()->findAll(), 'id', 'city_name'),
                                            array('options' => array($model->city_id=>array('selected'=>true)))
                                            ) ?>
            <?php echo $form->error($model,'city_id'); ?>
        </div>  
        <div class="row">
        <?php echo $form->labelEx($model,'date_time',array('span'=>3)); ?>
        <?php $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                    'name' => 'date_time',
                    'value'=> date("Y-m-d"),
                    'pluginOptions' => array(
                        'format' => 'yyyy-mm-dd',
                        'country' => 'Taiwan',
                        'language' => 'zh-TW',
                    )
                ))?>
            
            <?php echo $form->error($model,'date_time'); ?>
        </div>
         <div class="row">
             <?php echo $form->labelEx($model,'type_id'); ?>
             <?php echo $form->dropDownList($model, 'type_id',  
                                            CHtml::listData(WeatherType::model()->findAll(), 'id', 'name'),
                                            array('options' => array($model->city_id=>array('selected'=>true)))
                                            ) ?>
             <?php echo $form->error($model,'type_id'); ?>
        </div>  
          
        <div class="row buttons">
            <?php echo TbHtml::submitButton($model->isNewRecord ? '新增' : '更新', array('color' => TbHtml::BUTTON_COLOR_SUCCESS)); ?>
        </div>
        

    <?php $this->endWidget(); ?>

</div><!-- form -->