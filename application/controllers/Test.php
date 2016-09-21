<?php
class Test extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('My_phpmailer');
    }
     
    public function index() {
        print_r("ok test");
        exit;
    } 

     public function send_mail() {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // establecemos que utilizaremos SMTP
        $mail->SMTPAuth   = true; // habilitamos la autenticación SMTP
        $mail->SMTPSecure = "ssl";  //tls // establecemos el prefijo del protocolo seguro de comunicación con el servidor
        $mail->Host       = "smtp.gmail.com";      // establecemos GMail como nuestro servidor SMTP
        $mail->Port       = 465;   //587         // establecemos el puerto SMTP en el servidor de GMail
        $mail->Username   = "coto.coopman7@gmail.com";  // la cuenta de correo GMail
        $mail->Password   = "lallevo7";            // password de la cuenta GMail
        $mail->SetFrom('coto.coopman7@gmail.com', 'coto');  //Quien envía el correo
        $mail->AddReplyTo("response@tudominio.com","Nombre Apellido");  //A quien debe ir dirigida la respuesta
        $mail->Subject    = "Asunto del correo";  //Asunto del mensaje
        $mail->Body      = "Cuerpo en HTML<br />";
        $mail->AltBody    = "Cuerpo en texto plano";
        $destino = "gabriel.santi92@gmail.com";
        $mail->AddAddress($destino, "Destinatario");

        if(!$mail->Send()) {
            $data["message"] = "Error en el envío: " . $mail->ErrorInfo;
            print_r($data["message"]);
        } else {
            $data["message"] = "¡Mensaje enviado correctamente!";
          print_r("envio");
        }
        
    }  

    public function envio()
    {
        print_r("ok envio");
       
            $mail = new PHPMailer();
            $mail->SetLanguage('es');
            $mail->FromName = "luisrodriguez.pe";
            $mail->From = "coto.coopman7@gmail.com";
            $mail->Subject = "asunto del mensaje";
            $mail->AddAddress("coto.coopman7@gmail.com");
            $mail->Body = "cuerpo de mensaje";
            $mail->IsHTML(true);
            $mail->Send();
    }

    public function send_mail2() {
        print_r("ok send");
        
        $mail = new PHPMailer();
        $mail->IsSMTP(); // establecemos que utilizaremos SMTP
        $mail->SMTPAuth   = true; // habilitamos la autenticación SMTP
        $mail->SMTPSecure = "ssl";  // establecemos el prefijo del protocolo seguro de comunicación con el servidor
        $mail->Host       = "smtp.gmail.com";      // establecemos GMail como nuestro servidor SMTP
        $mail->Port       = 465;                   // establecemos el puerto SMTP en el servidor de GMail
        $mail->Username   = "coto.coopman7@gmail.com";  // la cuenta de correo GMail
        $mail->Password   = "lallevo7";            // password de la cuenta GMail
        $mail->SetFrom('coto.coopman7@gmail.com', 'Nombre Apellido');  //Quien envía el correo
        $mail->AddReplyTo("coto.coopman7@gmail.com","Nombre Apellido");  //A quien debe ir dirigida la respuesta
        $mail->Subject    = "Asunto del correo";  //Asunto del mensaje
        $mail->Body      = "Cuerpo en HTML<br />";
        $mail->AltBody    = "Cuerpo en texto plano";
        $destino = "coto.coopman7@gmail.com";
        $mail->AddAddress($destino, "Juan Palotes");

       
        if(!$mail->Send()) {
            $data["message"] = "Error en el envío: " . $mail->ErrorInfo;
        } else {
            $data["message"] = "¡Mensaje enviado correctamente!";
        }
       // $this->load->view('sent_mail',$data);
    }
}
?>