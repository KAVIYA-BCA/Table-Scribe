<?php
// Fetch restaurants
$sql = "SELECT * FROM restaurants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>" . $row["description"] . "</p>";
        
        // Fetch tables for this restaurant
        $sql_tables = "SELECT * FROM tables WHERE restaurant_id = " . $row["id"];
        $result_tables = $conn->query($sql_tables);
        
        if ($result_tables->num_rows > 0) {
            while($table_row = $result_tables->fetch_assoc()) {
                echo "<p>Table: " . $table_row["table_name"] . " (Capacity: " . $table_row["capacity"] . ")</p>";
                // Add a form/button to book this table
            }
        } else {
            echo "No tables found for this restaurant.";
        }
    }
} else {
    echo "No restaurants found.";
}
?>
