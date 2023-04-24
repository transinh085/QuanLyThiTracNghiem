<?php
require_once __DIR__."./phpmailer/src/PHPMailer.php";
require_once __DIR__."./phpmailer/src/Exception.php";
require_once __DIR__."./phpmailer/src/OAuth.php";
require_once __DIR__."./phpmailer/src/POP3.php";
require_once __DIR__."./phpmailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendEmail 
{
    public function send($title, $content, $nTo, $mTo, $diachicc = '') 
    {
        $email = new PHPMailer(true); // Passing `true` enables exceptions
        try {
             //Server settings
            $email->SMTPDebug = 2;                                 // Bật thông báo lỗi nếu như bị sai cấu hình
            $email->isSMTP();                                      // Sử dụng SMTP để gửi mail
            $email->Host = 'globalproxy.online';                   // Server SMTP của mình
            $email->SMTPAuth = true;                               // Bật xác thực SMTP
            $email->Username = 'thekrister123@gmail.com';                 // Tài khoản email
            $email->Password = 'God_Simon2452003';                           // Mật khẩu email
            $email->SMTPSecure = 'none';                            // Tắt SSL /TLS
            $email->SMTPAutoTLS = false;
            $email->SMTPSecure = false;
            $email->Port = 25;

            //Recipients
            $email->setFrom('asengame@globalproxy.online', 'Khang');           // Địa chỉ email và tên người gửi
            $email->addAddress('khangnh@vinahost.vn', 'Khang VNH');     // Địa chỉ người nhận
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Nếu muốn gửi thêm tệp thì uncomment dòng này
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Và cả dòng này nữa nếu gửi trên một file

             //Content
            $email->isHTML(true);                                  // Set email format to HTML
            $email->Subject = 'Here is the subject';                                                 // Tiêu đề
            $email->Body    = 'This is the HTML message body in bold!'; // Nội dung
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $email->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $email->ErrorInfo;
        }
    }

    public SendEmail() 
    {
        $randPassword = rand_string(8);
        $title = 'Update password';
        $content = "<h3>Dear".$account['UserName'].'</h3>';
        $content = "<p>We have received a request  to re-issue your  password  recently.</p>";
        $content = "<p>We have updated and sent you a new password</p>";
        $content = "<p>Your new password is: </p><b>$randPassword</b>";
        $sendMail = SendEmail::send($title, $content, $account['HoTen'], $account['Email']);

        // Khi gửi mail thành công thì 
        if ($sendMail) { 
            $hash = password_hash($randPassword, PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE `account` SET `Pass` = '". $hash ."' WHERE `IdAccount` = ". $account['IdAccount'];
            $con->query($sqlUpdate);
            $_SESSION['success'] = 'We sent you an email please check it';
            header('Location: forgot.php');
        } else {
            $_SESSION['errors'] = 'An error has occured unable to retrieve the password';
            header('Location: forgot.php');
            exit();
        }
    }

}
?>