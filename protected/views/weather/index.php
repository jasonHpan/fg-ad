<?php echo TbHtml::breadcrumbs(array(
    '天氣設定'=>'#',
    '列表'
)); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $("a#refresh").click(function(){
             var url = "<?=Yii::app()->createUrl('TVLayout/Default/UpdateWeek')?>";
            $.get( url, function( data ) {
              // $( ".result" ).html( data );
              alert( "更新完畢!" );
              location.reload();
            });
        });
       
    });
</script>
<?php echo TbHtml::linkButton('新增', 
                                array(
                                    'icon'=>'plus',
                                    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                    'url'=>Yii::app()->createUrl('weather/create')
                                )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                array(
                                    'icon'=>'search',
                                    'color' => TbHtml::BUTTON_COLOR_INFO,
                                    'url'=>Yii::app()->createUrl('weather/admin')
                               )); 
?>&nbsp;
<?php echo TbHtml::linkButton('更新', 
                                array(
                                    'id'=>'refresh',
                                    'icon'=>'refresh',
                                    'color' => TbHtml::BUTTON_COLOR_INFO,
                                    // 'url'=>Yii::app()->createUrl('TVLayout/Default/UpdateWeek')
                               )); 
?>

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
                                                            'name'=>'日期',
                                                            'value'=>'$data->date_time'
                                                        ),  
                                                        array(
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                            'name'=>'城市名',
                                                            'value'=>'$data->getRelated("city")->city_name'
                                                        ),          // display the 'title' attribute
                                                         array(
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                            'name'=>'天氣類型',
                                                            'value'=>'$data->getRelated("type")->name'
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
