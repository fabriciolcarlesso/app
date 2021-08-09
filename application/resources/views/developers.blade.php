<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Fjalla+One|Montserrat:400,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">

    <title>Developer's app</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        h1 {
            font: 500 34px "Fjalla One","Verdana, Arial";
            color: #B02A37;
        }
        span {
            float: left;
            white-space: nowrap;
            width: 99%;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    
  </head>
  <body class="bg-light">
    <div class="modal-backdrop" style="opacity:0.8"></div>
    
    <div class="mx-5 p-5">
        <h1 class="py-3 px-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi mr-1 bi-gear" viewBox="0 0 16 16">
                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
            </svg>
            Developer's app
        </h1>

        <div class="container bg-white p-4 border border-light rounded">
            <div class="row">
                <div class="col-md-4">
                    
                    <div class="row pb-0 mb-0">
                        <div class="col-md-12 pb-0 mb-0 pr-0 mr-0">
                            <h5 class="text-secondary border-bottom mb-4 pb-3">
                                Cadastro
                            </h5>
                        </div>
                    </div>

                    @if (empty(old('id')))
                        <form method="post" id="formDeveloper" action="{{ route('developer.create') }}">
                    @else
                        <form method="post" id="formDeveloper" action="{{ route('developer.update', old('id')) }}">
                            {{ method_field('PUT') }}
                    @endif
                        {{ csrf_field() }}

                        <input type="hidden" name="birthdate" id="birthdate" value="{{ old('birthdate') }}"  />

                        <div class="row pb-0 mb-0">
                            <div class="col-md-5 pb-0 mb-0">
                                <label for="name" class="pt-2 text-secondary">
                                    Nome completo
                                </label>
                            </div>
                            <div class="col-md-7 pb-0 mb-0 px-0 form-group">
                                <input 
                                    type="text" 
                                    class="form-control text-secondary" 
                                    name="name" 
                                    value="{{ old('name') }}" >
                            </div>
                        </div>
                        
                        <div class="row pb-0 mb-0 mt-2">
                            <div class="col-md-5 pb-0 mb-0">
                                <label for="sex" class="pt-2 text-secondary">
                                    Sexo
                                </label>
                            </div>
                            <div class="col-md-2 pb-0 mb-0 px-0 form-group">
                                <select class="form-control text-secondary" name="sex">
                                    <option>
                                        --
                                    </option>
                                    <option 
                                        value="M" 
                                        {{( old('sex') == 'M') ? 'selected' : ''}}>
                                        M
                                    </option>
                                    <option 
                                        value="F" 
                                        {{( old('sex') == 'F') ? 'selected' : ''}}>
                                        F
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row pb-0 mb-0 mt-2">
                            <div class="col-md-5 pb-0 mb-0">
                                <label for="birthdateDay" class="pt-2 text-secondary">
                                    Data nascimento
                                </label>
                            </div>
                            <div class="col-md-2 pb-0 mb-0 px-0 form-group">
                                <input 
                                    type="text" 
                                    class="form-control birthdate" 
                                    name="birthdateDay" 
                                    id="birthdateDay"
                                    value="{{ old('birthdateDay') }}" 
                                    placeholder="Dia">
                            </div>
                            <div class="col-md-2 pb-0 pl-1 mb-0 px-0 form-group">
                                <input 
                                    type="text" 
                                    class="form-control birthdate" 
                                    name="birthdateMonth" 
                                    id="birthdateMonth"
                                    value="{{ old('birthdateMonth') }}" 
                                    placeholder="Mês">
                            </div>
                            <div class="col-md-3 pl-1 pb-0 mb-0 px-0 form-group">
                                <input 
                                    type="text" 
                                    class="form-control birthdate" 
                                    name="birthdateYear" 
                                    id="birthdateYear"
                                    value="{{ old('birthdateYear') }}" 
                                    placeholder="Ano">
                            </div>
                        </div>

                        <div class="row pb-0 mb-0 mt-2">
                            <div class="col-md-5 pb-0 mb-0">
                                <label for="age" class="pt-2 text-secondary">
                                    Idade
                                </label>
                            </div>
                            <div class="col-md-2 pb-0 mb-0 px-0 form-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="age"
                                    id="age" 
                                    value="{{ old('age') }}" 
                                    readonly>
                            </div>
                        </div>

                        <div class="row pb-0 mb-0 mt-2">
                            <div class="col-md-5 pb-0 mb-0">
                                <label for="hobby" class="pt-2 text-secondary">
                                    Hobby
                                </label>
                            </div>
                            <div class="col-md-7 pb-0 mb-0 px-0 form-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="hobby" 
                                    value="{{ old('hobby') }}">
                            </div>
                        </div>
                            
                        <div class="row pb-0 mb-0 mt-2">
                            <div class="col-md-12 mr-0 pr-0">
                                <button 
                                    type="submit" 
                                    id="btn-create"
                                    class="btn btn-primary float-right ml-2">
                                    Salvar
                                </button>

                                <button 
                                    type="button" 
                                    id="btn-cancel"
                                    class="btn btn-danger float-right">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="row pb-0 mb-0">
                        <div class="col-md-12 pb-0 mb-0 mr-0">
                            <h5 class="text-secondary border-bottom mb-4 pb-3">
                                Relação de desenvolvedores
                            </h5>
                        </div>
                    </div>
                    <div class="row py-2 mr-1 pl-0 ml-1 pb-1 mb-1">
                        <div class="col-md-4 ml-0 pl-0">Nome completo</div>
                        <div class="col-md-1 text-center">Sexo</div>
                        <div class="col-md-2 text-center">Nascimento</div>
                        <div class="col-md-1 text-center">Idade</div>
                        <div class="col-md-3">Hobby</div>
                        <div class="col-md-1">
                        </div>
                    </div>
                    @if (isset($developers) && $developers->count() > 0)
                        @foreach ($developers as $developer)
                            <div class="row text-secondary py-2 mr-1 pl-0 ml-1 pb-1 mb-1 border-bottom">
                                <div class="col-md-4 ml-0 pl-0">
                                    <span class="align-middle fullname">
                                        {{ $developer->name }}
                                    </span>
                                </div>
                                <div class="col-md-1 text-center">
                                    <span class="align-middle">
                                        {{ $developer->sex }}
                                    </span>
                                </div>
                                <div class="col-md-2 text-center">
                                    <span class="align-middle">
                                        {{ $developer->birthdate }}
                                    </span>
                                </div>
                                <div class="col-md-1 text-center">
                                    <span class="align-middle">
                                        {{ $developer->age }}
                                    </span>
                                </div>
                                <div class="col-md-3">
                                    <span class="align-middle">
                                        {{ $developer->hobby }}
                                    </span>
                                </div>
                                <div class="col-md-1 mx-0 px-0 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#B02A37" class="bi bi-x-octagon-fill" viewBox="0 0 16 16">
                                        <path d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous">
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous">
    </script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#birthdateDay").mask("99");
            $("#birthdateMonth").mask("99");
            $("#birthdateYear").mask("9999");

            $('.modal-backdrop').fadeOut("slow");

            $(".btn").click(function(){
                $(this).val('Salvando');
                $('.modal-backdrop').fadeIn("fast");
            });

            $("#btn-cancel").click(function(event) {
                location.reload();
            })

            $(".birthdate").on('blur', function(){
                $('#birthdate').val(
                    $('#birthdateYear').val()+"-"+
                    $('#birthdateMonth').val()+"-"+
                    $('#birthdateDay').val()
                );

                var birthdate = new Date.parse($('#birthdate').val());
                var today = new Date();
                var age = Math.floor((today-birthdate) / (365.25 * 24 * 60 * 60 * 1000));

                if (age > 0) {
                    $("#age").val(age);
                }
            });

            if ($('#birthdate').val()) {
                var birthdate = new Date($('#birthdate').val());

                if (birthdate.getDate() < 10) {
                    $('#birthdateDay').val("0" + birthdate.getDate());

                }
                                
                if ((birthdate.getMonth()+1) < 10) {
                    $('#birthdateMonth').val("0" + (birthdate.getMonth()+1));

                }

                $('#birthdateYear').val(birthdate.getFullYear());
            }
        });
    </script>
  </body>
</html>