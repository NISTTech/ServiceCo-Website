<?php
$conn = new mysqli("localhost", "root", "", "serviceco");

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
$resultServiceGroup = $conn->query("SELECT * FROM service_groups WHERE name LIKE '%$searchTerm%'");
$resultProducts = $conn->query("SELECT * FROM products WHERE description LIKE '%$searchTerm%'");

$results = [];

if ($resultServiceGroup->num_rows > 0) {
    $results[] = "<div class='results-header'>Service Groups:</div>";
    while ($sgRow = $resultServiceGroup->fetch_assoc()) {
        $results[] = "<div class='service-group-item'><a href='" . $sgRow['url'] . "'>" . $sgRow['name'] . "</a></div>";
    }
} else {
    $results[] = "<div class='error'>No service groups found.</div>";
}

if ($resultProducts->num_rows > 0) {
    $results[] = "<div class='results-header'>Products:</div>";
    while ($productRow = $resultProducts->fetch_assoc()) {
        $results[] = "<div class='product-item'><a href='#'>" . $productRow['name'] . "</a></div>";
    }
} else {
    $results[] = "<div class='error'>No products found.</div>";
}

echo implode('', $results);

$conn->close();
?>