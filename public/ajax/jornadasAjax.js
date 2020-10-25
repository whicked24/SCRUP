
$('#myModal').on('shown.bs.modal', function () {

$('#myInput').trigger('focus')

})



function detalle(valor){

 


var url=window.location.protocol+'//'+window.location.hostname+':'+window.location.port+"/"
 
  	
$.ajax({
	type:'GET',
	dataType:'json',
	url:url+'jornada/detalle/'+valor,
	

	success:function(res){
		console.log(res);
		Swal.fire({
		html:res.xml,
		 width:550,
   		 height: 400,
		showCancelButton: false,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Aceptar',
		closeOnClickOutside: false,
		closeOnEsc: false,
		});

	},
	error:function(res){
	console.log(res);
	},
})


}

