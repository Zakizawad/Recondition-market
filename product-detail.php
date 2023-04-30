<?php
@include 'connection.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <title>Reconmarket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="assets/zoomoverlay.js"></script>
</head>
<body>
    <header>
        <input type="checkbox" name="" id="toggler">

        <label for="toggler" class="fas fa-bars"></label>
        <a href="index.php" class="logo">Recondition Market <span>.</span></a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>

        <nav class="icons">
            <a href="#" class="fa fa-user"></a>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
        </nav>
    </header> 

    <?php include("get_product_details.php");  ?>

    <?php foreach($products as $product) { ?>


    <section id="prodetails" class="section-p1">
        <div class="single-pro-image">
            <img src="<?php echo 'assets/img/'.$product['product_image']; ?>" width="100%" height="100%" object-fit="cover" id="MainImg" alt="Product">
            <div class="zoom-overlay"></div>
        </div>

        <div class="single-pro-details">
            <h4><?php echo $product["product_name"]; ?></h4>
            <h2><span>$</span><?php echo $product['product_price']; ?></h2>
            <select>
                <option>Select Size</option>
                <option>44</option>
                <option>43</option>
                <option>42</option>
                <option>41</option>
                <option>40</option>
            </select>
            <input type="number" value="1">
            <form action="cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $product['product_image']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
                <input type="hidden" name="product_special_offer" value="<?php echo $product['product_special_offer']; ?>">
                <input type="hidden" name="product_category" value="<?php echo $product['product_category']; ?>">
                <input type="hidden" name="product_quantity" value="1">
                <button class="main-btn" name="add_to_cart" value="add to cart">Add to Cart</button>
            </form>
            <h4>Product Details</h4>
            <span><?php echo $product["product_description"]; ?></span>
        </div>

    </section>

    <?php } ?>

    <!--Footer Section-->

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick Links</h3>
                <a href="#home">Home</a>
                <a href="#products">Products</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
                <a href="#account">Account</a>
            </div>

            <div class="box">
                <h3>Extra Links</h3>
                <a href="#">Cart</a>
                <a href="#">Products</a>
                <a href="#">Special Offers</a>
            </div>

            <div class="box">
                <h3>Locations</h3>
                <p>Australia</p>
                <p>US</p>
                <p>Canada</p>
                <p>Bangladesh</p>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <p>Phone no: +880 1797458862</p>
                <p>Email: info@gmail.com</p>
            </div>
        </div>
    </section>
</body>
</html>

