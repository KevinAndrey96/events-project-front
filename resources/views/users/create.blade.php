@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-primary bg-gradient shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6"><a href="{{route('events.index')}}" class="btn btn-block d-inline"><i style="color: white; margin-top: 13px;" class="material-icons opacity-10">keyboard_return</i></a>Crear Evento</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="container">
                            <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input id="name" name="name" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" name="email" type="email" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input id="password" name="password" type="password" class="form-control" required>
                                    </div>
                                </div>
                                <input type="hidden" name="role" value="{{$role}}">
                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-success bg-gradient m-4 float-end pe-4 ps-4" value="Crear">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
