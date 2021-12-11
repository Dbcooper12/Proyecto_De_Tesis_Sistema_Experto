 function confirmarDelete(){
    var respuesta= confirma("Estas seguro que deseas eliminar al alumno?");
    if(respuesta == tue){
        return true;
    }else{
        return false;
    }
}

function confirmarDelete1(){
    alert(hola);
}


$('.delete_alumno').click(function(e){
    e.preventDefault();
    var alumno = $(this).attr('alumno');
    alert(alumno);
});
 