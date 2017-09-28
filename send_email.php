<?
require_once('ses.php');
$ses = new SimpleEmailService('XXXXXXXXXXXXXXX', 'XXXXXXXXXXXXXXXXXXXXXX');
$file=$argv[1];

// Sample Comment A


$user_list= fopen($file, "r");
while (($user_fields = fgetcsv ($user_list,",")) !== FALSE)
{
$username=$user_fields[0];
$email=$user_fields[1];

$text_email="Text Email";
$html_email="<strong>HTML Email</strong><p> Some HTML";


$m = new SimpleEmailServiceMessage();
$m->addTo($email);
$m->setFrom('validated@email.com');
$m->setSubject('Sample Subject');
$m->setMessageFromString($text_email,$html_email);

$send_emails=($ses->sendEmail($m));


}



?>
