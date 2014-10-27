<?php
/* @var $this FgPlaceController */
/* @var $model FgPlace */
?>

<?php
$this->breadcrumbs=array(
	'Fg Places'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FgPlace', 'url'=>array('index')),
	array('label'=>'Create FgPlace', 'url'=>array('create')),
	array('label'=>'View FgPlace', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FgPlace', 'url'=>array('admin')),
);
?>

    <h1>Update FgPlace <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>