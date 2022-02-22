$(document).ready(function(){
    $("#login-alert").css('display', 'none'); //Esconde o elemento com id errolog
    $("#login-inative").css('display', 'none'); //Esconde o elemento com id errolog
    $('#loginform').submit(function(){  //Ao submeter formulário
        var dados = $("#loginform").serialize();
        $.ajax({            //Função AJAX
            url:"login.php",            //Arquivo php
            type:"post",                //Método de envio
            data: dados,   //Dados
            success: function (result){         //Sucesso no AJAX
                        if(result==1){                      
                            location.href='perfil/';    //Redireciona
                        }
                        else if(result==2){
                            $("#login-inative").css('display', 'block'); //Informa o erro
                            setTimeout(function() {
                                $("#login-inative").css('display', 'none');
                            }, 4000);
                            //alert("Result: "+result);
                        }
                        else{
                            $("#login-alert").css('display', 'block'); //Informa o erro
                            setTimeout(function() {
                                $("#login-alert").css('display', 'none');
                            }, 4000);
                            //alert("Result: "+result);
                        }
                    }
        })
        return false;   //Evita que a página seja atualizada
    })
})