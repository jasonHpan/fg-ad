<?php
/* @var $this BoardController */
/* @var $model Board */
/* @var $form TbActiveForm */
?>

<div class="form">

<?php 
    $baseUrl = Yii::app()->baseUrl; 
    $baseUrl = "http://www.jowinwin.com";
    // echo $baseUrl;
    // var_dump($_SERVER);
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile($baseUrl.'/../js/CLEditor/jquery.cleditor.js');
    $cs->registerScriptFile($baseUrl.'/../js/CLEditor/cleditor-imageupload-plugin.js');
    $cs->registerScriptFile($baseUrl.'/../js/jquery.preimage.js');
    $cs->registerCssFile($baseUrl.'/../js/CLEditor/jquery.cleditor.css');
    $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        	'id'=>'board-form',
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
        <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'title'); ?>
    </div> 
    <div class="row">
        <?php echo $form->textAreaControlGroup($model,'content',array('rows'=>6,'span'=>8)); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>         
    <div class="row">
        <?php if(!$model->isNewRecord && $model->getImage()!="/../images/board/"){echo "<img src='".$model->getImage()."' />";}?>
        <?php if($model->getImage()=="/../images/board/"){echo "<span style='color:red'>*尚未上傳前台圖片!</span>";}?>
        <?php echo $form->fileFieldControlGroup($model,'image'); ?>
        <?php echo $form->error($model,'image'); ?>
    </div> 
    <div class="row">
        <?php if(!$model->isNewRecord && $model->getFrontendImage()!="/images/board/"){echo "<img src'".$model->getFrontendImage()."'/>";}?>
        <?php if($model->getFrontendImage()=="/images/board/"){echo "<span style='color:red'>*尚未上傳前台圖片!</span>";}?>
        <?php echo $form->fileFieldControlGroup($model,'frontend_image');?>
        <?php echo $form->error($model,'frontend_image');?>
    </div>
    <div class="row">
        <?php echo $form->textFieldControlGroup($model,'frontend_color');?>
        <?php echo $form->error($model,'frontend_color');?>
    </div>
    <div class="row">
         <?php echo $form->radioButtonListControlGroup($model,'status',array('上架','下架')); ?>
        <?php echo $form->error($model,'status'); ?>
    </div> 
           
    <div class="row buttons">
        <?php echo TbHtml::submitButton($model->isNewRecord ? '新增' : '更新', array('color' => TbHtml::BUTTON_COLOR_SUCCESS)); ?>
    </div>
     

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
    //文字編輯器
$(function(){
    editor=$("#Board_content").cleditor({width:"100%", height:"100%"})[0];
    // $('#contentcontainer').css({"margin-left":"-150px"});
    $.cleditor.buttons.image.uploadUrl = '<?=Yii::app()->createUrl("product/imageUpload")?>';
});
</script>