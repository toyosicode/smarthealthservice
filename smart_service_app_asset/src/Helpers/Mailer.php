<?php
namespace Helpers;

use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    /**
     * @param $subject
     * @param $message
     * @param $sendto_email
     * @param $sendto_name
     * @param $from_name
     * @param $attachment
     * @param $type
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    static public function  send_email($subject, $message, $sendto_email, $sendto_name, $from_name = '', $attachment = '', $type = NULL) {

        $template = $message;

        $template = str_replace('[NAME]', $sendto_name, $template);

        $main_unsub_link = '';

        $send_mail = Mailer::phpmailer_send_email($subject, $template, $sendto_email, $sendto_name, $from_name, $attachment, $type, $main_unsub_link);

        if($send_mail) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $subject
     * @param $message
     * @param $sendto_email
     * @param $sendto_name
     * @param $from_name
     * @param $attachment
     * @param $type
     * @param $unsubscribe_link
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    static public function phpmailer_send_email($subject, $message, $sendto_email, $sendto_name, $from_name = '', $attachment = '', $type = NULL, $unsubscribe_link =  '') {

        //PHPMailer Object
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = SMTP_HOST;  // specify main and backup server
        $mail->SMTPAuth = true;     // turn on SMTP authentication
        $mail->Username = SMTP_USERNAME;  // SMTP username
        $mail->Password = SMTP_PASSWORD; // SMTP password
        $mail->CharSet = "utf-8";

        //From email address and name
        $mail->From = "noreply@smarthealthservice.com.ng";

        if(isset($from_name) && !empty($from_name)) {
            $mail->FromName = $from_name;
        } else {
            $mail->FromName = "Smart Health Service";
        }

        $mail->addReplyTo("support@smarthealthservice.com.ng", $mail->FromName);

        //Send HTML or Plain Text email
        $mail->isHTML(true);

        //To address and name
        $mail->clearAddresses();
        $mail->addAddress("$sendto_email", "$sendto_name");

        $mail->Subject = $subject;
        $mail->Body = $message;

        if(isset($attachment) && !empty($attachment)) {
            $mail->addAttachment($attachment);
        }

        $mail->addCustomHeader('List-Unsubscribe-Post:', 'List-Unsubscribe=One-Click');
        $mail->addCustomHeader('List-Unsubscribe', '<' . $unsubscribe_link . '>, <mailto: unsubscribe@smarthealthservice.com.ng?subject=unsubscribe>');

        return $mail->send();
    }
}