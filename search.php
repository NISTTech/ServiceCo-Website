<?php
// Establish database connection
$conn = new mysqli("localhost", "root", "", "serviceco");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search term from user input and trim it to remove leading/trailing spaces
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';

// Prepare the SQL statement for service groups
$stmtServiceGroup = $conn->prepare("SELECT * FROM service_groups WHERE name LIKE CONCAT('%', ?, '%')");
$stmtServiceGroup->bind_param("s", $searchTerm);
$stmtServiceGroup->execute();
$resultServiceGroup = $stmtServiceGroup->get_result();

// Prepare the SQL statement for products
$stmtProducts = $conn->prepare("SELECT * FROM products WHERE description LIKE CONCAT('%', ?, '%')");
$stmtProducts->bind_param("s", $searchTerm);
$stmtProducts->execute();
$resultProducts = $stmtProducts->get_result();

// Initialize result container
$results = [];

// Display service groups results
if ($resultServiceGroup->num_rows > 0) {
    $results[] = "<div class='results-header'><b>Service Groups:</b></div>";
    while ($sgRow = $resultServiceGroup->fetch_assoc()) {
        $results[] = "<div class='service-group-item'><a href='" . htmlspecialchars($sgRow['url']) . "'>" . htmlspecialchars($sgRow['name']) . "</a></div>";
    }
} else {
    $results[] = "<div>No service groups found.</div>";
}

// Display products results
if ($resultProducts->num_rows > 0) {
    $results[] = "<div class='results-header'><b>Products:</b></div>";
    while ($productRow = $resultProducts->fetch_assoc()) {
        $results[] = "<div class='product-item'><a>" . htmlspecialchars($productRow['name']) . "</a></div>";
    }
} else {
    $results[] = "<div>No products found.</div>";
}

// Output results
echo implode('', $results);

// Close prepared statements and database connection
$stmtServiceGroup->close();
$stmtProducts->close();
$conn->close();
?>