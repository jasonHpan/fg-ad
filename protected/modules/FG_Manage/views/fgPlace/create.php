<?php
/* @var $this FgPlaceController */
/* @var $model FgPlace */
?>

<?php
$this->breadcrumbs=array(
	'Fg Places'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FgPlace', 'url'=>array('index')),
	array('label'=>'Manage FgPlace', 'url'=>array('admin')),
);
?>

<h1>Create FgPlace</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>