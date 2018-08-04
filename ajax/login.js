$(document).ready(function(){

$("#login").click(function(){	
user     = $("#user").val();
pass     = $("#pass").val();
pass     = pass.trim();
pass     = md5(pass);
url      = $("#url").val();
$.ajax({
type: "POST",
url: "controlador/login.php",
data: {user:user,pass:pass},
success: function(html){    
if(html==1)    
{

window.location=""+url+"";
                                                                                                                     
}
else if (html =='uservacio')
{
//alert(html);
$("#mensaje").html("<script>swal({type:'warning',title:'Ingrese el Usuario',timer:2000,showConfirmButton: false})</script>");
$('#user').val("");
$('#user').focus();
$('#pass').val("");

}
else if (html =='passvacio')
{
//alert(html);
$("#mensaje").html("<script>swal({type:'warning',title:'Ingrese la Contraseña',timer:2000,showConfirmButton: false})</script>");
$('#pass').val("");
$('#pass').focus();

}
else if (html =='userpassvacio')
{
//alert(html);
$("#mensaje").html("<script>swal({type:'warning',title:'Usuario y Contraseña Vacios',timer:2000,showConfirmButton: false})</script>");
$('#pass').val("");
$('#pass').focus();

}
else   
{
//alert(html);
$("#mensaje").html("<script>swal({type:'error',title:'Usuario o Contraseña Incorrectos',timer:2000,showConfirmButton: false})</script>");
//$('#usuario').val("");
$('#usuario').focus();
//$('#pass').val("");

}
},
beforeSend:function()
{

$("#mensaje").html("Cargando...")
}
});
return false;
});
});