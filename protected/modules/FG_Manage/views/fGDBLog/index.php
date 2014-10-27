<?php echo TbHtml::breadcrumbs(array(
    '程式修改紀錄'=>'#',
    '列表'
)); ?>

<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('/FG_Manage/FGDBLog/create')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('/FG_Manage/FGDBLog/admin')
                                                       )); ?>

<?php 
$this->widget('zii.widgets.grid.CGridView',array(
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
            'name'=>'操作名稱',
            'value'=>'$data->name'
        ), 
            array(
            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
            'name'=>'更新日期',
            'value'=>'$data->updatedate'
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
	// 'itemView'=>'_view',
)); ?>
<?php 
// $this->widget('bootstrap.widgets.TbListView',array(
// 	'dataProvider'=>$dataProvider,
// 	'itemView'=>'_view',
// )); ?>