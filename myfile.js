function myfn()
{
	var d = new Date(); 
	document.getElementById("demo").innerHTML=d.toDateString();
}

function validate() {
 var val = document.forms["sumit","jha"]["password"].value;
 if (val.length < 5 || val.length>15) {
   alert("Incorrect Password");
   return false;
 }
 return true;
}

window.onload=myfn;	
