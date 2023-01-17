<?php require_once('./app/views/inc/header.php'); ?>

<div>
    <form action="./controller=Pokemon&method=add" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" />
    </form>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>