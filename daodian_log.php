<?php
	set_time_limit(0);
	date_default_timezone_set('PRC');
		//error_reporting(0);
	$config = array();


	//数据库连接配置参数
	$config['db']['host'] = '192.168.1.136';  //连接地址
	
	$config['db']['username'] = 'tx2'; //账户
	
	$config['db']['password'] = '15596811300'; //密码
	$config['db']['port'] = '3306'; //端口
	$config['db']['database'] = 'tx2api'; //数据库
	$config['db']['charset'] = 'utf8'; //编码
	$config['db']['pconnect'] = 0; //长连接
	$config['db']['tablepre'] = ''; //表前缀

	$mysqli = new mysqli($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['database']);

	/* check connection */
	if ( $mysqli->connect_errno ) {
	    printf("Connect failed: %s\n", $mysqli->connect_error );
	    exit();
	}

	//$mysqli->query("set names 'utf8'");

	/*
	1、mysql_query( set names utf8)//面向过程， 编程方式；
	2、mysqli_set_charset ($link,utf8)//面向对象 ，编程方式；
	3、mysqli::set_charset（utf8)//面向对象，编程方式；
	*/

	/* change character set to utf8 */
	if (!$mysqli->set_charset("utf8")) {
	 printf("Error loading character set utf8: %s\n", $mysqli->error);
	} else {
	//  printf("Current character set: %s\n", $mysqli->character_set_name());
		
		echo "<br>";
	}

	
	 //查询中是否存在
	 $sql = "select customer_object_id from customer";
 					

	 
//	 exit($query);
	 $result_all = $mysqli->query($sql);
	 

	 
	 $row_all = $result_all->fetch_all(MYSQLI_ASSOC);
	
	 // print_r($row_all);
	 
	 // exit;
	 // 
	  $date = $_GET['riqi'];
	 
	  $start_time=$date." 9:00:00";//开始时间

	  
	  $end_date = $date." 23:00:00";

	   
	  $cha_date =   strtotime($end_date) - strtotime($start_time)  ;
	  
	  $tian = ceil( $cha_date/(3600*24) );
	  
	  $h = ceil(  $cha_date/3600  ) ;
	  
	  //echo $tian."<br>";
	//  echo $h;
	
	//$tian =3;
	//
	$insertsql = "";
	
	//分批处理插入数据
	
	$fenpi = 0;

	for ($x=0; $x <= $tian ; $x++) { 
		
	
	   
	    $h=150; //测试用 
	  for ($y=0; $y <=$h ; $y++) { 
	  	
	  
	          //$wufenzhong =  date("Y-m-d H:i:s",strtotime($start_time)+5*60*$y);
		  
		      $wufenzhong =  date("Y-m-d H:i:s",strtotime("+".$x." day",strtotime($start_time)+5*60*$y ));
		   
		   
		    // echo $wufenzhong."<br>";
		  
			 //循环每个line
			 
			 for ($i=1; $i <=16 ; $i++) {
			  	
			   $enter_num = rand(0, 99) ;
			   $exit_num = rand(0, 99);
			   
			   $age = rand(12, 99) ;
			   $sex = rand(0, 1);

			   $xiangshidu = rand(30, 100)*0.01; 

			   $customer_object_id =  $row_all[rand(1,30)]['customer_object_id'] ;
			   
			   $create_time = $wufenzhong;
			   
			   $update_time = $wufenzhong;
				  
			  $insertsql = "insert into linecounting_records(line_id,enter_num,exit_num,create_time,update_time) values($i,$enter_num,$exit_num,'$create_time','$update_time'); ";

			  echo $insertsql;	
 // $insertsql .= "('$create_time','https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=356169338,1383516396&fm=58',$age,$sex,$i,$xiangshidu,$customer_object_id),";

			 // echo $insertsql."\n";
			 // $mysqli->query($insertsql);	
			/*	if ( $fenpi % 8000 ==0 ) {

				 	# code...
				 	$rest = substr($insertsql, 0, -1); 

					// echo $rest;
				 	$mysqli->query("insert into coming_records(coming_time,avatar_url,age,ismale,vm_linespec_id,similarity_score,customer_object_id) values".$rest);

				 	echo "执行足10000的SQL。。。";
				 	$insertsql = "";	
				 }*/


				 $fenpi++; 
				 
			 }
	 
	 
	  }
	  
	 // echo "----------------"."<br>";
	  
	  
	  
	}
	
		
// echo $insertsql;
// 
/* echo $fenpi;

	


$rest = substr($insertsql, 0, -1); 

echo $rest;

if (!empty($rest)) {
	# code...
	$mysqli->query("insert into coming_records(coming_time,avatar_url,age,ismale,vm_linespec_id,similarity_score,customer_object_id) values".$rest);	

	echo "执行不足10000的SQL。。。";
}


echo "执行完成";*/
	
 

		
?>