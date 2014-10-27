<?php
/* @var $this FgAreaController */
/* @var $model FgArea */
?>

<?php
$this->breadcrumbs=array(
	'Fg Areas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FgArea', 'url'=>array('index')),
	array('label'=>'Create FgArea', 'url'=>array('create')),
	array('label'=>'View FgArea', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FgArea', 'url'=>array('admin')),
);
?>

    <h1>Update FgArea <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>