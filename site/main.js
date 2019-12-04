      $(function() {
          $('#menu-navegacao').find('a').click(function() { 
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
        });

function openAjax() {
	var ajax;
	try {
		ajax = new XMLHttpRequest();
	} catch(ee) {
		try {
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e) {
			try {
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(E) {
				ajax = false;
			}
		}
	}
	return ajax;
}
function getDados(objForm) {
    var params = new Array();
    for (var i=0 ; i < objForm.elements.length; i++) {
        var parametro = encodeURIComponent(objForm.elements[i].name);
        parametro += "=";
        parametro += encodeURIComponent(objForm.elements[i].value);
        params.push(parametro);
    }
    return params.join("&");
}

function mensagem(msg){
	document.getElementById('result').innerHTML = msg;
}

function setDados(objForm) {
    for (var i=0 ; i < objForm.elements.length-1; i++) 
        objForm.elements[i].value="";
}

function enviar_contato(formulario) {
    var dados = getDados(formulario);
    var postajax = openAjax();
    postajax.open("POST", "envia_email.php", true);
    postajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    postajax.onreadystatechange = function () {
		 if (postajax.readyState == 1){
			document.getElementById('result').innerHTML = '<img src="img/ajax_loader.gif" title="Carregando..."/> Carregando...';
	   }
        if (postajax.readyState == 4) {
            if (postajax.status == 200) {
                mensagem(postajax.responseText);
				setDados(formulario);			
            } else {
                mensagem("Ocorreu o erro: "+ postajax.statusText);
            }
        }
    };
   postajax.send(dados);
	return false;
}

$(function(){
  
    $("#modal-pop").modal("show");  
 

});