<?php
include ("lock.php");
include ("blocks/bd.php");/*Connecting to BD!*/

if(isset($_POST['id_existing_hdd']))
{
    echo '<option value="0" selected="selected">Жесткий диск</option>';
    if((isset($_POST['id_system_block'])))
    {
        $resultInsertHddSystemBlock = mysql_query("INSERT INTO hdd_system_block (`id_hdd` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_hdd'] ."','" . $_POST['id_system_block']. "')");
        $resultSelectHdd = mysql_query("SELECT hdd.* FROM  hdd, hdd_system_block WHERE hdd.id= hdd_system_block.id_hdd  AND hdd_system_block.id_system_block = ". $_POST['id_system_block'], $db);
    }
    else
    {
        $resultInsertHddSystemBlock = mysql_query("INSERT INTO hdd_system_block (`id_hdd` ,`id_system_block` ) VALUES ( '" . $_POST['id_existing_hdd'] ."','" . 0 . "')");
        $resultSelectHdd = mysql_query("SELECT hdd.* FROM  hdd, hdd_system_block WHERE hdd.id= hdd_system_block.id_hdd  AND hdd_system_block.id_system_block = ". 0, $db);
    }
    while($row = mysql_fetch_assoc($resultSelectHdd))
    {
        echo  '<option value="'.  $row['id'].'"> ' . $row['name_hdd'] . ' ' . $row['size_hdd'] . 'GB</option>';
    }
}
elseif (isset($_POST['id_hdd']))
{
    $idHdd = (int) htmlspecialchars(trim($_POST['id_hdd']));
    $nameHdd = htmlspecialchars(trim($_POST['name_hdd']));
    $sizeHdd = htmlspecialchars(trim($_POST['size_hdd']));
    mysql_query("UPDATE hdd SET size_hdd='" . $sizeHdd . "' WHERE id=" . $idHdd);
    mysql_query("UPDATE hdd SET name_hdd= '" .  $nameHdd . "' WHERE id=" . $idHdd);

    header("Location:/admin/list_hdd.php")  ;

?>

<?php
}
else
{
    echo '<option value="0" selected="selected">Жесткий диск</option>';

    $nameHdd = htmlspecialchars(trim($_POST['name_hdd']));
    $sizeHdd = htmlspecialchars(trim($_POST['size_hdd']));

    $resultSelectHdd = mysql_query("SELECT * FROM hdd WHERE name_hdd='" . $nameHdd."' AND size_hdd='" . $sizeHdd . "'");

    $row = mysql_fetch_assoc($resultSelectHdd);

    if(!$row)
    {
        $resultInsertHdd = mysql_query("INSERT INTO hdd (`name_hdd` ,`size_hdd`) VALUES ( '" . $nameHdd."','" . $sizeHdd . "')") ;
        $idHdd = mysql_insert_id();
        $resultInsertHddSystemBlock = mysql_query("INSERT INTO hdd_system_block (`id_hdd` ,`id_system_block` ) VALUES ( '" . $idHdd ."','" . 0 . "')");
    }
    else
    {
        $idHdd = $row['id'];
        $resultSelectHddSystemBlockAdd = mysql_query("SELECT * FROM hdd_system_block WHERE id_system_block =" . 0 . " AND id_hdd =" . $row['id']);
        $rowAddId = mysql_fetch_assoc($resultSelectHddSystemBlockAdd);
        if(!$rowAddId)
        {
            $resultInsertHddSystemBlock = mysql_query("INSERT INTO hdd_system_block (`id_hdd` ,`id_system_block` ) VALUES ( '" . $idHdd ."','" . 0 . "')");
        }
    }




    $resultSelectHddSystemBlock = mysql_query("SELECT DISTINCT(id_system_block) FROM hdd_system_block WHERE id_hdd IN(SELECT  id_hdd FROM hdd_system_block WHERE id_system_block = " . 0 . " AND id_hdd<>" . $idHdd . ") AND id_system_block <> " . 0);

    while($row = mysql_fetch_assoc($resultSelectHddSystemBlock))
    {
        $resultSelectHddSystemBlockId = mysql_query("SELECT id_hdd FROM hdd_system_block WHERE id_hdd=" .$idHdd ." AND id_system_block =" . $row[id_system_block]);
        $rowId = mysql_fetch_assoc($resultSelectHddSystemBlockId);
        if(!$rowId)
        {
            mysql_query("INSERT INTO hdd_system_block (`id_hdd` ,`id_system_block` ) VALUES ( '" . $idHdd ."','" . $row['id_system_block'] . "')");
        }
        elseif($rowId['id_system_block'] <> 0)
        {
            $resultInsertHddSystemBlock = mysql_query("INSERT INTO hdd_system_block (`id_hdd` ,`id_system_block` ) VALUES ( '" . $idHdd ."','" . 0 . "')");
        }
    }

    $resultSelectHdd = mysql_query("SELECT hdd.* FROM  hdd, hdd_system_block WHERE hdd.id= hdd_system_block.id_hdd  AND hdd_system_block.id_system_block = " . 0  , $db);

    while($row = mysql_fetch_assoc($resultSelectHdd))
    {
        echo  '<option value="'.  $row['id'].'"> ' . $row['name_hdd'] . ' ' . $row['size_hdd'] . 'GB</option>';
    }
}
