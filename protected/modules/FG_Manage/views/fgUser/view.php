<?php
/* @var $this FgUserController */
/* @var $model FgUser */
?>

<?php
$this->breadcrumbs=array(
	'Fg Users'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FgUser', 'url'=>array('index')),
	array('label'=>'Create FgUser', 'url'=>array('create')),
	array('label'=>'Update FgUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FgUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FgUser', 'url'=>array('admin')),
);
?>

<h1>View FgUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'account',
		'password',
		'level_id',
		'place_id',
		'branch_id',
	),
)); ?>