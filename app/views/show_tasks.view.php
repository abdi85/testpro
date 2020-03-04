<?php
    $title = "Tasks page";
    require('partials/header.php');
?>

<main>
    <h1>My tasks</h1>
    <table>
      <tr>
        <th>id</th>
        <th>What</th>
        <th>Completed</th>
        <th>Deadline</th>
      </tr>

    <?php foreach ($tasks as $task) {
    	echo $task->asHTMLTableRow();
    }?>
    </table>
</main>
<br>

<?php require('partials/footer.php'); ?>
