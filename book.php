<?php
require 'config.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    die('You must be logged in to book a table.');
}

// Fetch available tables
$sql = "SELECT * FROM tables WHERE status = 'available'";
$tables = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table_id = $_POST['table_id'];
    $booking_time = $_POST['booking_time'];
    $user_id = $_SESSION['user_id'];

    $pdo->beginTransaction();
    
    try {
        // Book the table
        $sql = "INSERT INTO bookings (user_id, table_id, booking_time) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user_id, $table_id, $booking_time]);

        // Update table status
        $sql = "UPDATE tables SET status = 'reserved' WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$table_id]);

        $pdo->commit();
        echo 'Table booked successfully.';
    } catch (Exception $e) {
        $pdo->rollBack();
        echo 'Error: ' . $e->getMessage();
    }
}
?>

<form method="POST">
    Table:
    <select name="table_id" required>
        <?php foreach ($tables as $table): ?>
            <option value="<?= $table['id'] ?>"><?= $table['table_number'] ?> (Seats: <?= $table['seats'] ?>)</option>
        <?php endforeach; ?>
    </select><br>
    Booking Time: <input type="datetime-local" name="booking_time" required><br>
    <input type="submit" value="Book Table">
</form>
