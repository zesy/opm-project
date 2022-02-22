// SIDE NAV //

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
	document.getElementById("leftSidenav").style.width = "300px";
	document.getElementById("main").style.marginLeft = "300px";
	document.body.style.overflow = "hidden";
	document.getElementById("barsmenu").setAttribute("onclick", "closeNav()");
	//document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function showNav() {
	document.getElementById("leftSidenav").style.width = "20%";
	document.getElementById("main").style.width = "80%";
	document.getElementById("main").style.marginLeft = "20%";
	document.body.style.overflow = "auto";
	document.getElementById("barsmenu").setAttribute("onclick", "closeNav()");
	//document.body.style.backgroundColor = "white";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
	document.getElementById("leftSidenav").style.width = "0";
	document.getElementById("main").style.width = "100%";
	document.getElementById("main").style.marginLeft = "0";
	document.body.style.overflow = "auto";
	document.getElementById("barsmenu").setAttribute("onclick", "openNav()");
	//document.body.style.backgroundColor = "white";
}

function closeNavByNav(){
	var wWidth = window.innerWidth;
	if(wWidth < 1051){
		closeNav();
	}
}

function carregar(pag){
	$("#pagMain").load(pag);
	closeNavByNav();
}

function gerarSenha(){
	var caracteres = '0123456789abcdefghiklmnopqrstuvwxyz0123456789';
	var novasenha = '';  
	for (var i = 0; i < 6; i++) {
		var rnum = Math.floor(Math.random() * caracteres.length);
		novasenha += caracteres.substring(rnum, rnum + 1);
	}
	document.getElementById("senha").value = novasenha;
    alert("A nova senha foi gerada!");
}

function setIcon(nome, caminho){
	var icone = document.getElementById("instrumentIcon");
	var campo = document.getElementById("selectedicon");
	var dir = document.getElementById("sicon");
	icone.src = "../../img/instruments/"+caminho;
	campo.value = ""+nome;
	dir.value = ""+caminho;
}

function fechamodalinstru(){
    $("#modalIcons").modal('hide');
}

function confirmDel(id, table){  //Ao submeter formulário
	$("#display-modal-error-del").css('display', 'none');
	$("#display-modal-success-del").css('display', 'none');
    $("#display-modal-del").modal("show"); //ABRIR MODAL
    $("#display-modal-loading-del").css('display', 'block');
    
    $.ajax({//                          ### Função AJAX
        url: "../mvc/controller/deleteFrom.php",//                    ### Arquivo php
        type:"post",//                  ### Método de envio
        data: {'id': id, 'table': table},//                  ### Dados
        success: function (result){//   ### Sucesso no AJAX
            if(result==1){//            ### Se retornar 1 = sucesso
            	setTimeout(function() {
            		$("#display-modal-loading-del").css('display', 'none');
            		$("#display-modal-success-del").css('display', 'block');
            	}, 300);
            	setTimeout(function() {
                     //location.href='../perfil/';// volta para página principal
                     window.location.reload();
                 }, 1500);
            }
            else {//                     ### Senão, apresenta o erro
            	setTimeout(function() {
            		$("#display-modal-loading-del").css('display', 'none');
            		$("#display-modal-error-del").css('display', 'block');
            		$("#display-modal-error-del").append("<h6>"+result+"</h6>");
            	}, 300);
            }
        }
    })
    return false;   //Evita que a página seja atualizada
}
function confirmUpdate(id, table){  //Ao submeter formulário
    $("#display-modal-error-update").css('display', 'none');
    $("#display-modal-success-update").css('display', 'none');
    $("#display-modal-loading-update").css('display', 'block');
        $("#display-modal-update").modal("show"); //ABRIR MODAL

        $.ajax({//                          ### Função AJAX
            url: "../mvc/controller/updateFrom.php",//                    ### Arquivo php
            type:"post",//                  ### Método de envio
            data: {'id': id, 'table': table},//                  ### Dados
            success: function (result){//   ### Sucesso no AJAX
                if(result==1){//            ### Se retornar 1 = sucesso
                    $("#display-modal-loading-update").css('display', 'none');
                    $("#display-modal-success-update").css('display', 'block');
                    setTimeout(function() {
                         //location.href='../perfil/';// volta para página principal
                         window.location.reload();
                     }, 1000);
                }
                else {//                     ### Senão, apresenta o erro
                    $("#display-modal-error-update").css('display', 'block');
                    $("#display-modal-error-update").append("<h6>"+result+"</h6>");
                }
            }
        })
    return false;   //Evita que a página seja atualizada
}

