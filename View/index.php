<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Public/css/styles.css">
    <title>Trang chủ</title>
    <?php
        include '../Controller/mainController.php';
    ?>
</head>
<body>
    <?php include 'header.php' ?>
    <section class="hero">
        <div class="hero-content">
            <h2>Chào mừng đến TPhone</h2>
        </div>
        <div class="banner-container">
            <img src="../Public/image/banner.png" alt="Banner">
            <button class="banner-button"><a href="smartphone.php">Khám phá ngay !</a></button>
        </div>
    </section>
    <section class="featured-products">
        <h3>Sản phẩm nổi bật</h3>
        <div class="product-list">

        <?php foreach ($data as $item): ?>
            <div class="product-item">
                <img src="../Public/image/d1.jpg" alt="Sản phẩm 1">
                <h4><a href="product-details.php"><?php echo $item['name'] ?></a></h4>
                <p>Giá: $199</p>
            </div>
        <?php endforeach ?>

        </div>
    </section>
    <?php include 'footer.php' ?>
</body>
</html>
