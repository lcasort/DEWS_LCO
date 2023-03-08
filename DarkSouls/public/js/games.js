document.querySelector(".create-game").addEventListener("click",
validateCheckboxes, false);

const objs = document.querySelectorAll(".objective");
for (let i = 0; i < objs.length; i++) {
    objs[i].addEventListener("input", validateCheckboxes, false);
}


function validateCheckboxes(e)
{
    const chbxs = document.querySelectorAll(".objective[type=checkbox]");
    let res = false;
    for (let i = 0; i < chbxs.length; i++) {
        const element = chbxs[i];
        if(element.checked) {
            res = true;
            i = chbxs.length;
        }
    }

    if(!res) {
        e.preventDefault();
        let campo = document.querySelector(".objectives-error");
        let msg = document.createElement("span");
        msg.innerText = "You must select at least one objective.";
        campo.appendChild(msg);
    } else {
        let campo = document.querySelector(".objectives-error");
        if(campo.hasChildNodes()) {
            campo.removeChild(document.querySelector("span"));
        }
    }
}