function doFormUpdate(form){  //Ao submeter formulário

    //alert(form);
    $("#display-modal-error-update").css('display', 'none');
    $("#display-modal-success-update").css('display', 'none');
    $("#display-modal-loading-update").css('display', 'block');
    $("#display-modal-update").modal("show"); //ABRIR MODAL

    var dados = $("#"+form).serialize();
    var post = $("#"+form).attr("post");

    $.ajax({//                          ### Função AJAX
        url: post,//                    ### Arquivo php
        type:"post",//                  ### Método de envio
        data: dados,//                  ### Dados
        success: function (result){//   ### Sucesso no AJAX
            if(result==1){//            ### Se retornar 1 = sucesso
                $("#display-modal-loading-update").css('display', 'none');
                $("#display-modal-success-update").css('display', 'block');
                setTimeout(function() {
                     //location.href='../perfil/';// volta para página principal
                     window.location.reload();
                 }, 1000);
            }
            else {//                     ### Senão, apresenta o erro
                $("#display-modal-error-update").css('display', 'block');
                $("#display-modal-error-update").append("<h6>"+result+"</h6>");
            }
        }
    })
return false;   //Evita que a página seja atualizada
}


function doAjaxUpdate(arq, id, dado){  //Ao submeter formulário
        $("#display-modal-ajax-loading").css('display', 'block');
        $("#display-modal-ajax-success").css('display', 'none');
        $("#display-modal-ajax-error").css('display', 'none');
        $("#display-modal-ajax").modal("show"); //ABRIR MODAL
        //alert(arq);
        $.ajax({//                          ### Função AJAX
            url: "../mvc/controller/"+arq+".php",//                    ### Arquivo php
            type:"post",//                  ### Método de envio
            data: {'id': id, 'dado': dado},//                  ### Dados
            success: function (result){//   ### Sucesso no AJAX
                if(result==1){//            ### Se retornar 1 = sucesso
                    setTimeout(function() {
                        //$("#display-modal-ajax-loading").append("<h6>"+result+"</h6>");
                        $("#display-modal-ajax-loading").css('display', 'none');
                        $("#display-modal-ajax-success").css('display', 'block');
                         //location.href='../perfil/';// volta para página principal
                         window.location.reload();
                     }, 1000);
                }
                else {//                     ### Senão, apresenta o erro
                    $("#display-modal-ajax-error").append("<h6>"+result+"</h6>");
                    $("#display-modal-ajax-error").css('display', 'block');
                }
            }
        })
    return false;   //Evita que a página seja atualizada
}
//PARA CADASTRAR
$('form.form_submit').on('submit', function(event){
    event.preventDefault(); // Cancela submit padrão do button

    //var $form = $(this).closest('form');
        $("#display-modal-error").css('display', 'none');
        $("#display-modal-success").css('display', 'none');
        $("#display-modal-specials-success").css('display', 'none');
        $("#display-modal-specials-error").css('display', 'none');
        $("#display-modal").modal("show"); //ABRIR MODAL
        $("#display-modal-loading").css('display', 'block');

        var enc = "application/x-www-form-urlencoded;charset=UTF-8";
        if($(this).attr("enctype") == "multipart/form-data"){
            enc = "multipart/form-data";
        }
        var dados = new FormData(this);
        var post = $(this).attr("post");
        var special = $(this).attr("spec");
        //alert('teste'+post);

        $.ajax({//                          ### Função AJAX
            url: post,//                    ### Arquivo php
            type:'post',//                  ### Método de envio
            data: dados,//                  ### Dados
            contentType: false,
            enctype: enc,
            processData: false,
            success: function (result){//   ### Sucesso no AJAX
                if(result==1){//            ### Se retornar 1 = sucesso
                        $("#display-modal-loading").css('display', 'none');
                        $("#display-modal-success").css('display', 'block');
                        if (special == 'true') {
                            $("#display-modal-specials-success").css('display', 'block');
                        }
                    setTimeout(function() {
                         //location.href='../perfil/';// volta para página principal
                         window.location.reload();
                    }, 1200);
                }
                else if(result==2){//Para casos especiais
                    setTimeout(function() {
                        $("#display-modal-loading").css('display', 'none');
                        $("#display-modal-success").css('display', 'block');
                        if (special == 'true') {
                            $("#display-modal-specials-error").css('display', 'block');
                        }
                    }, 300);
                    setTimeout(function() {
                         //location.href='../perfil/';// volta para página principal
                         window.location.reload();
                    }, 2500);
                }
                else{//                     ### Senão, apresenta o erro
                    setTimeout(function() {
                        $("#display-modal-loading").css('display', 'none');
                        $("#display-modal-error").css('display', 'block');
                        $("#display-modal-error").append("<br>"+result+"<br>"+dados+"<br>"+post);
                    }, 300);
                }
            }
        })
        return false;
});
//ABRIR E FECHAR BARRA LATERAL
var desk = false;
window.addEventListener('resize', function(){
    var windowWidth = window.innerWidth;

    if(desk == false && windowWidth >= 980){
        desk = true;
        showNav();
    }
    else if(desk == true && windowWidth < 980){
        desk = false;
        closeNav();
    }
});

// FILTRO NA TABELA DE LISTAGEM DE MEMBROS
$(document).ready(function(){
    $("#buscaListaMembro").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#mTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function(){
    $("#buscaLista").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#bTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});