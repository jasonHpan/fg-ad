<?php echo TbHtml::breadcrumbs(array(
    '個人資訊設定'=>array('index'),
    '詳細資料 - '.$model->uid
)); ?>

<?php echo TbHtml::linkButton('回列表', 
                                                        array(
                                                            'icon'=>'th-list',
                                                            'url'=>Yii::app()->createUrl('person/index')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('新增', 
                                                        array(
                                                            'icon'=>'plus',
                                                            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                            'url'=>Yii::app()->createUrl('person/create')
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('更新', 
                                                        array(
                                                            'icon'=>'pencil',
                                                            'color' => TbHtml::BUTTON_COLOR_WARNING,
                                                            'url'=>Yii::app()->createUrl('person/update', array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::button('刪除', 
                                                        array(
                                                            'loading' => '處理中...',
                                                            'icon'=>'trash',
                                                            'color' => TbHtml::BUTTON_COLOR_DANGER,
                                                            'onclick'=>'deleteAjax("'.Yii::app()->createUrl('person/delete',array('id'=>$model->id,'ajax'=>1)).'","'.$model->id.'","'.Yii::app()->createUrl('category/admin').'");',
                                                            'url'=>Yii::app()->createUrl('person/delete',array('id'=>$model->id))
                                                        )); 
?>&nbsp;
<?php echo TbHtml::linkButton('搜尋', 
                                                        array(
                                                            'icon'=>'search',
                                                            'color' => TbHtml::BUTTON_COLOR_INFO,
                                                            'url'=>Yii::app()->createUrl('person/admin')
                                                       )); ?>
<br><br>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                                      array(
                                            'name'=>'delay',
                                      ),
                                       array(
                                            'name'=>'news',
                                            'value'=>Yii::app()->params->vwStatus[$model->news]
                                      ),
                                      array(
                                            'name'=>'stock',
                                            'value'=>Yii::app()->params->vwStatus[$model->stock]
                                      ),
                                      array(
                                            'name'=>'lottery',
                                            'value'=>Yii::app()->params->vwStatus[$model->lottery]
                                      ),
                                      array(
                                            'name'=>'coupon',
                                            'value'=>Yii::app()->params->vwStatus[$model->coupon]
                                      ),
                                      array(
                                            'name'=>'luck',
                                            'value'=>Yii::app()->params->vwStatus[$model->luck]
                                      ),
                                      array(
                                            'name'=>'poll',
                                            'value'=>Yii::app()->params->vwStatus[$model->poll]
                                      ),
                                      array(
                                            'name'=>'weather',
                                            'value'=>Yii::app()->params->vwStatus[$model->weather]
                                      ),
            
	),
)); ?>
