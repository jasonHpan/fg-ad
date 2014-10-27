<?php echo TbHtml::breadcrumbs(array(
    '功能設定'=>array('index'),
    '修改('.$model->id.')'=>array('update','id'=>$model->id),
    '檢視'
)); ?>
<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'function_id',
		'name',
		'seq',
	),
)); ?>