<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve the form data
  $email = $_POST["email"];
  $title = $_POST["title"];
  $message = $_POST["message"];

  // Perform any additional processing or validation here
  
  // Example: Save the data to a database
  // Assuming you have a database connection established
  // Replace the database credentials with your own
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "messages";

  // Create a new PDO instance
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // Prepare the SQL statement
  $stmt = $pdo->prepare("INSERT INTO messages (email, title, message) VALUES (?, ?, ?)");

  // Bind the parameters
  $stmt->bindParam(1, $email);
  $stmt->bindParam(2, $title);
  $stmt->bindParam(3, $message);

  // Execute the statement
  $stmt->execute();

  // Close the database connection
  $pdo = null;

  // Display a success message
  echo "Message sent successfully!";
}
?>
