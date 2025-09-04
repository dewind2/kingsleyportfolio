<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    $role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : "General Inquiry";

    // Recipient email
    $to = "kingnsao1@gmail.com";
    $subject = "New Portfolio Contact: $role";

    $body = "You have received a new message from your portfolio website.\n\n";
    $body .= "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Role: $role\n";
    $body .= "Message:\n$message\n";

    $headers = "From: noreply@yourdomain.com\r\n";
    $headers .= "Reply-To: $name <$phone>";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p style='font-family:sans-serif; text-align:center; margin-top:50px;'>✅ Message sent successfully! Thank you, $name.</p>";
    } else {
        echo "<p style='font-family:sans-serif; text-align:center; margin-top:50px;'>❌ Sorry, your message could not be sent.</p>";
    }
}
?>
