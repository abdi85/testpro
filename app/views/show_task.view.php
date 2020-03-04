<?php
    $title = "Task page";
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

    <?php echo $currentTask->asHTMLTableRow(); ?>

    </table>

    <p>
        <a href="tasks">Show all tasks</a>
    </p>


</main>
<br>

<?php require('partials/footer.php'); ?>
