let i = 0;

document.getElementsByTagName('h1')[0].addEventListener('click', ()=>{
    document.getElementById('count').innerText = ++i;
})
