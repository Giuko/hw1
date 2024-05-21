const postId = document.querySelector('#postId').dataset.info;

console.log(postId);

const endpoint = 'script_php/getPostInfo.php?id=';
const request = postId;
const url = endpoint + request;
let data;
fetch(url).then((response) =>{
    return response.json();
}).then((json)=>{
    data = json;
    if(data === 0){
        document.querySelector('.errore').classList.remove('hidden');
    }else{
        const main = document.querySelector('#main');

        const title = data['title'];
        const icon = data['icon'];
        const subreddit = data['name'];
        const descr = data['descr'];
        const img = data['img'];

        const postDiv = document.createElement('div');
        postDiv.id = 'postDiv';

        const subredditDiv = document.createElement('div');
        subredditDiv.id = 'subredditDiv';
        subredditDiv.classList.add('flex');
        subredditDiv.classList.add('flex-start');
        subredditDiv.classList.add('align-center');

        const subredditName = document.createElement('a');
        subredditName.textContent = subreddit;
        subredditName.href = 'about.php?subreddit='+subreddit;

        const subredditIcon = document.createElement('img');
        subredditIcon.src = icon;

        subredditDiv.appendChild(subredditIcon);
        subredditDiv.appendChild(subredditName);

        const titleDiv = document.createElement('div');
        titleDiv.id = 'titleDiv';
        titleDiv.textContent = title

        const descrDiv = document.createElement('div');
        descrDiv.id = 'descrDiv';
        descrDiv.textContent = descr;

        const imgElement = document.createElement('img');
        imgElement.src = img;

        const imgDiv = document.createElement('div');
        imgDiv.id = 'imgDiv';
        imgDiv.appendChild(imgElement);
        imgDiv.classList.add('flex');
        imgDiv.classList.add('flex-center');

        postDiv.appendChild(subredditDiv);
        postDiv.appendChild(titleDiv);
        postDiv.appendChild(descrDiv);
        postDiv.appendChild(imgDiv);
        main.appendChild(postDiv);
    }
});
