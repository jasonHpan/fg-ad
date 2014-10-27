<?php
/* @var $this FGMaterialController */
/* @var $model FGMaterial */
?>

<?php
$this->breadcrumbs=array(
	'Fgmaterials'=>array('index'),
	$model->name,
);


?>
<?php echo TbHtml::linkButton('更新', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('/FG_Manage/fGMaterial/update',array("id"=>$model->id))
                                                        )); 
      echo "&nbsp;&nbsp;";
      echo TbHtml::linkButton('刪除', 
                                                        array(
                                                            'id'=>"deleteMaterial",
                                                            'icon'=>'minus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            //'url'=>Yii::app()->createUrl('/FG_Manage/fGMaterial/delete',array("id"=>$model->id))
                                                        )); 
?>&nbsp;
<h1>View FGMaterial #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'type',
        (!$model->getImagePath())?("image"):(array('label'=>"image",'type'=>'image','value'=>$model->getImagePath())),
        'url',
	),
)); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#deleteMaterial').click(function(){
            var isDelete = confirm("確定刪除此素材?");
            var url = <?="'".Yii::app()->createUrl('/FG_Manage/fGMaterial/delete',array("id"=>$model->id))."'"?>;
            if(isDelete){
                $.ajax({
                  type: "POST",
                  url: url,
                  success: function(){
                    alert('刪除成功!');
                    setTimeout(function(){history.go(-2);},1000);
                  }
                });
            }
        });
    });
</script>