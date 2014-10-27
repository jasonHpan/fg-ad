<?php
/* @var $this FgDeviceTypeController */
/* @var $model FgDeviceType */
?>

<?php
$this->breadcrumbs=array(
	'Fg Device Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FgDeviceType', 'url'=>array('index')),
	array('label'=>'Manage FgDeviceType', 'url'=>array('admin')),
);
?>

<h1>Create FgDeviceType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>