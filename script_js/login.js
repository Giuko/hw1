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
async function loginPHP(username, password){
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);

    const url = 'script_php/login.php';
    
    const response = await fetch(url,{
        method: 'POST',
        body: formData
    });
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

async function validazioneLogin(e){
    e.preventDefault();
    const form = e.target;

    const username = (form.username.value);
    const password = (form.password.value);
    form.password.value='';
    

    const errorParagraph = document.querySelector('#loginDiv #errore_credenziali');
    
    if(username.length == 0 || password.length == 0){
        errorParagraph.textContent = ("Compilare tutti i campi");
        errorParagraph.classList.add('errore');
        errorParagraph.classList.remove('hidden');
    }else{
        if(!usernameJson.includes(username)){
            errorParagraph.textContent = ("Nome Utente non esistente");
            form.username.value='';
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
                await loginPHP(username, password);
                switchButton(0);
                document.querySelector('#modal-view').classList.add('hidden');
                document.querySelector('#modal-view').classList.remove('flex');
                console.log(login.dataset.action);
                if(login.dataset.action === 'saved-login'){
                    console.log(login.dataset.action);
                    window.open("saved.php", "_self");
                }
            }
        }
    }
}

async function validazioneSignup(e){
    e.preventDefault();
    const form = e.target;

    const username = (form.username.value);
    const email = (form.email.value);
    const name = (form.name.value);
    const surname = (form.surname.value);
    const password = (form.password.value);
    form.password.value = '';
    const errorParagraph = document.querySelector('#signupDiv #errore_credenziali');
    

    if(username.length == 0 || email.length == 0 || name.length == 0 || surname.length == 0 || password.length == 0){
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
    }else{
        if(usernameJson.includes(username)){
            form.username.value='';
            errorParagraph.textContent = ("Nome Utente esistente");
            errorParagraph.classList.add('errore');
            errorParagraph.classList.remove('hidden');
        }else{
            const formData = new FormData();
            formData.append('username', username);
            formData.append('password', password);
            formData.append('name', name);
            formData.append('surname', surname);
            formData.append('email', email);

            const url = 'script_php/signup.php';
            
            const response = await fetch(url,{
                method: 'POST',
                body: formData
            });
            console.log(response.text());
            switchButton(0);
            document.querySelector('#modal-view').classList.add('hidden');
            document.querySelector('#modal-view').classList.remove('flex');
            if(login.dataset.action === 'saved-login'){
                // window.open("saved.php", "_self");
                document.querySelector('.errore').classList.add('hidden');
                fetch("script_php/loadSaved.php").then((response) => {
                    return response.json();
                }).then((json) => {
                    saved = json;
                    for(let i = 0; i < saved.length; i++){
                        createArticle(i);
                    }
                });
            }
        }
    }
}

function signUp(e){
    //Altrimenti viene effettuato il submit del loginForm
    e.preventDefault();
    const loginWindow = document.querySelector('#loginDiv');
    const signupWindow = document.querySelector('#signupDiv');
    signupWindow.classList.remove('hidden');
    loginWindow.classList.add('hidden');
    
}

const loginForm = document.forms['login'];
loginForm.addEventListener('submit', validazioneLogin);

const signupForm = document.forms['signup'];
signupForm.addEventListener('submit', validazioneSignup);

const signupButton = document.querySelector('#signup');
signupButton.addEventListener('click', signUp);

function loginClick(){
    const modal = document.querySelector('#modal-view');
    modal.classList.add('flex');
    modal.classList.remove('hidden');
    modal.style.top= window.scrollY + 'px';
    const body = document.querySelector('body');
    body.classList.add('no-scroll');
}

function closeLoginSignupFunction(){
    console.log('close')
    const modal = document.querySelector('#modal-view');
    const loginWindow = document.querySelector('#loginDiv');
    const signupWindow = document.querySelector('#signupDiv');

    

    signupWindow.classList.add('hidden');
    loginWindow.classList.remove('hidden');

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
const closeLoginButton = document.querySelector('#closeLogin');
const closeSignupButton = document.querySelector('#closeSignup');

closeLoginButton.addEventListener('click', closeLoginSignupFunction);
closeSignupButton.addEventListener('click', closeLoginSignupFunction);

login.addEventListener('click', loginClick);
logout.addEventListener('click', logoutClick);
