<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
                                                                            array('label'=>'方位設定', 'url'=>array('/FG_Manage/FgDirection/index'),'active' => $this->main_menu == 'fgdirection' ? true : false),		             
                                                                            array('label'=>'縣市設定', 'url'=>array('/FG_Manage/FgCity/index'),'active' => $this->main_menu == 'fgcity' ? true : false),
                                                                            array('label'=>'地區設定', 'url'=>array('/FG_Manage/FgArea/index'),'active' => $this->main_menu == 'fgarea' ? true : false),
                                                                            array('label'=>'素材設定', 'url'=>array('/FG_Manage/fGMaterial/index'),'active' => $this->main_menu == 'fgmaterial' ? true : false),
                                                                            array('label'=>'通路設定', 'url'=>array('/FG_Manage/FgPlace/index'),'active' => $this->main_menu == 'fgplace' ? true : false),
                                                                            array('label'=>'分店設定', 'url'=>array('/FG_Manage/FgBranch/index'),'active' => $this->main_menu == 'fgbranch' ? true : false),
                                                                            array('label'=>'裝置類型設定', 'url'=>array('/FG_Manage/FgDeviceType/index'),'active' => $this->main_menu == 'fgdevicetype' ? true : false),
                                                                            array('label'=>'裝置設定', 'url'=>array('/FG_Manage/FgDevice/index'),'active' => $this->main_menu == 'fgdevice' ? true : false),
                                                                            array('label'=>'通路類型設定', 'url'=>array('/FG_Manage/FgPlaceType/index'),'active' => $this->main_menu == 'fgplacetype' ? true : false),                                            
                                                                            array('label'=>'品牌設定', 'url'=>array('/FG_Manage/FgBrand/index'),'active' => $this->main_menu == 'fgbrand' ? true : false),		             
                                                                            //array('label'=>'廣告設定', 'url'=>array('/FG_Manage/FgAds/index'),'active' => $this->main_menu == 'fgads' ? true : false),                                                  
                                                                            array('label'=>'會員設定', 'url'=>array('/FG_Manage/FGMember/index'),'active' => $this->main_menu == 'default' ? true : false),                                            
                                                                            array('label'=>'等級設定', 'url'=>array('/FG_Manage/FgLevel/index'),'active' => $this->main_menu == 'fglevel' ? true : false),
                                                                            array('label'=>'功能設定', 'url'=>array('/FG_Manage/FgFunction/index'),'active' => $this->main_menu == 'fgfunction' ? true : false),
                                                                            array('label'=>'權限設定', 'url'=>array('/FG_Manage/FgPermission/index'),'active' => $this->main_menu == 'fgpermission' ? true : false),          
                                                                            array('label'=>'程式修改紀錄', 'url'=>array('/FG_Manage/FGDBLog/index'),'active' => $this->main_menu == 'fglog' ? true : false),
                                                                            // array('label'=>'分店權限設定', 'url'=>array('/FG_Manage/FgCtrlBranch/index'),'active' => $this->main_menu == 'fgctrlbranch' ? true : false),       
                                                                            //array('label'=>'User設定', 'url'=>array('/FG_Manage/FgUser/index'),'active' => $this->main_menu == 'fguser' ? true : false),			             
			),
)); ?>