<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_id = $_POST['table_id'];
    $customer_name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $booking_date = $_POST['booking_date'];
    $booking_time = $_POST['booking_time'];
    
    // Insert into bookings table
    $sql = "INSERT INTO bookings (table_id, customer_name, phone, email, booking_date, booking_time, created_at)
            VALUES ('$table_id', '$customer_name', '$phone', '$email', '$booking_date', '$booking_time', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
