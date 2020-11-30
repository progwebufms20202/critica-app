var nav = document.getElementById("nav");
var header = document.getElementsByClassName("header")[0];



var input = document.getElementById("inputSearch");
input.addEventListener("keyup", function(event) {

if (event.keyCode === 13) {

event.preventDefault();   
window.location.href = "index.php?Obra/consultarPorTitulo="+input.value;        
}
});





function menubar() {
  if (nav.style.display !== "" && nav.style.display !== "none") {
    nav.style.display = "none";
  } else {
    nav.style.display = "flex";
  }
}


function dropdownPerfil (){

  var perfil = document.getElementById('perfil-nav')
  perfil = perfil.getElementsByTagName('ul')[0];
  
  if (perfil.style.display !== "" && perfil.style.display !== "none") {
    perfil.style.display = "none";
  } else {
    perfil.style.display = "flex";
  
  }
}



// function isLoged() {

 

  
//   var divauth = document.getElementById('auth-nav')
//   var divusuario = document.getElementById('perfil-nav')

//   if(sessionStorage.getItem('usuarioLogado') != undefined && sessionStorage.getItem('usuarioLogado') != "" )
//   {

    
//     divusuario.getElementsByTagName('li')[0].innerHTML = sessionStorage.getItem('usuarioLogado')    

//     if (divauth.parentNode) {
     
//       divauth.parentNode.removeChild(divauth);
//     }
//   }
//   else {
//     var divusuario = document.getElementById('perfil-nav')      
//     if (divusuario.parentNode) {
     
//       divusuario.parentNode.removeChild(divusuario);
//     }
//   }

// }


// function sair() {  
//     sessionStorage.setItem('usuarioLogado',"")
//     window.location.reload();

// }