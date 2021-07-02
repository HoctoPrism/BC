//permet sur la page user account, dans les commandes, de changer et animer le bouton "détail" / à repenser pour une boucle
const bButtonDetailColor1 = document.getElementById("colorTrigger1");
bButtonDetailColor1.addEventListener("click", function(){
    if (document.querySelector("#flush-heading1 button[aria-expanded='false']")){
        document.querySelector('#colorTrigger1 svg').style.fill = "#FDAB91";
        document.querySelector('#colorTrigger1 svg').style.transform = "rotate(0turn)";
   }
    if (document.querySelector("#flush-heading1 button[aria-expanded='true']")){
        document.querySelector('#colorTrigger1 svg').style.fill = "#505160";
        document.querySelector('#colorTrigger1 svg').style.transform = "rotate(0.5turn)";
   } 
})
const bButtonDetailColor2 = document.getElementById("colorTrigger2");
bButtonDetailColor2.addEventListener("click", function(){
    if (document.querySelector("#flush-heading2 button[aria-expanded='false']")){
        document.querySelector('#colorTrigger2 svg').style.fill = "#FDAB91";
        document.querySelector('#colorTrigger2 svg').style.transform = "rotate(0turn)";
   }
    if (document.querySelector("#flush-heading2 button[aria-expanded='true']")){
        document.querySelector('#colorTrigger2 svg').style.fill = "#505160";
        document.querySelector('#colorTrigger2 svg').style.transform = "rotate(0.5turn)";
   } 
})