<?php
// check if service group ID is set
if (!isset($serviceGroupId)) {
    die("Service group ID not set.");
}

// DB conn
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serviceco";

// database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check conn
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get service group using prepared statements
$stmt = $conn->prepare("SELECT * FROM service_groups WHERE id = ?");
$stmt->bind_param("i", $serviceGroupId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $groupName = htmlspecialchars($row['name']);
    $groupEmail = htmlspecialchars($row['email']);
    $groupColor = htmlspecialchars($row['color']);
    $groupLogo = htmlspecialchars($row['logo']);
    $groupUrl = htmlspecialchars($row['url']);
    $groupDescription = htmlspecialchars($row['description']);
} else {
    echo "Service group not found.";
    exit;
}

// get products for service group
$product_stmt = $conn->prepare("SELECT * FROM products WHERE service_group_id = ?");
$product_stmt->bind_param("i", $serviceGroupId);
$product_stmt->execute();
$product_result = $product_stmt->get_result();

// close DB conn
$stmt->close();
$product_stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../logo.png">
    <title><?php echo $groupName; ?></title>
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

        footer {
            text-align: center;
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
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
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
        <a href="<?php echo $groupUrl; ?>"><img src="<?php echo $groupLogo; ?>" alt="<?php echo $groupName; ?> Logo"></a>
        <h1>Welcome to <?php echo $groupName; ?></h1>
        <p><?php echo $groupEmail; ?></p>
        <a href="http://localhost/ServiceCo/index.php" class="home-button">Back To ServiceCo</a>
    </header>
    <main>
        <section id="goals">
            <h2>Our Goals</h2>
            <p><?php echo $groupDescription; ?></p>
        </section>
        <section id="products">
            <h2>Our Products</h2>
            <div class="product-wall">
                <?php 
                if ($product_result->num_rows > 0) {
                    while ($product = $product_result->fetch_assoc()) {
                        echo '<a href="#">';
                        echo '<img src="' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">';
                        echo '<p class="product-name">' . htmlspecialchars($product['name']) . '</p>';
                        echo '</a>';
                    }
                } else {
                    echo '<p class="no-products">No products available for this service group.</p>';
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>2024 <?php echo $groupName; ?></p>
    </footer>
</body>
</html>