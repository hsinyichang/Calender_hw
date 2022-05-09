<html>
  <title>萬年曆作業</title>
  <style>
   /*請在這裹撰寫你的CSS*/ 
   .table{
            width:560px;
            height:560px;
            /* border:1px solid green; */
            display:flex;
            flex-wrap:wrap;
            align-content: baseline;
            margin-left:1px;
            margin-top:1px;
        }

        .table div{
            display:inline-block;
            width:80px;
            height:80px;
            border:1px solid #999;
            box-sizing: border-box;
            margin-left:-1px;
            margin-top:-1px;
        }
        .table div.header{
            background:black;
            color:white;
            height: 32px;;
        }
        .weekend{
            background:pink;
        }
        .workday{
            background:white;
        }
        .today{
            background:lightseagreen;
        }
  </style>
<body>
<h1>萬年曆</h1>
<?php
/*請在這裹撰寫你的萬年曆程式碼*/  
$month=5;


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
<!--table-->
<div class="table"> 
<div class='header'>日</div>
<div class='header'>一</div>
<div class='header'>二</div>
<div class='header'>三</div>
<div class='header'>四</div>
<div class='header'>五</div>
<div class='header'>六</div>
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
<!--table end-->

  
</body>
<html>
