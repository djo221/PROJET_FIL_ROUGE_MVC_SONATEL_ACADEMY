<?php
/* $parent = dirname(dirname(__FILE__));
$parent."/config/constantes.php"; */

$constantes =  dirname(dirname(__FILE__))."/config/constantes.php";
require_once $constantes;
//inclusion du Validator
$validator = dirname(dirname(__FILE__))."/config/validator.php";
require_once $validator;
//inclusion orm
$orm = dirname(dirname(__FILE__))."/config/orm.php";
require_once $orm;
//inclusion des roles
$role = dirname(dirname(__FILE__))."/config/role.php";
require_once $role;
//inclusion router
require_once dirname(dirname(__FILE__) )."/config/router.php";

