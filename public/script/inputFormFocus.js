document.querySelectorAll("input").forEach(element => {
    element.classList.add('activeForm')
});

document.querySelectorAll("textarea").forEach(element => {
    element.classList.add('activeForm')
});

document.querySelectorAll("#search_header_bar").forEach(element => {
    element.classList.remove('activeForm')
});

document.querySelectorAll("input[type=checkbox]").forEach(element => {
    element.classList.remove('activeForm')
});

document.querySelectorAll('a[href=" /CGU "] label').forEach(element => {
    element.setAttribute('for', '');
    element.classList.add('text-secondary', 'pointer', 'text-decoration-underline')
});
