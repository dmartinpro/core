<?php
require_once dirname(__FILE__) . '/../../core/php/core.inc.php';
if (!isConnect('admin')) {
            throw new Exception(__('401 - Acc�s non autoris�', __FILE__));
        }
if($_GET['shut'] == 1){
	jeedom::haltSystem();
}else{
	jeedom::rebootSystem();
}
?>