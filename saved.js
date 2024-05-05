// let saved = localStorage.getItem('saved');
// saved = JSON.parse(saved);


const feed = document.querySelector('#feed');
let feedContent = Array.from(document.querySelectorAll('#feed .article'));

let saved = [];

fetch("loadSaved.php").then((response) => {
    return response.json();
}).then((json) => {
    saved = json;
    for(let i = 0; i < saved.length; i++){
        createArticle(i);
    }
});

/*************************************************/
/*                   SAVE POST                   */

function isSaved(id){
    for(let i = 0; i < saved.length; i++){
        if(id == saved[i].id){
            return i;
        }
    }
    return -1;
}

function enterStar(e){
    let star = e.target;
    let clicked = star.dataset.click;
    if(clicked === "0"){
        star.innerHTML = '';
        star.textContent ='★'
    } 
}

function leaveStar(e){
    let star = e.target;
    let clicked = star.dataset.click;
    if(clicked === "0"){
        star.innerHTML = '';
        star.textContent = '☆'
    }
}

function clickStar(e){
    let star = e.target;
    let clicked = star.dataset.click;

    let article = star.parentElement.parentElement;
    res = article;

    let post = {};
    post['id'] = article.parentElement.dataset.id;
    if(clicked === "0"){
        if(isSaved(post['id']) === -1){
            star.innerHTML = '';
            star.textContent = '★'
            star.dataset.click = "1";

            post['title'] = article.querySelector('.title').textContent;
            post['icon'] = article.querySelector('.subreddit .icon img').src;
            post['name'] = article.querySelector('.subreddit .name').textContent;
            post['descr'] = article.querySelector('.text').textContent;
            post['img'] = article.querySelector('.insert .divImg img').src;

            saved.push(post);
            fetch('savepost.php',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(post)
            });
        }
    }else{
        star.innerHTML = '';
        star.textContent = '☆'
        star.dataset.click = "0";
        let index = isSaved(post['id']);
        
        if(index !== - 1){
            saved.splice(index, 1);
        }
        fetch('removepost.php',{
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(post)
        });
    }
    // localStorage.setItem('saved', JSON.stringify(saved));
}

/*                   SAVE POST                   */
/*************************************************/

function loadSaved(index){
    let article = feedContent[index];
    let post = saved[index];
    
    let postId = post['Id'];
    let subredditName = post['Name'];
    let subredditIcon = post['Icon'];
    let titleText = post['Title'];
    let descrText = post['Descr']
    let imagePost = post['Img'];

    let externDiv = document.createElement('div');
    externDiv.classList.add('insert');
    externDiv.classList.add('flex');
    externDiv.classList.add('flex-column');

    let subred = document.createElement('div');
    subred.classList.add('subreddit');
    subred.classList.add('flex');
    subred.classList.add('align-center');
    subred.classList.add('space-between');

    let subDiv1 = document.createElement('div');
    subDiv1.classList.add('flex');
    subDiv1.classList.add('align-center');
    subDiv1.classList.add('flex-center');


    let subDiv2 = document.createElement('div');
    subDiv2.classList.add('star');
    subDiv2.textContent = '★';
    subDiv2.dataset.click = "1";

    subDiv2.addEventListener('mouseenter', enterStar);
    subDiv2.addEventListener('mouseleave', leaveStar);
    subDiv2.addEventListener('click', clickStar);

    let icon = document.createElement('div');
    icon.classList.add('icon');
    icon.classList.add('flex');
    icon.classList.add('flex-center');
    icon.classList.add('align-center');

    let img = document.createElement('img');
    img.src = subredditIcon;

    icon.appendChild(img);

    let name = document.createElement('div');
    name.classList.add('name');
    name.textContent = subredditName;

    let title = document.createElement('div');
    title.classList.add('title');

    let text = document.createElement('div');
    text.classList.add('text');

    let divImg = document.createElement('div');
    divImg.classList.add('flex');
    divImg.classList.add('divImg');
    divImg.classList.add('flex-center');
    divImg.classList.add('align-center');
    
    let imgArticle = document.createElement('img');
    
    title.textContent = titleText;
    
    text.textContent = descrText;


    subDiv1.appendChild(icon);
    subDiv1.appendChild(name);

    subred.appendChild(subDiv1);
    subred.appendChild(subDiv2);

    externDiv.appendChild(subred);
    externDiv.appendChild(title);
    externDiv.appendChild(text);
    if(imagePost !== undefined){
        imgArticle.src = imagePost;
        divImg.appendChild(imgArticle);
    }
    externDiv.appendChild(divImg); 
    article.appendChild(externDiv);     
}

function createArticle(index){
    let feed = document.querySelector('#feed');
    let docToLoad = 1;
    for (let i = 0; i < docToLoad; i++) {
        let item = document.createElement('article');
        let item_content = document.createElement('div');
        item.classList.add('item');
        item.dataset.index = feedContent.length + 1;
        item.dataset.id = saved[index]['id'];
        item_content.classList.add('insert');
        item.appendChild(item_content);
        feedContent.push(item);
        feed.appendChild(item);
    }
    loadSaved(index);
}