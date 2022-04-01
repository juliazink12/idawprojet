<!-- Ajouter historique des consommations -->
<?php require_once('template_header.php');?>
<!doctype html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="">
    <!-- Import jquery before bootstrap-typehead -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
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
    <!-- Import altEditorFree before momentjs and after Datatable-->
    <script src="js/dataTables.altEditor.free.js">
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
            <button type="button" id="add_button" data-toggle="modal" data-target="#consoModal" class="btn btn-info btn-lg">Ajouter</button>
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
                <div> Sélectionnez un type</div>     
                <input class="typeahead form-control" style="width:300px;" type="text">  
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
                        <span aria-hidden="true">×</span>
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

    <div class="modal fade" id="consoModal">
    <div class="modal-dialog">
    <form method="post" id="conso_form" enctype="multipart/form-data">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter une consommation</h4>
        </div>
        <div class="modal-body">
        <label>Nom de la consommation</label>
        <input type="text" name="nom" id="nom" class="form-control" />
        <br />
        <label>Date</label>
        <input type="date" name="date" id="date" class="form-control" />
        <br />
        <label>Quantité</label>
        <input type="text" name="quantite" id="quantite" class="form-control" />
        <br />
        </div>
        <div class="modal-footer">
        <input type="hidden" name="id_conso" id="id_conso" />
        <input type="hidden" name="operation" id="operation" />
        <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
    </div>
    </form>
    </div>
    </div>
    <script type="text/javascript" language="javascript">
        var minDate, maxDate;
    
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[1] );
                
        
                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );
        var _span = 'all';

        $(document).ready(function() {
            // // Add Consommation
            // $('#add_button').click(function(){
            // $('#conso_form')[0].reset();
            // $('.modal-title').text("Ajouter une Consommation");
            // $('#action').val("Add");
            // $('#operation').val("Add");
            // });
            // //Select the type of food item
            // $('input.typeahead').typeahead({  
            //     source:  function (query, process) {  
            //     return $.get('../backend/aliments.php', { type: query }, function (data) {  
            //             console.log(data);  
            //             data = $.parseJSON(data);  
            //             return process(data);  
            //         }); 
            //     }, 
            //     updater: function(item) {
            //     // updater is run after user click
            //         console.log(item);
            //     } 
            // });
            //Test modal

            $(document).ready(function(){
                $("#submitButton").click(function(){
                    $("#myModal").modal();
                });
            });
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });
            //Define 'Consommation' table
            var columnDefs = [
                    { data : "nom" },
                    { data : "date"},
                    { data : "quantite"}
                ]
            var table_conso = $('#table-conso').DataTable( {
                "processing": true,
                //"serverSide": true,
                "ajax": {
                    url: "../backend/consommation.php",
                    dataSrc:"",
                    type: 'POST',
                    data: {
                        "span": _span
                    }
                },
                columns: columnDefs,
                dom: 'Bfrtip',        // Needs button container
                select: 'single',
                responsive: true,
                altEditor: true,     // Enable altEditor
                buttons: [
                    {
                        text: 'Add',
                        name: 'add'        // do not change name
                    },
                    {
                        extend: 'selected', // Bind to Selected row
                        text: 'Edit',
                        name: 'edit'        // do not change name
                    },
                    {
                        extend: 'selected', // Bind to Selected row
                        text: 'Delete',
                        name: 'delete'      // do not change name
                    },
                    {
                        text: 'Refresh',
                        name: 'refresh'      // do not change name
                    }
                ],
            });
            // Refilter the table
            $('#min, #max').on('change', function () {
                table_conso.draw();
            }); 

            
        } );
        $(document).on('submit', '#conso_form', function(event){
        event.preventDefault();
        var Nom = $('#nom').val();
        var Date = $('#date').val();
        var Quantite = $('#quantite').val();
        if(Nom != '' && Date != '' && Quantite != '')
        {
        $.ajax({
            url:"../backend/consommation.php",
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
        else
        {
        alert("Les trois champs sont requis.");
        }
        });
        
        $(document).on('click', '.update', function(){
        var conso_id = $(this).attr("id");
        $.ajax({
        url:"../backend/consommation.php",
        method:"PUT",
        data:{id_conso:id_conso},
        dataType:"json",
        success:function(data)
        {
            $('#consoModal').modal('show');
            $('#nom').val(data.nom);
            $('#date').val(data.date);
            $('#quantite').val(data.quantite);
            $('.modal-title').text("Editer la Consommation");
            $('#id_conso').val(id_conso);
            $('#action').val("Edit");
            $('#operation').val("Edit");
        }
        })
        });
        $(document).on('click', '.delete', function(){
        var id_conso = $(this).attr("id");
        if(confirm("Are you sure you want to delete this?"))
        {
        $.ajax({
            url:"../backend/consommation.php",
            method:"DELETE",
            data:{id_conso:id_conso},
            success:function(data)
            {
            alert(data);
            table_conso.ajax.reload();
            }
        });
        }
        else
        {
        return false; 
        }
        });
    </script> 
<script  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
</body>
</html>
<?php require_once('template_footer.php');
?>