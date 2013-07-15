<?php
/**
 * Created by JetBrains PhpStorm.
 * User: v.korolyov
 * Date: 1/30/13
 * Time: 12:16 PM
 * To change this template use File | Settings | File Templates.
 */

include ("lock.php");
include ("blocks/bd.php"); /*Connecting to BD!*/

echo '<option value="0" selected="selected">Корпус</option>';

$idSystemBlock = htmlspecialchars(trim($_POST['id_system_block']));
if (isset($_POST['id_system_block'])) {
    $resultDeleteComputerCaseSystemBlock = mysql_query("DELETE FROM computer_case_system_block WHERE computer_case_system_block.id_system_block = " . $idSystemBlock . " AND computer_case_system_block.id_computer_case = " . $_POST['computer_case_id'], $db);
    $resultSelectComputerCase = mysql_query("SELECT computer_case.* FROM  computer_case, computer_case_system_block WHERE computer_case.id= computer_case_system_block.id_computer_case  AND computer_case_system_block.id_system_block = " . $idSystemBlock, $db);

} else {
    $resultDeleteComputerCaseSystemBlock = mysql_query("DELETE FROM computer_case_system_block WHERE computer_case_system_block.id_system_block = " . 0 . " AND computer_case_system_block.id_computer_case = " . $_POST['computer_case_id'], $db);
    $resultSelectComputerCase = mysql_query("SELECT computer_case.* FROM  computer_case, computer_case_system_block WHERE computer_case.id= computer_case_system_block.id_computer_case  AND computer_case_system_block.id_system_block = " . 0, $db);
}
while ($row = mysql_fetch_assoc($resultSelectComputerCase)) {
    echo  '<option value="' . $row['id'] . '">' . $row['name_computer_case'] . '</option>';
}


