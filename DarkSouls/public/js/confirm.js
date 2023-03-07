document.querySelector(".container").addEventListener("click", showDeletePopUp,
false);

function showDeletePopUp(e)
{
    const campo = e.target;
    let res = true;
    if(campo.classList.contains("delete"))
    {
        res = confirm("Do you wish to delete this player?");
    }

    if(!res) {
        e.preventDefault();
    }
}