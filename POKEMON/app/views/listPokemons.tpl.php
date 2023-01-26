<?php require_once('./app/views/inc/header.php'); ?>

<div>
    <?php if($server === 'db') { ?>
    <div class="addPokemonButton">
        <a class="add_pokemon" href="./?controller=Pokemon&method=showForm">Add new pokémon</a>
    </div>
    <?php } ?>
    
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
            <form action="./?controller=Pokemon&method=<?php if($server==='db') { echo 'delete'; } else { echo 'addFromAPI'; }?>" method="post">
            <?php 
            foreach ($data as $key => $value):
            ?>
                <tr>
                    <!-- No. -->
                    <td><?php echo $value['no']; ?></td>
                    <!-- Image -->
                    <td>
                    <?php if($server === 'db') { ?>
                        <a href="./?controller=Pokemon&method=view&id=<?php echo $key; ?>">
                    <?php } else { ?>
                        <a href="./?controller=Pokemon&method=view&server=api&id=<?php echo $value['no']; ?>">
                    <?php } ?>
                            <img src="<?php echo $value['pic']; ?>">
                        </a>
                    </td>
                    <!-- Name -->
                    <td><?php echo $value['name']; ?></td>
                    <!-- Type -->
                    <td>
                    <?php foreach($value['types'] as $type): ?>
                        <a href="./?controller=Pokemon&method=listType&type=<?php echo $type; ?>" class="type_link">                        
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
                    <?php if($server === 'db') { ?>
                        <input class="delete_button" type="submit" name="delete[<?php echo $key; ?>]" value="&#10060;" />
                    <?php } else { ?>
                        <input class="add_from_api_button" type="submit" name="add[<?php echo $value['no']; ?>]" value="&#128215;" />
                    <?php } ?>
                    </td>
                </tr>            
            <?php
            endforeach;
            ?>
            </form>
        </tbody>
    </table>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>