<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="/form-assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="/form-assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/form-assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/form-assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/form-assets/css/main.css" rel="stylesheet" media="all">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <h2 class="title">Formulario de registro</h2>
                    </div>
                </div>
                <form method="POST" action="{{route('records.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row row-space">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Nombres</label>
                                <input class="input--style-4" type="text" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Apellidos</label>
                                <input class="input--style-4" type="text" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Fecha de nacimiento</label>
                                <div class="input-group-icon">
                                    <input class="input--style-4" type="date" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Genero</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45">Masculino
                                        <input type="radio" checked="checked" name="gender" value="male">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Femenino
                                        <input type="radio" name="gender" value="female">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="p-t-10">
                                <label class="radio-container m-r-45">Becado
                                    <input type="radio" checked="checked" id="scholarshipYes" name="scholarship" value="yes" onchange="showFileInput()">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No Becado
                                    <input type="radio" name="scholarship" id="scholarshipNot" value="no" onchange="showFileInput()">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 ms-auto me-auto mb-4" id="receiptFileDiv" style="display:none">
                            <label for="formFile" class="form-label">Suba el recibo de pago</label>
                            <input class="form-control" type="file" name="receiptFile" id="receiptFile" required disabled>
                    </div>
                    <div class="row row-space mt-4">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Email</label>
                                <input class="input--style-4" type="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <label class="label">Teléfono</label>
                                <input class="input--style-4" type="text" name="phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <label class="label">Escribe el correo de un amigo interesado en el evento</label>
                                <input class="input--style-4" type="text" name="friend_email">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="event_pk" value="{{$pk}}">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-3">
                            <button class="btn btn--radius-2 bg-primary bg-gradient text-light" type="submit">Enviar</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
<script>
    function showFileInput()
    {
        let receiptFileDiv = document.getElementById('receiptFileDiv');
        let receiptFile = document.getElementById('receiptFile');
        let scholarshipYes = document.getElementById('scholarshipYes');
        let scholarshipNo = document.getElementById('scholarshipNot');

        receiptFileDiv.style.display = 'block';
        receiptFile.disabled = false;

        if (scholarshipYes.checked == true) {
            receiptFileDiv.style.display = 'none';
            receiptFile.disabled = true;

        }
    }

</script>

</div>

<!-- Jquery JS-->
<script src="/form-assets/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="/form-assets/vendor/select2/select2.min.js"></script>
<script src="/form-assets/vendor/datepicker/moment.min.js"></script>
<script src="/form-assets/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="/form-assets/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
