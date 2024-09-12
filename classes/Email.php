<?php  

namespace Classes;

use Classes\Email as ClassesEmail;
use PHPMailer\PHPMailer\PHPMailer;
use Dotenv\Dotenv as Dotenv;
$dotenv = Dotenv::createImmutable('../includes/.env');
$dotenv->safeLoad();

class Email{
    public $email;
    public $nombre;
    public $token;
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
    public function enviarConfirmacion(){
        // crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];

        $mail->setFrom('cuentas@appbarber.com');
        $mail->addAddress('cuentas@appbarber.com', 'AppBarber.com');
        $mail->Subject = "Confirma tu cuenta";

        // set HTML

        $mail->isHTML(TRUE);
        $mail->CharSet = "UTF-8";

        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cuenta ahora eres miembro El Pueblo, solo debes confirmarla presionando el siguiente enlace </p>";
        $contenido .= "<p>Presiona aquí: <a href='"   . $_ENV['APP_URL']    . "/confirmar-cuenta?token=" . $this->token . "' </a> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';

        $mail->Body = $contenido;

        //enviar email

        $mail->send();
    
    }
    public function enviarInstrucciones(){
          // crear el objeto de email
          $mail = new PHPMailer();
          $mail->isSMTP();
          $mail->Host = $_ENV['EMAIL_HOST'];
          $mail->SMTPAuth = true;
          $mail->Port = $_ENV['EMAIL_PORT'];
          $mail->Username = $_ENV['EMAIL_USER'];
          $mail->Password = $_ENV['EMAIL_PASS'];
  
          $mail->setFrom('cuentas@appbarber.com');
          $mail->addAddress('cuentas@appbarber.com', 'AppBarber.com');
          $mail->Subject = "Restablece tu Password";
  
          // set HTML
  
          $mail->isHTML(TRUE);
          $mail->CharSet = "UTF-8";
  
          $contenido = '<html>';
          $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado resstablecer tu password, sigue en el siguiente enlace para hacerlo. </p>";
          $contenido .= "<p> Presiona aqui: <a href='"   . $_ENV['APP_URL']    . "/recuperar?token=" . $this->token . "'>Restablecer Password</a></p>";
          $contenido .= "<p>Si tu no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
          $contenido .= '</html>';
  
          $mail->Body = $contenido;
  
          //enviar email
  
          $mail->send();
    }
}
