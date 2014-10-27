<?php echo TbHtml::breadcrumbs(array(
    '方位設定'=>'#',
    '列表'
)); ?>

<?php echo TbHtml::linkButton('新增', 
                    array(
                        'icon'=>'plus',
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                        'url'=>Yii::app()->createUrl('/FG_Manage/FgDirection/create')
                    )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                    array(
                        'icon'=>'search',
                        'color' => TbHtml::BUTTON_COLOR_INFO,
                        'url'=>Yii::app()->createUrl('/FG_Manage/FgDirection/admin')
                   )); ?>


<?php 
$gridColumns = array(
					array(
				           'htmlOptions'=>array('width'=>"20px",'style'=>'text-align: center'),
				            'name'=>'流水號',
				            'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
			        ),
			        array(
			        	'htmlOptions'=>array('width'=>"20px",'style'=>'text-align: center'),
			        	'name'=>'方位',
			        	'value'=>'$data->name',
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
        		);
?>
<?php $this->widget('zii.widgets.grid.CGridView',array(
	  'dataProvider'=>$dataProvider,
	  'columns'=>$gridColumns,
));?>
<?php 
// $this->widget('bootstrap.widgets.TbListView',array(
// 	'dataProvider'=>$dataProvider,
// 	'itemView'=>'_view',
// )); ?>