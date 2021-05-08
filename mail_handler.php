<?php
if (isset($_POST['submit'])) {
    $to = "rusmanis.karlis@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['firstname'];
    $subject = "Form submission";
    $subject2 = "Jūsu ziņa";
    $message = $first_name . " " . " rakstīja:" . "\n\n" . $_POST['message'];
    $message2 = "Jūsu ziņa tika saņemta: " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to, $subject, $message, $headers);
    mail($from, $subject2, $message2, $headers2); // sends a copy of the message to the sender
    echo "Ziņa tika nosūtīta! Paldies " . $first_name . ", tuvākajā laikā ar Jums sazināsimies.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    // You cannot use header and echo together. It's one or the other.
}
