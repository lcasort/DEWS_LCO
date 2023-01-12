<?php require_once('./app/views/inc/header.php'); ?>

<?php 
    $row = $data->fetch();
?>

<div>
    <h1><?php echo ucfirst($row['nombre']); ?></h1>
</div>
<div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- No. -->
                <td><?php echo $row['id_pokemon']; ?></td>
                <!-- Image -->
                <td>
                    <a href="./?controller=Pokemon&method=view&id=<?php echo $row['id_pokemon']; ?>">
                        <img src="<?php echo $row['url_imagen']; ?>">
                    </a>
                </td>
                <!-- Name -->
                <td><?php echo $row['nombre']; ?></td>
                <!-- Description -->
                <td><?php echo $row['descripcion']; ?></td>
                <!-- Type -->
                <td><?php echo $row['tipo_nombre']; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>