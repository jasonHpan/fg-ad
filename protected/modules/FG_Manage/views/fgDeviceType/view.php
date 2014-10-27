<?php
/* @var $this FgDeviceTypeController */
/* @var $model FgDeviceType */
?>

<?php
$this->breadcrumbs=array(
	'Fg Device Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FgDeviceType', 'url'=>array('index')),
	array('label'=>'Create FgDeviceType', 'url'=>array('create')),
	array('label'=>'Update FgDeviceType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FgDeviceType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FgDeviceType', 'url'=>array('admin')),
);
?>

<h1>View FgDeviceType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'remark',
	),
)); ?>