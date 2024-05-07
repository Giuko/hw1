const endpoint = 'fetchNoOauth.php?request=';
const request = '/'+document.querySelector('#subredditInfo').dataset.info + '/about.json';
const url = endpoint + request;



function onFailure(e){
    console.log("Errore: " + e);
};

function onResponse(response){
    if(!response.ok){
        console.log('Response non recuperato');
        return;
    }
    
    return response.json();
};

let view;

function getImg(url){    
    let ret = "";
    if(ret === ""){
        let index = url.indexOf('.png?');
        if(index > 0){
            url = url.substring(0, index+4);
            ret = url;
        }
    }
    if(ret === ""){
        let index = url.indexOf('.jpg?');
        if(index > 0){
            url = url.substring(0, index+4);
            ret = url;
        }
    }
    if(ret === ""){
        let index = url.indexOf('.jpeg?');
        if(index > 0){
            url = url.substring(0, index+5);
            ret = url;
        }
    }
    if(ret === ""){
        ret = url;
    }
    return ret;
}

function getInfo(){
    fetch(url).then(onResponse, onFailure).then((json) => {
        const title = json.data.title;
        let icon = json.data.icon_img;
        const descr = json.data.public_description;
        let banner = json.data.banner_background_image;

        const titleDiv = document.querySelector('.title');
        titleDiv.textContent = title;

        const descrDiv = document.querySelector('#descr');
        descrDiv.textContent = descr;

        const bannerDiv = document.querySelector('#banner');

        const iconDiv = document.querySelector('#icon');

        if(icon === ""){
            icon = getImg(json.data.community_icon);
        }
        if(icon !== ""){
            const imgIcon = document.createElement('img');
            iconDiv.appendChild(imgIcon);
            icon = getImg(icon);
            iconDiv.querySelector('img').src = icon;
            
        }

        if(banner !== ""){
            const imgBanner = document.createElement('img');
            bannerDiv.appendChild(imgBanner);
            banner = getImg(banner);
            bannerDiv.querySelector('img').src = banner;
            
        }
    })
}

getInfo();