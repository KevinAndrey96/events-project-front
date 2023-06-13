@extends('layouts.dashboard')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient bg-primary shadow-primary border-radius-lg pt-1 pb-0">
                            <h6 class="text-white text-center text-capitalize ps-2 mx-6 p-3">Escaner</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="d-flex justify-content-center mt-4">
                            <video class="rounded-3" id="qr-video" width="70%" height="70%"></video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="qr-form" action="{{ route('qr-message.validate') }}" method="POST" style="display:none;">
        @csrf
        <input type="text" name="qr-message" id="qr-message">
    </form>
    <script type="text/javascript">
        const video = document.getElementById('qr-video');
        const scanner = new Instascan.Scanner({ video });

        scanner.addListener('scan', (content) => {
            console.log(content);
            const qrForm = document.getElementById('qr-form');
            const qrMessageInput = document.getElementById('qr-message');
            qrMessageInput.value = content;
            qrForm.submit();
        });

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                let selectedCamera = cameras[0];
                for (let i = 0; i < cameras.length; i++) {
                    if (cameras[i].name.indexOf('back') !== -1) {
                        selectedCamera = cameras[i];
                        break;
                    }
                }
                scanner.start(selectedCamera);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
        /*
        Instascan.Camera.getCameras()
            .then(cameras => {
                if (cameras.length > 0) {
                    // Iniciar el escáner con la primera cámara disponible
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            })
            .catch(err => {
                console.error(err);
            });
*/

    </script>
@endsection
