$(document).ready(function(){
    $('#formok').submit(function(){  //Ao submeter formulário
        $("#display-modal-error").css('display', 'none');
        $("#display-modal-success").css('display', 'none');
        $("#display-modal-specials-success").css('display', 'none');
        $("#display-modal-specials-error").css('display', 'none');
        $("#display-modal").modal("show"); //ABRIR MODAL
        $("#display-modal-loading").css('display', 'block');


        var dados = $("#formok").serialize();
        var post = $("#formok").attr("post");
        var special = $("#formok").attr("spec");
        $.ajax({//                          ### Função AJAX
            url: post,//                    ### Arquivo php
            type:"post",//                  ### Método de envio
            data: dados,//                  ### Dados
            success: function (result){//   ### Sucesso no AJAX
                if(result==1){//            ### Se retornar 1 = sucesso
                    setTimeout(function() {
                        $("#display-modal-loading").css('display', 'none');
                        $("#display-modal-success").css('display', 'block');
                        if (special == 'true') {
                            $("#display-modal-specials-success").css('display', 'block');
                        }
                    }, 300);
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
                        $("#display-modal-error").append(""+result);
                    }, 300);
                }
            }
        })
        return false;   //Evita que a página seja atualizada
    })
})

$(document).ready(function(){
    $('#formupdate').submit(function(){  //Ao submeter formulário
        $("#display-modal-error-update").css('display', 'none');
        $("#display-modal-success-update").css('display', 'none');
        $("#display-modal-loading-update").css('display', 'block');
        $("#display-modal-update").modal("show"); //ABRIR MODAL

        var dados = $("#formupdate").serialize();
        var post = $("#formupdate").attr("post");

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
    })
})