<?php

/*-- sendmail.php --*/
ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

require_once('classes/Email.php');
require_once('classes/Courier.php');

$id = rand(111, 999);
$id.=rand(111, 999);
// construct the email
$Email = new Email();

//You can use HTML form for below static lines

$Email->sender = 'nisha.sonawane@gmail.com';
$Email->recipient = 'nisha.sonawane@gmail.com';
$Email->subject = "Thank you for subscribing!";
$Email->message_text = "Hello!

Thank you for subscribing to our newsletter!  We are excited to bring you updates about the new services we are offering.

We hope you enjoy our service!

Thank you,
The team.";
$Email->message_html = "<h1>Hello!</h1>

<p>Thank you for subscribing to our newsletter!  We are excited to bring you <strong>updates about</strong> the new <strong>services</strong> we are offering.</p>

<p>We hope you enjoy our service!</p>

<p>Thank you,<br />
The team.</p><img border='0' src='http://Your-Website-Name/tracker/tracknoline.php?src=email&subscriberID=$Email->recipient&campaignID=$id' width='1' height='1' alt='image for email' >";

// send the email
$Courier = new Courier();
$sent = $Courier->send($Email);

?>
<h1>Send Email</h1>
<? if ($sent = Courier::SENT_OK) { ?>
    <p>Email sent to <?= $Email->recipient; ?></p>
<? } else { ?>
	<p>Email was not sent to <?= $Email->recipient; ?></p>
<? } ?>
