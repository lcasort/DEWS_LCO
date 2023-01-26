<?php require_once('./app/views/inc/header.php'); ?>

<div>
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
            </tr>
        </thead>
        <tbody>
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
            </tr>
            
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>