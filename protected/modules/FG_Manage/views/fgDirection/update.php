<?php
/* @var $this FgDirectionController */
/* @var $model FgDirection */
?>

<?php
$this->breadcrumbs=array(
	'Fg Directions'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FgDirection', 'url'=>array('index')),
	array('label'=>'Create FgDirection', 'url'=>array('create')),
	array('label'=>'View FgDirection', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FgDirection', 'url'=>array('admin')),
);
?>

    <h1>Update FgDirection <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>