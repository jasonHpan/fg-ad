<?php
/* @var $this FgBranchController */
/* @var $model FgBranch */
?>

<?php
$this->breadcrumbs=array(
	'Fg Branches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FgBranch', 'url'=>array('index')),
	array('label'=>'Manage FgBranch', 'url'=>array('admin')),
);
?>

<h1>Create FgBranch</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>