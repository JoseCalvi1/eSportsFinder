<?php

$config = array();
$config['debug'] = true;
$config['session_name'] = 'a92a506b-708a-b1ae-gap-5b27871c5261';
$config['app_name'] = 'eSportsFinder';
$config['site_url'] = 'http://127.0.0.1/eSportsFinder';
$config['max_result_list'] = 100;
$config['default_timezone'] = 'Europe/Madrid';
$config['default_time_format'] = 'H:i';
$config['default_date_format'] = 'd/m/Y';
$config['passwordsetting'] =
    array(
        'generatepasswordtmpl' => 'generatepassword',
        'lostpasswordtmpl' => 'lostpassword',
        'linkexpiration' => '1', // habilitar caducidad de tokens
        'linkexpirationtime' => '30', // 30 minutos
        'linkexpirationtype' => '1', // minutos
    );

$config['emailsetting'] = array(
    'mail_smtpserver' => 'mail.setneuf.com',
    'mail_smtpauth_req' => 1,
    'mail_smtpuser' => 'dev1@setneuf.com',
    'mail_smtppass' => 'cocotroco',
    'mail_smtpssl' => '',
    'mail_smtpport' => '25',
    'smtp_from_addr' => 'esportsfinder@gmail.com',
    'smtp_from_name' => 'Esports Finder',
);