<?php 
$tempature_arr = explode(',',$today_arr['temperature']);
$today = date("Y-m-d H:i");
$todayArr = explode(" ", $today);
$pre_arr = explode("-",$todayArr[0]);
$post_arr = explode(":", $todayArr[1]);
if($post_arr[0]>12){
  $post_arr[0]=$post_arr[0]-12;
  $hour = "PM".$post_arr[0].":".$post_arr[1];
}else{
  $hour = "AM".$post_arr[0].":".$post_arr[1];;
}
$datetime = $pre_arr[0]."年".$pre_arr[1]."月".$pre_arr[2]."日/週".$today_arr['time'];
// var_dump($datetime);
// var_dump($time);
// var_dump($todayArr);
// var_dump($tempature_arr);
?>
<html><head>
    <meta name="robots" content="noindex, nofollow">
    <title>2.2天氣</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <style type="text/css">
        html, body {min-height:100%; padding:0; margin:0;}
        #container{
          width:1400px;
          margin: 0 auto;
          position:absolute; top:30px; bottom:0; left:0; right:0;
        }
        #leftDiv{
          float: left;
          margin-right: 80px;
        }
        #leftDiv p{
          font-size: 46px;
        }
        #u20 p#title{
          height: 9px;
        }
        #u20 p span{
          font-weight: bold;
          font-size: 32px;
        }
        #u20 p#title span{
           height: 3px;
           font-size: 51px;
        }
        #u20 #bonus{
          font-size: 51px;
        }
        #u24{
          width: 598px;
        }
        #u24 p span{
          font-size: 25px;
        }
        #rightDiv #rightDiv{
          padding-top: 41px;
        }
        #rightDiv #rightImg img{
          width:650px;
          height:650px;
        }
        #content{
          bottom: 100px;
          color: white;
          font-weight: 300;
          font-size: 35px;
          left:-210px;
          position: absolute;
          width:2028px;
        }
        #today_div{
          float: left;
          font-size: 50px;
          width: 800px;
          margin-top: 300px;
        }
        #today_div div.left_div{
          float: left;
        }
        #today_div div.left_div p#area{
          font-size: 80px;
          height: 30px;
          margin-top: 0px;
        }
        #today_div div.left_div p#high_low_temp{
           font-size: 35px;
           line-height: 12px
        }
        #today_div div.left_div p#hour,#today_div div.left_div p#datetime{
          font-size: 38px; 
          line-height: 12px
        }
        #week_div{
          float: left;
          width: 1216px;
          margin-top: 300px;
        }
        #week_div div.left_div{
          float: left;
          margin-left:20px;
        }
        #footer{
          background: #ccc;
          font-size: 32px;
          position: absolute;
          bottom: 0px;
          left:-260px;
          width:2028px;
        }
        #footer span{
          color: black;
          font-weight: bold;
        }
        #footer span img{
          position: absolute;
          width: 35px;
          height: 35px;
        }
        #footer span a{
           text-decoration: none; 
           color:black;
           padding-left: 40px;
        }
    </style>
    <script type="text/javascript" src="http://www.jowinwin.com/hertv2msd/js/jquery-1.7.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            $("#footer").fadeOut("slow",function(){});
              if(navigator.userAgent.match(/Mobile/i)){
              // alert(_index);
                  EOSUtility.AppStoreBackEvent();
                  history.go(-1);
                  // return;
              }
        }, 5000);
    });
    </script>
  </head>
  <body style="background: url('../../../webview/images/weather_content.jpg');background-size: cover;background-repeat: no-repeat;">
  <div id="container">
    <div id="leftDiv">

    </div>
    <div id="content">
        <div id="today_div"> 
           
            <div class="left_div">
              <img style="width:300px;height:300px;" src="/images/tv_layout_image/weather_icon/<?=$today_arr['photo']?>">
            </div>
            <div style="margin-left: 30px;margin-top: 30px;" class="left_div">
               <p id="area"><?=$today_arr['city_name']?><span><?=$tempature_arr[1]?>℃</span></p>
               <p id="high_low_temp">最高溫度:<?=$tempature_arr[2]?>℃│最低溫度:<?=$tempature_arr[0]?>℃</p>
               <p id="datetime"><?=$datetime?></p>
               <p id="hour"><?=$hour?></p>
            </div>
            
        </div>
        <div id="week_div"> 
            <?php foreach ($week_arr as $key => $value) { ?>
                <div class="left_div">
                  <p style="text-align: center;"><?=$value['time']?></p>
                  <p style="margin-left: 30px;"><img style="width:100px;height:100px;" src="/images/tv_layout_image/weather_icon/<?=$value['photo']?>"></p>
                </div>
            <?php  }   //endforeach?>
        </div>
     </div>
    <div id="footer">
      <p><span><img src="/images/tv_layout_image/u17.png"></span><span><a href="javascript:void(0)" id="goback">返回</a></span></p>
    </div>
  </div>
</body>
</html>