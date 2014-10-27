<?php
/* @var $this FgUserController */
/* @var $model FgUser */
?>

<?php
$this->breadcrumbs=array(
	'Fg Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FgUser', 'url'=>array('index')),
	array('label'=>'Manage FgUser', 'url'=>array('admin')),
);
?>

<h1>Create FgUser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>