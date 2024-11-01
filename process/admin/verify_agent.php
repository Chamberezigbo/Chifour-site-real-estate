<?php
require('../core/pdo.php');
$db = new DatabaseClass();

// Check if the user ID is set in the POST request for verification
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Update the agent's verification status in the database
    $result = $db->Update("UPDATE agent SET verified = 1 WHERE user_id = :user_id", ['user_id' => $user_id]);

    // Check if the update was successful
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
    exit; // End the script after handling the POST request
}