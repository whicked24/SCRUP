function validarLETRA(e) 
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==0 || tecla==13) return true;
	patron = /[ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz]/;
	te = String.fromCharCode(tecla);
	return patron.test(te);
}

function validarNUP(e) 
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==0 || tecla==13) return true;
	patron = /[0123456789]/;
	te = String.fromCharCode(tecla);
	return patron.test(te);
}


function upkey(element){

element.value=element.value.toUpperCase();
}