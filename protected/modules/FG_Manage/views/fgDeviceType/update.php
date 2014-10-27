<?php
/* @var $this FgDeviceTypeController */
/* @var $model FgDeviceType */
?>

<?php
$this->breadcrumbs=array(
	'Fg Device Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FgDeviceType', 'url'=>array('index')),
	array('label'=>'Create FgDeviceType', 'url'=>array('create')),
	array('label'=>'View FgDeviceType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FgDeviceType', 'url'=>array('admin')),
);
?>

    <h1>Update FgDeviceType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>