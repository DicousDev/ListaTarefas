<?php

function findTaskDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
	$sql = "SELECT * FROM TASK  WHERE id = ?";
	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt, $sql))
		exit('SQL error');

	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_execute($stmt);
	
	$task = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

	mysqli_close($conn);
	return $task;
}

function createTaskDb($conn, $task, $priority, $state) {
    $task = mysqli_real_escape_string($conn, $task);
    $priority = mysqli_real_escape_string($conn, $priority);
    $state = mysqli_real_escape_string($conn, $state);

    if($task && $priority && $state) {
        $sql = "INSERT INTO TASK(MESSAGE, PRIORITY, STATE) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            exit('SQL error');
        }

        mysqli_stmt_bind_param($stmt, 'sss', $task, $priority, $state);
        mysqli_stmt_execute($stmt);
        mysqli_close($conn);
    }
}

function readTaskDb($conn) {
    $task = [];

    $sql = "SELECT * FROM TASK";
    $result = mysqli_query($conn, $sql);

    $result_check = mysqli_num_rows($result);

    if($result_check > 0)
        $task = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
    return $task;
}

function editTaskDb($conn, $id, $task, $priority, $state) {
    if($id && $task && $priority && $state) {
        $sql = "UPDATE TASK SET MESSAGE = ?, PRIORITY = ?, STATE = ? WHERE ID = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            exit('SQL error');
        }

		mysqli_stmt_bind_param($stmt, 'sssi', $task, $priority, $state, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
    }
}

function deleteTaskDb($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);

    if($id) {
        $sql = "DELETE FROM TASK WHERE ID = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            exit("SQL ERROR");
        }

        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
    }
}

?>