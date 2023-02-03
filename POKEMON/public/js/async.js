document.querySelector(".load_button").addEventListener("click", getNext15, false);

function getNext15()
{
    var xhttp = new XMLHttpRequest();

    xhttp.open("GET", "./?server=api&controller=Pokemon&method=listPaginated", true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Typical action to be performed when the document is ready:
            //$('#example').append(xhttp.responseText);
            const end = Number.parseInt(xhttp['response'].toString().length) - 1;
            console.log(end);
            let pokemonsStr = xhttp['response'].toString().substring(1, end);
            const pokemons = JSON.parse(pokemonsStr);
            
            let res = '';
            for (let k=0; k<pokemons.lenght; k++) {
                res = '<div class="container-cell">';
                res += '<div class="head-line">';
                res += '<!-- No. -->';
                res += '<div class="info no">';
                res += 'No. ' + pokemons[k].no;
                res += '</div>';
                res += '<!-- Action button -->';
                res += '<div class="action-button">';
                res += '<input class="add_from_api_button" type="submit" name="add[' + pokemons[k].no + '" value="&#128215;" />';
                res += '</div>';
                res += '</div>';
                res += '<div class="info-container">';
                res += '<!-- Image -->';
                res += '<div class="info pic">';
                res += '<a href="./?controller=Pokemon&method=view&server=api&id='+ pokemons[k].no +'">';
                res += '<img src="' + pokemons[k].pic + '">';
                res += '</a>';
                res += '</div>';
                res += '<!-- Name -->';
                res += '<div class="info name">';
                res += pokemons[k].name;
                res += '</div>';
                res += '<!-- Type -->';
                res += '<div class="info types">';
                for (const type of pokemons[k].types) {
                    res += '<a href="./?controller=Pokemon&method=listType&type=' + type + '" class="type_link">';
                    res += '<div id="types" class="' + type + '">' + type + '</div>';
                    res += '</a>';
                }
                res += '</div>';
                res += '<!-- Stats -->';
                res += '<div class="info stats">';
                res += '<h2>STATS</h2>';
                res += '<div class="info stats_hp">';
                res += 'HP: ' + pokemons[k].hp;
                res += '</div>';
                res += '<div class="info stats_att">';
                res += 'Att.: ' + pokemons[k].att;
                res += '</div>';
                res += '<div class="info stats_def">';
                res += 'Def.: ' + pokemons[k].def;
                res += '</div>';
                res += '<div class="info stats_satt">';
                res += 'S. Att.: ' + pokemons[k].s_att;
                res += '</div>';
                res += '<div class="info stats_sdef">';
                res += 'S. Def.: ' + pokemons[k].s_def;
                res += '</div>';
                res += '<div class="info stats_spd">';
                res += 'Speed: ' + pokemons[k].spd;
                res += '</div>';
                res += '</div>';
                res += '</div>';
                res += '</div>';
            }
            
            document.querySelector('.container-grid').innerHTML += res;
        }
    }
}