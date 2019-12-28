<?php
/*

    Programado por Luis Cabrera Benito 
  ____          _____               _ _           _       
 |  _ \        |  __ \             (_) |         | |      
 | |_) |_   _  | |__) |_ _ _ __ _____| |__  _   _| |_ ___ 
 |  _ <| | | | |  ___/ _` | '__|_  / | '_ \| | | | __/ _ \
 | |_) | |_| | | |  | (_| | |   / /| | |_) | |_| | ||  __/
 |____/ \__, | |_|   \__,_|_|  /___|_|_.__/ \__, |\__\___|
         __/ |                               __/ |        
        |___/                               |___/         
    
    
    Blog:       https://parzibyte.me/blog
    Ayuda:      https://parzibyte.me/blog/contrataciones-ayuda/
    Contacto:   https://parzibyte.me/blog/contacto/
*/ ?>
<?php
include_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;

$phpMailer = new PHPMailer;
# Puede ser ruta relativa o absoluta
$nombreDelDocumento = "factura.pdf";


if (!file_exists($nombreDelDocumento)) {
    exit("El archivo $nombreDelDocumento no existe");
}


try {
    $phpMailer->setFrom("parzibyte@gmail.com", "Luis Cabrera Benito"); # Correo y nombre del remitente
    $phpMailer->addAddress("contacto@parzibyte.me"); # El destinatario
    $phpMailer->Subject = "Archivo adjunto"; # Asunto
    $phpMailer->Body = "Hola, amigo. Estamos probando los archivos adjuntos."; # Cuerpo en texto plano
    // Aquí la magia:
    $phpMailer->addAttachment($nombreDelDocumento);
    if (!$phpMailer->send()) {
        echo "Error enviando correo: " . $phpMailer->ErrorInfo;
    }
    # Opcionalmente podrías eliminar el archivo después de enviarlo, si quieres
    // if (file_exists($nombreDelDocumento)) {
    // unlink($nombreDelDocumento);
    // }
    echo "Enviado correctamente";
} catch (Exception $e) {
    echo "Excepción: " . $e->getMessage();
}
