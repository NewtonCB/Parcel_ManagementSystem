<?php
$con=mysqli_connect("localhost", "root", "", "cmsdb");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors', '1');
$response = [
  'status' => 'error',
  'message' => 'Error fuck '
];

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get raw JSON data from the request body
  $jsonData = file_get_contents('php://input');

  // Decode the JSON data
  $formData = json_decode($jsonData, true);

  // Clean the data   
  $seatId = cleanInput($formData['seat_id']);
  $firstName = cleanInput($formData['first_name']);
  $lastName = cleanInput($formData['last_name']);
  $phone = cleanInput($formData['phone']);
  $passportNumber = cleanInput($formData['passport_number']);
  $response = [
    'status' => 'error',
    'message' => 'Error fuck '
  ];

 // create sql stmt
  $sqlInsert = "INSERT INTO user_data (seat_id, first_name, last_name, phone, passport_number)
    VALUES (?, ?, ?, ?, ?)";
  $stmtInsert = $con->prepare($sqlInsert);
  $stmtInsert->bind_param("sssss", $seatId, $firstName, $lastName, $phone, $passportNumber);

  // Execute the prepared statement to insert data into the user_data table
  if ($stmtInsert->execute()) {
    // After successful user_data insertion, update the is_booked column in the seats table
    $sqlUpdateSeats = "UPDATE seats SET is_booked = 1 WHERE seat_id = ?";
    $stmtUpdateSeats = $con->prepare($sqlUpdateSeats);
    $stmtUpdateSeats->bind_param("s", $seatId);

    // Execute the prepared statement to update the is_booked column in the seats table
    if ($stmtUpdateSeats->execute()) {
      $response = [
        'status' => 'success',
        'message' => 'Form submitted successfully',
        'data' => [
          'seat_id' => $seatId,
          'first_name' => $firstName,
          'last_name' => $lastName,
          'phone' => $phone,
          'passport_number' => $passportNumber,
        ],
      ];
    } else {
      $response = [
        'status' => 'error',
        'message' => 'Error updating booked column: ' . $stmtUpdateSeats->error,
      ];
    }

    // Close the seats table update statement
    $stmtUpdateSeats->close();
  } else {
    $response = [
      'status' => 'error',
      'message' => 'Error submitting form: ' . $stmtInsert->error,
    ];
  }

  // Close the user_data table insert statement and connection
  $stmtInsert->close();
  $con->close();

  header('Content-Type: application/json');
  echo json_encode($response);
} else {
  // If it's not a POST request, return an error response
  header('HTTP/1.1 405 Method Not Allowed');
  echo 'Method Not Allowed';
}

function cleanInput($value)
{
  // Implement your data cleaning logic here
  $value = trim($value);
  $value = strip_tags($value);
  // For simplicity, we're using trim() to remove leading and trailing whitespaces
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
