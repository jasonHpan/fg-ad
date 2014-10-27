<?php
/* @var $this FgAreaController */
/* @var $model FgArea */
?>

<?php
$this->breadcrumbs=array(
	'Fg Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FgArea', 'url'=>array('index')),
	array('label'=>'Manage FgArea', 'url'=>array('admin')),
);
?>

<h1>Create FgArea</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>