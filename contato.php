<?php  

$date = date("d/m/Y h:i");
$ip = getenv("REMOTE_ADDR");
$navegador = $_SERVER['HTTP_USER_AGENT']; 
$nomeremetente = $_POST["nome"]; 
$emailremetente = $_POST["email"]; 
$email = 'contatozlgesso@gmail.com'; // Inserir o endereço de email a qual você quer que chegue
$telefone = $_POST["telefone"];
$horario = $_POST["horario"]; 
$mensagem = $_POST["mensagem"]; 





                $MailRecipiente = $email;     
                $MailAssunto    = "E-mail enviado atraves do site"; 
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                $headers .= "From: $email\r\n"; 
                $headers .= "Return-Path: $email\r\n"; 
                 
                 $msg = ' 
				 		 <i>Enviado por:</i> <br/><br/>
                         <b>Nome:</b> '.$nome.'<br/> 
                         <b>Email:</b> '.$email.'<br/> 
                         <b>Telefone:</b> '.$telefone.'<br/>
						 <b>Melhor horario para contato:</b> '.$horario.'<br/><br/> 
                         <b>Mensagem:</b> '.$mensagem.'<br/><br/> 
						 <b>IP do Visitante:</b> '.$ip.'<br/> 
						 <b>Navegador do Visitante:</b> '.$navegador.'<br/> 
						 <b>Data e Hora:</b> '.$date.'<br/> 
                         '; 
             
                  mail($MailRecipiente,$MailAssunto,$msg,$headers);
				  
				  
				  // AQUI SE COLOCA A COPIA CASO QUEIRA QUE O FORMULARIO ENVIE (DUPLIQUE QUANTAS VEZES QUISER)
				  
				  mail('matheusbmoreira@gmail.com',$MailAssunto,$msg,$headers);


//AUTO RESPOSTA 
                $headers_ = "MIME-Version: 1.0\r\n"; 
                $headers_ .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                $headers_ .= "From:  $email\r\n"; 
                $site = "www.zlgesso.com.br"; 
                $titulo = "Obrigado pelo contato com a ZLGESSO"; 
                $mensagem = " 
                <br/> 
                Resposta automática enviada através de contato realizado pela pagina: http://www.zlgesso.com.br<br/> 

                Obrigado por entrar em contato com a ZLGESSO,<br/> 
				<br />
				Sua mensagem foi recebida com sucesso e será respondida o mais breve possível pela equipe de contato ZLGESSO.<br />
				<br />
              	Atenciosamente,<br/>
				Equipe de contato ZLGESSO<br />
				<a href='mailto:contatozlgesso@gmail.com'>contatozlgesso@gmail.com</a> - <a href='http://www.zlgesso.com.br/' target='_blank'>http://www.zlgesso.com.br/</a>"; 

                mail($emailremetente,$titulo,$mensagem,$headers_); 

echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'> alert ('Mensagem enviada com sucesso!')</SCRIPT>"; // Página que será redirecionada
echo "<SCRIPT LANGUAGE='JavaScript' TYPE='text/javascript'> javascript:history.back(-1)</SCRIPT>"; // Página que será redirecionada

?>