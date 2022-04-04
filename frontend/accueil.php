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
                                    <div class=" pt-4 pb-2">
                                        <canvas id="nutriPieChart"></canvas>
                                    </div>
                                    <!-- <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Consommées
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Restantes
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Excès
                                        </span>
                                    </div> -->
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
                    <div class="row">

                        <!-- <div class="col-xl-3 col-md-6 mb-4">
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
                        </div> -->

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-success  glucides-titre mb-1">
                                                Glucides(g)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 glucides-val">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-l font-weight-bold text-success proteines-titre mb-1">
                                                Protéines(g)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 proteines-val">0</div>
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
                                            <div class="text-l font-weight-bold text-success lipides-titre mb-1">
                                                Lipides(g)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 lipides-val ">0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>
                <!-- /.container-fluid -->
                <script>
                    var _span = 'week';
                    $('.hglu').children(".glucides-span").text(10+'%');
                    // $('').children(".glucides-bar").attr('aria-valuenow', 10).css('width', 10+'%');
                    // alert($('.hglu').children('.glucides-span').text());
                    $(document).ready(function() {
                        var _data = 50;
                        
                        event.preventDefault();
                        set_glu_prog();
                        set_lip_prog();
                        set_prot_prog();
                        set_glu_raw();
                        set_prot_raw();
                        set_lip_raw();
                        set_distrib();

                    });
                    function addData(chart, label, data) {
                        chart.data.labels.push(label);
                        chart.data.datasets.forEach((dataset) => {
                            dataset.data.push(data);
                        });
                        chart.update();
                    }

                    function removeData(chart) {
                        chart.data.labels.pop();
                        chart.data.datasets.forEach((dataset) => {
                            dataset.data.pop();
                        });
                        chart.update();
                    }

                    function set_glu_raw(){
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=glu_raw" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                var val = 0;
                                val = parseFloat(data["0"]["glucides"]);
                                $(".glucides-val").text(val);
                            }
                        });
                    };
                    function set_prot_raw(){
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=prot_raw" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                var val_ = 0;
                                val = parseFloat(data["0"]["proteines"]);
                                $(".proteines-val").text(val);
                            }
                        });
                    };
                    function set_lip_raw(){
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=lip_raw" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {

                                var val = 0;
                                val = parseFloat(data["0"]["lipides"]);
                                $(".lipides-val").text(val);
                            }
                        });
                    };
                    function set_distrib(){
                        $.ajax({
                            url:"../backend/statistiques.php" + "?type_stat=distrib" ,
                            method:'GET',
                            data:"",
                            dataType: 'json',
                            success:function(data)
                            {
                                var glu = parseFloat(data["0"]["nutriments"]);
                                var prot = parseFloat(data["1"]["nutriments"]);
                                var lip = parseFloat(data["2"]["nutriments"]);
                                var sum = glu + prot + lip;
                                glu_dist = Math.round((glu/sum)*100)/100;
                                prot_dist = Math.round((prot/sum)*100)/100;
                                lip_dist = Math.round((lip/sum)*100)/100;
                                alert(lip_dist);
                                nutriPieChart.data.datasets[0].data = [glu_dist,prot_dist,lip_dist];
                                nutriPieChart.update();
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
                                pct = pct>100?100:Math.round(pct*100)/100;
                                $(".glucides-span").text(pct+'%');
                                $(".glucides-bar").attr('aria-valuenow', pct).css('width', pct+'%');
                            }
                        });
                    };
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
                                pct = pct>100?100:Math.round(pct*100)/100;
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
                                pct = pct>100?100:Math.round(pct*100)/100;
                                $(".proteines-span").text(pct+'%');
                                $(".proteines-bar").attr('aria-valuenow', pct).css('width', pct+'%');
                            }
                        });
                    }
                    // // Set new default font family and font color to mimic Bootstrap's default styling
                    // Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    // Chart.defaults.global.defaultFontColor = '#858796';

                    // Pie Chart 
                    var ctx = document.getElementById("nutriPieChart");
                    var nutriPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ["Glucides", "Proteines", "Lipides"],
                        datasets: [{
                        data: [55, 30, 15],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                        hoverOffset: 4
                        }],
                        }
                    });
                </script>
              
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>   -->
    