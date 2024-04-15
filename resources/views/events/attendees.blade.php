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
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3">Usuario</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id= "my_table" class="table align-items-center mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Recibo</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de nacimiento</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Becado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado de pago</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cambiar estado pago</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($attendees as $attendee)
                                    <tr class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <td>
                                            <a class="magnific" target="_blank" href="{{getenv('APP_URL').'/storage/receipt_files/'.$attendee['userID'].'.png'}}">
                                                <img class=""  style="width:80px;" src="{{getenv('APP_URL').'/storage/receipt_files/'.$attendee['userID'].'.png'}}" onError="this.onerror=null;this.src='/assets/images/imagen-fallo.jpg';">
                                            </a>
                                        </td>
                                        <td>{{$attendee['name'].' '.$attendee['lastname']}}</td>
                                        <td>{{$attendee['phone']}}</td>
                                        <td>{{$attendee['date']}}</td>
                                        <td>
                                            @if ($attendee['scholarShip'] == 'yes')
                                                Si
                                            @endif
                                                @if ($attendee['scholarShip'] == 'no')
                                                    No
                                                @endif
                                        </td>
                                        <td>
                                            {{$attendee['userID']}}
                                        </td>
                                        <td>
                                            @if($attendee['paymentStatus'] == 'not-payed')
                                                No pagado
                                            @endif
                                                @if($attendee['paymentStatus'] == 'payed')
                                                   Pagado
                                                @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <div class="d-flex form-check form-switch justify-content-center">
                                                @if ($attendee['paymentStatus'] == 'payed')
                                                    <input class="form-check-input" type="checkbox" role="switch" id="switch{{$attendee['userID']}}" onchange="isEnabled('{{$attendee['userID']}}', '{{$attendee['pk']}}')" checked>
                                                @else
                                                    <input class="form-check-input" type="checkbox" role="switch" id="switch{{$attendee['userID']}}" onchange="isEnabled('{{$attendee['userID']}}', '{{$attendee['pk']}}')">
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @if ($attendee['status'] == 'attend')
                                                <p style="font-weight:bold;" class="text-success">Asistió</p>
                                            @elseif ($attendee['status'] == 'not-attend')
                                                <p style="font-weight:bold;" class="text-danger">No Asistió</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form id="cancel-form" method="post" action="{{route('events.cancel')}}">
                                @csrf
                                <input type="hidden" name="pk" id="pk">
                                <input type="hidden" name="sk" id="sk">
                                <input type="hidden" name="status" id="status" value="cancelled">
                            </form>
                            <form method="post" action="{{route('attendee.change-pay-status')}}" id="is-payed-form">
                                @csrf
                                <input type="hidden" name="pk" id="userPK">
                                <input type="hidden" name="sk" id="userSK">
                                <input type="hidden" name="isPayed" id="isPayed">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function isEnabled(id, pk)
        {
            console.log(sk);
            var toggle = document.getElementById('switch'+id);
            var isPayed = document.getElementById('isPayed');
            var isPayedForm = document.getElementById('is-payed-form');
            var userPK = document.getElementById('userPK');
            var userSK = document.getElementById('userSK');
            userPK.value = pk.toString();
            userSK.value = 'METADATA#USER';
            isPayed.value = 'payed';

            if (! toggle.checked) {
                isPayed.value = 'not-payed';
            }

            isPayedForm.submit()
        }
    </script>

@endsection
