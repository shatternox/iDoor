<?php require "./includes/header.inc.php" ?>
<?php
    $door_id = $_GET['id'];
    if(!isset($door_id)){
        header("Location: /");
        die();
    }
    $q = "SELECT * FROM doors WHERE door_id=?";
    $stmt = $conn->prepare($q);
    $stmt->bind_param("s",$door_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    // print_r($row);
    
   
?>
    <div>
        <img src=<?php echo "assets/images/door".$row["door_id"].".png" ?> alt="">
        <div>
            <h2>
                Name: <?=$row["door_name"]?>
            </h2>
            <p>
                Description: <?=$row["door_desc"]?>
            </p>
            <p>
                Price: <?="Rp.".$row["door_price"]?>
            </p>
        </div>
    </div>

<?php require "./includes/footer.inc.php" ?>
