document.querySelectorAll("input").forEach(element => {
    element.classList.add('activeForm')
});

document.querySelectorAll("#search_header_bar").forEach(element => {
    element.classList.remove('activeForm')
});

