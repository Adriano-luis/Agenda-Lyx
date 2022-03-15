$(document).ready(function(){

    $("#image-profile").on("change", function(event){  
        loadFile(event);
    });
})

if(document.getElementById('telefone')){
    var phoneMask = IMask (
        document.getElementById('telefone'), {
          mask: '(00)00000-0000'
        });
}

function loadFile(event){
    const img = document.getElementById("show-image");
    img.src = URL.createObjectURL(event.target.files[0]);
};


