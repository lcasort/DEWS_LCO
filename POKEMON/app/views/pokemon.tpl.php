<?php  require_once('./app/views/inc/header.php'); ?>

<div class="main_container">
    <div class="pokemon_grid_container">
        <?php 
        // Cogemos el id del pokemon a mostrar y lo almacenamos en $no.
        $id = array_keys($data)[0];
        ?>
        <div class="id_pokemon">
            <div class="item_name"><h3>No</h3></div>
            <div class="info"><?php echo $data[$id]['no']; ?></div>
        </div>
        <div class="name_pokemon">
            <div class="item_name"><h3>Name</h3></div>
            <div class="info"><?php echo $data[$id]['name']; ?></div>
        </div>
        <div class="pic_pokemon"><img src="<?php echo $data[$id]['pic']; ?>"></div>
        <div class="types_pokemon">
        <div class="item_name"><h3>
        <?php if(count($data[$id]['types'])>1) { ?>
            Types
        <?php } else { ?>
            Type
        <?php } ?>
        </h3></div>
        <?php foreach($data[$id]['types'] as $type): ?>
            <a href="./?controller=PokemonType&method=list&type=<?php echo $type; ?>" class="type_link">
                <div id="type" class="<?php echo $type; ?>"><?php echo $type; ?></div>
            </a>
        <?php endforeach; ?>
        </div>
        <div class="stats_pokemon">
            <div>
                <div class="item_name"><h3>HP</h3></div>
                <div class="hp"><?php echo $data[$id]['hp']; ?></div>
            </div>
            <div>
                <div class="item_name"><h3>Attack</h3></div>
                <div class="att"><?php echo $data[$id]['att']; ?></div>
            </div>
            <div>
                <div class="item_name"><h3>Defence</h3></div>
                <div class="def"><?php echo $data[$id]['def']; ?></div>
            </div>
            <div>
                <div class="item_name"><h3>Special Attack</h3></div>
                <div class="s_att"><?php echo $data[$id]['s_att']; ?></div>
            </div>
            <div>
                <div class="item_name"><h3>Special Defence</h3></div>
                <div class="s_def"><?php echo $data[$id]['s_def']; ?></div>
            </div>
            <div>
                <div class="item_name"><h3>Speed</h3></div>
                <div class="spd"><?php echo $data[$id]['spd']; ?></div>
            </div>
        </div>
    </div>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>