document.getElementById("close-message").addEventListener("click", closeTab, false);
document.querySelector('.system_messages').addEventListener("load", timeout, false);

function closeTab(e) {
    document.querySelector('.system_messages').style.display = 'none';
}

function timeout(e) {
    setTimeout(closeTab, 5000);
}