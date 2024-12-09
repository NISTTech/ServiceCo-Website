<?php
if (!isset($serviceGroupId)) {
    die("Service group ID not set.");
}

$conn = new mysqli("localhost", "root", "", "serviceco");

$result = $conn->query("SELECT * FROM service_groups WHERE id = $serviceGroupId");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $groupName = $row['name'];
    $groupEmail = $row['email'];
    $groupColor = $row['color'];
    $groupLogo = $row['logo'];
    $groupUrl = $row['url'];
    $groupDescription = $row['description'];
} else {
    echo "Service group not found.";
    exit;
}

$productsPerPage = 8;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $productsPerPage;

$product_result = $conn->query("SELECT * FROM products WHERE service_group_id = $serviceGroupId LIMIT $productsPerPage OFFSET $offset");
$total_products = $conn->query("SELECT COUNT(*) as total FROM products WHERE service_group_id = $serviceGroupId")->fetch_assoc()['total'];
$total_pages = ceil($total_products / $productsPerPage);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../../logo.png">
        <title><?php echo htmlspecialchars($groupName); ?></title>
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

            footer {
                text-align: center;
                padding: 1em 0;
                background-color: #333;
                color: #fff;
            }

            main {
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

            #goals, #products {
                margin-bottom: 2em;
            }

            .product-wall {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 20px;
                margin-top: 2em;
            }

            .product-wall a {
                display: block;
                text-align: center;
                text-decoration: none;
            }

            .product-wall img {
                max-width: 100%;
                height: auto;
                transition: transform 0.3s ease;
                border-radius: 5px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .product-wall a:hover img {
                transform: scale(1.1);
            }

            .product-name {
                margin-top: 0.5em;
                color: #333;
                font-size: 1em;
                font-weight: bold;
            }

            .no-products {
                grid-column: 1 / -1;
                text-align: center;
                padding: 10px;
                color: #000;
            }

            .pagination {
                text-align: center;
                margin-top: 1em;
            }

            .pagination a {
                display: inline-block;
                margin: 0 5px;
                padding: 5px 10px;
                background-color: <?php echo $groupColor; ?>;
                color: #fff;
                text-decoration: none;
                border-radius: 3px;
                transition: background-color 0.3s ease;
            }

            .pagination a:hover {
                background-color: #333;
            }

            .pagination a.active {
                background-color: #333;
                font-weight: bold;
            }

            .home-button {
                display: inline-block;
                margin-top: 1em;
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
        </style>
    </head>
    <body>
        <header>
            <a href="<?php echo htmlspecialchars($groupUrl); ?>"><img src="<?php echo htmlspecialchars($groupLogo); ?>" alt="<?php echo htmlspecialchars($groupName); ?> Logo"></a>
            <h1>Welcome to <?php echo htmlspecialchars($groupName); ?></h1>
            <p><a href="mailto:<?php echo htmlspecialchars($groupEmail); ?>"><?php echo htmlspecialchars($groupEmail); ?></a></p>
            <a href="http://localhost/ServiceCo/index.php" class="home-button">Back To ServiceCo</a>
        </header>
        <main>
            <section id="goals">
                <h2>Our Goals</h2>
                <p><?php echo htmlspecialchars($groupDescription); ?></p>
            </section>
            <section id="products">
                <h2>Our Products</h2>
                <div class="product-wall">
                    <?php 
                    if ($product_result->num_rows > 0) {
                        while ($product = $product_result->fetch_assoc()) {
                            echo '<a href="#">';
                            echo '<img src="' . $product['image'] . '" alt="' . htmlspecialchars($product['name']) . '">';
                            echo '<p class="product-name">' . htmlspecialchars($product['name']) . '</p>';
                            echo '</a>';
                        }
                    } else {
                        echo '<p class="no-products">No products available for this service group.</p>';
                    }
                    ?>
                </div>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="?serviceGroupId=<?php echo $serviceGroupId; ?>&page=<?php echo $i; ?>" class="<?php echo $page == $i ? 'active' : ''; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>
                </div>
            </section>
        </main>
        <footer>
            <p>2024 <?php echo htmlspecialchars($groupName); ?></p>
        </footer>
    </body>
</html>