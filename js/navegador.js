// console.log('entra');
// var open = document.getElementById('openNav');
// console.log(open);
// var close = document.getElementById('closeNav');


let widthScreen = screen.width;


function openNav() {
    document.getElementById("mySidebar").style.width = "200px";
    // if (widthScreen > 450) {
    //     document.getElementById("main").style.marginLeft = "200px";
    // }
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  // if (widthScreen > 450) {
  // document.getElementById("main").style.marginLeft= "0";
  // }
}
