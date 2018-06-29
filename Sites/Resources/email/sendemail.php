<?php
    require 'PHPMailerAutoload.php';

    $name= $_POST['name'];
    $address= $_POST['address'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $message= $_POST['message'];

    $html_message = '<table>
        <tr>
            <td>Nom</td>
            <td>'. $name .'</td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td>'. $address .'</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>'. $email .'</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>'. $phone .'</td>
        </tr>
        <tr>
            <td>Message</td>
            <td>'. $message .'</td>
        </tr>
    </table>';

    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'anbinh.resto.paris@gmail.com';                 // SMTP username
    $mail->Password = 'Anbinh123456';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom($email, $name);
    $mail->addAddress('admin@anbinh-resto.fr');
    $mail->isHTML(true);

    
    $mail->Subject = $name . ' vous a envoye un message';
    $mail->Body = $html_message;


    if(!$mail->send()){
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
        echo 'Message has been sent';
    }
?>