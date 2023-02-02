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
            console.log(xhttp['response']);
        }
    }
}