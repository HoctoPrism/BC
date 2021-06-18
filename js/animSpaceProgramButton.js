let space = document.getElementById('back_img_space');
function addAnim() {
    space.classList.add('animated')
    space.removeEventListener('mouseover', addAnim);
};
space.addEventListener('mouseover', addAnim);