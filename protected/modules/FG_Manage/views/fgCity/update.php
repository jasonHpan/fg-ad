<?php
/* @var $this FgCityController */
/* @var $model FgCity */
?>

<?php
$this->breadcrumbs=array(
	'Fg Cities'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FgCity', 'url'=>array('index')),
	array('label'=>'Create FgCity', 'url'=>array('create')),
	array('label'=>'View FgCity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FgCity', 'url'=>array('admin')),
);
?>

    <h1>Update FgCity <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>