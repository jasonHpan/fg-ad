<?php echo TbHtml::breadcrumbs(array(
    '裝置設定'=>array('index'),
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
		'name',
		'mac',
		'device_type_id',
		'branch_id',
	),
)); ?>