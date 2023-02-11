<?php require_once('./app/views/inc/header.php'); ?>

<div>
    <h1>API v1.0 DOCUMENTATION</h1>
</div>

<div>
    <div class="method_api get">
        <h2>GET</h2>
        <div>
            <div class="method list">
                <h3>List all Pokémons</h3>
                <p>curl "http://localhost/DEWS_LCO/POKEMON/?controller=RestApi&method=process&path=pokemon"</p>
            </div>
            <div class="method view">
                <h3>View one Pokémon</h3>
                <p>curl "http://localhost/DEWS_LCO/POKEMON/?controller=RestApi&method=process&path=pokemon/<b>{id_pokemon}"</b></p>
            </div>
        </div>
    </div>
    <div class="method_api post">
        <h2>POST</h2>
        <div>
            <div class="method create">
                <h3>Add one Pokémon</h3>
                <p>curl -d "no=<b>{no_pokemon}</b>" -X POST "http://localhost/DEWS_LCO/POKEMON/?controller=RestApi&method=process&path=pokemon"</p>
            </div>
        </div>
    </div>
    <div class="method_api update">
        <h2>UPDATE</h2>
        <div>
            <div class="method update">
                <h3>Update one Pokémon</h3>
                <p>curl -d "name=<b>{name_pokemon}</b>" -X PUT "http://localhost/DEWS_LCO/POKEMON/?controller=RestApi&method=process&path=pokemon/<b>{id_pokemon}"</b></p>
            </div>
        </div>
    </div>
    <div class="method_api delete">
        <h2>DELETE</h2>
        <div>
            <div class="method delete">
                <h3>Delete one Pokémon</h3>
                <p>curl -X DELETE "http://localhost/DEWS_LCO/POKEMON/?controller=RestApi&method=process&path=pokemon/<b>{id_pokemon}"</b></p>
            </div>
        </div>
    </div>
</div>

<?php require_once('./app/views/inc/footer.php'); ?>