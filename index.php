<?php

@include 'connection.php';
session_start();

/*if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}*/

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
            <?php
                if (isset($_SESSION['user_name'])) {
                    echo '<h4>Welcome <span>' . $_SESSION['user_name'] . '</span></h4>';
                } else {
                    echo '<h4>Welcome <span>User</span></h4>';
                }
            ?>
            <div class="dropdown">
                <a href="#" class="dropbtn">
                    <i class="fa fa-user"></i>
                </a>
                <div class="dropdown-content">
                    <?php if(isset($_SESSION['user_name'])): ?>
                        <a href="logout.php">Logout</a>
                    <?php else: ?>
                        <a href="login_form.php">Login</a>
                    <?php endif; ?>
                </div>
            </div>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
        </nav>
    </header>

    <!-- Home Section -->
    <section class="home" id="home">
        <div class="content">
            <h3>High Quality Products</h3>
            <span>Natural & Elegant</span>
            <p>Some dummy text</p>
            <a href="products.php" class="main-btn">Shop Now</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <h1 class="heading">
            <span>About</span> us
        </h1>
        <div class="main-row">
            <div class="video-container">
                <video src="#" loop autoplay muted></video>
                <h3>Best Products</h3>
            </div>
            <div class="content">
                <h3>Why choose us</h3>
                <p>Some long text</p>
                <p>Some long text</p>
                <a href="#" class="main-btn">Learn More</a>
            </div>
        </div>
    </section>

    <!--Icons Section -->
    <section class="icons-container">
        <div class="icons">
            <i class="fas fa-shopping-cart"></i>
            <div class="info">
                <h3>Free Delivery</h3>
                <span>on all Orders</span>
            </div>
        </div>
        <div class="icons">
            <i class="fas fa-tags"></i>
            <div class="info">
                <h3>15 days return</h3>
                <span>Moneyback Guaranteed</span>
            </div>
        </div>
        <div class="icons">
            <i class="fas fa-gifts"></i>
            <div class="info">
                <h3>Gifts</h3>
                <span>Gifts for loved ones</span>
            </div>
        </div>
        <div class="icons">
            <i class="fab fa-paypal"></i>
            <div class="info">
                <h3>Secure Payment</h3>
                <span>Protected by Paypal</span>
            </div>
        </div>
    </section>

    <!--Products section-->

    <section class="products" id="products">
        <h1 class="heading">Latest<span> Products</span></h1>

        <div class="box-container">

            <?php include("get_products.php");  ?>

            <?php foreach($products as $product) { ?>


            <div class="box">
                <div class="image">
                    <img src="<?php echo "assets/img/".$product["product_image"]; ?>" alt="">
                    <div class="form">
                        <form action="product-detail.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $product['product_image']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
                            <input type="hidden" name="product_special_offer" value="<?php echo $product['product_special_offer']; ?>">
                            <input type="hidden" name="product_category" value="<?php echo $product['product_category']; ?>">
                            <input type="hidden" name="product_quantity" value="1">
                            <input type="submit" class="cart-btn" name="product_detail" value="See product">
                        </form>
                    </div>
                </div>
                <span class="discount"><?php echo $product["product_special_offer"]; ?>% OFF</span>
                <div class="content">
                    <h3><?php echo $product["product_name"]; ?></h3>
                    <div class="price">$<?php echo $product["product_price"]; ?> <span>$150</span></div>
                </div>
            </div>

            <?php } ?>

        </div>

        <div class="product-btn">
            <a href="products.php" class="main-btn">See all products</a>
        </div>

    </section>

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