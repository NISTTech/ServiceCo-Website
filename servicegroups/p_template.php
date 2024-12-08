<?php
// Check if product ID is set
if (!isset($_GET['productId'])) {
    die("Product ID not set.");
}

// Database connection
$conn = new mysqli("localhost", "root", "", "serviceco");

// Get the product ID from the URL
$productId = (int)$_GET['productId'];

// Fetch product details
$product_result = $conn->query("SELECT * FROM products WHERE id = $productId");

if ($product_result->num_rows > 0) {
    $product = $product_result->fetch_assoc();
    $productName = $product['name'];
    $productPrice = $product['price'];
    $productImage = $product['image'];
    $productUrl = $product['url'];
    $productDescription = $product['description'];
    $serviceGroupId = $product['service_group_id'];
} else {
    echo "Product not found.";
    exit;
}

// Fetch service group details based on the service group ID
$service_group_result = $conn->query("SELECT * FROM service_groups WHERE id = $serviceGroupId");

if ($service_group_result->num_rows > 0) {
    $service_group = $service_group_result->fetch_assoc();
    $groupName = $service_group['name'];
    $groupEmail = $service_group['email'];
    $groupLogo = $service_group['logo'];
    $groupColor = $service_group['color'];
    $groupUrl = $service_group['url'];
    $groupDescription = $service_group['description'];
} else {
    echo "Service group not found.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../../logo.png">
        <title><?php echo $productName; ?></title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 0;
            }

            header {
                background-color: <?php echo $groupColor; ?>;
                padding: 1em 0;
                text-align: center;
            }

            header img {
                width: 100px;
                height: auto;
                transition: transform 0.3s ease;
            }

            header a:hover img {
                transform: scale(1.1);
            }

            header h1 {
                color: #fff;
                margin: 0;
                font-size: 1.8em;
            }

            footer {
                text-align: center;
                padding: 1em 0;
                background-color: #333;
                color: #fff;
            }

            main {
                display: flex;
                max-width: 1200px;
                margin: 2em auto;
                padding: 2em;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .product-image img {
                width: 100%;
                max-width: 400px;
                height: auto;
                border-radius: 10px;
            }

            .product-details {
                margin-left: 2em;
                flex: 1;
            }

            .product-details h2 {
                color: <?php echo $groupColor; ?>;
                margin-top: 0;
            }

            .product-price {
                font-size: 1.5em;
                font-weight: bold;
                color: #27ae60;
            }

            .product-description {
                margin: 1em 0;
                font-size: 1.1em;
                color: #333;
            }

            .contact-info {
                margin-top: 1em;
                font-weight: bold;
                color: #555;
            }

            .back-button, .service-group-link {
                display: inline-block;
                padding: 10px 20px;
                background-color: <?php echo $groupColor; ?>;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 1em;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            .back-button:hover, .service-group-link:hover {
                background-color: #333;
                transform: scale(1.05);
            }

            .service-group-link {
                margin-left: 1em;
            }
        </style>
    </head>
    <body>
        <header>
            <a href="<?php echo $groupUrl; ?>"><img src="<?php echo $groupLogo; ?>" alt="<?php echo $groupName; ?> Logo"></a>
            <h1><?php echo $groupName; ?></h1>
            <a href="http://localhost/ServiceCo/index.php" class="back-button">Back to ServiceCo</a>
        </header>
        <main>
            <div class="product-image">
                <img src="<?php echo $productImage; ?>" alt="<?php echo $productName; ?> Image">
            </div>
            <div class="product-details">
                <h2><?php echo $productName; ?></h2>
                <p class="product-price">$<?php echo number_format($productPrice, 2); ?></p>
                <p class="product-description"><?php echo nl2br($productDescription); ?></p>
                <p class="contact-info">For more information or to purchase, contact: <a href="mailto:<?php echo $groupEmail; ?>"><?php echo $groupEmail; ?></a></p>
            </div>
        </main>
        <footer>
            <p>2024 <?php echo $groupName; ?></p>
        </footer>
    </body>
</html>