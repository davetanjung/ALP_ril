function toggleStudentSelection(card) {
    const isSelected = card.getAttribute('data-selected') === 'true';
    const checkbox = card.querySelector('input[type="checkbox"]');

    if (isSelected) {
        card.setAttribute('data-selected', 'false');
        card.style.backgroundColor = ""; 
        card.style.color = "";
        checkbox.checked = false;
    } else {
        card.setAttribute('data-selected', 'true');
        card.style.backgroundColor = "#3b82f6";
        card.style.color = "white";
        checkbox.checked = true;
    }
}

// Add this to handle initial coloring of the selected students:
document.querySelectorAll('.student-card').forEach(card => {
    const isSelected = card.getAttribute('data-selected') === 'true';
    if (isSelected) {
        card.style.backgroundColor = "#3b82f6"; 
        card.style.color = "white";
    }
});
