<?php

require_once '../partials/header.php';
require_once '../../../config.php';
require_once '../../../src/actions/task.php';

if(isset($_POST['id']) && isset($_POST['task']) && isset($_POST['prioridade']) && isset($_POST['estado'])) {
    editTaskAction($conn, $_POST['id'], $_POST['task'], $_POST['prioridade'], $_POST['estado']);
}

$task = findTaskAction($conn, $_GET['id']);

?>

<form class="form" action="./edit.php" method="POST">
    <input type="hidden" name="id" value="<?=$_GET['id']?>" required/>
    <section class="campo">
        <label for="task">Tarefa</label>
        <div class="task-input">
            <input type="text" name="task" id="task" placeholder="Tarefa" value="<?=htmlspecialchars($task['MESSAGE'])?>" required/>
        </div>
    </section>
    <section class="campo">
        <label for="prioridade">Prioridade</label>
        <div class="prioridade-opcoes">
            <select id="prioridadeOpcoes" name="prioridade" value="<?=htmlspecialchars($task['PRIORITY'])?>">
                <option value="Baixa">Baixa</option>
                <option value="Normal">Normal</option>
                <option value="Alta">Alta</option>
            </select>
        </div>
    </section>
    <section class="campo">
        <label for="estado">Estado</label>
        <div class="estado-opcoes">
            <select id="estadoOpcoes" name="estado" value="<?=htmlspecialchars($task['STATE'])?>">
                <option value="Pendente">Pendente</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Concluída">Concluída</option>
            </select>
        </div>
    </section>
    <footer class="add-task">
        <button id="addTask" type="submit">EDITAR</button>
    </footer>
</form>

<?php require_once '../partials/header.php'; ?>