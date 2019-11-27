<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Tela de Login</title>

    <script type="text/javascript">
        $(document).ready(function(){

            function login(){
                var dados = $( this ).serialize();
                console.log(dados);
                /*$.ajax({
                    headers: { 
                        Accept : "application/json; charset=utf-8",
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    type: "POST",
                    url: "http://localhost:8000/api/login",
                    data: dados,
                    success: function( data )
                    {
                        console.log(data);
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
                
                return false;*/
            }

            /*$('#formulario').submit(function(){
                
            });*/
        });

        function login(){
            //var dados = $('#formulario').serialize();
            var email = $("input[name='email']").val();
            var senha = $("input[name='senha']").val();
            //console.log(senha);
            $.ajax({
                dataType: "json",
                type: "POST",
                url: "http://localhost:8000/api/login",
                data: {
                    email: email,
                    senha: senha
                },
                success: function( data )
                {
                    console.log(data['mensagem']);
                },
                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });
            
            return false;
        }

    </script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form method="post" id="formulario" action=""
                    style="background-color: thistle; padding: 10px; border-radius: 5%; margin: 20px auto;">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input name="email" type="email" class="form-control" id="btn-email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input name="senha" type="password" class="form-control" id="btn-senha" placeholder="senha">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="login()">Login</button>
                </form>
            </div>
        </div>
    </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>