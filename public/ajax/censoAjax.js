$(document).ready(function(){
$('#info_bombonas').hide();
$('#info_cedula_familiar').hide();
});


$('#cedula').click(function(e) {
    e.preventDefault();
  

  if ($('#cedula').smkValidate()) {
  
    $.smkAlert({
      text: 'Listo!',
      type: 'success',
      time: 2
          });
  
  }


})

$('#cedula').blur(function(e) {
    e.preventDefault();
  
  var cedula=$('#cedula').val();


var url=window.location.protocol+'//'+window.location.hostname+':'+window.location.port+"/"
 
    
$.ajax({
  type:'GET',
  dataType:'json',
  url:url+'censo/consultaPersosa/'+cedula,
  

  success:function(res){
if (res.tipo==true) {

Swal.fire({

    type:'warning',
    html:'<h5>El número de cedula que desea ingresar ya se encuentra censado.</h5>',
     width:550,
        height: 400,
    showCancelButton: false,
    showConfirmButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
    closeOnClickOutside: false,
    closeOnEsc: false,
    timer:4000
    });

        $('#cedula').val("");

        $('#cedula').focus();
}


},

  error:function(res){
  console.log(res);
  },
})


})


$('#nombre').click(function(e) {
    e.preventDefault();
    //alert('Ingrese su nombre');
  if ($('#nombre').smkValidate()) {
    // Code here
    $.smkAlert({
      text: 'Listo!',
      type: 'success',
      patter:'A-Zaz',
      time: 2
          });
  //}else{
    //alert("fallo");
  }

});

$('#apellido').click(function(e) {
    e.preventDefault();
    //alert('Ingrese apellido');
  if ($('#apellido').smkValidate()) {
    // Code here
    $.smkAlert({
      text: 'Listo!',
      type: 'success',
      time: 2
          });
  //}else{
    //alert("fallo");
  }




});

function mostrar_bombonas(valor){

if (valor==1) {
$('#info_bombonas').show();

}else{
$('#info_bombonas').hide();
}



}


function mostrar_cedula_familiar(valor){


if (valor==1) {
$('#info_cedula_familiar').show();

}else{
$('#info_cedula_familiar').hide();
}


}