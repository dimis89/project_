<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $application_id = $_POST["application_id"];
    $decision = $_POST["decision"];

      $supervisor_email = "eft.dimis@outlook.com";
	  $subject = "Application Decision for Application ID: $application_id";

    if ($decision === "accept") {
        $message = "Dear Applicant,\n\n";
        $message .= "Your application with Application ID: $application_id has been accepted.\n\n";
    } elseif ($decision === "reject") {
        $message = "Dear Applicant,\n\n";
        $message .= "Your application with Application ID: $application_id has been rejected.\n\n";
    } else {
        echo "Invalid decision.";
        exit;
    }

    $headers = "From: noreply@example.com\r\n";
    if (mail('eft.dimis@outlook.com','Reason', $message, $headers)) {
        echo "Decision email sent successfully!";
    } else {
        echo "Failed to send decision email.";
    }
}
?>