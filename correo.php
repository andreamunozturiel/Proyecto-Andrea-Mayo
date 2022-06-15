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
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;


        //Usuario de gmail
        $mail->Username = 'locchiodelfotografoandrea@gmail.com';
        
        //Contraseña de gmail
        $mail->Password = "proyectoAndrea";
        
        //Quien lo envia
        $mail->SetFrom('locchiodelfotografoandrea@gmail.com', 'Sistema de Reservas');

        //asunto
        $mail->Subject = "Reserva Confirmada";

        //Cuerpo del mensaje
        $mail->MsgHTML("<!DOCTYPE html>
        <html>
        <head>
            <meta>
            <title>Reserva Confirmada!!!</title>
        </head> 
        <body>
            <div>
                <div style='display:flex;' >
                    <div style='display:flex;'>
                        <img src='https://i.postimg.cc/cKz2f88f/camera.png' alt='' style='width:80%;margin-left:10px;'>
                    </div>
                    <div style='display:flex; margin-top: 75px;margin-left: 50px; font-size: 25px; color:black' >
                     L'occhio del fotografo
                    </div>
                </div>
                <p style='color: rgb(99, 0, 99); font-size: 22px; font-weight: bold;'>RESERVA COMPLETADA</p>
                <div style='display:flex;'>
                    
                    <img src='https://i.postimg.cc/mkW2jB2Q/estudio.jpg' alt='' width='35%'>
                </div>
                <p style='color: black; font-size: 22px; font-weight: bold;'>GRACIAS " . $correo. "</p>
                <p style='font-size: 20px;'>Su reserva se ha completado correctamente</p>
                <p style='font-size: 20px;'>Gracias por su confianza en nuestros servicios, un saludo de l'occhio del fotógrafo</p>
            </div>
            
        </body>
        </html>");

        //Destinatario
       $address = $correo;
       $mail-> AddAddress($address);

       $resul = $mail->Send();
       return $resul;
        

    }



    function enviar_correo_registro($correo){

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0; //cambiar a 1 o 2 para ver errores
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;


        //Usuario de gmail
        $mail->Username = 'locchiodelfotografoandrea@gmail.com';
        
        //Contraseña de gmail
        $mail->Password = "proyectoAndrea";
        
        //Quien lo envia
        $mail->SetFrom('locchiodelfotografoandrea@gmail.com', 'Sistema de Registros');

        //asunto
        $mail->Subject = "Registro Completado";

        //Cuerpo del mensaje
        $mail->MsgHTML("<!DOCTYPE html>
        <html>
        <head>
            <meta>
            <title>Registro Completado!!!</title>
        </head> 
        <body>
            <div>
                <div style='display:flex;' >
                    <div style='display:flex;'>
                        <img src='https://i.postimg.cc/cKz2f88f/camera.png' alt='' style='width:80%;margin-left:10px;'>
                    </div>
                    <div style='display:flex; margin-top: 75px;margin-left: 50px; font-size: 25px; color:rgb(152, 18, 214)' >
                     L'occhio del fotografo
                    </div>
                </div>
                <p style='color: rgb(99, 0, 99); font-size: 22px; font-weight: bold;'>REGISTRO COMPLETADO</p>
                <div style='display:flex;'>
                    
                    <img src='https://i.postimg.cc/B6wCy71Z/flor-morada.png' alt='' width='35%'>
                </div>
                <p style='color: rgb(99, 0, 99); font-size: 22px; font-weight: bold;'>GRACIAS " . $correo. "</p>
                <p style='font-size: 20px;'>El proceso de registro se ha completado correctamente</p>
                <p style='font-size: 20px;'>Gracias por su confianza en nuestros servicios, un saludo de l'occhio del fotógrafo</p>
            </div>
            
        </body>
        </html>");

        //Destinatario
       $address = $correo;
       $mail-> AddAddress($address);

       $resul = $mail->Send();
       return $resul;
        

    }


    function enviar_correo_registro_candidatos($correo){

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0; //cambiar a 1 o 2 para ver errores
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;


        //Usuario de gmail
        $mail->Username = 'locchiodelfotografoandrea@gmail.com';
        
        //Contraseña de gmail
        $mail->Password = "proyectoAndrea";
        
        //Quien lo envia
        $mail->SetFrom('locchiodelfotografoandrea@gmail.com', 'Sistema de Registros Posibles Candidatos');

        //asunto
        $mail->Subject = "Registro Completado y Curriculum Enviado";

        //Cuerpo del mensaje
        $mail->MsgHTML("<!DOCTYPE html>
        <html>
        <head>
            <meta>
            <title>Registro Completado Posible Trabajador!!!</title>
        </head> 
        <body>
            <div>
                <div style='display:flex;' >
                    <div style='display:flex;'>
                        <img src='https://i.postimg.cc/cKz2f88f/camera.png' alt='' style='width:80%;margin-left:10px;'>
                    </div>
                    <div style='display:flex; margin-top: 75px;margin-left: 50px; font-size: 25px; color:rgb(152, 18, 214)' >
                     L'occhio del fotografo
                    </div>
                </div>
                <p style='color: rgb(99, 0, 99); font-size: 22px; font-weight: bold;'>REGISTRO COMPLETADO</p>
                <div style='display:flex;'>
                    
                    <img src='https://i.postimg.cc/B6wCy71Z/flor-morada.png' alt='' width='35%'>
                </div>
                <p style='color: rgb(99, 0, 99); font-size: 22px; font-weight: bold;'>GRACIAS " . $correo. "</p>
                <p style='font-size: 20px;'>El proceso de registro se ha completado correctamente y su curriculum se ha recibido correctamente,le avisaremos ante nuevos cambios.</p>
                <p style='font-size: 20px;'>Gracias por su confianza en nuestros servicios, un saludo de l'occhio del fotógrafo</p>
            </div>
            
        </body>
        </html>");

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