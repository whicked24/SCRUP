
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


$('#asginar').click(function(event){

	event.preventDefault();

 var cedula=$('#cedula').val();

if (cedula=="" || cedula==null) {

Swal.fire({

		type:'warning',
		html:'<h5>Debe ingresar un número de cédula.</h5>',
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

}else{

	


var url=window.location.protocol+'//'+window.location.hostname+':'+window.location.port+"/"
 
  	
$.ajax({
	type:'GET',
	dataType:'json',
	url:url+'jornada/asignar/'+cedula,
	

	success:function(res){

		if (res.tipo==true) {


		Swal.fire({
		html:res.xml,
		 width:550,
   		 height: 400,
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Aceptar',
		cancelButtonText: 'Cancelar',
		closeOnClickOutside: false,
		closeOnEsc: false
		}).then((result)=>{
			if (result.value==true) {

				$('#form_asignar').submit();
			}else{

				$('#cedula').val("");

				$('#cedula').focus();

			}
			
		});
}else{

Swal.fire({

		type:'warning',
		html:res.xml,
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
}
});

