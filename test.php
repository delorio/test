<?php


//$arr=[112,5,12,45,1];
//
//function sort_mass($new_mas2){
//    for($i = 0; $i < count($new_mas2)-1; $i++){
//        $min = $i;
//        for($a = $i + 1; $a < count($new_mas2); $a++){
//            if ($new_mas2[$a] < $new_mas2[$min]){
//                $min = $a;
//            }
//        }
//        $dummy = $new_mas2[$i];
//        $new_mas2[$i] = $new_mas2[$min];
//        $new_mas2[$min] = $dummy;
//    }
//    return $new_mas2;
//}
//print_r( sort_mass($arr));


//$a=127;
//$b=0;
//$a_string=(string) $a;
////echo $a_string;
//
//$c=substr($a_string,-1);
//
//for ($i=0; $i<strlen($a_string); $i++){
//    (int)$b+= $a_string[$i];
//}
////echo $a%$b;
//
//if ($a % $b==0 && $a%2==0 && $c!=0&& ($a%7==0 || $a%12==0)) {
//
//echo $a;
//}

//$a = ' hello  world .';

//echo str_replace(' .','.',str_replace('  ',' ',ucfirst(trim($a)))).PHP_EOL;



//$ok = "HelloIprivetIbonjur";
//$okOne = explode("I", $ok, 3);
//foreach ($okOne as $value) {
//    echo $value . PHP_EOL;
//}

//$pattern_name = '/\s+/';
//
//echo preg_replace($pattern_name,' ',$a);

//$b = 'hello world';
//
//$c=explode(" ",$b);
//$arr=array_reverse($c);
//echo implode(' ',$arr);
//

//$inti='1 2 3 4 5 6 7 8 9';
//$arr2=[];
//$arr =explode(' ',$inti);
//
////echo print_r($arr);
//foreach($arr as $value){
//    if ($value%2==0){
//        $arr2[]=$value;
//    }
//}
////echo print_r($arr2);
//echo implode(' ',$arr2).PHP_EOL;


//$inR='1 2 3 4 5 6 7 8 9 1 4 6 7 8';
//$arr2=[];
//$arr3=[];
//$arr =explode(' ',$inR);
//echo print_r(array_unique($arr));
//
//$result = [];
//foreach ($arr as $item) {
//    if (!in_array($item, $result)) {
//        $result[] = $item;
//    }
//}

//echo print_r($result);

//$q='olo';
//if ($q==strrev($q)){
//    echo $q;
//
//}
//
//
//$inR='1 2 3 4 5 6 7 8 9 1 4 6 7 8';
//
//$arr3=[];
//$arr =explode(' ',$inR);
////echo print_r(array_unique($arr));
//
////Дублированные
//$arr2=array_count_values($arr);
//echo print_r($arr2);
//$result = [];
//foreach ($arr2 as $key=> $item) {
//    if ($item>1) {
//        $result[] = $key;
//    }
//}
////
//echo print_r($result);


//$arr=[112,5,12,45,1];
//$arr2=[];
//
//
//
//    $a=max($arr);
//    $b= array_search($a,$arr);
//    $arr2[]= $a;
//    unset($arr[$b]);
//    $c=max($arr);
//    $d= array_search($c,$arr);
//    echo $a*$c.PHP_EOL;



//
//echo print_r($arr);
//все  нули в конце
//$arr2=[];
//$arr=[0,0,112,5,0,12,45,1];
//for ($i=0; $i<count($arr); $i++){
//    if ($arr[$i]==0){
//        array_push($arr2,$arr[$i]);
//    }
//    else{
//        array_unshift($arr2,$arr[$i]);
//
//    }
//
//}
//echo  print_r($arr2);

//Замените каждый элемент произведением всех других элементов
//$arr=[1,2,3];
//$arr3=[];
//$arr2=[];
//$arr3=array_merge([],$arr);
//for ($i=0; $i<count($arr); $i++){
//
//    $arr3=array_merge([],$arr);
//    unset($arr3[$i]);
//    $arr2[]=array_product($arr3);
//}
//;
//echo print_r($arr2);
//echo print_r($arr);



//Найти максимальную разницу между двумя элементами
//$arr=[5,13,2,3,6,8];
//$num=count($arr)/2;
//
////echo $num;
//$max1=[];
//$max2=[];
//for ($i=0; $i<$num; $i++){
//    $max1[]=$arr[$i];
//}
//
//for ($j=$num; $j<count($arr); $j++){
//    $max2[]=$arr[$j];
////    echo $arr[$j];
//}
////echo print_r($max1);
//$ZZ=max($max1)-max($max2);
//echo abs($ZZ);

//Все комбинации пар элементов
//$arr=[1,2,3];
//$arr2=[];
//$arr3=[];
//for ($i=0; $i<count($arr); $i++) {
//    $arr2 = array_merge([], $arr);
////    echo print_r($arr2);
////    if (in_array($arr[$i], $arr2)) {
////        unset($arr2[$i]);
////    }
//    for ($j = 0; $j <count($arr2); $j++) {
//        if ($arr[$i]!==$arr[$j]){
//        $arr3[] = $arr[$i].$arr[$j];
//        }
//    }
//}
//echo print_r($arr3);

//Счастливые билеты
//$arr=[1,3,2,1,3,2];
//$arr2=0;
//$arr3=0;
//for ($i=0; $i<count($arr)/2; $i++) {
//    $arr2+=$arr[$i];
//}
//for ($J=count($arr)/2; $J<count($arr); $J++) {
//    $arr3+=$arr[$J];
//}
//if ($arr2==$arr3){
//
//    echo 'Билет выйгрышный';
//}
//$data='24.05.1995';
//$zodiacIntervals = [
//    'Водолей' => ['21.01', '19.02'],
//    'Рыбы' => ['20.02', '20.03'],
//    'Овен' => ['21.03', '20.04'],
//    'Телец' => ['21.04', '21.05'],
//    'Близнецы' => ['22.05', '21.06'],
//    'Рак' => ['22.06', '22.07'],
//    'Лев' => ['23.07', '21.08'],
//    'Дева' => ['22.08', '23.09'],
//    'Весы' => ['24.09', '23.10'],
//    'Скорпион' => ['24.10', '22.11'],
//    'Стрелец' => ['23.11', '22.12'],
//    'Козерог' => ['23.12', '20.01'],
//];
//
//$d=mb_substr($data,5);
////echo $d;
//foreach ($zodiacIntervals as $key=>$value){
//    $num_one=$value[0].$d;
//    $num_two=$value[1].$d;
////    echo strtotime($num_one).PHP_EOL;
//    if (strtotime($data)>strtotime($num_one) && strtotime($data)<strtotime($num_two)){
//    echo $key;
//
//    }
////
//}
//echo strtotime($d).PHP_EOL;
//echo strtotime($zodiacIntervals['Водолей'][1]).PHP_EOL;
//if (strtotime($d)<strtotime($zodiacIntervals['Водолей'][1])){
//echo 'Водолей';
//}
//$num=1;
//$one='Яблоко';
//$two='Яблока';
//$free='Яблок';
//$arr=[1=>$one,3=>$two,5=>$free];
//echo print_r($arr[$num]);



//$arr=[1,3,2,1,3,2];
//$sum = 0;
//$maxSum = 0;
//for ($i = 0; $i < count($arr); $i++) {
//    $sum += $arr[$i];
//    if ($sum > $maxSum)
//        $maxSum = $sum;
//    if ($sum < 0)
//        $sum = 0;
//}
//echo $sum;


