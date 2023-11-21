<?php
// Establish database connection (replace placeholders with actual values)
$conn = new mysqli("klompok3cloud-server.postgres.database.azure.com", "zbnbkxzkuj", "7D5N6PQ1VJWZW8L1$", "klompok3cloud-database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$recipient = $conn->real_escape_string($_POST['recipient']);
$message = $conn->real_escape_string($_POST['message']);

// Insert data into the database
$sql = "INSERT INTO messages (recipient, message) VALUES ('$recipient', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "<p>Message sent successfully!</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
