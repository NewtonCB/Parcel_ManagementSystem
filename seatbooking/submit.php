<?php

if($_SERVER["REQUEST METHOD"] == "POST"){

    $userStmt = $conn->prepare("INSERT INTO users(first_name, last_name, phone) VALUES (?, ?, ?)");
    $userStmt->bind_param("sss",$firstName, $lastName, $phone);

    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $phone = $_POST["phone"];
    $userStmt->execute();

    $userStmt->close();

    $seatStmt = $conn->prepare("UPDATE seats SET is_booked = 1 WHERE seat_id = ?");
    $seatStmt->bind_param("i",$seatId);

    $seatId = $_POST["seat_id"];

    $seatStmt->execute();

    $seatStmt->close();
    
}

?>