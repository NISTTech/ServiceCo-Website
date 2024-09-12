<?php
// get service group data using service group var
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serviceco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM service_groups WHERE name = ?");
$stmt->bind_param("s", $serviceGroup);
$stmt->execute();
$result = $stmt->get_result();

// check if result returned
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $groupName = $row['name'];
    $groupLogo = $row['logo'];
    $groupDescription = $row['description'];
} else {
    echo "Service group not found.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="<?php echo $groupLogo; ?>">
        <title><?php echo $groupName; ?></title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <header>
            <a href="<?php echo $row['url']; ?>"><img src="<?php echo $groupLogo; ?>" alt="<?php echo $groupName; ?> Logo"></a>
            <h1>Welcome to <?php echo $groupName; ?></h1>
            <a href="http://localhost/ServiceCo/index.php" class="home-button"> Back To ServiceCo</a>
        </header>
        <main>
            <section id="goals">
                <h2>Our Goals</h2>
                <p><?php echo $groupDescription; ?></p>
            </section>
            <section id="products">
                <h2>Our Products</h2>
                <!-- products here... -->
            </section>
        </main>
        <footer>
            <p><?php echo $groupName; ?></p>
        </footer>
    </body>
</html>