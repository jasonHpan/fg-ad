<?php echo TbHtml::breadcrumbs(array(
    '個人資訊設定'=>'#',
    '列表'
)); ?>

<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('person/create')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('person/admin')
                                                       )); ?>

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
                                                        array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                            'name'=>'uid',
                                                            'value'=>'$data->uid',
                                                        ),
                                                         array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"80px",'style'=>'text-align: center'),
                                                            'name'=>'delay',
                                                            'value'=>'$data->delay',
                                                        ),
                                                        array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
                                                            'name'=>'news',
                                                            'value'=>'Yii::app()->params->vwStatus[$data->news]',
                                                        ),
                                                        array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
                                                            'name'=>'stock',
                                                            'value'=>'Yii::app()->params->vwStatus[$data->stock]',
                                                        ),
                                                        array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
                                                            'name'=>'lottery',
                                                            'value'=>'Yii::app()->params->vwStatus[$data->lottery]',
                                                        ),
                                                        array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
                                                            'name'=>'coupon',
                                                            'value'=>'Yii::app()->params->vwStatus[$data->coupon]',
                                                        ),
                                                        array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
                                                            'name'=>'luck',
                                                            'value'=>'Yii::app()->params->vwStatus[$data->luck]',
                                                        ),
                                                        array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
                                                            'name'=>'poll',
                                                            'value'=>'Yii::app()->params->vwStatus[$data->poll]',
                                                        ),
                                                        array(            // display 'create_time' using an expression
                                                            'htmlOptions'=>array('width'=>"40px",'style'=>'text-align: center'),
                                                            'name'=>'weather',
                                                            'value'=>'Yii::app()->params->vwStatus[$data->weather]',
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
