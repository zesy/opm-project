<?php
include_once($_SERVER['DOCUMENT_ROOT']."/mvc/controller/orquestra_dao.php");
$orqd = new OrquestraDAO();
$orq = $orqd->selectOrquestra();

define('SITE_NAME', 'http://localhost/');
//=== CONFIG EMAILS ===//
define('MAIL_HOST_SMTP', $orq['smtp']); //'smtp.gmail.com'
define('MAIL_SMTP_AUTH', true);
define('MAIL_SMTP_SECURE_TYPE', 'tsl');
define('MAIL_PORT', $orq['port']); //587

define('MAIL_USER', $orq['email']);
define('MAIL_PASS', $orq['senha']);

define('MAIL_FROM_CADASTRO', $orq['email']);
define('MAIL_FROM_NAME', 'OPM');
//=== FIM CONFIG EMAILS ==//

?>