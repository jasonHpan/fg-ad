<?php echo TbHtml::breadcrumbs(array(
    '分店設定'=>'#',
    '列表'
)); ?>

<?php echo TbHtml::linkButton('新增', 
                    array(
                        'icon'=>'plus',
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                        'url'=>Yii::app()->createUrl('/FG_Manage/FgBranch/create')
                    )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                    array(
                        'icon'=>'search',
                        'color' => TbHtml::BUTTON_COLOR_INFO,
                        'url'=>Yii::app()->createUrl('/FG_Manage/FgBranch/admin')
                   )); ?>


<?php $this->widget('zii.widgets.grid.CGridView',array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
           'htmlOptions'=>array('width'=>"20px",'style'=>'text-align: center'),
            'name'=>'流水號',
            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
        ),
        array(
        	'htmlOptions'=>array('width'=>"20px",'style'=>'text-align: center'),
        	'name'=>'分店名稱',
        	'value'=>'$data->name',
        ),
        array(
        	'htmlOptions'=>array('width'=>"20px",'style'=>'text-align: center'),
        	'name'=>'通路名稱',
        	'value'=>'$data->place->name',
        ),
        // array(
        // 	'htmlOptions'=>array('width'=>"20px",'style'=>'text-align: center'),
        // 	'name'=>'縣市名稱',
        // 	'value'=>'$data->area->name',
        // ),
        array(
        	'htmlOptions'=>array('width'=>"20px",'style'=>'text-align: center'),
        	'name'=>'分店位置',
        	'value'=>'$data->area->name',
        ),
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
	),
)); ?>