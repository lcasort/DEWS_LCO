<?php require_once('./app/views/inc/header.php'); ?>

<div>
    <?php if($server === 'db') { ?>
    <div class="form_add_pokemon">
        <form action="./?controller=Pokemon&method=add&server=db" method="post">
            <input name="no" type="number" min="1" max="151" placeholder="No" required>

            <input type="submit" class="add_pokemon" name="add" value="Add Pokemon">
        </form>
    </div>
    <?php } ?>
    
    <form action="./?controller=Pokemon&method=<?php if($server==='db') { echo 'delete'; } else { echo 'addFromAPI'; }?>" method="post">
        <div class="container-grid">
            <?php 
            foreach ($data as $key => $value):
            ?>
                <div class="container-cell">

                    <!-- Action button -->
                    <div class="action-button">
                        <?php if($server === 'db') { ?>
                        <input class="delete_button" type="submit" name="delete[<?php echo $key; ?>]" value="&#10060;" />
                        <?php } else { ?>
                        <input class="add_from_api_button" type="submit" name="add[<?php echo $value['no']; ?>]" value="&#128215;" />
                        <?php } ?>
                    </div>

                    <!-- No. -->
                    <div class="info no">
                        <?php echo 'No. ' . $value['no']; ?>
                    </div>

                    <!-- Image -->
                    <div class="info pic">
                        <?php if($server === 'db') { ?>
                        <a href="./?controller=Pokemon&method=view&id=<?php echo $key; ?>">
                        <?php } else { ?>
                        <a href="./?controller=Pokemon&method=view&server=api&id=<?php echo $value['no']; ?>">
                        <?php } ?>
                            <img src="<?php echo $value['pic']; ?>">
                        </a>
                    </div>

                    <!-- Name -->
                    <div class="info name">
                        <?php echo $value['name']; ?>
                    </div>

                    <!-- Type -->
                    <div class="info types">
                        <?php foreach($value['types'] as $type): ?>
                        <a href="./?controller=Pokemon&method=listType&type=<?php echo $type; ?>" class="type_link">                        
                            <div id="types" class="<?php echo $type; ?>"><?php echo $type; ?></div>
                        </a>
                        <?php endforeach; ?>
                    </div>

                    <!-- Stats -->
                    <div class="info stats hp">
                        <?php echo 'HP: '.$value['hp']; ?>
                    </div>
                    <div class="info stats att">
                        <?php echo 'Att.: '.$value['att']; ?>
                    </div>
                    <div class="info stats def">
                        <?php echo 'Def.: '.$value['def']; ?>
                    </div>
                    <div class="info stats satt">
                        <?php echo 'S. Att.: '.$value['s_att']; ?>
                    </div>
                    <div class="info stats sdef">
                        <?php echo 'S. Def.: '.$value['s_def']; ?>
                    </div>
                    <div class="info stats spd">
                        <?php echo 'Speed: '.$value['spd']; ?>
                    </div>
                </div>            
            <?php
            endforeach;
            ?>
        </div>
    </form>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>