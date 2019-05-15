<?php

// $created_time = "2019-01-17 13:00:00";
//     echo  date("j",strtotime($created_time))."-".date("M",strtotime($created_time))."-".date("Y",strtotime($created_time))." ".date("H:i:s",strtotime($created_time));

//     exit;

//      $time = strtotime('2019-02-18 19:00') - strtotime("2019-02-18");

//      $days_nums = ceil( $time/(3600*24) ) ;
//      echo $days_nums;
//      exit;


     $data = json_encode($_POST);   
    file_put_contents(date("YmdHis").".txt", $data);
    print_r($_POST);

    exit;

 $json_str = '[{"zongchangdu":"00:05:00.06","createtime":"2018-12-07 04:52:37","filename":"781_2018-11-14_1500.mp4","filepath":"\/usr\/local\/src\/nginx\/html\/video\/781_2018-11-14_1500.mp4"},{"zongchangdu":"00:05:00.06","createtime":"2018-12-07 04:52:40","filename":"793_2018-11-14_1500.mp4","filepath":"\/usr\/local\/src\/nginx\/html\/video\/793_2018-11-14_1500.mp4"}]';


 $arr = json_decode($json_str,true);



 echo "string";


 print_r($arr);