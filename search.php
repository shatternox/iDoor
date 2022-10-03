<?php require "./includes/header.inc.php" ?>
<?php

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $parameter = '%' . $search . '%';
    $q = "SELECT * FROM doors WHERE door_name LIKE ? OR door_name LIKE ?";

    $stmt = $conn->prepare($q);
    $stmt->bind_param('ss', $parameter, $parameter);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

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

<?php
if (!isset($_POST['search'])) {
    ?>
    <h1 style="text-align: center;margin-bottom: 70px;">Please search something!</h1>
    <?php
} else {
?>
    <h1 class="titleshop">Search Result For: <?php echo htmlspecialchars($search); ?></h1>



    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // print_r(($row["door_id"]));

            ?>
                    <div class="swiper-slide">
                        <a href="<?= "product.php?id=" . $row["door_id"] ?>"><img src=<?php echo "assets/images/door" . $row["door_id"] . ".png" ?> alt="" class="door"></a>
                        <div class="door-desc-text">
                            <h2>
                                <a href=<?= "product.php?id=" . $row["door_id"] ?> style="text-decoration: none;">
                                    <?= $row["door_name"] ?>
                                </a>
                            </h2>
                            <p>
                                <?= $row["door_desc"] ?>
                            </p>
                            <p>
                                <b><?= "$" . $row["door_price"] ?></b>
                            </p>

                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    </div>
<?php
}

?>















<?php require "./includes/footer.inc.php" ?>