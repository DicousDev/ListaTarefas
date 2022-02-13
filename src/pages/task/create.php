<?php

require_once '../../../config.php';
require_once '../../../src/actions/task.php';


if(isset($_POST["task"]) && isset($_POST["prioridade"]) && isset($_POST["estado"]) ) {
    createTaskAction($conn, $_POST["task"], $_POST["prioridade"], $_POST["estado"]);
}

?>