<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve the form fields securely
    $name = htmlspecialchars(trim($_POST['name']));
    $age = isset($_POST['age']) ? (int) $_POST['age'] : '';
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));
    $selection = htmlspecialchars(trim($_POST['sel']));

    // Validate required fields
    if (!empty($name) && !empty($email) && !empty($message)) {
        
        // Validate the email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            // Prepare the email
            $to = "anais.dubois5@outlook.fr";
            $subject = "New contact message from $name";
            $body = "Name: $name\n";
            $body .= "Age: $age\n";
            $body .= "Email: $email\n";
            $body .= "Message:\n$message\n";
            $body .= "How they found your page: $selection\n";
            
            // Email headers
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            // Send the email
            if (mail($to, $subject, $body, $headers)) {
                echo "Thank you, your message has been sent successfully.";
            } else {
                echo "An error occurred while sending your message.";
            }
        } else {
            echo "Invalid email address.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
