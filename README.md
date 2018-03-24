# Open Tracker

**Project Requirement**<br/>
https://media-net.github.io/recruitment-open-tracker/


**Project Solution**

## Solution 1 : With Laravel/Lumen, Mysql

The source code is already present. David bakr & team have aready achive some benchmark.

**summary of Source code**

 - MailTracker will hook into all outgoing emails from Laravel/Lumen and inject a tracking code into it.
 - It will also store the rendered email in the database. There is also an interface to view sent emails.
 - https://github.com/jdavidbakr/mail-tracker

**Install Lumen Via Composer**

  - composer require jdavidbakr/mail-tracker ~2.1


**We can add Additional code at**
  - jdavidbakr\MailTracker\Events\EmailSentEvent
  - jdavidbakr\MailTracker\Events\ViewEmailEvent
  - jdavidbakr\MailTracker\Events\LinkClickedEvent


**Reference Link **

- https://laracasts.com/discuss/channels/laravel/new-package-for-email-tracking
- https://packagist.org/packages/jdavidbakr/mail-tracker


## Solution 2 :  Simple Code by using PHP, Mysql

**How To Run**
 -  Below url need to run manualy 
 
  http://Your-website/Open_tracker/trackersendmail.php

 - Below url need not to run manualy, as it will run atuomaticaly when email get open clicked
 
 http://Your-website/Open_tracker/trackonline.php?src=email&subscriberID=nisha.sonawane@gmail.com&campaignID=6788
 

## Functional Files 

**Tech Stack **
 - PHP, Mysql


#### Files

  - 1) **dbconfig.php**  
        This file contain database connection parameters.
  - 2) **trackersendmail.php**
        This file contain static Email send functionality. If you want dynamic then we can add html form & post form Functionality.
  - 4) **trackonline.php**
        This File contain the email campaign they've opened and the subscription ID - you saved that from your script
  - 5) **classes/EmailTracker.php**
        Initialize the EmailCampaign. In this class, we are also connecting to the MySQL server.  In a larger project, connections would be managed by a separate Database abstraction class
  - 6) **classes/Email.php**
        It contains the information that the Courier & needs to send an email message to a recipient
  - 7) **classes/Courier.php**
        This class emails converts and emails data from the Email class & It takes an Email and uses the mail() function to send it out

**External Files**

  - 1) PHPMailer/PHPMailer.php
  - 2) images/phpmailer.png
  - 3) css/style.css
  - 4) js/myjs.js



**Database**

 - Create database test_db;

 - Use test_db;

 - CREATE TABLE EmailTracker (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    campaignID int(10),
    subscriptionID varchar(100),
    timestamp TIMESTAMP DEFAULT NOW()
   );


**To avoid duplicate entry from Table**

  - You can write cron job/script & it can schedule as per your need & script should contain below Delete Query.
  
  - DELETE FROM EmailTracker WHERE id NOT IN(SELECT id FROM (SELECT max(id) as id FROM EmailTracker GROUP By subscriptionID) as p2)

  - If you want to see the data before you delete(what will be left) then use below query

  -  SELECT *  FROM EmailTracker WHERE id NOT IN(SELECT id FROM (SELECT max(id) as id FROM EmailTracker GROUP By subscriptionID) as p2)
 
  - Why Cron Job?
     -  We can Check duplicate rows at every tracker(EmailTracker.php), but it will reduce performance.
