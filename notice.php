<?php
if (isset($_POST['submit'])) {
    // Connect to the database
    $conn = new mysqli('host', 'username', 'password', 'database');

    // Get the notice data from the form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $expDate = $_POST['expDate'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO notices (title, description, category, expDate) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $description, $category, $expDate);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Notice posted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
