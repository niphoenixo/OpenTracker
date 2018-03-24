<?php
/*--- TrackOnline.php ---*/
  ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

    // in this case it's the email campaign they've opened...
    $campaignID = intval($_GET['campaignID']);
    // and the subscription ID - you saved that from your
    // double opt-in registration, right?
    $subscriptionID = $_GET['subscriberID'];
    // load the Database abstractor
    require_once('dbconfig.php');
    require_once('classes/EmailTracker.php');
    // someone accessed this script by opening an email
    // and displaying images.  Let's store that knowledge
    $EmailCampaign = new EmailTracker($campaignID, $settings['mysql']);
    $EmailCampaign->openedBy($subscriptionID, date('Y-m-d H:i:s'));
    // load the image
    $image = 'images/phpmailer.png';
    // getimagesize will return the mimetype for this image
    $imageinfo = getimagesize($image);
    $image_mimetype = $imageinfo['mime'];
    // tell the browser to expect an image
    header('Content-type: '.$image_mimetype);
    // send it an image
    echo file_get_contents($image);
    
?>


