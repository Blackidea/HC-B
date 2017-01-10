<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
$userList = json_decode($_POST['products']);
print_r($userList);
print_r(serialize($userList));

holiday::addUserList(serialize($userList));

//$_POST['json']
?>
