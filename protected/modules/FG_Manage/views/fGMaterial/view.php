<?php echo TbHtml::breadcrumbs(array(
    "素材設定"=>array("index"),
   '修改('.$model->id.')'=>array('update','id'=>$model->id),
    "檢視"
));?>


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