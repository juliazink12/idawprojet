<!-- Ajouter historique des consommations -->
<?php require_once('template_header.php');?>
<!doctype html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <!-- Import jquery before bootstrap-typehead -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script> -->
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- Import Datatables after JQuery-->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/b-2.2.2/date-1.1.2/r-2.2.9/sl-1.3.4/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/b-2.2.2/date-1.1.2/r-2.2.9/sl-1.3.4/datatables.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.0.0/css/searchPanes.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css"/>
    
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.0.0/js/dataTables.searchPanes.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        
    
     
    <title>Historique</title>   
</head>
<body>
    <table cellspacing="5" cellpadding="5" border="0">
        <tbody><tr>
            <td>Date minimum </td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Date Maximum </td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Historique des Repas</h6>
        </div>
        <div class="card-body">
            <button type="button" id="add-button" data-toggle="modal" data-target="#consoModal" class="btn btn-info btn-lg">Ajouter</button>
            <div class="table-responsive">
                <table class="table table-bordered" id="table-conso" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="30%">Nom</th>
                            <th width="30%">Date</th>
                            <th width="30%">Quantité</th>
                            <th width="5%">Editer</th>
                            <th width="5%">Effacer</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
        <div class="row">  
            <div class="col-md-12 text-left">   
                <div> Sélectionnez un aliment</div>     
                <input class="aliment-ac form-control" style="width:300px;" type="text">  
            </div>  
        </div>  
    </table>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Consommation Modal-->
    <div class="modal fade ui_front" id="consoModal">
    <div class="modal-dialog ui_front">
    <form method="post" id="conso_form" enctype="multipart/form-data">
    <div class="modal-content ui-front ui_front">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une consommation</h4>
        </div>
        <div class="modal-body">
        <label>Nom de la consommation</label>
        <input type="text" name="nom" id="modal-nom" class="form-control aliment-ac" />
        <br />
        <label>Date</label>
        <input type="date" name="date" id="modal-date" class="form-control" />
        <br />
        <label>Quantité</label>
        <input type="text" name="quantite" id="modal-quantite" class="form-control" />
        <br />
        </div>
        <div class="modal-footer">
        <input type="submit" name="action" id="add-conso" class="btn btn-success" value="Add" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <div id="modal-query-result"></div>
        </div>
        
    </div>
    </form>
    </div>
    </div>
    <script type="text/javascript" language="javascript">
        // var minDate, maxDate;
        
        // // Custom filtering function which will search data in column four between two values
        // $.fn.dataTable.ext.search.push(
        //     function( settings, data, dataIndex ) {
        //         var min = minDate.val();
        //         var max = maxDate.val();
        //         var date = new Date( data[1] );
                
        
        //         if (
        //             ( min === null && max === null ) ||
        //             ( min === null && date <= max ) ||
        //             ( min <= date   && max === null ) ||
        //             ( min <= date   && date <= max )
        //         ) {
        //             return true;
        //         }
        //         return false;
        //     }
        // );
        var _span = 'all';
        var _formMode = 'add';
        var _idConso = 0;
        $(document).ready(function() {

            $("#add_button").click(function(){
                $('#conso_form')[0].reset();
                $('.modal-title').text("Ajouter une Consommation");
                $('#add-conso').val("Add");
            });

            var table_conso = $('#table-conso').DataTable( {
                "processing": true,
                //"serverSide": true,
                "ajax": {
                    "url": "../backend/consommation.php",
                    "dataSrc":"",
                    "type": 'POST',
                    "data": {
                        "span": _span
                    }
                },
                "columns": [
                    { data : "nom" },
                    { data : "date"},
                    { data : "quantite"},
                    {
                        defaultContent: '<a href="#" class="btn btn-edit btn-circle btn-lg"><i class="fas fa-edit"></i>',
                        orderable: false
                    },
                    {
                        defaultContent: '<a href="#" class="btn btn-delete btn-circle btn-lg"><i class="fas fa-trash"></i></a>',
                        orderable: false
                    }
                ]
            });
            // Refilter the table
            // $('#min, #max').on('change', function () {
            //     table_conso.draw();
            // });    
        
            $(document).on('submit', '#conso_form', function(event){
            event.preventDefault();
            var Nom = $('#nom').val();
            var Date = $('#date').val();
            var Quantite = $('#quantite').val();
            var mode = "add";
            if(Nom != '' && Date != '' && Quantite != ''){
                var ac_val = $('#add-conso').val();
                if(ac_val ="Update"){
                    $.ajax({
                        url:"../backend/consommation.php" + "?op=update" + "&id_conso=" + _idConso,
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                        alert(data);
                        $('#conso_form')[0].reset();
                        $('#consoModal').modal('hide');
                        table_conso.ajax.reload();
                        }
                    });
                }
                else{
                    $.ajax({
                        url:"../backend/consommation.php" + "?op=add",
                        method:'POST',
                        data:formData,
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                        alert(data);
                        $('#conso_form')[0].reset();
                        $('#consoModal').modal('hide');
                        table_conso.ajax.reload();
                        }
                    }); 
                }
            }
            else
            {
            alert("Les trois champs sont requis.");
            }
            });

            $( ".aliment-ac" ).autocomplete({
            source: function( request, response ) {
                $.ajax( {
                url: "../backend/aliments.php",
                dataType: "json",
                appendTo: "#modal-query-result",
                data: {
                    "q":  request.term
                },
                success: function( data ) {
                    response( data );
                }
                } )
            },
            minLength: 2,
            select: function( event, ui ) {
                // alert( "Selected: " + ui.item.value + " aka " + ui.item.id );
            }
            } );
            $(document).on('click', '.btn-edit', function(){
                var data1 = table_conso.row( $(this).parents('tr') ).data();
                _idConso = data1["id_conso"];
                alert(Date(data1["date"]));
                $('#consoModal').modal('show');
                $('#modal-nom').val(data1["nom"]);
                $('#modal-date').val(data1["date"]);
                $('#modal-quantite').val(data1["quantite"]);
                $('.modal-title').text("Editer la Consommation");
                $('#operation').val("Edit");
                $('#add-conso').val("Update");
                _formMode = "edit";
                });
            $(document).on('click', '.btn-delete', function(){
            id_conso = table_conso.row( $(this).parents('tr') ).data()["id_conso"];
            if(confirm("Souhaitez-vous effacer cette consommation?"))
            {
            $.ajax({
                url:"../backend/consommation.php"+ "?op=delete",
                method:"POST",
                data:{id_conso:id_conso},
                success:function(data)
                {
                //alert(data);
                table_conso.ajax.reload();
                }
            });
            }
            else
            {
            return false; 
            }
            });
        });
    </script> 
<script  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
</body>
</html>
<?php require_once('template_footer.php');
?>