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
let ret;
async function loginPHP(user, pass, action){
    const response = await fetch(`script_php/login.php?username=${user}&password=${pass}&azione=${action}`);
}

function switchButton(value){
    if(value === 0){
        // From login to logout
        login.classList.remove('flex');
        login.classList.add('hidden');
        logout.classList.remove('hidden');
        logout.classList.add('flex');
    }else{
        // From logout to login
        login.classList.add('flex');
        login.classList.remove('hidden');
        logout.classList.add('hidden');
        logout.classList.remove('flex');
    }
}

async function validazione(e){
    e.preventDefault();
    const username = form.username.value;
    const password = form.password.value;
    const action = e.submitter.value;

    const errorParagraph = document.querySelector('#errore_credenziali');
    
    if(username.length == 0 || password.length == 0){
        errorParagraph.textContent = ("Compilare tutti i campi");
        errorParagraph.classList.add('errore');
        errorParagraph.classList.remove('hidden');
    }else if(password.length <= 7){
        errorParagraph.textContent = ("Password troppo corta");
        errorParagraph.classList.add('errore');
        errorParagraph.classList.remove('hidden');
    }else if(!contieneMaiuscola(password)){
        errorParagraph.textContent = ("Password deve contenere almeno una maiuscola");
        errorParagraph.classList.add('errore');
        errorParagraph.classList.remove('hidden');
    }else if(!contieneNumero(password)){
        errorParagraph.textContent = ("Password deve contenere almeno un numero");
        errorParagraph.classList.add('errore');
        errorParagraph.classList.remove('hidden');
    }else if(!contieneSimbolo(password)){
        errorParagraph.textContent = ("Password deve contenere almeno un simbolo");
        errorParagraph.classList.add('errore');
        errorParagraph.classList.remove('hidden');
    }else if(action === "Sign Up"){
        if(usernameJson.includes(username)){
            errorParagraph.textContent = ("Nome Utente già in uso");
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
        }else{
            // e.target.submit();
            await loginPHP(username, password, 'Sign Up');
            switchButton(0);
            document.querySelector('#modal-view').classList.add('hidden');
            document.querySelector('#modal-view').classList.remove('flex');

        }
    }else if(action === "Log In"){
        if(!usernameJson.includes(username)){
            errorParagraph.textContent = ("Nome Utente non esistente");
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
        }else{
            const request = `?username=${username}&password=${password}`;
            const url = 'script_php/checkCredentials.php' + request;
            
            const response = await fetch(url);
            const json = await response.json();   
            if(json === 0){
                errorParagraph.textContent = ("Password errata");
                errorParagraph.classList.add('errore');
                errorParagraph.classList.remove('hidden');
            }else{
                await loginPHP(username, password, 'Log In');
                switchButton(0);
                document.querySelector('#modal-view').classList.add('hidden');
                document.querySelector('#modal-view').classList.remove('flex');
                if(login.dataset.action === 'saved-logiin'){
                    window.open("saved.php", "_self");
                }
            }
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

async function logoutClick(){
    console.log("Logout");
    switchButton(1);
    await fetch('script_php/logout.php');
    if(logout.dataset.action === 'saved-logout'){
        window.open("hw1.php", "_self");
    }
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