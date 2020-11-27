<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Time - Intap</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
</head>

<body>
    <div class="content py-3  min-vh-90 bg-light" id="mainContent">
        <div class="container">
            <div class="sticky-top">
                <div class="row bg-light">
                    <div class="col">
                    <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Time - Intap'}}  <a href="{{route('home')}}"> <i class="fas fa-home"></i></a> </p>
                    </div>
                    <div class="col">
                        <p class="float-right font-inter-700 text-secondary" href="#">
                            {{ Auth::user()->name}}
                            <a href="{{ url('/logout') }}" id="logout"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" title="Logout">
                                <i class="fas fa-sign-out-alt text-danger"></i>
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                <input type="submit" value="logout" style="display: none;">
                            </form>
                        </p>
                    </div>
                </div>
                <div class="row bg-light mb-2">
                    <div class="col">
                        <ul class="nav d-flex flex-wrap-reverse flex-md-row border-bottom">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle py-0 px-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">All</a>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <h6 class="dropdown-header">Seleccione el Mes o Rango.</h6>
                                    <a class="dropdown-item px-3" href="#">Agosto</a>
                                    <a class="dropdown-item px-3" href="#">Septiembre</a>
                                    <a class="dropdown-item px-3" href="#">Octubre</a>
                                    <a class="dropdown-item px-3 active" href="#">Noviembre</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item px-3" href="#">Ultimo Año </a>
                                    <a class="dropdown-item px-3" href="#">Ultimo mes</a>
                                    <a class="dropdown-item px-3" href="#">Ultimo Semana</a>
                                    <div class="dropdown-divider"></div>
                                    {{-- <form class="form"> --}}
                                        <a class="dropdown-item px-3" href="#">
                                            <label class="my-0" for="inlineFormInputGroupDate1">Desde</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text px-2">
                                                        <i class="fas fa-calendar-day"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control" id="inlineFormInputGroupDate1" placeholder="Desde" describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                escoge una fecha valida.
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item px-3" href="#">
                                            <label class="my-0" for="inlineFormInputGroupDate2">Hasta</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text px-2">
                                                        <i class="fas fa-calendar-day"></i>
                                                    </div>
                                                </div>
                                                <input type="date" class="form-control" id="inlineFormInputGroupDate2" placeholder="Desde" describedby="inputGroupPrepend" required>
                                                <div class="invalid-feedback">
                                                escoge una fecha valida.
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item px-3" href="#">
                                            {{-- <button type="submit" class="btn btn-block btn-primary">Buscar</button> --}}
                                        </a>
                                    {{-- </form> --}}
                                </div>
                            </li>
                            <li class="flex-grow-1 nav-item">
                                <a class="text-secondary float-right"><span style="color: #6D5BD0"><b>{{'1.895,15'}}</b></span> Hours</a>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="container shadow rounded border border-3 h-90 bg-white">
                <div class="row justify-content-between py-2 my-2" id='ventasHeader'>
                    <div class="col-6 col-md-2 d-flex justify-content-between">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="text-nowrap bd-highlight">
                                    <i class="fas fa-caret-down"></i> Local
                                </div>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Local</a>
                                <a class="dropdown-item" href="#">Remoto</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                    <a href="{{route('home')}}" class="float-right btn btn-success text-white font-inter-600" style="font-size:12px;"><b>Close</b></a>
                    </div>
                    <div class="col-md-3 my-sm-0 my-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="00174" aria-label="productCode" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="row bg-local">
                    <div class="col">
                        <div class="card my-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2"><img class="card-img" src="https://picsum.photos/300/200?text=Image cap" alt="Card image cap"></div>
                                    <div class="col-md-8">
                                        <div class="form-group pt-2 pt-sm-0">
                                            {{-- <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                                </div>
                                            <input type="date" class="form-control" placeholder="Codigo" aria-label="Codigo" aria-describedby="basic-addon1" value="{{now()}}" name="date">
                                            </div> --}}
                                        </div>
                                        <p class="card-tittle text-left"><b>DESCRIPTIÓN</b></p>
                                        <p class="card-text text-left">{{$activity->description}}</p>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div>
                                            <button class="btn btn-block btn-danger text-white font-inter-600" style="font-size:12px;"><b><i class="fas fa-trash-alt"></i> Delete</b></button>
                                        </div>
                                        <br>
                                        <div>
                                            {{-- <input id="submitButton" type="submit" value="Save" class="btn btn-block btn-success text-white font-inter-600" style="font-size:12px;"/> --}}
                                            {{-- <button type="button" class="btn btn-block btn-success text-white font-inter-600" style="font-size:12px;" data-toggle="modal" data-target="#exampleModal" data-whatever="">New Time</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm text-left mb-0" style="color:#6E6893 !important;">
                            <thead class="font-inter-600" style="background-color: #F4F2FF;">
                                <tr>
                                    <th id="th-1" scope="col">#</th>
                                    <th id="th-3" scope="col">date</th>
                                    <th id="th-4" scope="col">time</th>
                                    <th id="th-5" scope="col">Local</th>
                                    <th id="th-6" scope="col">Remoto</th>
                                    <th id="th-9" scope="col">+</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activity->times as $time)
                                <tr>
                                    <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">{{$time->date}}</div>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap font-inter-600">
                                            <span class="badge badge-domicilio" style="font-size: 20px !important;">
                                                • {{{$time->time}}}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark">local</div>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col">
                                        <div class="text-nowrap">
                                            <div class="text-dark"></div>
                                            
                                        </div>
                                    </td>
                                    <td class="align-middle" scope="col"><i class="fas fa-caret-square-up"></i><br><i class="fas fa-caret-square-down"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row flex-row d-flex p-2" style="background-color: #F4F2FF; color:#6E6893 !important;">
                    <div class="mr-auto">filas por pagina: 10</div>
                    <div>1-10 of 276</div>
                    <div><i class="px-2 fas fa-chevron-left"></i><i class="px-2 fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New time</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal well" data-async data-target="#exampleModal" action="{{route('times.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                    </div>
                                <input type="date" id="date" class="form-control" placeholder="Codigo" aria-label="Codigo" aria-describedby="basic-addon1" value="{{today()->format('Y-m-d')}}" name="date">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="time" id="time" type="number" max="8" min="1" class="form-control" placeholder="Hours" aria-label="Hours" aria-describedby="basic-addon1">
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="errorMessage"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                            <button id="submitButton" type="submit" value="Save" name="save" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="../js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
    $(document).ready( function() {
        $('.modal form').on('submit', function(e) {
            e.preventDefault();
			$.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			  }
            });
            $.ajax({
				url: $(this).attr('action'),
				method: 'POST',
				data:{
                    "_token": "{{ csrf_token() }}",
                    "date": $('input[name=date]').val()
                    "time": $('input[name=time]').val()
                },
				beforeSend: function(){
					let buttonsubmit = $('#submitButton');
                    buttonsubmit.on('click', function(event) {
                        event.preventDefault();
                    });
                    buttonsubmit.disabled = true;
                    buttonsubmit.prop('disabled', true);
					buttonsubmit.empty();
					buttonsubmit.append(`<i class="fas fa-sync fa-spin"></i> Sending...`);
				},
				success: function(response){
					let buttonsubmit = $('#submitButton');
					let errormessage = $('#errorMessage');
					let input = $('#description');
                    
                    buttonsubmit.unbind("click");
                    buttonsubmit.disabled = false;
                    buttonsubmit.prop('disabled', false);
                    buttonsubmit.prop('class', 'btn btn-primary');
                    buttonsubmit.empty();
                    buttonsubmit.append(`Save`);
                    input.prop('class', 'form-control');
                    errormessage.empty();

                    let newRow = $('tbody');
                    newRow.append(`
                    <tr>
                        <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">Cocacola 1.5 Lt</div>#00175
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap font-inter-600">
                                <span class="badge badge-domicilio" style="font-size: 20px !important;">
                                    • 02
                                </span>
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">$2000</div>
                                COP
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">$4000</div>
                                COP
                            </div>
                        </td>
                        <td class="align-middle" scope="col"><i class="fas fa-caret-square-up"></i><br><i class="fas fa-caret-square-down"></i></td>
                    </tr>
                    `);


                    // toastr.success(response['message']);
				},
				error: function(error){
					let buttonsubmit = $('#submitButton');
					let errormessage = $('#errorMessage');
					let input = $('#description');
                    
                    buttonsubmit.unbind("click");
                    buttonsubmit.disabled = false;
                    buttonsubmit.prop('disabled', false);
                    buttonsubmit.prop('class', 'btn btn-primary');
                    buttonsubmit.empty();
                    buttonsubmit.append(`Save`);
                    input.prop('class', 'form-control is-invalid');
                    errormessage.empty();

                    errormessage.append(error['responseJSON']['error']);

					// toastr.error(error['responseJSON']['message']);
				},
				complete: function(){
					//
                }
                return false;
            })
            
        })
    });
    </script>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "6000",
            "extendedTimeOut": "3000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        function NotifiTrue(Mensaje) {
            toastr.success(Mensaje);
        }

        function NotifiFalse(Mensaje) {
            toastr.error(Mensaje);
        }
    </script>
</body>

</html>