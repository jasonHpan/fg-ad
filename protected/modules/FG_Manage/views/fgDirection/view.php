<?php
/* @var $this FgDirectionController */
/* @var $model FgDirection */
?>

<?php
$this->breadcrumbs=array(
	'Fg Directions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FgDirection', 'url'=>array('index')),
	array('label'=>'Create FgDirection', 'url'=>array('create')),
	array('label'=>'Update FgDirection', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FgDirection', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FgDirection', 'url'=>array('admin')),
);
?>

<h1>View FgDirection #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
	),
)); ?>