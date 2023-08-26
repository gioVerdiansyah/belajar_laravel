let main = document.getElementsByTagName('main')[0];
let windowHeight = window.innerHeight;
if ((main.offsetHeight + 50) < windowHeight) {
    document.getElementsByTagName('footer')[0].classList.add('position-absolute');
}

let listUL = document.getElementsByTagName("ol")[0];
listUL.addEventListener("click", show );

function show(e){
    alert("cek data mahasiswa " + e.target.innerHTML);
}
