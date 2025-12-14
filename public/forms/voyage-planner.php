<?php
// Voyage Planner Form Handler
// Don't use this in production without proper validation and security measures

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $preferred_date = isset($_POST['preferred_date']) ? htmlspecialchars($_POST['preferred_date']) : '';
    $number_of_people = isset($_POST['number_of_people']) ? htmlspecialchars($_POST['number_of_people']) : '';
    $trip_type = isset($_POST['trip_type']) ? htmlspecialchars($_POST['trip_type']) : '';
    $purpose = isset($_POST['purpose']) ? htmlspecialchars($_POST['purpose']) : '';
    $goals = isset($_POST['goals']) ? htmlspecialchars($_POST['goals']) : '';
    $additional_info = isset($_POST['additional_info']) ? htmlspecialchars($_POST['additional_info']) : '';

    // Create email content
    $to = "info@waymakervoyages.com"; // Change to your email
    $subject = "New Voyage Request from $name";
    
    $email_content = "New Voyage Request:\n\n";
    $email_content .= "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Preferred Date: $preferred_date\n";
    $email_content .= "Number of People: $number_of_people\n";
    $email_content .= "Trip Type: $trip_type\n";
    $email_content .= "Purpose: $purpose\n";
    $email_content .= "Goals: $goals\n";
    $email_content .= "Additional Info: $additional_info\n";

    // Send email (you might want to use a more robust email solution)
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // In a real implementation, you would send the email here
    // mail($to, $subject, $email_content, $headers);

    // For demo purposes, we'll just return a success response
    echo json_encode(['status' => 'success']);
} else {
    // Not a POST request
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>