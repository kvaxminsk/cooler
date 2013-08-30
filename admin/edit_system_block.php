<?php
include("lock.php");
include("blocks/bd.php"); /*Connecting to BD!*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD /xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=7"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Редактирование</title>
    <link href="default.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="index/index.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../js_index/jquery-1.4.2.min.js"></script>
</head>
<body>
<!-- начало стр -->
<div id="wrapper">

<?php include("index/header-callme.txt"); ?>

<!-- start page -->
<div id="page">
<div id="bgtop"></div>
<div id="bgbottom">

<!-- start menu -->

<?php include("index/menu.txt"); ?>

<!-- начало Right -->
<div id="right">
<div id="text"><h1>Редактирование</h1><br/></div>
<div id="text">
<div id="forma">
<br/>
<?php
if (isset($_GET['id'])) {
    $idSystemBlock = htmlspecialchars(trim($_GET['id']));
}
$result = mysql_query("SELECT * FROM  system_block WHERE id_system_block =" . $idSystemBlock, $db);

if (!$result) {
    echo "<p>Запрос на выборку не прошел!<br /><strong>Код ошибки:</strong></p>";
    exit (mysql_error());
}
if (!(mysql_num_rows($result) > 0)) {
    echo "<p>Нет записей!</p>";
    exit ();
}

$rowSystemBlock = mysql_fetch_assoc($result);
?>



<?php
if (isset($_GET['successfully'])) {
    if ($_GET['successfully'] == '1') {
        if ($_GET['change'] == 'add') {
            echo "<h1 style='color:blue'>Данные успешно добавлены</h1>";
        } elseif ($_GET['change'] == 'edit') {
            echo "<h1 style='color:blue'>Данные успешно отредактированы</h1>";
        }

    } elseif ($_GET['successfully'] == '0') {
        if ($_GET['change'] == 'add') {
            echo "<h1 style='color:blue'>Данные не добавлены</h1>";
        } elseif ($_GET['change'] == 'edit') {
            echo "<h1 style='color:blue'>Данные не отредактированы</h1>";
        }
    } elseif ($_GET['successfully'] == '2') {
        echo "<h1 style='color:blue'>Вы ввели не все данные!</h1>";
    }
}

?>
<form id="form1" method="post" action="add_system_block.php">
<input type="hidden" name="id_system_block" id="id_system_block" value="<?php echo $idSystemBlock; ?>">
<table border="0" cellspacing="10" cellpadding="340">
<tr>
    <td>
        <label for="name_system_block" style="color:black;font-size:20px ;">Название:</label>
    </td>
    <td>
        <?php
        $result = mysql_query("SELECT * FROM  system_block WHERE system_block.id_system_block = " . $idSystemBlock, $db);
        $row = mysql_fetch_assoc($result)
        ?>
        <input type="text" id="name_system_block" name="name_system_block"
               value="<?php echo $row['name_system_block']; ?>"/><br/>
    </td>
</tr>
<!-- Процессор (cpu)-->
<tr height="25px">
    <td style="width:200px">
        Процессор:
    </td>
    <td>
        <select name="cpu" id="cpu"><!--style="font-size:11px;width:500px;"-->
            <option value="0">Процессор</option>
            <?php
            $result = mysql_query("SELECT cpu.* FROM  cpu, cpu_system_block WHERE cpu.id= cpu_system_block.id_cpu AND cpu_system_block.id_system_block = " . $idSystemBlock . ' ORDER BY  cpu.name_cpu', $db);

            while ($row = mysql_fetch_assoc($result)) {
                if ($rowSystemBlock['id_cpu'] == $row['id']) {
                    echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name_cpu'] . ' Core ' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'Гц </option>';
                } else {
                    echo '<option value="' . $row['id'] . '">' . $row['name_cpu'] . ' Core ' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'Гц </option>';
                }
            }
            ?>

        </select>
    </td>
    <td>
        <input type="button" id="delete_cpu" name="delete_cpu" value="Удалить"/>
    </td>

</tr>
<tr>
    <td>
        <div style="color:red" id="div_add_cpu">Добавить процессор</div>
    </td>
    <td>
        <div style="color:red" id="div_add_existing_cpu">Добавить существующий процессор</div>
    </td>
</tr>
<tr>
    <td id="td_add_cpu" style="display:none">

        <label>Название процессора:</label>
        <input type="text" id="name_cpu" name="name_cpu">

        </br>
        <label>Количество ядер:</label>
        <input type="text" id="number_cores_cpu" name="number_cores_cpu">

        </br>
        <label>Частота процессора:</label>
        <input type="text" id="speed_cpu" name="speed_cpu">

        </br>
        </br>
        <input type="button" id="add_cpu" name="add_cpu" value="Добавить процессор">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#delete_cpu").click(function () {
                        deleteCpu();
                    });

                    $("#add_cpu").click(function () {
                        addCpu();
                    });

                    $("#div_add_cpu").click(function () {
                        showFormAddCpu();
                    });
                }

            );

            function deleteCpu() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#cpu");
                var cpuValue = $("#cpu option:selected").val();
                area.load('delete_cpu.php', {id_system_block: idSystemBlock, cpu_id: cpuValue});
            }

            function addCpu() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#cpu");
                var nameCpu = $("#name_cpu").val();
                var speedCpu = $("#speed_cpu").val();
                var numberCoresCpu = $("#number_cores_cpu").val();
                area.load('add_cpu.php', {id_system_block: idSystemBlock, name_cpu: nameCpu, speed_cpu: speedCpu, number_cores_cpu: numberCoresCpu});
            }

            function showFormAddCpu() {
                if ($("#div_add_cpu").text() == 'Добавить процессор') {
                    $("#div_add_cpu").text('Скрыть форму');
                    $("#td_add_cpu").css("display", "");
                    $("#div_add_cpu").css("color", 'blue');
                }
                else {
                    $("#div_add_cpu").text('Добавить процессор');
                    $("#td_add_cpu").css("display", "none");
                    $("#div_add_cpu").css("color", 'red');
                }

            }
        </script>
    </td>

    <td id="td_add_existing_cpu" style="display:none">

        <select name="existing_cpu" id="existing_cpu"><!--style="font-size:11px;width:500px;"-->
            <option value="0" selected="selected">Процессор</option>
            <?php
            $result = mysql_query("SELECT cpu.* FROM  cpu ORDER BY cpu.name_cpu", $db);
            while ($row = mysql_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . $row['name_cpu'] . ' Core ' . $row['number_cores_cpu'] . ' ' . $row['speed_cpu'] . 'Гц </option>';
            }

            ?>

        </select>

        </br>
        </br>
        <input type="button" id="add_existing_cpu" name="add_cpu" value="Добавить процессор">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#add_existing_cpu").click(function () {
                        addExistingCpu();
                    });

                    $("#div_add_existing_cpu").click(function () {
                        showFormAddExistingCpu();
                    });
                }

            );
            function addExistingCpu() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#cpu");
                var ExistingCpuValue = $("#existing_cpu option:selected").val();
                area.load('add_cpu.php', {id_system_block: idSystemBlock, id_existing_cpu: ExistingCpuValue});
            }

            function showFormAddExistingCpu() {
                if ($("#div_add_existing_cpu").text() == 'Добавить существующий процессор') {
                    $("#div_add_existing_cpu").text('Скрыть форму');
                    $("#td_add_existing_cpu").css("display", "");
                    $("#div_add_existing_cpu").css("color", 'blue');
                }
                else {
                    $("#div_add_existing_cpu").text('Добавить существующий процессор');
                    $("#td_add_existing_cpu").css("display", "none");
                    $("#div_add_existing_cpu").css("color", 'red');
                }

            }
        </script>
    </td>
</tr>


<!----------------------------------------------------------------//-->
<!-- жесткий диск -->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:30px">
        Жесткий диск:
    </td>
    <td>
        <select name="hdd" id="hdd">
            <option value="0" selected="selected">Жесткий диск</option>
            <?php
            $result = mysql_query("SELECT hdd.* FROM  hdd, hdd_system_block WHERE hdd.id= hdd_system_block.id_hdd AND hdd_system_block.id_system_block = " . $idSystemBlock . ' ORDER BY  hdd.name_hdd, hdd.size_hdd', $db);
            while ($row = mysql_fetch_assoc($result)) {
                if ($rowSystemBlock['id_hdd'] == $row['id']) {
                    echo '<option selected="selected" value="' . $row['id'] . '"> ' . $row['name_hdd'] . ' ' . $row['size_hdd'] . 'GB</option>';
                } else {
                    echo '<option value="' . $row['id'] . '"> ' . $row['name_hdd'] . ' ' . $row['size_hdd'] . 'GB</option>';
                }
            }
            ?>


        </select>
    </td>
    <td>
        <input type="button" id="delete_hdd" name="delete_hdd" value="Удалить"/>
    </td>
</tr>
<tr>
    <td>
        <div style="color:red" id="div_add_hdd">Добавить жесткий диск</div>
    </td>
    <td>
        <div style="color:red" id="div_add_existing_hdd">Добавить существующий жесткий диск</div>
    </td>
</tr>
<tr>
    <td id="td_add_hdd" style="display:none">

        <label>Название жесткого диска:</label>
        <input type="text" id="name_hdd" name="name_hdd">

        </br>
        <label>Размер жесткого диска:</label>
        <input type="text" id="size_hdd" name="size_hdd">

        </br>
        </br>
        <input type="button" id="add_hdd" name="add_hdd" value="Добавить жесткий диск">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#delete_hdd").click(function () {
                        deleteHdd();
                    });

                    $("#add_hdd").click(function () {
                        addHdd();
                    });

                    $("#div_add_hdd").click(function () {
                        showFormAddHdd();
                    });
                }

            );

            function deleteHdd() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#hdd");
                var hddValue = $("#hdd option:selected").val();
                area.load('delete_hdd.php', {id_system_block: idSystemBlock, hdd_id: hddValue});
            }

            function addHdd() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#hdd");
                var nameHdd = $("#name_hdd").val();
                var sizeHdd = $("#size_hdd").val();
                area.load('add_hdd.php', {id_system_block: idSystemBlock, name_hdd: nameHdd, size_hdd: sizeHdd});
            }

            function showFormAddHdd() {
                if ($("#div_add_hdd").text() == 'Добавить жесткий диск') {
                    $("#div_add_hdd").text('Скрыть форму');
                    $("#td_add_hdd").css("display", "");
                    $("#div_add_hdd").css("color", 'blue');
                }
                else {
                    $("#div_add_hdd").text('Добавить жесткий диск');
                    $("#td_add_hdd").css("display", "none");
                    $("#div_add_hdd").css("color", 'red');
                }

            }
        </script>
    </td>
    <td id="td_add_existing_hdd" style="display:none">

        <select name="existing_hdd" id="existing_hdd">
            <option value="0" selected="selected">Жесткий диск</option>
            <?php
            $result = mysql_query("SELECT hdd.* FROM  hdd ORDER BY hdd.name_hdd, hdd.size_hdd", $db);
            while ($row = mysql_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '"> ' . $row['name_hdd'] . ' ' . $row['size_hdd'] . 'GB</option>';
            }
            ?>
        </select>

        </br>
        </br>
        <input type="button" id="add_existing_hdd" name="add_hdd" value="Добавить жесткий диск">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#add_existing_hdd").click(function () {
                        addExistingHdd();
                    });

                    $("#div_add_existing_hdd").click(function () {
                        showFormAddExistingHdd();
                    });
                }

            );

            function addExistingHdd() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#hdd");
                var ExistingHddValue = $("#existing_hdd option:selected").val();
                area.load('add_hdd.php', {id_system_block: idSystemBlock, id_existing_hdd: ExistingHddValue});
            }

            function showFormAddExistingHdd() {
                if ($("#div_add_existing_hdd").text() == 'Добавить существующий жесткий диск') {
                    $("#div_add_existing_hdd").text('Скрыть форму');
                    $("#td_add_existing_hdd").css("display", "");
                    $("#div_add_existing_hdd").css("color", 'blue');
                }
                else {
                    $("#div_add_existing_hdd").text('Добавить существующий жесткий диск');
                    $("#td_add_existing_hdd").css("display", "none");
                    $("#div_add_existing_hdd").css("color", 'red');
                }

            }
        </script>
    </td>
</tr>

<!------------------------------------------------------------------//-->
<!-- Оперативная память-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:30px">
        Оперативная память:
    </td>
    <td>
        <select name="random_access_memory" id="random_access_memory">
            <option value="0" selected>Оперативная память</option>
            <?php
            $result = mysql_query("SELECT random_access_memory.* FROM  random_access_memory, random_access_memory_system_block WHERE random_access_memory.id= random_access_memory_system_block.id_random_access_memory AND random_access_memory_system_block.id_system_block = " . $idSystemBlock . ' ORDER BY  random_access_memory.name_random_access_memory, random_access_memory.size_random_access_memory', $db);
            while ($row = mysql_fetch_assoc($result)) {
                if ($rowSystemBlock['id_random_access_memory'] == $row['id']) {
                    echo '<option selected="selected" value="' . $row['id'] . '"> ' . $row['name_random_access_memory'] . ' ' . $row['size_random_access_memory'] . 'GB</option>';
                } else {
                    echo '<option value="' . $row['id'] . '"> ' . $row['name_random_access_memory'] . ' ' . $row['size_random_access_memory'] . 'GB</option>';
                }
            }
            ?>
        </select>
    </td>
    <td>
        <input type="button" id="delete_random_access_memory" name="delete_random_access_memory" value="Удалить"/>
    </td>
</tr>
<tr>
    <td>
        <div style="color:red" id="div_add_random_access_memory">Добавить оперативную память</div>
    </td>
    <td>
        <div style="color:red" id="div_add_existing_random_access_memory">Добавить существующую оперативную память</div>
    </td>

</tr>
<tr>
    <td id="td_add_random_access_memory" style="display:none">

        <label>Название оперативной памяти:</label>
        <input type="text" id="name_random_access_memory" name="name_random_access_memory">

        </br>
        <label>Размер оперативной памяти:</label>
        <input type="text" id="size_random_access_memory" name="size_random_access_memory">

        </br>
        </br>
        <input type="button" id="add_random_access_memory" name="add_random_access_memory"
               value="Добавить оперативную память">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#delete_random_access_memory").click(function () {
                        deleteRandomAccessMemory();
                    });

                    $("#add_random_access_memory").click(function () {
                        addRandomAccessMemory();
                    });

                    $("#div_add_random_access_memory").click(function () {
                        showFormAddRandomAccessMemory();
                    });
                }

            );

            function deleteRandomAccessMemory() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#random_access_memory");
                var randomAccessMemoryValue = $("#random_access_memory option:selected").val();
                area.load('delete_random_access_memory.php', {id_system_block: idSystemBlock, random_access_memory_id: randomAccessMemoryValue});
            }

            function addRandomAccessMemory() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#random_access_memory");
                var nameRandomAccessMemory = $("#name_random_access_memory").val();
                var sizeRandomAccessMemory = $("#size_random_access_memory").val();
                area.load('add_random_access_memory.php', {id_system_block: idSystemBlock, name_random_access_memory: nameRandomAccessMemory, size_random_access_memory: sizeRandomAccessMemory});
            }

            function showFormAddRandomAccessMemory() {
                if ($("#div_add_random_access_memory").text() == 'Добавить оперативную память') {
                    $("#div_add_random_access_memory").text('Скрыть форму');
                    $("#td_add_random_access_memory").css("display", "");
                    $("#div_add_random_access_memory").css("color", 'blue');
                }
                else {
                    $("#div_add_random_access_memory").text('Добавить оперативную память');
                    $("#td_add_random_access_memory").css("display", "none");
                    $("#div_add_random_access_memory").css("color", 'red');
                }

            }
        </script>
    </td>
    <td id="td_add_existing_random_access_memory" style="display:none">

        <select name="existing_random_access_memory" id="existing_random_access_memory">
            <option value="0" selected="selected">Оперативная память</option>
            <?php
            $result = mysql_query("SELECT random_access_memory.* FROM  random_access_memory ORDER BY random_access_memory.name_random_access_memory, random_access_memory.size_random_access_memory", $db);
            while ($row = mysql_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '"> ' . $row['name_random_access_memory'] . ' ' . $row['size_random_access_memory'] . 'GB</option>';
            }
            ?>
        </select>

        </br>
        </br>
        <input type="button" id="add_existing_random_access_memory" name="add_random_access_memory"
               value="Добавить оперативную память">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#add_existing_random_access_memory").click(function () {
                        addExistingRandomAccessMemory();
                    });

                    $("#div_add_existing_random_access_memory").click(function () {
                        showFormAddExistingRandomAccessMemory();
                    });
                }

            );

            function addExistingRandomAccessMemory() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#random_access_memory");
                var ExistingRandomAccessMemoryValue = $("#existing_random_access_memory option:selected").val();
                area.load('add_random_access_memory.php', {id_system_block: idSystemBlock, id_existing_random_access_memory: ExistingRandomAccessMemoryValue});
            }

            function showFormAddExistingRandomAccessMemory() {
                if ($("#div_add_existing_random_access_memory").text() == 'Добавить существующую оперативную память') {
                    $("#div_add_existing_random_access_memory").text('Скрыть форму');
                    $("#td_add_existing_random_access_memory").css("display", "");
                    $("#div_add_existing_random_access_memory").css("color", 'blue');
                }
                else {
                    $("#div_add_existing_random_access_memory").text('Добавить существующую оперативную память');
                    $("#td_add_existing_random_access_memory").css("display", "none");
                    $("#div_add_existing_random_access_memory").css("color", 'red');
                }

            }
        </script>
    </td>
</tr>
<!----------------------------------------------------------------//-->
<!-- оптический привод -->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:30px">
        Оптический привод:
    </td>
    <td>
        <input type="checkbox" id="optical_drive"
               name="optical_drive" <?php if ($rowSystemBlock['id_optical_drive'] == 1) {
            echo 'checked="checked"';
        }; ?> >
    </td>
</tr>

<!------------------------------------------------------------------//-->
<!-- Материнская плата -->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:30px">
        Материнская плата:
    </td>
    <td>
        <select name="motherboard" id="motherboard">
            <option value="0" selected>Материнская плата</option>
            <?php
            $result = mysql_query("SELECT motherboard.* FROM  motherboard, motherboard_system_block WHERE motherboard.id= motherboard_system_block.id_motherboard AND motherboard_system_block.id_system_block = " . $idSystemBlock . ' ORDER BY  motherboard.name_motherboard', $db);
            while ($row = mysql_fetch_assoc($result)) {
                if ($rowSystemBlock['id_motherboard'] == $row['id']) {
                    echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name_motherboard'] . '</option>';
                } else {
                    echo '<option value="' . $row['id'] . '">' . $row['name_motherboard'] . '</option>';
                }
            }
            ?>


        </select>
    </td>
    <td>
        <input type="button" id="delete_motherboard" name="delete_motherboard" value="Удалить"/>
    </td>
</tr>

<tr>
    <td>
        <div style="color:red" id="div_add_motherboard">Добавить материнскую плату</div>
    </td>
    <td>
        <div style="color:red" id="div_add_existing_motherboard">Добавить существующую материнскую плату</div>
    </td>
</tr>
<tr>
    <td id="td_add_motherboard" style="display:none">

        <label>Название материнской платы:</label>
        <input type="text" id="name_motherboard" name="name_motherboard">


        </br>
        </br>
        <input type="button" id="add_motherboard" name="add_motherboard" value="Добавить материнскую плату">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#delete_motherboard").click(function () {
                        deleteMotherboard();
                    })

                    $("#add_motherboard").click(function () {
                        addMotherboard();
                    });

                    $("#div_add_motherboard").click(function () {
                        showFormAddMotherboard();
                    });
                }

            );

            function deleteMotherboard() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#motherboard");
                var motherboardValue = $("#motherboard option:selected").val();
                area.load('delete_motherboard.php', {id_system_block: idSystemBlock, motherboard_id: motherboardValue});
            }

            function addMotherboard() {
                var area = $("#motherboard");
                var nameMotherboard = $("#name_motherboard").val();
                area.load('add_motherboard.php', { name_motherboard: nameMotherboard});
            }

            function showFormAddMotherboard() {
                if ($("#div_add_motherboard").text() == 'Добавить материнскую плату') {
                    $("#div_add_motherboard").text('Скрыть форму');
                    $("#td_add_motherboard").css("display", "");
                    $("#div_add_motherboard").css("color", 'blue');
                }
                else {
                    $("#div_add_motherboard").text('Добавить материнскую плату');
                    $("#td_add_motherboard").css("display", "none");
                    $("#div_add_motherboard").css("color", 'red');
                }

            }
        </script>
    </td>
    <td id="td_add_existing_motherboard" style="display:none">

        <select name="existing_motherboard" id="existing_motherboard">
            <option value="0" selected="selected">Материнская плата</option>
            <?php
            $result = mysql_query("SELECT motherboard.* FROM  motherboard ORDER BY motherboard.name_motherboard", $db);
            while ($row = mysql_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '"> ' . $row['name_motherboard'] . '</option>';
            }
            ?>
        </select>

        </br>
        </br>
        <input type="button" id="add_existing_motherboard" name="add_motherboard" value="Добавить материнскую плату">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#add_existing_motherboard").click(function () {
                        addExistingMotherboard();
                    });

                    $("#div_add_existing_motherboard").click(function () {
                        showFormAddExistingMotherboard();
                    });
                }

            );

            function addExistingMotherboard() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#motherboard");
                var ExistingMotherboardValue = $("#existing_motherboard option:selected").val();
                area.load('add_motherboard.php', {id_system_block: idSystemBlock, id_existing_motherboard: ExistingMotherboardValue});
            }

            function showFormAddExistingMotherboard() {
                if ($("#div_add_existing_motherboard").text() == 'Добавить существующую материнскую плату') {
                    $("#div_add_existing_motherboard").text('Скрыть форму');
                    $("#td_add_existing_motherboard").css("display", "");
                    $("#div_add_existing_motherboard").css("color", 'blue');
                }
                else {
                    $("#div_add_existing_motherboard").text('Добавить существующую материнскую плату');
                    $("#td_add_existing_motherboard").css("display", "none");
                    $("#div_add_existing_motherboard").css("color", 'red');
                }

            }
        </script>
    </td>
</tr>
<!----------------------------------------------------------------//-->
<!-- Корпус -->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:30px">
        Корпус:
    </td>
    <td>
        <select name="computer_case" id="computer_case">
            <option value="0" selected>Корпус</option>
            <?php
            $result = mysql_query("SELECT computer_case.* FROM  computer_case, computer_case_system_block WHERE computer_case.id= computer_case_system_block.id_computer_case AND computer_case_system_block.id_system_block = " . $idSystemBlock . ' ORDER BY  computer_case.name_computer_case', $db);

            while ($row = mysql_fetch_assoc($result)) {
                if ($rowSystemBlock['id_computer_case'] == $row['id']) {
                    echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name_computer_case'] . '</option>';
                } else {
                    echo '<option value="' . $row['id'] . '">' . $row['name_computer_case'] . '</option>';
                }
            }
            ?>


        </select>
    </td>
    <td>
        <input type="button" id="delete_computer_case" name="delete_computer_case" value="Удалить"/>
        <script type="text/javascript">
            $(document).ready(function () {
                    $("#delete_computer_case").click(function () {
                        var cpuValue = $("#computer_case option:selected").val();
                        deleteComputerCase();
                    })
                }

            );

        </script>
    </td>
</tr>

<tr>
    <td>
        <div style="color:red" id="div_add_computer_case">Добавить корпус</div>
    </td>
    <td>
        <div style="color:red" id="div_add_existing_computer_case">Добавить существующий корпус</div>
    </td>

</tr>
<tr>
    <td id="td_add_computer_case" style="display:none">

        <label>Название корпуса:</label>
        <input type="text" id="name_computer_case" name="name_random_access_memory">

        </br>
        </br>
        <input type="button" id="add_computer_case" name="add_computer_case" value="Добавить корпус">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#delete_computer_case").click(function () {
                        deleteComputerCase();
                    });

                    $("#add_computer_case").click(function () {
                        addComputerCase();
                    });

                    $("#div_add_computer_case").click(function () {
                        showFormAddComputerCase();
                    });
                }

            );

            function deleteComputerCase() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#computer_case");
                var computerCaseValue = $("#computer_case option:selected").val();
                area.load('delete_computer_case.php', {id_system_block: idSystemBlock, computer_case_id: computerCaseValue});
            }

            function addComputerCase() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#computer_case");
                var nameComputerCase = $("#name_computer_case").val();
                area.load('add_computer_case.php', {id_system_block: idSystemBlock, name_computer_case: nameComputerCase});
            }

            function showFormAddComputerCase() {
                if ($("#div_add_computer_case").text() == 'Добавить корпус') {
                    $("#div_add_computer_case").text('Скрыть форму');
                    $("#td_add_computer_case").css("display", "");
                    $("#div_add_computer_case").css("color", 'blue');
                }
                else {
                    $("#div_add_computer_case").text('Добавить корпус');
                    $("#td_add_computer_case").css("display", "none");
                    $("#div_add_computer_case").css("color", 'red');
                }

            }
        </script>
    </td>
    <td id="td_add_existing_computer_case" style="display:none">

        <select name="existing_computer_case" id="existing_computer_case">
            <option value="0" selected="selected">Корпус</option>
            <?php
            $result = mysql_query("SELECT computer_case.* FROM  computer_case ORDER BY computer_case.name_computer_case", $db);
            while ($row = mysql_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '"> ' . $row['name_computer_case'] . '</option>';
            }
            ?>
        </select>

        </br>
        </br>
        <input type="button" id="add_existing_computer_case" name="add_computer_case" value="Добавить корпус">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#add_existing_computer_case").click(function () {
                        addExistingСomputerCase();
                    });

                    $("#div_add_existing_computer_case").click(function () {
                        showFormAddExistingСomputerCase();
                    });
                }

            );

            function addExistingСomputerCase() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#computer_case");
                var ExistingСomputerCaseValue = $("#existing_computer_case option:selected").val();
                area.load('add_computer_case.php', {id_system_block: idSystemBlock, id_existing_computer_case: ExistingСomputerCaseValue});
            }

            function showFormAddExistingСomputerCase() {
                if ($("#div_add_existing_computer_case").text() == 'Добавить существующий корпус') {
                    $("#div_add_existing_computer_case").text('Скрыть форму');
                    $("#td_add_existing_computer_case").css("display", "");
                    $("#div_add_existing_computer_case").css("color", 'blue');
                }
                else {
                    $("#div_add_existing_computer_case").text('Добавить существующий корпус');
                    $("#td_add_existing_computer_case").css("display", "none");
                    $("#div_add_existing_computer_case").css("color", 'red');
                }

            }
        </script>
    </td>
</tr>
<!------------------------------------------------------------------//-->
<!-- видеокарта-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:30px">
        Видеокарта:
    </td>
    <td>
        <select name="vga" id="vga">
            <option value="0" selected>Видеокарта</option>
            <?php
            $result = mysql_query("SELECT vga.* FROM  vga, vga_system_block WHERE vga.id=vga_system_block.id_vga AND vga_system_block.id_system_block = " . $idSystemBlock . ' ORDER BY  vga.name_vga, vga.size_vga', $db);
            while ($row = mysql_fetch_assoc($result)) {
                if ($rowSystemBlock['id_vga'] == $row['id']) {
                    echo '<option selected="selected" value="' . $row['id'] . '"> ' . $row['name_vga'] . ' ' . $row['size_vga'] . 'GB</option>';
                } else {
                    echo '<option value="' . $row['id'] . '"> ' . $row['name_vga'] . ' ' . $row['size_vga'] . 'GB</option>';
                }
            }
            ?>

        </select>
    </td>
    <td>
        <input type="button" id="delete_vga" name="delete_vga" value="Удалить"/>
    </td>
</tr>

<tr>
    <td>
        <div style="color:red" id="div_add_vga">Добавить видеокарту</div>
    </td>
    <td>
        <div style="color:red" id="div_add_existing_vga">Добавить существующую видеокарту</div>
    </td>

</tr>
<tr>
    <td id="td_add_vga" style="display:none">

        <label>Название видеокарты:</label>
        <input type="text" id="name_vga" name="name_vga">

        </br>
        <label>Размер видеокарты:</label>
        <input type="text" id="size_vga" name="size_vga">

        </br>
        </br>
        <input type="button" id="add_vga" name="add_vga" value="Добавить видеокарту">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#delete_vga").click(function () {
                        deleteVga();
                    });

                    $("#add_vga").click(function () {
                        addVga();
                    })

                    $("#div_add_vga").click(function () {
                        showFormAddVga();
                    });
                }

            );

            function deleteVga() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#vga");
                var vgaValue = $("#vga option:selected").val();
                area.load('delete_vga.php', {id_system_block: idSystemBlock, vga_id: vgaValue});
            }

            function addVga() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#vga");
                var nameVga = $("#name_vga").val();
                var sizeVga = $("#size_vga").val();
                area.load('add_vga.php', {id_system_block: idSystemBlock, name_vga: nameVga, size_vga: sizeVga});
            }

            function showFormAddVga() {
                if ($("#div_add_vga").text() == 'Добавить видеокарту') {
                    $("#div_add_vga").text('Скрыть форму');
                    $("#td_add_vga").css("display", "");
                    $("#div_add_vga").css("color", 'blue');
                }
                else {
                    $("#div_add_vga").text('Добавить видеокарту');
                    $("#td_add_vga").css("display", "none");
                    $("#div_add_vga").css("color", 'red');
                }

            }
        </script>
    </td>
    <td id="td_add_existing_vga" style="display:none">

        <select name="existing_vga" id="existing_vga">
            <option value="0" selected="selected">Видеокарта</option>
            <?php
            $result = mysql_query("SELECT vga.* FROM  vga ORDER BY vga.name_vga, vga.size_vga", $db);
            while ($row = mysql_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '"> ' . $row['name_vga'] . ' ' . $row['size_vga'] . 'GB</option>';
            }
            ?>
        </select>

        </br>
        </br>
        <input type="button" id="add_existing_vga" name="add_vga" value="Добавить видеокарту">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#add_existing_vga").click(function () {
                        addExistingVga();
                    });

                    $("#div_add_existing_vga").click(function () {
                        showFormAddExistingVga();
                    });
                }

            );

            function addExistingVga() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#vga");
                var ExistingVgaValue = $("#existing_vga option:selected").val();
                area.load('add_vga.php', {id_system_block: idSystemBlock, id_existing_vga: ExistingVgaValue});
            }

            function showFormAddExistingVga() {
                if ($("#div_add_existing_vga").text() == 'Добавить существующую видеокарту') {
                    $("#div_add_existing_vga").text('Скрыть форму');
                    $("#td_add_existing_vga").css("display", "");
                    $("#div_add_existing_vga").css("color", 'blue');
                }
                else {
                    $("#div_add_existing_vga").text('Добавить существующую видеокарту');
                    $("#td_add_existing_vga").css("display", "none");
                    $("#div_add_existing_vga").css("color", 'red');
                }

            }
        </script>
    </td>
</tr>
<!------------------------------------------------------------------//-->
<!-- блок питания-->
<!------------------------------------------------------------------//-->
<tr height="25px">
    <td style="width:30px">
        Блок питания:
    </td>
    <td>
        <select name="power_unit" id="power_unit">
            <option value="0" selected>Блок питания</option>
            <?php
            $result = mysql_query("SELECT power_unit.* FROM  power_unit, power_unit_system_block WHERE power_unit.id=power_unit_system_block.id_power_unit AND power_unit_system_block.id_system_block = " . $idSystemBlock . ' ORDER BY  power_unit.size_power_unit', $db);

            while ($row = mysql_fetch_assoc($result)) {
                if ($rowSystemBlock['id_power_unit'] == $row['id']) {
                    echo '<option selected="selected" value="' . $row['id'] . '">' . $row['name_power_unit'] . ' ' . $row['size_power_unit'] . 'Вт</option>';
                } else {
                    echo '<option value="' . $row['id'] . '">' . $row['name_power_unit'] . ' ' . $row['size_power_unit'] . 'Вт</option>';
                }
            }
            ?>

        </select>
    </td>
    <td>
        <input type="button" id="delete_power_unit" name="delete_power_unit" value="Удалить"/>
    </td>
</tr>


<tr>
    <td>
        <div style="color:red" id="div_add_power_unit">Добавить блок питания</div>
    </td>
    <td>
        <div style="color:red" id="div_add_existing_power_unit">Добавить существующий блок питания</div>
    </td>

</tr>
<tr>
    <td id="td_add_power_unit" style="display:none">

        <label>Название блока питания:</label>
        <input type="text" id="name_power_unit" name="name_power_unit">

        </br>
        <label>Мощность блока питания:</label>
        <input type="text" id="size_power_unit" name="size_power_unit">

        </br>
        </br>
        <input type="button" id="add_power_unit" name="add_power_unit" value="Добавить блок питания">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#delete_power_unit").click(function () {
                        deletePowerUnit();
                    });

                    $("#add_power_unit").click(function () {
                        addPowerUnit();
                    });

                    $("#div_add_power_unit").click(function () {
                        showFormAddPowerUnit();
                    });
                }

            );

            function deletePowerUnit() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#power_unit");
                var powerUnitValue = $("#power_unit option:selected").val();
                area.load('delete_power_unit.php', {id_system_block: idSystemBlock, power_unit_id: powerUnitValue});
            }

            function addPowerUnit() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#power_unit");
                var namePowerUnit = $("#name_power_unit").val();
                var sizePowerUnit = $("#size_power_unit").val();
                area.load('add_power_unit.php', {id_system_block: idSystemBlock, name_power_unit: namePowerUnit, size_power_unit: sizePowerUnit});
            }

            function showFormAddPowerUnit() {
                if ($("#div_add_power_unit").text() == 'Добавить блок питания') {
                    $("#div_add_power_unit").text('Скрыть форму');
                    $("#td_add_power_unit").css("display", "");
                    $("#div_add_power_unit").css("color", 'blue');
                }
                else {
                    $("#div_add_power_unit").text('Добавить блок питания');
                    $("#td_add_power_unit").css("display", "none");
                    $("#div_add_power_unit").css("color", 'red');
                }

            }
        </script>
    </td>
    <td id="td_add_existing_power_unit" style="display:none">

        <select name="existing_power_unit" id="existing_power_unit">
            <option value="0" selected="selected">Блок питания</option>
            <?php
            $result = mysql_query("SELECT power_unit.* FROM  power_unit ORDER BY power_unit.size_power_unit", $db);
            while ($row = mysql_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '"> ' . $row['name_power_unit'] . ' ' . $row['size_power_unit'] . 'Вт</option>';
            }
            ?>
        </select>

        </br>
        </br>
        <input type="button" id="add_existing_power_unit" name="add_power_unit" value="Добавить блок питания">


        <script type="text/javascript">
            $(document).ready(function () {

                    $("#add_existing_power_unit").click(function () {
                        addExistingPowerUnit();
                    });

                    $("#div_add_existing_power_unit").click(function () {
                        showFormAddExistingPowerUnit();
                    });
                }

            );

            function addExistingPowerUnit() {
                var idSystemBlock = "<?php echo $idSystemBlock;?>";
                var area = $("#power_unit");
                var ExistingPowerUnitValue = $("#existing_power_unit option:selected").val();
                area.load('add_power_unit.php', {id_system_block: idSystemBlock, id_existing_power_unit: ExistingPowerUnitValue});
            }

            function showFormAddExistingPowerUnit() {
                if ($("#div_add_existing_power_unit").text() == 'Добавить существующий блок питания') {
                    $("#div_add_existing_power_unit").text('Скрыть форму');
                    $("#td_add_existing_power_unit").css("display", "");
                    $("#div_add_existing_power_unit").css("color", 'blue');
                }
                else {
                    $("#div_add_existing_power_unit").text('Добавить существующий блок питания');
                    $("#td_add_existing_power_unit").css("display", "none");
                    $("#div_add_existing_power_unit").css("color", 'red');
                }

            }
        </script>
    </td>
</tr>
<tr>
    <td>
        Ссылка на изображения(сохранять в папку system_block_images/, писать только имя файла и расширение,330px*177px)
    </td>
    <td>
        <input type="text" name="url_image" id="url_image" value="<?php echo $rowSystemBlock['url_image']; ?>">
    </td>
</tr>

<tr>
    <td style="width:30px">
        Стоимость:
    </td>
    <td>
        <input name="cost" type="text" id="cost" size="20" value="<?php echo $rowSystemBlock['cost']; ?>"/>
    </td>
</tr>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" id="submit" value="Обновить"/>
    </td>
    <td></td>
</tr>

</table>
</form>
</div>
<br/>
</div>
<div id="text_footer"></div>
</div>
<div style="clear: both;">&nbsp;</div>
</div>
</div>
<hr/>
<!-- start footer -->
<?php include("index/footer.txt"); ?>
</div>

</body>
</html>
