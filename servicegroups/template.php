<?php
// check ID
if (!isset($serviceGroupId)) {
    die("Service group ID not set.");
}

// DB conn
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serviceco";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// check conn
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// fetch details
$sql = "SELECT * FROM service_groups WHERE id = $serviceGroupId";
$result = mysqli_query($conn, $sql);

// check if result is returned
if (mysqli_num_rows($result) > 0) {
    // fetch group data
    $row = mysqli_fetch_assoc($result);
    $groupName = $row['name'];
    $groupLogo = $row['logo'];
    $groupDescription = $row['description'];
} else {
    echo "Service group not found.";
    exit;
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo $groupLogo; ?>">
    <title><?php echo $groupName; ?></title>
    <link rel="stylesheet" href="./style.css">
    <script>var x4D = "\x4F\x72\x69\x67\x69\x6E\x61\x6C\x20\x53\x69\x74\x65\x20\x4D\x61\x64\x65\x20\x42\x79\x20\x4A\x5A";</script>
</head>
<body>
    <header>
        <a href="<?php echo $row['url']; ?>"><img src="<?php echo $groupLogo; ?>" alt="<?php echo $groupName; ?> Logo"></a>
        <h1>Welcome to <?php echo $groupName; ?></h1>
        <a href="http://localhost/ServiceCo/index.php" class="home-button">Back To ServiceCo</a>
    </header>
    <main>
        <section id="goals">
            <h2>Our Goals</h2>
            <p><?php echo $groupDescription; ?></p>
        </section>
        <section id="products">
            <h2>Our Products</h2>
            <!-- Products can be displayed here using the same ID -->
        </section>
    </main>
    <footer>
        <p><?php echo $groupName; ?></p>
    </footer>
</body>
</html>