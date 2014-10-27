<?php

class DefaultController extends Controller
{
	private $url = "http://opendata.cwb.gov.tw/opendata/MFC/F-C0032-005.xml";
	private $city_arr = array();
	private $tempature_arr = array();
	private $weather_type = array();
	private $type_id = array();
	private $flag=0;
	private $cityflag=0;
	private $photo_arr = array();
	private $result_arr = array();
	private $output_arr = array(); //輸出特定城市當天天氣狀況
	private $write_arr = array();  //寫入一周天氣狀態
	private $more_today_arr = array(); 
	private $more_week_arr = array();
	public function actionIndex()
	{
		$city_id = trim($_GET['city_id']);
		$getcity = "";
		$getweek = trim($_GET['weekday']);
		$this->getXML();
		// var_dump($city_id);
		if($city_id=="" || !is_numeric($city_id) || $getweek=="" || !is_numeric($getweek)){
			$city_id  = 1;
			$city_name ="臺北市";
			$getweek  = $this->get_chinese_weekday(date("Y-m-d H:i:s"));
			$getcity = "empty";
		}else{
			$model = City::model()->findByPk($city_id);
			$city_name = $model->city_name;
			switch ($getweek) {
				case '1':
					$getweek = "一";
				break;
				case '2':
					$getweek = "二";
				break;
				case '3':
					$getweek = "三";
				break;
				case '4':
					$getweek = "四";
				break;
				case '5':
					$getweek = "五";
				break;
				case '6':
					$getweek = "六";
				break;
				case '7':
					$getweek = "日";
				break;
				default:
					$getweek = "一";
				break;
			}
			$getcity = "hasvalue";
			// $getweek = $this->get_chinese_weekday(date("Y-m-d H:i:s"));//現在星期幾
			
		}
		
		

		foreach ($this->result_arr as $key => $value) {
			// 取得特定日期(限制星期和城市)
			if($value['weekday']==$getweek && $value['city_name']==$city_name){
				$this->output_arr=array(
					                    "city_id" => $city_id,
										"city_name"=>$value['city_name'],
										"photo"=>$value['photo'],
										"weekday"=>$value['weekday'],
										"average_temp"=>$value['average_temp'],
										"max_c"=>$value['max_c'],
										"min_c"=>$value['min_c'],
										"time"=>$value['time'],
										"text"=>$value['text'],
										"index"=>$value['index']
						 		    );	
			}
			
			
			
		}
		

		
		$this->render('index',array('city_arr'=>$this->output_arr,"getweek"=>$getweek,"getcity"=>$getcity));
	}
	public  function actionUpdateWeek($isMore=""){
		$this->getXML();
		
		foreach ($this->write_arr as $key => $value) {
			$model = Weather::model()->find("city_id=:city_id and date_time=:date_time",array(":city_id"=>$value['city_id'],":date_time"=>$value['time']));
			if(!$model){
				$Weather = new Weather();
				$Weather->city_id = $value['city_id'];
				$Weather->temperature = $value['min_c'].",".
										$value['average_temp'].",".
										$value['max_c'];
				//找出weather_type天氣狀態id
				$type_model = WeatherType::model()->find("value=:val",array(":val"=>$value['index']));
				$Weather->type_id = $type_model->id; 	
				$Weather->date_time = $value['time'];					
				
				$Weather->save();
			}else{
				$model->city_id = $value['city_id'];
				$model->temperature = $value['min_c'].",".
									  $value['average_temp'].",".
									  $value['max_c'];
									  //找出weather_type天氣狀態id
				$type_model = WeatherType::model()->find("value=:val",array(":val"=>$value['index']));
				$model->type_id = $type_model->id; 
				$model->update();
			}
		}
		if($isMore==""){
			echo "更新完畢";
		}else{
			// $page = $_SERVER['PHP_SELF'];
			// $sec = "1";
			// header("Refresh: $sec; url=$page");
			// header("Location: $url");
		}
	}
	public function actionMore(){
		$city_id = trim($_GET['city_id']);
		$weekday = trim($_GET['weekday']);
		$today = date("Y-m-d");
		// 取得一周資料
		$weekModel = Weather::model()->findAll("city_id=:city_id and date_time>=:date_time limit 7",array(":city_id"=>$city_id,":date_time"=>$today));
		if(count($weekModel)<7){
			$this->actionUpdateWeek($isMore="more");
		}

		foreach ($weekModel as $key => $value) {
			$photo = $value->getRelated('type')->photo;
			$time = "&nbsp;&nbsp;週".$this->get_chinese_weekday($value->date_time);
			$this->more_week_arr[]=array(
				                        "photo"=>$photo,
				                        "time"=> $time,
				                   );
		}
		// 取得當天資料
		$todayModel = Weather::model()->find("city_id=:city_id and date_time=:date_time",array(":city_id"=>$city_id,":date_time"=>date("Y-m-d")));
		$city_name = $todayModel->getRelated('city')->city_name;
		$photo = $todayModel->getRelated('type')->photo;
		$time = $this->get_chinese_weekday($todayModel->date_time);
		$temperature = $todayModel->temperature;
		$this->more_today_arr=array(
                                   "city_name"=>$city_name,
                                   "photo"=>$photo,
                                   "time"=>$time,
                                   "temperature"=>$temperature,
			                  );
		
		$this->render('more',array("today_arr"=>$this->more_today_arr,"week_arr"=>$this->more_week_arr));
	}
	public static function get_chinese_weekday($datetime)
	{
	    $weekday  = date('w', strtotime($datetime));
	    $weeklist = array('日', '一', '二', '三', '四', '五', '六');
	    return '' . $weeklist[$weekday];
	}
	public function getXML($method=''){
		// echo $method=="updateWeather";
		$xml_file = simplexml_load_file($this->url);
		// // 找22個縣市的資料
		foreach ($xml_file->data->location as $key => $value) {
			// var_dump($value);
			$this->city_arr[$this->cityflag] = (string)$value->name;
			// $this->tempature_arr[]=$value->time->value;
			$str = "weather-elements";


			//找一周內的天氣狀況，分早上和晚上(共14個)
			for($i=0;$i<14;$i++){
				// 取得濕度資料
				$start = (string)$value->$str->Wx->time[$i]->attributes()->start;
				$start = substr($start, 0,10);
				$weekday = $this->get_chinese_weekday($start);
				$text  = (string)$value->$str->Wx->time[$i]->text;
				$index = (string)$value->$str->Wx->time[$i]->value;
				// 取得最高及最低溫度
				$max_c = (int)$value->$str->MaxT->time[$i]->value;
				$min_c = (int)$value->$str->MinT->time[$i]->value;
				$average_temp = ($max_c+$min_c)/2;
				// 關聯資料庫內有的資料
				$typeModel = WeatherType::model()->find("value=:val",array(":val"=>$index));
				$photo = $typeModel->photo;

				// 判斷是哪一個方法呼叫
				if($method=="updateWeather"){
					$this->result_arr[] = array(
										"city_name"=>(string)$value->name,
										"photo"=>$photo,
										"weekday"=>$weekday,
										"average_temp"=>$average_temp,
										"max_c"=>$max_c,
										"min_c"=>$min_c,
										"index"=>$index,
										"text"=>$text 
									);
					
				}else{
					// echo $index."|".$i."<br/>";
					// 取白天的資料
					if($i%2==0){
						$this->result_arr[] = array(
										"city_name"=>(string)$value->name,
										"photo"=>$photo,
										"weekday"=>$weekday,
										"average_temp"=>$average_temp,
										"max_c"=>$max_c,
										"min_c"=>$min_c,
										"time"=>$start,
										"index"=>$index,
										"text"=>$text 
									);
						// 生成各城市一周資料
						$cityModel = City::model()->find("city_name=:city_name",array(":city_name"=>(string)$value->name));
						// var_dump($cityModel->id);
						$this->write_arr[] = array(
					                    "city_id" => $cityModel->id,
										"city_name"=>(string)$value->name,
										"photo"=>$photo,
										"weekday"=>$weekday,
										"average_temp"=>$average_temp,
										"max_c"=>$max_c,
										"min_c"=>$min_c,
										"time"=>$start,
										"text"=>$text,
										"index"=>$index
						 		    );
						
					}
				}
				
				$this->flag++;
			}
			$this->cityflag++;
		}
	}
	public function actionParseXML(){
		
		$this->getXML();
		// var_dump($this->result_arr);
		
	}
	public function actionUpdateWeather(){
		
		$this->getXML($method='updateWeather');
		
		foreach ($this->result_arr as $key => $value) {
			// 判斷是否已存在天氣類型資料表中
			// var_dump($value['index']);
			$model = WeatherType::model()->findAll('value=:val',array(":val"=>$value['index']));
			// 不存在則加入
			if(!$model){
				$newType = new WeatherType();
				$newType->name=$value['text'];
				$newType->value=$value['index'];
				$newType->save();
			}
		}

	}
}