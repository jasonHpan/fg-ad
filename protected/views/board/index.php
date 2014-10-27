<?php echo TbHtml::breadcrumbs(array(
    '看板設定'=>'#',
    '列表'
)); ?>
<script type="text/javascript">
    $(document).ready(function(){
      
       
    });
</script>
<?php echo TbHtml::linkButton('新增', 
                                array(
                                    'icon'=>'plus',
                                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                    'url'=>Yii::app()->createUrl('board/create')
                                )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                array(
                                    'icon'=>'search',
                                    'color' => TbHtml::BUTTON_COLOR_INFO,
                                    'url'=>Yii::app()->createUrl('board/admin')
                               )); 
?>&nbsp;


<?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$dataProvider,
                'summaryText' => '',//顯示{start}-{end},一共{count}條紀錄
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
                        'name'=>'看板標題',
                        'value'=>'$data->title'
                    ), 
                     array(
                        'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                        'name'=>'看板內容',
                        'value'=>'$data->getContent()'
                    ), 
                      array(
                        'htmlOptions'=>array('width'=>"160px",'style'=>'text-align: center'),
                        'name'=>'右側看板圖片',
                        'type'=>'image',
                        'value'=>'(!empty($data->image))?(Board::$base_upload_photo_dir.$data->image):("沒有圖片")',
                    ), 
                    array(
                        'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                        'name'=>'日期',
                        'value'=>'$data->date_time'
                    ), 
                    array(
                        'htmlOptions'=>array('width'=>'80px','style'=>'text-align:center'),
                        'name'=>'前台背景顏色',
                        'value'=>'$data->frontend_color'
                    ),
                    array(
                        'htmlOptions'=>array('width'=>'80px','style'=>'text-align:center'),
                        'name'=>'前台圖片',
                        'value'=>'$data->frontend_image'
                    ),
                     array(
                        'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                        'name'=>'上下架',
                        'value'=>'$data->getStatus()'
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
));?>
