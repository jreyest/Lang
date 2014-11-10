//FUNCION PARA AGREGAR PUNTOS A NUMEROS
function Thousand(donde,caracter){ 
pat = /[\*,\+,\(,\),\?,\\,\$,\[,\],\^]/ 
valor = donde.value 
largo = valor.length 
crtr = true 

//debugger 
if(isNaN(caracter) || pat.test(caracter) == true) 
{ 
if (pat.test(caracter)==true) 
{ 
caracter = "\\" + caracter 
} 
carcter = new RegExp(caracter,"g") 
valor = valor.replace(carcter,"") 
donde.value = valor 
crtr = false 
} 
else 
{ 
var nums = new Array() 
cont = 0 

// Para manejar las tildes 
if (valor.indexOf(String.fromCharCode(96))>-1 || valor.indexOf(String.fromCharCode(180))>-1) 
{ 
valor = valor.replace(String.fromCharCode(96),""); 
valor = valor.replace(String.fromCharCode(180),""); 
donde.value = valor; 
largo = valor.length; 
} 

for(m=0;m<largo;m++) 
{ 
if(valor.charAt(m) == "." || valor.charAt(m) == " ") 
{ 
continue; 
} 
else 
{ 
nums[cont] = valor.charAt(m) 
cont++ 
} 
} 
} 

var cad1="",cad2="",tres=0 
if(largo > 3 && crtr == true) 
{ 
for (k=nums.length-1;k>=0;k--) 
{ 
cad1 = nums[k] 
cad2 = cad1 + cad2 
tres++ 
if((tres%3) == 0) 
{ 
if(k!=0){ 
cad2 = "." + cad2 
} 
} 
} 
donde.value = cad2 
} 
}


//FUNCION PARA LIMITAR CARACTERES ESCRITOSA EN CAMPO DESCRIPCION RESUMIDA

function limitChars(textarea, limit, infodiv)
{
	var text = textarea.value;	
	var textlength = text.length;
	var info = document.getElementById(infodiv);

	if(textlength > limit)
	{
		info.innerHTML = 'No puedes escrir m&aacute;s de '+limit+' caracteres!';
		textarea.value = text.substr(0,limit);
		return false;
	}
	else
	{
		info.innerHTML = 'Te quedan '+ (limit - textlength) +' caracteres.';
		return true;
	}
}

// FUNCION PARA CAMBIAR OPCIONES WEB VS SOFT
function cambiaURL(url){
window.location.reload() = url
}

