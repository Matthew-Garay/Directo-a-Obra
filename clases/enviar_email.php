<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '1911.garay.perez@gmail.com';                     //SMTP username
    $mail->Password   = 'hnigzlfurzqsvjup';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('1911.garay.perez@gmail.com', 'Directo a Obra');
    $mail->addAddress($email, 'Cliente');     //Usar el correo del cliente
    $mail->addBCC('mxtthxw29@gmail.com', 'Administrador Garay');     //Copia oculta al administrador

    $mail->isHTML(true);
    $mail->Subject = 'Factura de su compra - Directo a Obra';

    // Crear una factura con mejor formato
    $cuerpo = '
    <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; border: 1px solid #e0e0e0; border-radius: 5px; overflow: hidden;">
        <!-- Encabezado -->
        <div style="background: linear-gradient(to right, #1a85f8, #0967d3); color: white; padding: 20px; text-align: center;">
            <h1 style="margin: 0;">Directo a Obra</h1>
            <p style="margin: 5px 0 0;">Factura de Compra</p>
        </div>
        
        <!-- Información de la compra -->
        <div style="padding: 20px; background-color: #f9f9f9;">
            <h2 style="color: #0967d3; margin-top: 0;">¡Gracias por su compra!</h2>
            <p>Estimado cliente, le enviamos los detalles de su compra:</p>
            
            <table style="width: 100%; border-collapse: collapse; margin: 15px 0;">
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #e0e0e0; width: 40%;"><strong>ID de Transacción:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #e0e0e0;">' . $id_transaccion . '</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #e0e0e0;"><strong>Fecha:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #e0e0e0;">' . date("d/m/Y H:i", strtotime($fecha)) . '</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #e0e0e0;"><strong>Estado:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #e0e0e0;"><span style="color: #059669; font-weight: bold;">' . $status . '</span></td>
                </tr>
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #e0e0e0;"><strong>Total:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #e0e0e0; font-size: 18px; font-weight: bold; color: #0967d3;">' . MONEDA . number_format($monto, 2, '.', ',') . '</td>
                </tr>
            </table>
        </div>
        
        <!-- Detalle de productos -->
        <div style="padding: 20px;">
            <h3 style="color: #0967d3; border-bottom: 1px solid #e0e0e0; padding-bottom: 10px;">Detalle de Productos</h3>
            
            <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
                <thead>
                    <tr style="background-color: #f2f2f2;">
                        <th style="padding: 10px; text-align: left; border-bottom: 2px solid #e0e0e0;">Producto</th>
                        <th style="padding: 10px; text-align: center; border-bottom: 2px solid #e0e0e0;">Cantidad</th>
                        <th style="padding: 10px; text-align: right; border-bottom: 2px solid #e0e0e0;">Precio</th>
                        <th style="padding: 10px; text-align: right; border-bottom: 2px solid #e0e0e0;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>';

    // Obtener los productos de la compra
    $sql = $con->prepare("SELECT nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");
    $sql->execute([$id]);
    $productos = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($productos as $producto) {
        $subtotal = $producto['precio'] * $producto['cantidad'];
        $cuerpo .= '
                    <tr>
                        <td style="padding: 10px; border-bottom: 1px solid #e0e0e0;">' . $producto['nombre'] . '</td>
                        <td style="padding: 10px; border-bottom: 1px solid #e0e0e0; text-align: center;">' . $producto['cantidad'] . '</td>
                        <td style="padding: 10px; border-bottom: 1px solid #e0e0e0; text-align: right;">' . MONEDA . number_format($producto['precio'], 2, '.', ',') . '</td>
                        <td style="padding: 10px; border-bottom: 1px solid #e0e0e0; text-align: right;">' . MONEDA . number_format($subtotal, 2, '.', ',') . '</td>
                    </tr>';
    }

    $cuerpo .= '
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="padding: 10px; text-align: right; font-weight: bold;">Envío:</td>
                        <td style="padding: 10px; text-align: right;">' . MONEDA . '99.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="padding: 10px; text-align: right; font-weight: bold; font-size: 16px;">Total:</td>
                        <td style="padding: 10px; text-align: right; font-weight: bold; font-size: 16px; color: #0967d3;">' . MONEDA . number_format($monto, 2, '.', ',') . '</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        
        <!-- Pie de página -->
        <div style="background-color: #f9f9f9; padding: 20px; text-align: center; border-top: 1px solid #e0e0e0;">
            <p style="margin: 0; color: #666;">Si tiene alguna pregunta sobre su compra, no dude en contactarnos:</p>
            <p style="margin: 5px 0; color: #0967d3;">📧 202210036@tesco.edu.mx | 📲 55-6880-0778</p>
            <p style="margin: 15px 0 0; font-size: 12px; color: #999;">© 2025 Directo a Obra, S.A.B. DE C.V. Todos los derechos reservados.</p>
        </div>
    </div>';

    $mail->Body = utf8_decode($cuerpo);
    $mail->AltBody = 'Gracias por su compra. Su ID de transacción es: ' . $id_transaccion . '. Total: ' . MONEDA . $monto;
    $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
