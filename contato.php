<?php
  if(isset($_POST['Email'])) {
    
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $mensagem = $_POST['Mensagem'];
    $data = date('d/m/Y');
    $timestamp = mktime(date("H"), date("i"), date("s"));
    $hora = gmdate("H:i:s", $timestamp);
    $telefone = $_POST['Telefone'];
    $celular = $_POST['Celular'];
    $Assunto = $_POST['Assunto'];
    
    
    // Compo E-mail
    $arquivo = "<html>
    <table cellspacing='0' cellpadding='0' width='100%' style='background-color: #ffffff;'>
    <tbody>
    <tr>
    <td valign='top' align='center'>
    <table align='center' width='604' cellspacing='0' cellpadding='4px' border='0'
    style='background-color: #ffffff;'>
    <tbody>
    <tr style='background-color: #eeeeee;'>
    <td style='width: 20px;'>
    &nbsp;
    </td>
    <td>
    <p style='font-size: 20px; margin-top: 22px; margin-bottom: 18px;'>
    Fale conosco - APM Management System
    <span style='font-size: 11px; line-height: 11px;'>
    <br>
    <br>
    Email automatizado de http://apmsystem.esy.es
    </span>
    </p>
    </td>
    <td style='width: 20px;'>
    &nbsp;
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td valign='top' class='col-main' style='background-color: #ffffff;'>
    <p class='tag_formsummary'>
    </p>
    <table class='tabledefault'>
    <tbody>
    <tr>
    <td>
    <strong>
    Nome
    </strong>
    <br>
    $nome
    </td>
    </tr>
    <tr>
    <td>
    <strong>
    Email
    </strong>
    <br>
    $email
    </td>
    </tr>
    <tr>
    <tr>
    <td>
    <strong>
    Mensagem
    </strong>
    <br>
    $mensagem
    </td>
    </tr>
     <tr>
    <td>
    <strong>
    Mensagem
    </strong>
    <br>
    $telefone
    </td>
    </tr>
     <tr>
    <td>
    <strong>
    Mensagem
    </strong>
    <br>
    $celular
    </td>
    </tr>
    </table>
    </td>
    <td>
    </td>
    </tr>
    <tr style='background-color: #eeeeee;'>
    <td>
    
    </td>
    <td>
    <p style='font-size: 11px; line-height: 17px; margin-bottom: 18px;'>
    Este e-mail foi enviado em  $data as $hora
    <br>
    &copy; APM
    </p>
    </td>
    </tr>
    </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    
    </html>";
    
    //enviar
    
    $emailenviar = "agencia.criouweb@gmail.com";
    $destino = $emailenviar;
    $assunto = $Assunto;
    
    
    $headers  = 'MIME-Version: 1.1' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers  .= "From: $emailenviar"."\r\n" ;
	  $headers .= "Reply-To: $email"."\r\n"; 
    
	  
	  
    
    
    $enviaremail = mail($destino, $assunto, $arquivo, $headers);
    if($enviaremail){
      
      $msg = "sucesso";
      echo json_encode($msg);
      
      } else {
      
      $msg = "erro";
      echo json_encode($msg);
      
    }
  } 