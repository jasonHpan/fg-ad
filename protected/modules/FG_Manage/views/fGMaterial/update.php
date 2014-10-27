<?php
/* @var $this FGMaterialController */
/* @var $model FGMaterial */
?>

<?php
$this->breadcrumbs=array(
	'Fgmaterials'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FGMaterial', 'url'=>array('index')),
	array('label'=>'Create FGMaterial', 'url'=>array('create')),
	array('label'=>'View FGMaterial', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FGMaterial', 'url'=>array('admin')),
);
?>

    <h1>Update FGMaterial <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>