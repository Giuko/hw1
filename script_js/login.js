const usernameJson = [];
fetch('script_php/username.php').then((response) => {return response.json()}).then((json) =>{
    for(let i = 0; i < json.length; i++){
        usernameJson.push(json[i].Username);
    }
})

function contieneMaiuscola(word) {
    let alfabeto = "ABCDEFGHILJKMNOPQRSTUVWXYZ";
    for(let i = 0; i < word.length; i++){
        if(alfabeto.includes(word[i])){
            return true
        }
    }
    return false;
}

function contieneNumero(word) {
    let alfabeto = "0123456789";
    for(let i = 0; i < word.length; i++){
        if(alfabeto.includes(word[i])){
            return true
        }
    }
    return false;
}

function contieneSimbolo(word) {
    let alfabeto = "!@#£$%^&*()-_=+[{]}|;:,<.>/?";
    for(let i = 0; i < word.length; i++){
        if(alfabeto.includes(word[i])){
            return true
        }
    }
    return false;
}
let j;
function validazione(e){
    const username = form.username.value;
    const password = form.password.value;
    const action = e.submitter.value;

    const errorParagraph = document.querySelector('#errore_credenziali');

    if(username.length == 0 || password.length == 0){
        errorParagraph.textContent = ("Compilare tutti i campi");
        errorParagraph.classList.add('errore');
        errorParagraph.classList.remove('hidden');
        e.preventDefault();
    }else if(action === "Sign Up"){
        if(usernameJson.includes(username)){
            errorParagraph.textContent = ("Nome Utente già in uso");
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
            e.preventDefault();
        }else if(password.length <= 7){
            errorParagraph.textContent = ("Password troppo corta");
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
            e.preventDefault();
        }else if(!contieneMaiuscola(password)){
            errorParagraph.textContent = ("Password deve contenere almeno una maiuscola");
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
            e.preventDefault();
        }else if(!contieneNumero(password)){
            errorParagraph.textContent = ("Password deve contenere almeno un numero");
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
            e.preventDefault();
        }else if(!contieneSimbolo(password)){
            errorParagraph.textContent = ("Password deve contenere almeno un simbolo");
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
            e.preventDefault();
        }
        
    }else{
        let cond = (!usernameJson.includes(username)) || (password.length <= 7) || (!contieneMaiuscola(password)) || (!contieneNumero(password)) || (!contieneSimbolo(password));
        if(cond){
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
            e.preventDefault();
        }
    }
}

const form = document.forms['login'];
form.addEventListener('submit', validazione);

function loginClick(){
    const modal = document.querySelector('#modal-view');
    modal.classList.add('flex');
    modal.classList.remove('hidden');
    modal.style.top= window.scrollY + 'px';
    const body = document.querySelector('body');
    body.classList.add('no-scroll');
}

function closeLoginFunction(){
    const modal = document.querySelector('#modal-view');
    modal.classList.remove('flex');
    modal.classList.add('hidden');
    const body = document.querySelector('body');
    body.classList.remove('no-scroll');
}

function logoutClick(){
    console.log("Logout");
    fetch('script_php/logout.php').then(()=>{
        window.open('script_php/hw1.php', '_self');
    });
}

const login = document.querySelector('#login');
const logout = document.querySelector('#logout');
const closeLogin = document.querySelector('#closeLogin');

if(login != null){
    login.addEventListener('click', loginClick);
    closeLogin.addEventListener('click', closeLoginFunction);
}
if(logout != null){
    logout.addEventListener('click', logoutClick);
}