<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailReminderController extends Controller
{
    public function sendReminders()
    {
        // Fetch deadlines approaching in 1 week
        $deadlines = Peralatan::where('periode_akhir', '<', now()->addDays(7))->get();

        // Send email reminders for each deadline
        foreach ($deadlines as $deadline) {
            $this->sendEmailReminder($deadline);
        }

        return response()->json(['message' => 'Reminders sent successfully']);
    }

    private function sendEmailReminder($deadline)
    {
        $user = $deadline->user;
        $email = $user->email;
        $deadlineName = $deadline->name;
        $deadlineDate = $deadline->periode_akhir->format('Y-m-d');

        // Create PHPMailer instance
        $mail = new PHPMailer(true);

        // Set email configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply@example.com'; // Replace with your SMTP username
        $mail->Password = 'your_smtp_password'; // Replace with your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Set sender and recipient information
        $mail->setFrom('noreply@example.com', 'Project Management');
        $mail->addAddress($email, $user->name);

        // Set email subject and content
        $mail->Subject = 'Reminder: Deadline Approaching for ' . $deadlineName;
        $mail->Body = "Hello $user->name,\n\nThis is a reminder that your deadline for $deadlineName is approaching. The deadline is on $deadlineDate.\n\nPlease review and complete your task as soon as possible.\n\nSincerely,\nProject Management Team";

        // Send the email
        if (!$mail->send()) {
            // Handle error if email sending fails
            echo 'Failed to send email: ' . $mail->ErrorInfo;
        } else {
            echo 'Email sent successfully to ' . $email . ' for deadline ' . $deadlineName . ' on ' . $deadlineDate . "\n";
        }
    }
}
