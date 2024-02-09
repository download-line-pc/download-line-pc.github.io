<?php

$show_yea = substr($today_date,0,4);
$show_mon = substr($today_date,4,2);
$show_da = substr($today_date,6,2);
$show_da=(int)$show_da;

switch($show_mon){
  case "01" : {
							  $mon1="January";
							  $mon2="มกราคม";
							 				  }break;
  case "02" : {
							  $mon1="February";  
							  $mon2="กุมภาพันธ์";
				
					  }break;
  case "03" : {
							  $mon1="March";  
							  $mon2="มีนาคม";
							  
					  }break;
  case "04" : {
							  $mon1="April";  
							  $mon2="เมษายน";
						
					  }break;
  case "05" : {
							  $mon1="May";  
							  $mon2="พฤษภาคม";
					
					  }break;
  case "06" : {
							  $mon1="June";  
							  $mon2="มิถุนายน";
						
					  }break;
  case "07" : {
							  $mon1="July";  
							  $mon2="กรกฏาคม";
				
					  }break;
  case "08" : {
							  $mon1="August";  
							  $mon2="สิงหาคม";
					
					  }break;
  case "09" : {
							  $mon1="September";  
							  $mon2="กันยายน";
						
					  }break;
  case "10" : {
							  $mon1="October";  
							  $mon2="ตุลาคม";
					
					  }break;
  case "11" : {
							  $mon1="November";  
							  $mon2="พฤศจิกายน";
				
					  }break;
  case "12" : {
							  $mon1="December"; 
							  $mon2="ธันวาคม";
						
					  }break;
	}	
$show_year_thai=$show_yea+'543';
$today_date=$show_da."-".$mon2."-".$show_year_thai;

