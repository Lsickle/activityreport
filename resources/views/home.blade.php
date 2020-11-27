<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Actividades - Intap</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />

</head>

<body>
    <div class="content py-3  min-vh-90 bg-light" id="mainContent">
        <div class="container">
            <div class="sticky-top">
                <div class="row bg-light">
                    <div class="col">
                        <p class="float-left text-secondary text-uppercase font-inter-700" style="font-size:13px;">{{'Activities List'}} <a href="{{route('home')}}"> <i class="fas fa-home"></i></a> </p>
                    </div>
                    <div class="col">
                        <p class="float-right font-inter-700 text-secondary" href="#">{{ Auth::user()->name}}
                            <a href="{{ url('/logout') }}" id="logout" onclick="event.preventDefault();
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
                                <a class="nav-link dropdown-toggle py-0 px-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">07/11/2020-07/11/1984</a>
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
                                    <form class="form">
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
                                            <button type="submit" class="btn btn-block btn-primary">Buscar</button>
                                        </a>
                                    </form>
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
                <div class="row justify-content-between py-2 my-2">
                    <div class="col-12 col-sm-2 d-flex justify-content-between">
                        <button class="btn btn-outline-secondary dropdown">
                            <div class="text-nowrap bd-highlight">
                                <i class="fas fa-filter"></i> Filter
                            </div>
                        </button>
                        <button type="button" style="background-color:#6D5BD0; font-size:12px;" class="btn text-white font-inter-600" data-toggle="modal" data-target="#exampleModal" data-whatever=""><b>CREATE</b></button>
                    </div>
                    <div class="col-12 col-sm-5 my-sm-0 my-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Buscar" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm text-left mb-0" style="color:#6E6893 !important;">
                            <thead class="font-inter-600" style="background-color: #F4F2FF;">
                                <tr>
                                    <th id="th-1" scope="col">#</th>
                                    <th id="th-2" scope="col">FECHA</th>
                                    <th id="th-3" scope="col">DESCRIPCIÓN</th>
                                    <th id="th-4" scope="col">TOTAL</th>
                                    <th id="th-4" scope="col">SHOW</th>
                                    <th id="th-4" scope="col">Add</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr>
                                        <th class="align-middle" scope="row"><i class="far fa-check-square"></i></th>
                                        <td class="align-middle" scope="col">
                                            <div class="text-nowrap">
                                                {{$activity->created_at}}
                                                <br>
                                                @if($loop->odd)
                                                <span class="badge badge-pill badge-primary">
                                                • Remote
                                                </span>
                                                @else
                                                <span class="badge badge-pill badge-local">
                                                • Local
                                                </span>
                                                @endif
                                                
                                            </div>
                                        </td>
                                        <td class="align-middle" scope="col">
                                            <div class="text-nowrap">
                                                <div class="text-dark">{{$activity->description}}</div>
                                                Project {{$loop->index + 1}}
                                            </div>
                                        </td>
                                        <td class="align-middle" scope="col">
                                            <div class="text-nowrap">
                                                <div class="text-dark">1200,5</div>
                                                Hours
                                            </div>
                                        </td>
                                        <td class="align-middle" scope="col">
                                        <a href="{{route('activities.show', ['activity' => $activity])}}" class="btn btn-sm btn-info text-white">
                                                <div class="text-nowrap">Show</div>
                                            </a>
                                        </td>
                                        <td class="align-middle" scope="col">
                                            <button onclick="pasarid({{$activity->id}})" type="button" class="btn btn-primary timemodalbutton" data-toggle="modal" data-target="#exampleModal2" data-id="{{$activity->id}}"><i class="fas fa-clock"></i> New Time</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row flex-row d-flex p-2" style="background-color: #F4F2FF; color:#6E6893 !important;">
                    <div class="mr-auto">rows per page: 10</div>
                    <div>1-10 of {{$activities->count()}}</div>
                    <div><i class="px-2 fas fa-chevron-left"></i><i class="px-2 fas fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="actForm" class="form-horizontal well" data-async data-target="#exampleModal" action="{{route('activities.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="description" class="col-form-label">Description:</label>
                            <input maxLength="120" name="description" type="text" class="form-control" id="description">
                            <span class="invalid-feedback" role="alert">
                                <strong id="errorMessage"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                        <button form="actForm" id="submitButton" type="submit" value="Save" name="save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade modaltime" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Time</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="timeform" class="form-horizontal well" data-async data-target="#exampleModal" action="{{route('times.store')}}" method="POST">
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
                                    <strong id="errorMessage2"></strong>
                                </span>
                            </div>
                        </div>
                        <input class="d-none" type="text" id="actid" value="">
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                        <button form="timeform" id="submitButton2" type="submit" value="Save" name="save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
    $(document).ready( function() {
        $('#exampleModal form').on('submit', function(e) {
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
                    "description": $('input[name=description]').val()
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
                                `+response['created_at']+`
                                <br>
                                <span class="badge badge-pill badge-local">
                                • Local
                                </span>
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">`+response['description']+`</div>
                                Project
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                            <div class="text-nowrap">
                                <div class="text-dark">1200,5</div>
                                Hours
                            </div>
                        </td>
                        <td class="align-middle" scope="col">
                        <a href="/activities/`+response['id']+`" class="btn btn-sm btn-info text-white">
                                <div class="text-nowrap">Show</div>
                            </a>
                        </td>
                    </tr>
                    `);


                    toastr.success('saved');
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

					toastr.error('error');
				},
				complete: function(){
					//
				}
            });
        });
    });
    $(document).ready( function() {
        $('#exampleModal2 form').on('submit', function(e) {
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
                    "date": $('input[name=date]').val(),
                    "time": $('input[name=time]').val(),
                    "id": $('#actid').val()
                },
				beforeSend: function(){
					let buttonsubmit = $('#submitButton2');
                    buttonsubmit.on('click', function(event) {
                        event.preventDefault();
                    });
                    buttonsubmit.disabled = true;
                    buttonsubmit.prop('disabled', true);
					buttonsubmit.empty();
					buttonsubmit.append(`<i class="fas fa-sync fa-spin"></i> Sending...`);
				},
				success: function(response){
					let buttonsubmit = $('#submitButton2');
					let errormessage = $('#errorMessage2');
					let input = $('#time');
                    
                    buttonsubmit.unbind("click");
                    buttonsubmit.disabled = false;
                    buttonsubmit.prop('disabled', false);
                    buttonsubmit.prop('class', 'btn btn-primary');
                    buttonsubmit.empty();
                    buttonsubmit.append(`Save`);
                    input.prop('class', 'form-control');
                    errormessage.empty();

                    
                    toastr.success('saved');
				},
				error: function(error){
					let buttonsubmit = $('#submitButton2');
					let errormessage = $('#errorMessage2');
					let input = $('#time');
                    
                    buttonsubmit.unbind("click");
                    buttonsubmit.disabled = false;
                    buttonsubmit.prop('disabled', false);
                    buttonsubmit.prop('class', 'btn btn-primary');
                    buttonsubmit.empty();
                    buttonsubmit.append(`Save`);
                    input.prop('class', 'form-control is-invalid');
                    errormessage.empty();

                    errormessage.append(error['responseJSON']['error']);

					toastr.error(error['responseJSON']['error']);
				},
				complete: function(){
					//
				}
            });
        });
    });
        
    function pasarid(id) {
        $(".modal-body #actid").val( id );
        
        $('#addBookDialog').modal('show');
    }
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
