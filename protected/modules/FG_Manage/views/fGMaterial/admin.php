<?php echo TbHtml::breadcrumbs(array(
	"素材設定"=>array('index'),
	"搜尋"
));?>

<?php

$gridColumns = array(
	array('name'=>'id', 'header'=>'流水號', 'htmlOptions'=>array('style'=>'width: 60px')),
	array('name'=>'name', 'header'=>'素材名稱'),
	array('name'=>'type', 'header'=>'素材類型'),
	array('name'=>'image','type'=>'image', 'value'=>'$data->getImagePath()','header'=>'素材圖片','htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center')),
	array('name'=>'url', 'header'=>'素材URL'),
	array(            // display a column with "view", "update" and "delete" buttons
            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
            'class'=>'CButtonColumn',
            'deleteConfirmation'=>'確定刪除此項目嗎?',
            'buttons'=>array(
                        'view'=>array(
                                                    'label'=>'詳細資料',
                                        ),
                        'update'=>array(
                                   'label'=>'更新',
                       ),
                        'delete'=>array(
                                                    'label'=>'刪除',
                                                    ),
                        ),
        ),
	
);
?>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	'id'=>'fg-area-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>$gridColumns,
)); ?>
