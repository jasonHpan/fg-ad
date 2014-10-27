<?php
/* @var $this FgAreaController */
/* @var $model FgArea */
?>

<?php
$this->breadcrumbs=array(
	'Fg Areas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FgArea', 'url'=>array('index')),
	array('label'=>'Create FgArea', 'url'=>array('create')),
	array('label'=>'Update FgArea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FgArea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FgArea', 'url'=>array('admin')),
);
?>

<h1>View FgArea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'seq',
		'city_id',
	),
)); ?>