<?php require_once('./app/views/inc/header.php'); ?>

<div>
    <h1>Pokemons</h1>
</div>
<div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $value): ?>
            <tr>
                <!-- No. -->
                <td><?php echo $key; ?></td>
                <!-- Image -->
                <td>
                    <a href="./?controller=Pokemon&method=view&id=<?php echo $key; ?>">
                        <img src="<?php echo $value['img']; ?>">
                    </a>
                </td>
                <!-- Name -->
                <td><?php echo $value['name']; ?></td>
                <!-- Type -->
                <td>
                    <?php echo implode(', ', array_values($value['type'])); ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>