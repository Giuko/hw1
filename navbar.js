
// Funzione che gestisce la navbar
function resize(){
    let width = window.innerWidth;

    if(width < 1200){
        let nav = document.querySelector('.main-container nav');
        nav.classList.add('hidden');
        nav.classList.remove('flex');
    }else{
        let nav = document.querySelector('.main-container nav');
        nav.classList.add('flex');
        nav.classList.remove('hidden');

        let body = document.querySelector('body');
        body.classList.remove('no-scroll');
    }


}

if(window.innerWidth < 1200){
    let nav = document.querySelector('.main-container nav');
    
    nav.classList.add('hidden');
    nav.classList.remove('flex');
}

window.addEventListener('resize', resize)
