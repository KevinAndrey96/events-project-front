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
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3"><a href="{{route('scanner.show')}}" class="btn btn-block btn-Secondary d-inline"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i></a>Validación código QR</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        @if (isset($user))
                            <p style="font-size: 300%; font-weight: bold;" class="text-success text-center">Usuario validado</p>
                        @else
                            <p style="font-size: 300%; font-weight: bold;" class="text-danger text-center">No se encontro registro</p>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
