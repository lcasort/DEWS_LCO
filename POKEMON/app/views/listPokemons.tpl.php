<?php require_once('./app/views/inc/header.php'); ?>

<div>
    <a class="add_pokemon" href="./?controller=Pokemon&method=form">&#43; Add new pokémon</a>
    
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>HP</th>
                <th>Attack</th>
                <th>Defence</th>
                <th>Sp. Att.</th>
                <th>Sp. Def.</th>
                <th>Speed</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <form action="./?controller=Pokemon&method=delete" method="post">
            <?php 
            foreach ($data as $key => $value):
            ?>
                <tr>
                    <!-- No. -->
                    <td><?php echo $key; ?></td>
                    <!-- Image -->
                    <td>
                        <a href="./?controller=Pokemon&method=view&id=<?php echo $key; ?>">
                            <img src="<?php echo $value['pic']; ?>">
                        </a>
                    </td>
                    <!-- Name -->
                    <td><?php echo $value['name']; ?></td>
                    <!-- Type -->
                    <td>
                    <?php foreach($value['types'] as $type): ?>
                        <a href="./?controller=PokemonType&method=list&type=<?php echo $type; ?>" class="type_link">
                            <div id="types" class="<?php echo $type; ?>"><?php echo $type; ?></div>
                        </a>
                    <?php endforeach; ?>
                    </td>
                    <!-- HP -->
                    <td><?php echo $value['hp']; ?></td>
                    <td><?php echo $value['att']; ?></td>
                    <td><?php echo $value['def']; ?></td>
                    <td><?php echo $value['s_att']; ?></td>
                    <td><?php echo $value['s_def']; ?></td>
                    <td><?php echo $value['spd']; ?></td>
                    <td>
                        <input class="delete_button" type="submit" name="delete[<?php echo $key; ?>]" value="&#10060;" />
                    </td>
                </tr>
            </form>
            
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>