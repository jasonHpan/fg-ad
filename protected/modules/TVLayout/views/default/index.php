<?php 

$time="";
if($getcity=="empty"){
    // 取得現在時間
    $arr = explode(' ', date('Y-m-d H:i:s'));
    $pre_date = explode('-', $arr[0]);
    $post_date = explode(':', $arr[1]);
   if($post_date[0]>12){
        $post_date[0] = $post_date[0]-12;
        $time = "PM";
    }else{
        $time = "AM";
    }
}else if($getcity=="hasvalue"){
    $pre_date = explode('-', $city_arr['time']);
   
}

$weekday = $getweek;
$weeklist = array( '一', '二', '三', '四', '五', '六','日');
$weekindex = array_search($weekday, $weeklist);

?>
<!DOCTYPE HTML>
<html>
    <meta charset="utf-8">
    <title>2.2.1天氣預報內容頁</title>
    <style>
        body{
            margin:0px;
            /*padding:5px;*/
            font-family: '微軟正黑體';
            font-size:40px;
            color:#000;
            font-weight: bold;
        }
        #person-block{
            width:100%;
            height:260px;
            overflow-y: hidden;
            background: #000B18 url('images/bg.png') no-repeat 0px -820px;
        }
        #person-block .person-item{
            height:260px;
            display:block;
        }
    </style>
     <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var getcity = "<?=$getcity?>";
        var today = "<?=$weekday?>";
        var position = $('#right_week_div div');
        var index ="<?=$weekindex?>";
        if(getcity=="hasvalue"){
            $("div#mid_date").css({"margin-top":"72px"});
        }
        switch(today){
            case "一":
                position.eq(index).css({"background-color":"#fff"});
            break;
            case "二":
                position.eq(index).css({"background-color":"#fff"});
            break;
            case "三":
                position.eq(index).css({"background-color":"#fff"});
            break;
            case "四":
                position.eq(index).css({"background-color":"#fff"});
            break;
            case "五":
                position.eq(index).css({"background-color":"#fff"});
            break;
            case "六":
                position.eq(index).css({"background-color":"#fff"});
            break;
            case "日":
                position.eq(index).css({"background-color":"#fff"});
            break;
        }
    });
    </script>
<body>

    <div id="person-block" style="transform: rotateX(0deg);">
        <div id="main-news" class="person-item">
            <div style="position:absolute;top:0px;left:0px;width:1920px;height:200px;background: #fff;">
                <div style="width:45px;font-size:46px;padding:10px 15px;line-height: 45px;float:left;background: #3399FF;color:#fff">
                    天氣預報
                </div>
                <div style="float:left;">
                    <div style="float:left;margin-left:30px;"><img src="/images/tv_layout_image/weather_icon/<?=$city_arr['photo']?>" width="200"></div>
                    <div style="float:left;margin-left:30px;margin-top: 30px;">
                        <div style="font-size:100px"><?=$city_arr['city_name']?> <?=$city_arr['average_temp']?>℃</div>
                    </div>
                     <div id="mid_date" style="float:left;margin-left:100px;margin-top:40px;"><?=$pre_date[0]?>年<?=$pre_date[1]?>月<?=$pre_date[2]?>日 / 週<?=$weekday?><br/><?=($getcity=="empty")?($time."".$post_date[0]." : ".$post_date[1]):("")?> </div>
                    <div style="float:left;margin-left:100px;margin-top:40px;"><a href="<?=Yii::app()->createUrl('TVLayout/Default/more')?>?city_id=<?=$city_arr['city_id']?>&weekday=<?=$weekindex?>"><img src="/images/tv_layout_image/u37.png" width="250"></a></div>
                </div>
                <div id="right_week_div" style="float:right;background: #808080;width:30px;height:200px;">
                   <div style="margin-left:5px;margin-top:15px;border-radius:20px;width:20px;height:20px;background-color:#e0e0e0;"></div>
                   <div style="margin-left:5px;margin-top:5px;border-radius:20px;width:20px;height:20px;background-color:#e0e0e0;"></div>
                   <div style="margin-left:5px;margin-top:5px;border-radius:20px;width:20px;height:20px;background-color:#e0e0e0;"></div>
                   <div style="margin-left:5px;margin-top:5px;border-radius:20px;width:20px;height:20px;background-color:#e0e0e0;"></div>
                   <div style="margin-left:5px;margin-top:5px;border-radius:20px;width:20px;height:20px;background-color:#e0e0e0;"></div>
                   <div style="margin-left:5px;margin-top:5px;border-radius:20px;width:20px;height:20px;background-color:#e0e0e0;"></div>
                   <div style="margin-left:5px;margin-top:5px;border-radius:20px;width:20px;height:20px;background-color:#e0e0e0;"></div>
                </div>
            </div>
        </div>
    </div>
  
</body>
</html>