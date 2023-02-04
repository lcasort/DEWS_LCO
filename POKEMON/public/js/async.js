document.querySelector(".load_button").addEventListener("click", getNext15, false);

/**
 * Método que muestra por pantalla los siguientes 15 pokemons.
 */
function getNext15()
{
    // Creamos la XMLHttpRequest.
    var xhttp = new XMLHttpRequest();

    // Hacemos la petición a nuestro controlador que nos trae los datos de la
    // API.
    xhttp.open("GET", "./?server=api&controller=Pokemon&method=listPaginated", true);
    xhttp.send();

    // Una vez obtenemos la respuesta...
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parseamos el JSON que obtenemos desde el controlador a objeto
            // JSON.
            const pokemons = JSON.parse(xhttp['response']);
            
            // Montamos el HTML de manera dinámica.
            const res = generateHTML(pokemons);
            
            // Añadimos el nuevo HTML al que ya teníamos anteriormente.
            document.querySelector('.container-grid').innerHTML += res;
        }
    }
}

/**
 * Método que retorna un String que contiene el HTML de los 15 siguientes
 * pokemons.
 * @param {Object} pokemons 
 * @returns 
 */
function generateHTML(pokemons) {
    let res = '';
    for (const [k, value] of Object.entries(pokemons)) {
        res += '<div class="container-cell">'
        + '<div class="head-line">'
        + '<!-- No. -->'
        + '<div class="info no">'
        + 'No. ' + value.no
        + '</div>'
        + '<!-- Action button -->'
        + '<div class="action-button">'
        + '<input class="add_from_api_button" type="submit" name="add[' + value.no + '" value="&#128215;" />'
        + '</div>'
        + '</div>'
        + '<div class="info-container">'
        + '<!-- Image -->'
        + '<div class="info pic">'
        + '<a href="./?controller=Pokemon&method=view&server=api&id='+ value.no +'">'
        + '<img src="' + value.pic + '">'
        + '</a>'
        + '</div>'
        + '<!-- Name -->'
        + '<div class="info name">' + value.name + '</div>'
        + '<!-- Type -->'
        + '<div class="info types">';
        for (const [kk, type] of Object.entries(value.types)) {
            res += '<a href="./?controller=Pokemon&method=listType&type=' + type + '" class="type_link">'
            + '<div id="types" class="' + type + '">' + type + '</div>'
            + '</a>';
        }
        res += '</div>'
        + '<!-- Stats -->'
        + '<div class="info stats">'
        + '<h2>STATS</h2>'
        + '<div class="info stats_hp">'
        +  'HP: ' + value.hp
        + '</div>'
        + '<div class="info stats_att">'
        + 'Att.: ' + value.att
        + '</div>'
        + '<div class="info stats_def">'
        + 'Def.: ' + value.def
        + '</div>'
        + '<div class="info stats_satt">'
        + 'S. Att.: ' + value.s_att
        + '</div>'
        + '<div class="info stats_sdef">'
        + 'S. Def.: ' + value.s_def
        + '</div>'
        + '<div class="info stats_spd">'
        + 'Speed: ' + value.spd
        + '</div>'
        + '</div>'
        + '</div>'
        + '</div>';
    }

    return res;
}