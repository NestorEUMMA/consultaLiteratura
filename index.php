<?php

include 'include/dbconnect.php';

$ListarGrupos = 'SELECT GrupoId, Nombre FROM prg.pgrupos';
$ResultadoGrupos = odbc_exec($conn, $ListarGrupos);

$ListarFabricantes = 'SELECT PLUFabricante, Nombre FROM prg.fabricantes';
$ResultadoFabricantes = odbc_exec($conn, $ListarFabricantes);

$ListarDivision = 'SELECT PLUDivision, Nombre from prg.divisiones where PLUDivision in (1,2,3,11,16)';
$ResultadoDivision = odbc_exec($conn, $ListarDivision);


?>

<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="web/template2/assets/img/logo.png" />
    <title>Consulta de Literatura</title>


    <link href="web/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="web/template/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="web/template/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="web/template/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="web/template/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="web/template/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="web/template/css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="web/template/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="web/template/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="web/template/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="web/template/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="web/template/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="web/template/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="web/template/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="web/template/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="web/template/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="web/template/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="web/template/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="web/template/css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
    <link href="web/template/css/animate.css" rel="stylesheet">
    <link href="web/template/css/style.css" rel="stylesheet">
    <script src="main.js"></script>

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-collapse collapse" id="navbar">
                <!-- <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="logout.php?logout">
                  <i class="fa fa-sign-out"></i> Log out
              </a>
                    </li>
                </ul> -->
            </div>
        </nav>
        </div>
        <div class="wrapper wrapper-content">
            <div class="container">
                          <div class="row">
                             <div class="ibox-content">
                                  <form class="form-horizontal">

                                    <div class="form-group"><label class="col-lg-2 control-label">DIVISION</label>
                                            <div class="col-lg-10"><input type="search" class="form-control" id="buscardivision">
                                          </div>
                                      </div>
                                      
                                      <div class="form-group"><label class="col-lg-2 control-label">GRUPOS</label>
                                            <div class="col-lg-10"><input type="search" class="form-control" id="buscargrupos">
                                          </div>
                                      </div>
                                      <div class="form-group"><label class="col-lg-2 control-label">EDITORIAL</label>
                                            <div class="col-lg-10"><input type="search" class="form-control" id="buscareditorial">
                                          </div>
                                      </div>
                                        <div class="form-group"><label class="col-lg-2 control-label">AUTOR</label>
                                          <div class="col-lg-10"><input type="search" class="form-control" id="buscarautor">
                                          </div>
                                      </div>
                                      <div class="form-group"><label class="col-lg-2 control-label">DESCRIPCION</label>
                                          <div class="col-lg-10"><input type="search" class="form-control" id="buscardescripcion">
                                          </div>
                                      </div>

                                  </form>
                              </div>
                            </div> 
                <br/><br/> 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>EXISTENCIAS DE LITERATURA</h5>

                            </div>
                            <div class="ibox-content">
                                <div class="row" id="datos">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
    <!-- <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div> -->
    <div>
      <script>
          document.write(new Date().getFullYear())
      </script>
      <a href="">  </a>, UQSolutions
    </div>
</div>

        </div>
        </div>

</body>

</html>



   <script src="web/template/js/jquery-3.1.1.min.js"></script>
    <script src="web/template/js/bootstrap.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="web/template/js/inspinia.js"></script>
    <script src="web/template/js/plugins/pace/pace.min.js"></script>
    <script src="web/template/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="web/template/js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="web/template/js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="web/template/js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="web/template/js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="web/template/js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="web/template/js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="web/template/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="web/template/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="web/template/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="web/template/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="web/template/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="web/template/js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="web/template/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="web/template/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="web/template/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="web/template/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="web/template/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="web/template/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <script>
        $(document).ready(function(){
            $(".select2_demo_2").select2();
        });


    </script>