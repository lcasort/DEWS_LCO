<?php  require_once('./app/views/inc/header.php'); ?>

<div>
    <h1>Pokemons</h1>
</div>
<div class="pokemon_container">
    <?php 
    // Cogemos el id del pokemon a mostrar y lo almacenamos en $no.
    $no = array_keys($data)[0];
    ?>
    <div class="pic_pokemon"><img src="<?php echo $data[$no]['pic']; ?>"></div>
    <div class="id_pokemon"><?php echo $no; ?></div>
    <div class="name_pokemon"><?php echo $data[$no]['name']; ?></div>
    <div class="types_pokemon">
    <?php foreach($data[$no]['types'] as $type): ?>
        <a href="./?controller=PokemonType&method=list&type=<?php echo $type; ?>" class="type_link">
            <div id="types" class="<?php echo $type; ?>"><?php echo $type; ?></div>
        </a>
    <?php endforeach; ?>
    </div>
    <div><?php echo $data[$no]['hp']; ?></div>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>