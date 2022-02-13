<?php

require_once '../../../config.php';
require_once '../../../src/actions/task.php';

if(isset($_GET['id'])) {    
    $id = intval($_GET['id']);
    deleteTaskAction($conn, $id);
}
?>