@extends('layouts.dashboard')
@section('content')

    @if(Session::has('eventRegistered'))
        <div class="alert alert-success" role="alert">
            <p class="text-center text-white">{{ Session::get('eventRegistered') }}</p>
        </div>
    @endif
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient bg-primary shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3">Eventos<a href="{{route('events.create')}}" class="btn btn-block btn-Secondary d-inline"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">add_card</i></a></h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id= "my_table" class="table align-items-center mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capacidad</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estatus</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                        <tr class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            <td>{{$event['name']}}</td>
                                            <td>{{$event['date'].' '.$event['hour']}}</td>
                                            <td>{{$event['capacity'].' personas'}}</td>
                                            <td>
                                                @if ($event['status'] == 'enabled')
                                                    <p style="font-weight:bold;" class="text-success">Habilitado</p>
                                                @elseif ($event['status'] == 'cancelled')
                                                    <p style="font-weight:bold;" class="text-danger">Cancelado</p>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <div class="m-2">
                                                        <a style="color: darkred;" href="#" title="Cancelar" class="btn btn-link px-1 mb-0" onclick="sendForm('{{$event['pk']}}', '{{$event['sk']}}')"><i style="color: darkred; font-size: 25px !important;" class="material-icons opacity-10">block</i></a>
                                                    </div>
                                                    <div class="m-2">
                                                        <a style="color: darkred;" href="#" title="Asistentes" class="btn btn-link px-1 mb-0"><i style="color: darkblue; font-size: 25px !important;" class="material-icons opacity-10">groups</i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <form id="cancel-form" method="post" action="{{route('events.cancel')}}">
                                @csrf
                                <input type="hidden" name="pk" id="pk">
                                <input type="hidden" name="sk" id="sk">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function sendForm(pk, sk)
        {
           var cancelConfirm = confirm("¿Está seguro que quiere cancelar este evento?");

            if (cancelConfirm) {
                var form = document.getElementById('cancel-form');
                var pkElement = document.getElementById('pk');
                var skElement = document.getElementById('sk');
                pkElement.value = pk;
                skElement.value = sk;
                form.submit();
            }
        }
    </script>
@endsection
