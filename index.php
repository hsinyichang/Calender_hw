<html>
  <title>萬年曆作業</title>
  
  
  
  <style>
   /*請在這裹撰寫你的CSS*/ 
   *{
       box-sizing: border-box; 
   }

   body{
     
   
    }
   .body{
     
     text-align: center;
     display: flex;
     flex-wrap: wrap;
     margin: 20px auto;
     width: 900px;
     height: 850px;

   }
   
   section{/*右側耳朵(切版) */
        width: 50%;
        height: 310px;
        position: relative;
        left: 82px;
     
   }
   .section{/*右側耳朵框 */
        width: 310px;
        height: 310px;
        background-color: #ffe9f9;
        border-radius: 50%;
        padding-top: 50px;
        font-size: 30px;
   }
   aside{/*左側耳朵(切版) */
        width: 50%;
        height: 310px;
        position: relative;
        left: 41px;
       
   }
   .aside{/*左側耳朵框 */
        width: 310px;
        height: 310px;
        background-color: #ffe9f9;
        border-radius: 50%;
        font-size: 30px; 
   }
   .aside div{/*左側耳朵內容 */
        position: relative;
        top:25%;
   }
   nav{/*下面月曆的框(切版) */
        width: 100%;
        height: 630px;
        margin-top: -132px;
   }
   .table{/*整個月曆框 */
        width:630px;
        height:630px;
        /* border:1px solid green; */
        display:flex;
        flex-wrap:wrap;
        align-content: center;
        justify-content: center;
        margin:0 auto;
        background-color: #ffe9f9;
        border-radius: 50%;
        }

        .table div{   /*裡面的日期格子 */
            display:inline-block;
            width:80px;
            height:60px;
            box-sizing: border-box;
            
            padding-top: 20px;
        }
        .table div.header{/*星期的標題 */
            height: 32px;
            padding-top: 7px;
            font-weight: bold;
            
        }
        .weekend{
            
            color: red;
            font-weight: bold;
        }
        .workday{
            background:white;
        }
        .today{
            background:lightseagreen;
        }
        footer{/*當天日期時間 */
            width: 100%;
            height: 28px;
            position: relative;
            top:-112px;
        }

  </style>
<body>
<div class="body">
<?php
/*請在這裹撰寫你的萬年曆程式碼*/  
$month=10;


$firstDay=date("Y-").$month."-1";/*這個月的第一天，ex:2022-2-1*/
$firstWeekday=date("w",strtotime($firstDay));/*第一天是星期幾，0表示星期天-6表示星期六 */
$monthDays=date("t",strtotime($firstDay));/*指定的月份有幾天 */
$lastDay=date("Y-").$month."-".$monthDays;/*這個月的最後一天，ex:2022-2-28(月份的天數) */
$today=date("Y-m-d");/*今天日期 */
$lastWeekday=date("w",strtotime($lastDay));/*最後一天是星期幾 */
$dateHouse=[];

for($i=0;$i<$firstWeekday;$i++){/*如果第一天是星期X則$firstWeekday=X，所以第一周就會先跑出X個空格，然後星期X才會開始在跑日期 */
    $dateHouse[]="";
}

for($i=0;$i<$monthDays;$i++){/*從星期二的位置開始跑迴圈，列出這個月的日期 */
    $date=date("Y-m-d",strtotime("+$i days",strtotime($firstDay)));/*$i=0就是當天，$i=1就是第二天，$i=27就是第28天 */
    $dateHouse[]=$date;/*所有的日期列出*/
}

for($i=0;$i<(6-$lastWeekday);$i++){/*續上，所有日期列出後，之後的的空白就是用(6-最後一天是星期幾)得到空白 */
    $dateHouse[]="";
}

?>
<aside>
<div class="aside">
  <div>
    <?php
    echo date("Y");
    echo '<br>';
    echo date("m");
    echo '<br>';
    echo date("F");
    echo '<br>';
    ?>
    <a href="">上個月</a>
    <a href="">下個月</a>
  </div>
</div>
</aside>
<section>
    <div class="section">
    
</div>
</section>


<!--table-->
<nav>
<div class="table"> 
<div class='header'>Sun</div>
<div class='header'>Mon</div>
<div class='header'>Tue</div>
<div class='header'>Wed</div>
<div class='header'>Thu</div>
<div class='header'>Fri</div>
<div class='header'>Sat</div>

<?php
foreach($dateHouse as $k => $day){
    $hol=($k%7==0 || $k%7==6)?'weekend':"";/*三元運算子(前面運算式為TRUE時的值是weekend，FALSE則為"空白") */
    
    if(!empty($day)){  /*天數不為空白 */
        $dayFormat=date("j",strtotime($day));/*不補零的天數，ex:本月五日則為5 */
        echo "<div class='{$hol}'>{$dayFormat}</div>";
    }else{
        echo "<div class='{$hol}'></div>";

    }
}

?>
</div>
</nav>
<!--table end-->
<footer style="text-align:center;"><iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=small&timezone=Asia%2FTaipei" width="100%" height="90" frameborder="0" seamless></iframe>
</footer>
</div>
</body>
<html>
