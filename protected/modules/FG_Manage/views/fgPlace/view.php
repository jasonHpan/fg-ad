<?php
/* @var $this FgPlaceController */
/* @var $model FgPlace */
?>

<?php
$this->breadcrumbs=array(
	'Fg Places'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List FgPlace', 'url'=>array('index')),
	array('label'=>'Create FgPlace', 'url'=>array('create')),
	array('label'=>'Update FgPlace', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FgPlace', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FgPlace', 'url'=>array('admin')),
);
?>

<h1>View FgPlace #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'place_type_id',
	),
)); ?>