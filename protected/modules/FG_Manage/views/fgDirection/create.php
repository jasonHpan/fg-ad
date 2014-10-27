<?php
/* @var $this FgDirectionController */
/* @var $model FgDirection */
?>

<?php
$this->breadcrumbs=array(
	'Fg Directions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FgDirection', 'url'=>array('index')),
	array('label'=>'Manage FgDirection', 'url'=>array('admin')),
);
?>

<h1>Create FgDirection</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>