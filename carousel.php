<div class="row mt-3">     

        <div class="col-12">
            <div class="main_box rounded-3 mb-3">




  <div id="myCarousel" class="carousel slide p-3" data-bs-ride="carousel">



    
    <div class="carousel-inner">


<?php
$sql = "SELECT * FROM carousel ORDER BY cs_sequence ASC";
$query = mysqli_query($mysqli,$sql);
$num = mysqli_num_rows($query);
if($num>0){
  for($i=1;$i<=$num;$i++){
    ($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
?>
      <div class="carousel-item <?php if($i=='1'){?> active<?php }?>">
        <img src="<?php echo$site[site_name]?>/assets/img/carousel/<?php echo $row['img_src']?>" alt="<?php echo $row['cs_title']?>" class="d-block w-100">
      </div>

 <?php
}}
 ?>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>





            </div>
        </div>
</div>