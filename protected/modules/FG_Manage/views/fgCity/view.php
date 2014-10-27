<?php
/* @var $this FgCityController */
/* @var $model FgCity */
?>

<?php
$this->breadcrumbs=array(
	'Fg Cities'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FgCity', 'url'=>array('index')),
	array('label'=>'Create FgCity', 'url'=>array('create')),
	array('label'=>'Update FgCity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FgCity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FgCity', 'url'=>array('admin')),
);
?>

<h1>View FgCity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'direction_id',
		'seq',
	),
)); ?>