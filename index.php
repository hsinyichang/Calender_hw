<html>
  <title>萬年曆作業</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  
  <style>
   /*請在這裹撰寫你的CSS*/ 
   *{
       box-sizing: border-box; 
   }

   body{
    background: #EECDA3;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #EF629F, #EECDA3);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #EF629F, #EECDA3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }
   .body{
     
     text-align: center;
     display: flex;
     flex-wrap: wrap;
     margin: 20px auto;
     width: 900px;
     height: 850px;
     background-image: url(./img/mickey.png);

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
        /* background-color:rgb(255, 233, 249); */
        border-radius: 50%;
        padding-top:50px;
        font-size: 30px;
        color: #801362;
        font-weight: bold;
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
        /* background-color:rgb(255, 233, 249); */
        border-radius: 50%;
        font-size: 35px; 
   }
   .aside a{
       color: #fa89db;
       
   }
   .aside div{/*左側耳朵內容 */
        position: relative;
        top:13%;
        font-family:'Russo One';
        color: #801362;
        font-weight: bold;

   }
   nav{/*下面月曆的框(切版) */
        width: 100%;
        height: 630px;
        margin-top: -109px;
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
        /* background-color:rgb(255, 233, 249); */
        border-radius: 50%;
        font-family: 'Russo One';
        
        }

        .table div{   /*裡面的日期格子 */
            display:inline-block;
            width:80px;
            height:60px;
            box-sizing: border-box;
            
            padding-top: 20px;
        }
        .table div:hover{
            background-image: url(./img/hover.png);
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

    if(isset($_GET['month'])){
        $month=$_GET['month'];
        $year=$_GET['year'];
        
    }else{
        $month=date('n');
        $year=date("Y");
        
    }

    switch($month){
        case 1:
            $prevMonth=12;
            $prevYear=$year-1;
            $nextMonth=$month+1;
            $nextYear=$year;
            
        break;
        case 12:
            $prevMonth=$month-1;
            $prevYear=$year;
            $nextMonth=1;
            $nextYear=$year+1;
            
        break;
        default:
            $prevMonth=$month-1;
            $prevYear=$year;
            $nextMonth=$month+1;
            $nextYear=$year;
            
    }

    ?>
<?php
/*請在這裹撰寫你的萬年曆程式碼*/  

$firstDay=$year."-".$month."-1";/*這個月的第一天，ex:2022-2-1*/
$firstWeekday=date("w",strtotime($firstDay));/*第一天是星期幾，0表示星期天-6表示星期六 */
$monthDays=date("t",strtotime($firstDay));/*指定的月份有幾天 */
$lastDay=$year."-".$month."-".$monthDays;/*這個月的最後一天，ex:2022-2-28(月份的天數) */
$today=date("Y-m-d");/*今天日期 */
$lastWeekday=date("w",strtotime($lastDay));/*最後一天是星期幾 */
$emonth=date("F");
$dateHouse=[];

for($i=0;$i<$firstWeekday;$i++){/*如果第一天是星期X則$firstWeekday=X，所以第一周就會先跑出X個空格，然後星期X才會開始在跑日期 */
    $dateHouse[]="";/*先跑空白 */
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
    echo $year."年";
    echo '<br>'.'<br>';
    echo $month."月";
    echo '<br>';
    
    ?>
    <br>
    <a href='index.php?year=<?=$prevYear;?>&month=<?=$prevMonth;?>'><i class="fa-solid fa-backward"></i></a>&nbsp;&nbsp;
    <a href="index.php" style="text-decoration:none ;"><span style="font-family:'Russo One';">NOW</span></a>&nbsp;&nbsp;
    <a href='index.php?year=<?=$nextYear;?>&month=<?=$nextMonth;?>'><i class="fa-solid fa-forward"></i></a>
  </div>
</div>
</aside>
<section>
    <div class="section">
        <form action="./index.php" method="$_GET">
            請輸入 <br>
            年:<input type="number" name="year"><br>
            月:<input type="number" name="month"><br><br>
            <input type="submit" value="確認">
            <input type="reset" value="重置">

        </form>
    </div>
</section>


<!--table-->
<nav>
<div class="table"> 
<div class='header' style="color:red ;">Sun</div>
<div class='header'>Mon</div>
<div class='header'>Tue</div>
<div class='header'>Wed</div>
<div class='header'>Thu</div>
<div class='header'>Fri</div>
<div class='header' style="color:red ;">Sat</div>

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
