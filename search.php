<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "serviceco");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search term from user input
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Escape special characters in the search term
$searchTerm = $conn->real_escape_string($searchTerm);

// Search service groups
$sqlServiceGroup = "SELECT * FROM service_groups WHERE name LIKE '%$searchTerm%'";
$resultServiceGroup = $conn->query($sqlServiceGroup);

// Search products
$sqlProducts = "SELECT * FROM products WHERE description LIKE '%$searchTerm%'";
$resultProducts = $conn->query($sqlProducts);

// Display service groups results
if ($resultServiceGroup && $resultServiceGroup->num_rows > 0) {
    echo "<div class='results-header'><b>Service Groups:</b></div>";
    while ($sgRow = $resultServiceGroup->fetch_assoc()) {
        echo "<div class='service-group-item'><a href='" . $sgRow['url'] . "'>" . $sgRow['name'] . "</a></div>";
    }
} else {
    echo "<div>No service groups found.</div>";
}

// Display products results
if ($resultProducts && $resultProducts->num_rows > 0) {
    echo "<div class='results-header'><b>Products:</b></div>";
    while ($productRow = $resultProducts->fetch_assoc()) {
        echo "<div class='product-item'>";
        echo "<a>" . $productRow['name'] . "</a>";
        echo "</div>";
    }
} else {
    echo "<div>No products found.</div>";
}

// Close database connection
$conn->close();
?>