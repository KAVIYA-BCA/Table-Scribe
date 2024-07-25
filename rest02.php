<form action="book_table.php" method="post">
    <input type="hidden" name="table_id" value="<?php echo $table_id; ?>">
    Name: <input type="text" name="customer_name"><br>
    Phone: <input type="text" name="phone"><br>
    Email: <input type="text" name="email"><br>
    Date: <input type="date" name="booking_date"><br>
    Time: <input type="time" name="booking_time"><br>
    <input type="submit" value="Book Table">
</form>
