<?php

require_once '../partials/header.php';
require_once '../../../config.php';
require_once '../../../src/actions/task.php';

$tasks = readTaskAction($conn);

?>

<form class="form" action="./create.php" method="POST">
    <section class="campo">
        <label for="task">Tarefa</label>
        <div class="task-input">
            <input type="text" name="task" id="task" placeholder="Tarefa" required/>
        </div>
    </section>
    <section class="campo">
        <label for="prioridade">Prioridade</label>
        <div class="prioridade-opcoes">
            <select id="prioridadeOpcoes" name="prioridade">
                <option value="Baixa">Baixa</option>
                <option value="Normal">Normal</option>
                <option value="Alta">Alta</option>
            </select>
        </div>
    </section>
    <section class="campo">
        <label for="estado">Estado</label>
        <div class="estado-opcoes">
            <select id="estadoOpcoes" name="estado">
                <option value="Pendente">Pendente</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Concluída">Concluída</option>
            </select>
        </div>
    </section>
    <footer class="add-task">
        <button id="addTask" type="submit">ADICIONAR</button>
    </footer>
</form>
<div class='tabela_tarefa'>
    <?php if ($tasks): ?>
        <table>
            <thead class="cabecalho-tarefas">
                <tr>
                    <th>Tarefa</th>
                    <th>Prioridade</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="container-tarefas">
                <?php foreach($tasks as $row): ?>
                    <tr>
                        <th><?=htmlspecialchars($row['MESSAGE'])?></th>
                        <th><?=htmlspecialchars($row['PRIORITY'])?></th>
                        <th><?=htmlspecialchars($row['STATE'])?></th>
                        <th>
                            <a class="tarefa-edit" href='./edit.php?id=<?=$row['ID']?>'>Edit</a>
                            <a class="tarefa-delete" href='./delete.php?id=<?=$row['ID']?>'>Delete</a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php require_once '../partials/header.php'; ?>
