import {country_list} from '../js/countries-db.js';

document.addEventListener('DOMContentLoaded', loadSelectCountry, false);

function loadSelectCountry(e)
{
    let s = document.querySelector('.country');
    for (const c of country_list) {
        let opt = document.createElement('option');
        opt.value = c;
        opt.innerText = c;
        s.appendChild(opt);
    }
}