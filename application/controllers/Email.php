<?php
class Email extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('My_phpmailer');
        $this->load->model('productos_model');
        $this->load->model('carrousel_model');
    }
     
    //Enviar mail by PHPMailer
    public function send_mail() {
       
        if(isset($_POST)){
            $nombre     =   $this->input->post('nombre');
            $email      =   $this->input->post('email');
            $mensaje    =   $this->input->post('mensaje');

            //configuración del correo by PHPMailer
            $mail = new PHPMailer();
            $mail->IsSMTP();            // establecemos que utilizaremos SMTP
            $mail->SMTPAuth     = true; // habilitamos la autenticación SMTP
            $mail->SMTPSecure   = "ssl";//"ssl" o "tls" establecemos el prefijo del protocolo seguro de comunicación con el servidor
            $mail->Host         = "smtp.gmail.com"; // establecemos GMail como nuestro servidor SMTP
            $mail->Port         = 465;  // 465 o 587 establecemos el puerto SMTP en el servidor de GMail
            $mail->Username     = "coto.coopman7@gmail.com";    // usuario de Gmail (se deben habilitar desde gmail el uso de servicios)
            $mail->Password     = "lallevo7";                   // password de la cuenta GMail
            $mail->SetFrom($email, $nombre);  // Quien envía el correo
            $mail->AddReplyTo($email, $nombre);  //A quien debe ir dirigida la respuesta
            $mail->Subject      = "Contacto desde sitio web JardinDelivery.cl";  //Asunto del mensaje
            $mail->Body         = "Enviado desde formulario de Contacto del sitio www.jardindelivery.cl\nEnviado el ".date('d-m-Y')." a las ".date('H:i:s')."\n\n".$mensaje;   //contenido del correo
            //$mail->AltBody      = "Cuerpo en texto plano";  //contenido del correo
            $mail->AddAddress("cristopher.coopman@solutoria.cl", "Destinatario"); //  destinatario

            if(!$mail->Send()) {
                //print_r($mail->ErrorInfo);
                $data['carrousel']      =   $this->carrousel_model->getCarrousel();
                $data['productos']      =   $this->productos_model->getProductosHome();
                $data['error']          =   "No se ha podido enviar el correo. Inténtelo mas tarde";
                $this->load->view('home', $data);
            } else {
                $data['carrousel']      =   $this->carrousel_model->getCarrousel();
                $data['productos']      =   $this->productos_model->getProductosHome();
                $data['correo_enviado'] =   "Mensaje enviado exitosamente!";
                $this->load->view('home', $data);
            }
        }else{
            //print_r("No se ha enviado $_POST!");
            $data['carrousel']      =   $this->carrousel_model->getCarrousel();
            $data['productos']      =   $this->productos_model->getProductosHome();
            $data['error']          =   "No se ha enviado desde el formulario de contacto!";
            $this->load->view('home', $data);
        }
    }  
}
 
?>