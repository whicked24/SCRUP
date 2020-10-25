function validarL(e) 
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==0 || tecla==13) return true;
	patron = /[abcdefghijklmnñopqrstuvwxzABCDEFGHIJLKLMNÑOPQRSTUVWXYZ]/;
	te = String.fromCharCode(tecla);
	return patron.test(te);
}


function validarN(e) 
{
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==0 || tecla==13) return true;
	patron = /[0123456789]/;
	te = String.fromCharCode(tecla);
	return patron.test(te);
}



function validar_upper(e){

	  if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }

    $("#beneficio").val(($("#beneficio").val()).toUpperCase());
}