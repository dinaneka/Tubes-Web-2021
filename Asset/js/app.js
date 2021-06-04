const header = document.querySelector('header');
const hamburger = document.querySelector('.hamburger');
const links = document.querySelector('.links');
window.addEventListener('scroll', () => {
    header.classList.toggle("sticky", window.scrollY > 0);
})
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle("menu");
    links.classList.toggle("active");
});
var typed = new Typed(".typ", {
    strings: ["Anxiety", "Mental Health", "Cancer"],
    typeSpeed: 80,
    loop: true,
});

