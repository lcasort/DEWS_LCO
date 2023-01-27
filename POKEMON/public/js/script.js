document.getElementById("close-message").addEventListener("click", closeTab, false);

function closeTab() {
    document.querySelector('.system_messages').style.display = 'none';
}

setTimeout(closeTab, 5000);