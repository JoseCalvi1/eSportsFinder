<?php
require dirname(__FILE__) . '/../vendor/PHPMailer/src/Exception.php';
require dirname(__FILE__) . '/../vendor/PHPMailer/src/PHPMailer.php';
require dirname(__FILE__) . '/../vendor/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ModeloBase extends EntidadBase
{

    public function __construct($table, $fields = array(), $id = '')
    {
        $this->table = (string)$table;
        $this->fields = $fields;
        parent::__construct($table, $fields, $id);
    }

    public function save()
    {
        global $current_user;
        if (!empty($this->id)) {
            $this->modified_by = $current_user->id;
            if ($this->update()) {
                return true;
            }
        } else {
            $this->created_by = $current_user->id;
            if ($this->insert()) {
                return true;
            }
        }
        return false;
    }

    public function ejecutarSql($query)
    {
        $query = $this->db->query($query);
        if ($query == true) {
            if (!empty($query->num_rows)) {
                if ($query->num_rows > 1) {
                    while ($row = $query->fetch_object()) {
                        $resultSet[] = $row;
                    }
                } elseif ($query->num_rows == 1) {
                    if ($row = $query->fetch_object()) {
                        $resultSet = $row;
                    }
                }
            } else {
                $resultSet = true;
            }
        } else {
            $resultSet = false;
        }

        return $resultSet;
    }

    public function sendMail($user, $email_subject, $email_template)
    {
        $result = false;
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            // TODO: Recuperar estas configuraciones de suite
            //$mail->SMTPDebug = 1;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->CharSet = "UTF-8";
            $mail->Host = $this->config['emailsetting']['mail_smtpserver'];  // Specify main and backup SMTP servers
            if ($this->config['emailsetting']['mail_smtpauth_req']) {
                $mail->SMTPAuth = true;
                $mail->Username = $this->config['emailsetting']['mail_smtpuser'];
                $mail->Password = $this->config['emailsetting']['mail_smtppass'];
            }
            if ($this->config['emailsetting']['mail_smtpssl'] == 1) {
                $mail->SMTPSecure = 'ssl';
            } else if ($this->config['emailsetting']['mail_smtpssl'] == 2) {
                $mail->SMTPSecure = 'tls';
            }
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Port = $this->config['emailsetting']['mail_smtpport'];                                    // TCP port to connect to
            //Recipients
            $mail->setFrom($this->config['emailsetting']['smtp_from_addr'], $this->config['emailsetting']['smtp_from_name']);
            $mail->addAddress($user->email, $user->name);     // Add a recipient
            $mail->addReplyTo($this->config['emailsetting']['smtp_from_addr'], $this->config['emailsetting']['smtp_from_name']);

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $email_subject;
            $mail->Body = $email_template;
            if ($mail->send()) {
                $result = true;
            }
        } catch (Exception $e) {
            throw new Exception('No se ha podido enviar el email. Mailer Error: ' . $mail->ErrorInfo, 500);
        }
        return $result;
    }

    /** Genera ids como en suitecrm */
    public function GUID()
    {
        if (function_exists('com_create_guid') === true) {
            $result = trim(com_create_guid(), '{}');
        } else {
            $result = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
        }
        return strtolower($result);
    }

}

?>
