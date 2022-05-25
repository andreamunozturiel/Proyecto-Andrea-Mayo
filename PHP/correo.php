<?php

    /**Utilizamos la libreria de terceros PHPMAILER */
    
    use PHPMailer\PHPMailer\PHPMailer;

    // require dirname(__FILE___) . "vendor/autoload.php";

    include './config/config.php';

    require './vendor/autoload.php';


    function enviar_correo_reserva($correo){

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0; //cambiar a 1 o 2 para ver errores
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;


        //Usuario de gmail
        $mail->Username = 'locchiodelfotografoandrea@gmail.com';
        
        //Contraseña de gmail
        $mail->Password = "proyectoAndrea";
        
        //Quien lo envia
        $mail->SetFrom('locchiodelfotografoandrea@gmail.com', "Sistema de Reservas");

        //asunto
        $mail->Subject = "Reserva Confirmada";

        //Cuerpo del mensaje
        $mail->MsqHTML("<h1>Estimado " .$correo . "</h1><br>" ."<h2>Su reserva se ha realizado con exito</h2><br>"
                        ."<h3>Gracias por su confianza en nuestros servicios,
                        un saludo de l'occhio del fotógrafo</h3>");

        //Destinatario
       $address = $correo;
       $mail-> AddAddress($address);

       $resul = $mail->Send();
       return $resul;
        

    }

    function leer_configuracionCorreo($nombre, $esquema){
        $config = new DOMDocument();
        $config ->load($nombre);
        $res = $config->schemaValidate($esquema);
        if($res === FALSE){
            throw new InvalidArgumentException("Revise el fichero de configuracion");
        }

        $datos = simplexml_load_file($nombre);
        $usu = $datos -> xpath(" //usuario");
        $clave = $datos -> xpath("//clave");
        $result = [];
        $result[] = $usu [0];
        $result[] = $clave[0];
        return $result;



    }
?>