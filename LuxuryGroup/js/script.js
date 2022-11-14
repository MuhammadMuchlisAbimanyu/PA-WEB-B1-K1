var icon = document.getElementById('icon-theme');

if(localStorage.getItem('theme') == null){
    localStorage.setItem('theme','dark'); 
}

let localData = localStorage.getItem('theme');

if(localData == 'dark'){
    icon.src = 'image/sun.png';
    document.body.classList.remove('light-theme');
}else if(localData == 'light'){
    icon.src = 'image/moon.png';
    document.body.classList.add('light-theme');
}

icon.onclick = function(){
    document.body.classList.toggle('light-theme');
    if(document.body.classList.contains('light-theme')){
        icon.src='image/moon.png';
        localStorage.setItem('theme','light');
    }else{
        icon.src='image/sun.png';
        localStorage.setItem('theme','dark');
    }
}

var navLinks = document.getElementById("navLinks");

function showMenu(){
    navLinks.style.right = "0";
    navLinks.style.display = "block";
}
function hideMenu(){
    navLinks.style.right = "-200px";
    navLinks.style.display = "none";
}