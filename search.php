<?php

include("connection.php");

// Retrieve the search query from the URL parameters
if (isset($_GET['search'])) {
    $query = $_GET['search'];
} else {
    $query = '';
}

// Construct the SQL query to retrieve suggested products
//$sql = "SELECT * FROM products WHERE product_name LIKE '%" .  sprintf("%%%s%%", mysqli_real_escape_string($conn, $query)) . "%' LIMIT 5";

if (strlen($query) == 1) {
    $sql = "SELECT * FROM products WHERE product_name LIKE '" . sprintf("%%%s%%", mysqli_real_escape_string($conn, $query)) . "' LIMIT 5";
} else {
    $sql = "SELECT * FROM products WHERE product_name LIKE '%" . sprintf("%%%s%%", mysqli_real_escape_string($conn, $query)) . "%' LIMIT 5";
}


// Execute the query
$result = mysqli_query($conn, $sql);

// Fetch the results and encode them as JSON
$products = array();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = array(
            'product_id' => $row['product_id'],
            'product_name' => $row['product_name'],
            'product_image' => $row['product_image'],
            'product_price' => $row['product_price'],
            'product_special_offer' => $row['product_special_offer'],
            'product_category' => $row['product_category']
        );
    }
    echo json_encode($products);
} else {
    echo "Failed to retrieve products: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <script src="assets/search.js"></script>
</head>
<body>
    <header>
        <input type="checkbox" name="" id="toggler">

        <label for="toggler" class="fas fa-bars"></label>
        <a href="index.php" class="logo">Store <span>.</span></a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>

        <form class="search-form" method="GET" action="search.php">
            <input type="text" id="search" name="search" placeholder="Search products...">
            <ul id="results"></ul>
            <button type="submit">Search</button>
        </form>

        <nav class="icons">
            <a href="#" class="fa fa-user"></a>
            <a href="cart.php" class="fas fa-shopping-cart"></a>
        </nav>
    </header>

    <!--Products section-->

    <section class="products mt-5 my-5 py-5" style="margin-top: 100px !important; margin-bottom: 100px !important;" id="products">
        <h1 class="heading">Searched<span> Products</span></h1>

        <div class="box-container">

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
                            <input type="submit" class="cart-btn" name="product_detail" value="add to cart">
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
