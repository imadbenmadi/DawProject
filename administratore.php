<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Messages</h1>
    
    <?php
    // Replace the database credentials with your own
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "messages";

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Prepare the SQL statement to fetch messages from the database
    $stmt = $pdo->prepare("SELECT * FROM messages");

    // Execute the statement
    $stmt->execute();

    // Fetch all the messages as an associative array
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <tr>
            <th>Email</th>
            <th>Title</th>
            <th>Message</th>
        </tr>
        <?php foreach ($messages as $message): ?>
        <tr>
            <td><?php echo $message['email']; ?></td>
            <td><?php echo $message['title']; ?></td>
            <td><?php echo $message['message']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
