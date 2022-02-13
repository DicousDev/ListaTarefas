<?php

require_once '../../database/db.php';

function findTaskAction($conn, $id) {
    $task = findTaskDb($conn, $id);
    return $task;
}

function createTaskAction($conn, $task, $priority, $state) {
    createTaskDb($conn, $task, $priority, $state);
    return header("Location: ./read.php");
}

function readTaskAction($conn) {
    return readTaskDb($conn);
}

function editTaskAction($conn, $id, $task, $priority, $state) {
    editTaskDb($conn, $id, $task, $priority, $state);
    return header("Location: ./read.php");
}

function deleteTaskAction($conn, $id) {
    deleteTaskDb($conn, $id);
    return header("Location: ./read.php");
}

?>