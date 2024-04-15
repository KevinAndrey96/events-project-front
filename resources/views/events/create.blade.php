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
                            <form method="POST" action="{{route('events.store')}}" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="name" class="form-label">Nombre</label>
                                        <input id="name" name="name" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="capacity" class="form-label">Capacidad</label>
                                        <input id="capacity" name="capacity" type="number" min="1" step="1" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="date" class="form-label">Fecha</label>
                                        <input id="date" name="date" type="date" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="time" class="form-label">Hora</label>
                                        <input id="time" name="hour" type="time" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="price" class="form-label">Precio</label>
                                        <input id="time" name="price" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="bank" class="form-label">Banco</label>
                                        <input id="time" name="bank" type="text" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <label for="account" class="form-label">Cuenta</label>
                                        <input id="time" name="account" type="text" class="form-control" required>
                                    </div>
                                </div>
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
