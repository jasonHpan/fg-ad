<?php echo TbHtml::breadcrumbs(array(
    '素材管理'=>'#',
    '列表'
)); ?>

<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('/FG_Manage/fGMaterial/create')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('/FG_Manage/fGMaterial/admin')
                                                       )); ?>


<h1>素材設定</h1>

<?php $this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$dataProvider,
    'pager'=>array(
                'prevPageLabel' =>'上一頁',
                'firstPageLabel' => '首頁', 
                'nextPageLabel' => '下一頁',
                'lastPageLabel' => '末頁',
                'header' => '',
     ),
    'columns'=>array(
        array(
           'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
            'name'=>'流水號',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
            'name'=>'素材名稱',
            'value'=>'$data->name'
        ), 
          array(
            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
            'name'=>'素材類型',
            'value'=>'$data->type'
        ), 
       array(
            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
            'name'=>'素材圖片',
            'type'=>'image',
            'value'=>'$data->getImagePath()'
        ), 
         array(
            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
            'name'=>'素材網址',
            'value'=>'$data->url'
        ), 
      array(            // display a column with "view", "update" and "delete" buttons
                    'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
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
    ),
)); ?>
<?php 
// $this->widget('bootstrap.widgets.TbListView',array(
// 	'dataProvider'=>$dataProvider,
// 	'itemView'=>'_view',
// )); ?>