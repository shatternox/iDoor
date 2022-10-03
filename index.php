<?php require "./includes/header.inc.php" ?>
<?php
    $q = "SELECT * FROM doors";
    $result = $conn->query($q);
    
   
?>
<div class="hero">
    <h1 id="slogan">We Sell Futuristic Doors You can Never Imagine</h1>
    <div id="stage">
        <div id="rotate">
            <div id="ring-1" class="ring"></div>
            <div id="ring-2" class="ring"></div>
            <div id="ring-3" class="ring"></div>
            <div id="ring-4" class="ring"></div>
            <div id="ring-5" class="ring"></div>
        </div>
    </div>

    

</div>

<h1 class="titleshop">Door Selection</h1>

<div class="item-container">
    
</div>
<div class="item-container">
    
</div>
<div class="item-container">
    
</div>

<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <?php
        if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                // print_r(($row["door_id"]));
    
    ?>
        <div class="swiper-slide">
            <img src=<?php echo "assets/images/door".$row["door_id"].".png" ?> alt="" class="door">
            <div class="door-desc-text">
                <h2>
                    <?=$row["door_name"]?>
                </h2>
                <p>
                    <?=$row["door_desc"]?>
                </p>
                <p>
                    <?="Rp.".$row["door_price"]?>
                </p>
                <a href=<?= "door_detail.php?id=".$row["door_id"]?>>
                    <button>Detail</button>
                </a>
            </div>
        </div>
    <?php
        }
    }
    ?>
    <!-- <div class="swiper-slide">
        <img src="assets/images/door1.png" alt="" class="door">
    </div>
    <div class="swiper-slide">
        <img src="assets/images/door2.png" alt="" class="door">
    </div>
    <div class="swiper-slide">
        <img src="assets/images/door3.png" alt="" class="door">
    </div>
    <div class="swiper-slide">
        <img src="assets/images/door4.png" alt="" class="door">
    </div>
    <div class="swiper-slide">
        <img src="assets/images/door5.png" alt="" class="door">
    </div>
    <div class="swiper-slide">
        <img src="assets/images/door6.png" alt="" class="door">
    </div>
    <div class="swiper-slide">
        <img src="assets/images/door7.png" alt="" class="door">
        <div class="item-desc">
            <div>Item Name</div>
            <div>Desc</div>
        </div>
    </div>
    <div class="swiper-slide">
        <img src="assets/images/door8.png" alt="" class="door">
        <div class="item-desc">
            <div>Item Name</div>
            <div>Desc</div>
        </div>
    </div>
    <div class="swiper-slide">
        <img src="assets/images/door9.png" alt="" class="door">
        <div class="item-desc">
            <div>Item Name</div>
            <div>Desc</div>
        </div>
    </div>
    ... -->
  </div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

</div>













<?php require "./includes/footer.inc.php" ?>