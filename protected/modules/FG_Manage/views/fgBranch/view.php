<?php
/* @var $this FgBranchController */
/* @var $model FgBranch */
?>

<?php
$this->breadcrumbs=array(
	'Fg Branches'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FgBranch', 'url'=>array('index')),
	array('label'=>'Create FgBranch', 'url'=>array('create')),
	array('label'=>'Update FgBranch', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FgBranch', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FgBranch', 'url'=>array('admin')),
);
?>

<h1>View FgBranch #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'place_id',
		'city_id',
		'area_id',
	),
)); ?>