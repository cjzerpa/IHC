
function validacionForm()
{
	
	var verf = true;
	var user = document.login.nombre.value;
	var pass = document.login.pass.value;
	var carIlegalUsuario = /\W/;
	var carIlegalPass = /[\W_]/;
	

	if(carIlegalUsuario.test(user))
	{
		document.login.nombre.style.background = '#FFE1E1';
		verf = false;
	}
	else if(carIlegalPass.test(pass))
	{
		document.login.pass.style.background = '#FFE1E1';
		verf = false;
	}


	return verf;	
	
}

