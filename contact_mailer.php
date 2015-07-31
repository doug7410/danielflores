<?php


# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;
use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__);
$dotenv->load();

# Instantiate the client.
$mgClient = new Mailgun(getenv('MAILGUN_API_KEY'));
$domain = "sandbox0bfd8a771d2d46ec892ca20343956a6d.mailgun.org";


$name = $_REQUEST['name']; 
$email = $_REQUEST['email'];
$message =  $_REQUEST['message'];



$body = "Hello, \n\r You have a new message from dannyfloresmusic.com .  \n\r Name: $name \n\r Email: $email \n\r Message: \n\r $message";



# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => "$name <$email>",
                        'to'      => 'Danny Flores <danielfloresmusic@gmail.com>',
                        'subject' => 'New message from dannyfloresmusic.com',
                        'text'    => $body));


echo "mail sent";    

