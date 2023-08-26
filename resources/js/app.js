import './bootstrap';
// ! Import file master
import './script';
// ! import file bootstrap
import * as bootstrap from 'bootstrap';
new bootstrap.Popover(document.getElementById('myPopover'))
// ! JS juga bisa me import file css
import '../css/app.css';



let h1N = document.getElementsByTagName('h1')[0];
let isClick = 1;

h1N.addEventListener('click', ()=>{
    h1N.innerText = "Saya di click!!!";

    switch (isClick) {
        case 1:
            h1N.style.textAlign = "center";
            isClick++;
            break;
        case 2 :
            h1N.style.textAlign = "right";
            isClick++;
            break;
        default:
            h1N.style.textAlign = "left";
            isClick = 1;
    }
})
