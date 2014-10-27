<?php echo TbHtml::breadcrumbs(array(
    '素材管理'=>'#',
    '新增素材'
)); ?>



<h1>Create FGMaterial</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>