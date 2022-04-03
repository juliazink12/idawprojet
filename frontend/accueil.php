                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Aujourd'hui</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Calories</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Consommées
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Restantes
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Excès
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Catégories</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> fruits/légumes
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> protéines
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> féculents
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Statistiques</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Calories</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Consommées
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Restantes
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Excès
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Calories</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Consommées
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Restantes
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Excès
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Progress Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Nutriments</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body-nutri">
                                    <h4 class="small font-weight-bold hprot">Protéines <span
                                            class="float-right proteines-span">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger proteines-bar" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold hglu">Glucides <span
                                            class="float-right glucides-span">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar  bg-warning glucides-bar"  role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold hlip">Lipides <span
                                            class="float-right lipides-span">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar lipides-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <a href="historique.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Voir tout l'historique</a>
                            </div>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Statistiques Bis</h1>
                    </div>
                    <!-- Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Calories</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Glucides</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Protéines</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Lipides</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <!-- /.container-fluid -->
                <script>
                    var glucideProgress = 50;
                    $('.hglu').children(".glucides-span").text(10+'%');
                    // $('').children(".glucides-bar").attr('aria-valuenow', 10).css('width', 10+'%');
                    alert($('.hglu').children('.glucides-span').text());
                    $(document).ready(function() {
                        var _data = 50;
                        
                        event.preventDefault();
                        var btn  = '.card-body-nutri';
                        console.log($('.small font-weight-bold').children()[0]);
                        set_glu_prog();
                        set_lip_prog();
                        set_prot_prog();
                    });
                    function set_distrib(){
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=glucides_pct" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                // var gl = data["0"]["glucides"];
                                // alert(gl);
                                var total_qte_glu = 0 ;
                                var total_rec_glu = 0;
                                data.forEach(item => {
                                    total_qte_glu  += parseFloat(item["Quantite(g)"]);
                                    total_rec_glu += parseFloat(item["Qte Rec"]);
                                })
                                var pct = (100 * total_qte_glu) / total_rec_glu ;
                                pct =pct>100?100:pct;
                                $(".glucides-span").text(pct+'%');
                                $(".glucides-bar").attr('aria-valuenow', pct).css('width', pct+'%');
                            }
                        });
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=glucides_pct" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                // var gl = data["0"]["glucides"];
                                // alert(gl);
                                var total_qte_glu = 0 ;
                                var total_rec_glu = 0;
                                data.forEach(item => {
                                    total_qte_glu  += parseFloat(item["Quantite(g)"]);
                                    total_rec_glu += parseFloat(item["Qte Rec"]);
                                })
                                var pct = (100 * total_qte_glu) / total_rec_glu ;
                                pct =pct>100?100:pct;
                                $(".glucides-span").text(pct+'%');
                                $(".glucides-bar").attr('aria-valuenow', pct).css('width', pct+'%');
                            }
                        });
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=glucides_pct" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                // var gl = data["0"]["glucides"];
                                // alert(gl);
                                var total_qte_glu = 0 ;
                                var total_rec_glu = 0;
                                data.forEach(item => {
                                    total_qte_glu  += parseFloat(item["Quantite(g)"]);
                                    total_rec_glu += parseFloat(item["Qte Rec"]);
                                })
                                var pct = (100 * total_qte_glu) / total_rec_glu ;
                                pct =pct>100?100:pct;
                                $(".glucides-span").text(pct+'%');
                                $(".glucides-bar").attr('aria-valuenow', pct).css('width', pct+'%');
                            }
                        });      
                    }
                    function set_glu_prog(){
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=glucides_pct" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                // var gl = data["0"]["glucides"];
                                // alert(gl);
                                var total_qte_glu = 0 ;
                                var total_rec_glu = 0;
                                data.forEach(item => {
                                    total_qte_glu  += parseFloat(item["Quantite(g)"]);
                                    total_rec_glu += parseFloat(item["Qte Rec"]);
                                })
                                var pct = (100 * total_qte_glu) / total_rec_glu ;
                                pct =pct>100?100:pct;
                                $(".glucides-span").text(pct+'%');
                                $(".glucides-bar").attr('aria-valuenow', pct).css('width', pct+'%');
                            }
                        });
                    }
                    function set_lip_prog(){
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=lipides_pct" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                // var gl = data["0"]["glucides"];
                                // alert(gl);
                                var total_qte = 0 ;
                                var total_rec = 0;
                                data.forEach(item => {
                                    total_qte  += parseFloat(item["Quantite(g)"]);
                                    total_rec += parseFloat(item["Qte Rec"]);
                                })
                                var pct = (100 * total_qte) / total_rec ;
                                pct = pct>100?100:pct;
                                $(".lipides-span").text(pct+'%');
                                $(".lipides-bar").attr('aria-valuenow', pct).css('width', pct+'%');
                            }
                        });
                    }
                    function set_prot_prog(){
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=proteines_pct" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                // var gl = data["0"]["glucides"];
                                // alert(gl);
                                var total_qte = 0 ;
                                var total_rec = 0;
                                data.forEach(item => {
                                    total_qte  += parseFloat(item["Quantite(g)"]);
                                    total_rec += parseFloat(item["Qte Rec"]);
                                })
                                var pct = (100 * total_qte) / total_rec ;
                                pct = pct>100?100:pct;
                                $(".proteines-span").text(pct+'%');
                                $(".proteines-bar").attr('aria-valuenow', pct).css('width', pct+'%');
                            }
                        });
                    }
                </script>
              
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>  