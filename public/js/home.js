const popup = document.getElementById('popup-card');

function showPopup(event, text) {
    popup.textContent = text;
    popup.style.opacity = '1';
}

function movePopup(event) {
    popup.style.left = `${event.clientX + 15}px`;
    popup.style.top = `${event.clientY + 15}px`;
}

function hidePopup() {
    popup.style.opacity = '0';
}