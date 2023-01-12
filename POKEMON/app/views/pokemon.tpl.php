<?php  require_once('./app/views/inc/header.php'); ?>

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
                <th>HP</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = array_keys($data)[0];
            ?>
            <tr>
                <!-- No. -->
                <td><?php echo $no; ?></td>
                <!-- Image -->
                <td>
                    <img src="<?php echo $data[$no]['pic']; ?>">
                </td>
                <!-- Name -->
                <td><?php echo $data[$no]['name']; ?></td>
                <!-- Type -->
                <td><?php echo implode(', ', $data[$no]['types']); ?></td>
                <!-- HP -->
                <td><?php echo $data[$no]['hp']; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>