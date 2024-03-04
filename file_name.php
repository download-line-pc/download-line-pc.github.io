
<?php $download_fine_name = basename($_SERVER['PHP_SELF']);?>

<?php $file_name_int = extract_int($download_fine_name) + 1;?>

<?php $new_file_name = "";?>


<?php
    $int_cout = 0;
    $word = str_split( $file_name_int );
    for( $i=0; $i<count( $word ); $i++ ) {
        if( is_numeric($word[$i]) && $word[$i] > 0) {
            $int_cout++;
        }
    }    

    if ($int_cout == 1) {            

        $new_file_name = "download-line-pc-000" . $file_name_int . ".php";

        
      } elseif ($int_cout == 2) {
       
        $new_file_name = "download-line-pc-00" . $file_name_int . ".php";

      } elseif ($int_cout == 3) {       

         $new_file_name = "download-line-pc-0" . $file_name_int . ".php";

      } elseif ($int_cout == 4) {       

       $new_file_name = "download-line-pc-" . $file_name_int . ".php";         
        
       }     




       if ($file_name_int == 10) {        
            $new_file_name = "download-line-pc-0010.php";                   
          }     


          if ($file_name_int == 20) {        
            $new_file_name = "download-line-pc-0020.php";                   
          }    

          if ($file_name_int == 30) {        
            $new_file_name = "download-line-pc-0030.php";                   
          }    

          if ($file_name_int == 40) {        
            $new_file_name = "download-line-pc-0040.php";                   
          }    

          if ($file_name_int == 50) {        
            $new_file_name = "download-line-pc-0050.php";                   
          }    

          if ($file_name_int == 60) {        
            $new_file_name = "download-line-pc-0060.php";                   
          }    


          if ($file_name_int == 70) {        
            $new_file_name = "download-line-pc-0070.php";                   
          }    


          if ($file_name_int == 80) {        
            $new_file_name = "download-line-pc-0080.php";                   
          }    

          if ($file_name_int == 90) {        
            $new_file_name = "download-line-pc-0090.php";                   
          }    


          if ($file_name_int == 100) {        
            $new_file_name = "download-line-pc-0100.php";                   
          }    


          if ($file_name_int == 101) {        
            $new_file_name = "download-line-pc-0101.php";                   
          }   
          
          if ($file_name_int == 102) {        
            $new_file_name = "download-line-pc-0102.php";                   
          }          

          if ($file_name_int == 103) {        
            $new_file_name = "download-line-pc-0103.php";                   
          }     

          if ($file_name_int == 104) {        
            $new_file_name = "download-line-pc-0104.php";                   
          }     

          if ($file_name_int == 105) {        
            $new_file_name = "download-line-pc-0105.php";                   
          }     

          if ($file_name_int == 106) {        
            $new_file_name = "download-line-pc-0106.php";                   
          }     

          if ($file_name_int == 107) {        
            $new_file_name = "download-line-pc-0107.php";                   
          }     

          if ($file_name_int == 108) {        
            $new_file_name = "download-line-pc-0108.php";                   
          }     

          if ($file_name_int == 109) {        
            $new_file_name = "download-line-pc-0109.php";                   
          }   

          if ($file_name_int == 110) {        
            $new_file_name = "download-line-pc-0110.php";                   
          }


          if ($file_name_int == 120) {        
            $new_file_name = "download-line-pc-0120.php";                   
          }

          if ($file_name_int == 130) {        
            $new_file_name = "download-line-pc-0130.php";                   
          }

          if ($file_name_int == 140) {        
            $new_file_name = "download-line-pc-0140.php";                   
          }

          if ($file_name_int == 150) {        
            $new_file_name = "download-line-pc-0150.php";                   
          }

          if ($file_name_int == 160) {        
            $new_file_name = "download-line-pc-0160.php";                   
          }

          if ($file_name_int == 170) {        
            $new_file_name = "download-line-pc-0170.php";                   
          }

          if ($file_name_int == 180) {        
            $new_file_name = "download-line-pc-0180.php";                   
          }
        
?>

<div class="container d-flex justify-content-end mt-4">
<a type="button" class="btn btn-outline-secondary" href="<?php echo "$new_file_name";?>">
<?php
$spintax = new Spintax();
$string = '{Download Line PC|Line PC|Download Line}';
echo $spintax->process($string);
?>
</a>
</div>