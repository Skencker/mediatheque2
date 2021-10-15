let input = document.querySelector('input[name="theme"]');
let body = document.querySelector('body');
let darkmode = localStorage.getItem('darkmode')
let navbar = document.querySelector('nav')
let table = document.querySelector('table')
let tr = document.querySelectorAll('tr')



const enableDarkmode = () => {
        body.classList.add('dark')
        navbar.classList.add('navbar-dark')
        navbar.classList.add('bg-dark')
        for (let i = 0; i < tr.length; i ++) {
                tr[i].classList.add('text-light')
        }
        localStorage.setItem('darkmode','enabled')
}
const disableDarkmode = () => {
        body.classList.remove('dark')
        navbar.classList.remove('bg-dark')
        navbar.classList.remove('navbar-dark')
        for (let i = 0; i < tr.length; i ++) {
                tr[i].classList.remove('text-light')
        }
        localStorage.setItem('darkmode', null)
}

if (darkmode === 'enabled') {
        enableDarkmode();
}

input.addEventListener('click', () => {
        darkmode = localStorage.getItem('darkmode')
        if (darkmode !== 'enabled') {
                console.log('activé')
                enableDarkmode();
        } else {
                disableDarkmode();
                console.log('desactivé')
        }
})

