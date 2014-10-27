<?php 
$FgCityModel = FgCity::model()->findAll(); 
$cityArr = array();
$directionArr = array();
foreach ($FgCityModel as $key => $value) {
   $cityArr[$value->name] = $value->name;
}
$FgDirectionModel = FgDirection::model()->findAll();
foreach ($FgDirectionModel as $key => $value) {
    $directionArr[$key+1] = $value->name;
}
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'fg-city-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    
    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5,"disalbed"=>"disalbed")); ?>
    <?php echo (!$model->isNewRecord)?( $form->dropDownListControlGroup($model,'name',$cityArr,array('empty'=>"請選擇縣市","disabled"=>"disalbed"))):( $form->textFieldControlGroup($model,'name',array('span'=>5))); ?>
    <?php echo $form->dropDownListControlGroup($model,'direction_id',$directionArr,array('empty'=>"請選擇區域")); ?>
    <?php echo $form->textFieldControlGroup($model,'seq',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    $(document).ready(function(){
        var optionSelected = <?=$model->id?>;
        $("select#FgCity_name option").eq(optionSelected).attr('selected','selected');
        
    });
</script>