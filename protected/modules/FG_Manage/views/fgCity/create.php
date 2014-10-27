<?php
/* @var $this FgCityController */
/* @var $model FgCity */
?>

<?php
$this->breadcrumbs=array(
	'Fg Cities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FgCity', 'url'=>array('index')),
	array('label'=>'Manage FgCity', 'url'=>array('admin')),
);
?>

<h1>Create FgCity</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>