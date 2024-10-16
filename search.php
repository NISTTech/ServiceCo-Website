<?php
// DB conn
$conn = new mysqli("localhost", "root", "", "serviceco");

// check conn
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get search term from user input
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$searchTerm = $conn->real_escape_string($searchTerm);

// search service groups
$sqlServiceGroup = "SELECT * FROM service_groups WHERE name LIKE '%$searchTerm%'";
$resultServiceGroup = $conn->query($sqlServiceGroup);

// search products
$sqlProducts = "SELECT * FROM products WHERE description LIKE '%$searchTerm%'";
$resultProducts = $conn->query($sqlProducts);

// show service groups result
if ($resultServiceGroup->num_rows > 0) {
    echo "<div>Service Groups:</div>";
    while ($sgRow = $resultServiceGroup->fetch_assoc()) {
        echo "<div><a href='" . $sgRow['url'] . "'>" . $sgRow['name'] . "</a></div>";
    }
} else {
    echo "<div>No service groups found.</div>";
}

// show products result
if ($resultProducts->num_rows > 0) {
    echo "<div>Products:</div>";
    while ($productRow = $resultProducts->fetch_assoc()) {
        echo "<div>";
        echo "<a>" . $productRow['name'] . "</a><br>";
        echo "<p>" . $productRow['description'] . "</p>";
        echo "<span>Price: $" . $productRow['price'] . "</span>";
        echo "</div>";
    }
} else {
    echo "<div>No products found.</div>";
}

$conn->close();
?>