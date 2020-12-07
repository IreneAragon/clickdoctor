console.log('entra');
// var open = document.getElementById('openNav');
// console.log(open);
// var close = document.getElementById('closeNav');


let widthScreen = screen.width;


function openNav() {
    console.log('entra2');
    document.getElementById("mySidebar").style.width = "200px";
    // if (widthScreen > 450) {
    //     document.getElementById("main").style.marginLeft = "200px";
    // }
}

function closeNav() {
    console.log('entra3');
  document.getElementById("mySidebar").style.width = "0";
  // if (widthScreen > 450) {
  // document.getElementById("main").style.marginLeft= "0";
  // }
}
//
// open.addEventListener('change', openNav);
// close.addEventListener('change', closeNav);




    // let botonCrearCita =  $('#btnCrearCita');
    // let mostrarAlert =  $('#citaCreada');
