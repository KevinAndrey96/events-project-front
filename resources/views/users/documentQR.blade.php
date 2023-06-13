<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8">
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div style="display:flex" class="col-md-8 d-flex">
                <p class="m-4" style="font-family: Times, Georgia, serif; font-weight:bold; font-size: 24px; text-align: center;">Por favor escanee el siguiente codigo QR para validar al usuario</p>
                <div style="display:flex; margin-top: 60px;" class="text-center">
                    <img style="margin-left: auto; margin-right: auto;" src="data:image/png;base64,{{ $qrCode }}" alt="QR Code">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
