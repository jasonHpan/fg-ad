<?php
/* @var $this FgUserController */
/* @var $model FgUser */
?>

<?php
$this->breadcrumbs=array(
	'Fg Users'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FgUser', 'url'=>array('index')),
	array('label'=>'Create FgUser', 'url'=>array('create')),
	array('label'=>'View FgUser', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FgUser', 'url'=>array('admin')),
);
?>

    <h1>Update FgUser <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>