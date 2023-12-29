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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teléfono</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de nacimiento</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($attendees as $attendee)
                                    <tr class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        <td>{{$attendee['name'].' '.$attendee['lastname']}}</td>
                                        <td>{{$attendee['phone']}}</td>
                                        <td>{{$attendee['date']}}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
