<!--
    hey
-->
<?php
    require_once('template_header.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="">
    <!-- Import jquery before bootstrap-typehead -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->
    <!-- Import Datatables after JQuery-->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/date-1.1.2/r-2.2.9/sp-2.0.0/sl-1.3.4/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/date-1.1.2/r-2.2.9/sp-2.0.0/sl-1.3.4/datatables.min.js"></script>-->
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
    <!-- <script src="js/dataTables.altEditor.free.js" ></script> -->
     
    <title>Index</title>   
</head>
<body>
    <table cellspacing="5" cellpadding="5" border="0">
        <tbody><tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody>
        <div class="table-responsive">
        <table id="conso" class="table table-bordered table-striped">
        <div align="center">
        <button type="button" id="add_button" data-toggle="modal" data-target="#consoModal" class="btn btn-info btn-lg">Ajouter</button>
        </div>
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
        <div class="row">  
            <div class="col-md-12 text-left">   
                <div> Sélectionnez un type</div>     
                <input class="typeahead form-control" style="width:300px;" type="text">  
            </div>  
        </div>  
  
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
     <input type="submit" id="submitButton"/>
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
</body>
</html>
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
    // function onFormSubmit() {
    //     event.preventDefault();
    //     // Test de sélection du type d'aliment
    //     var set_type = 1;
    //     var id_type = 0;
    //     var type = { SET_TYPE: set_type, ID_TYPE: id_type };
    //     ajaxSendIDType(type);
    // }
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
        var table_conso = $('#conso').DataTable( {
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
                    data: null,
                    className: "dt-center editor-edit",
                    defaultContent: '<i class="fa fa-pencil"/>',
                    orderable: false
                },
                {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: '<i class="fa fa-trash"/>',
                    orderable: false
                }
            ]
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
    function SendTimeSpan(btn){
        _span = $(btn).val();
        $('#conso').DataTable().ajax.reload();               
    }
    function ajaxGETAliments(){  
        $.ajax({
            url:"../backend/aliments.php" + "?type=eau",
            method:"GET"})
        .done(function (data) {    
            alert(data);    
            return data;
        })
        .fail(function (error) {
            alert("Query was unsuccessful. Info: " + JSON.stringify(error));
        })
        .always(function () {
            alert("Query finished.");                
        });            
    }
    // function ajaxAddConso(conso){
    //     $.ajax({
    //         url: "consommation.php",
    //         method: "POST",
    //         dataType: "json",
    //         data: user
    //     })
    //     .done(function () {
    //     })         
    //     .fail(function (error) {
    //         alert("Query was unsuccessful. Info : " + JSON.stringify(error));
    //     })
    //     .always(function () {
    //         //alert("Query finished.");
    //     });
                
    // }
    // function ajaxRemoveConso(id){
    //     $.ajax({
    //         url: "users.php" + "?id=" + id ,
    //         method: "DELETE",
    //     })
    //     .done(function () {
    //         alert("User deleted.");  
    //     })
    //     .fail(function (error) {
    //         alert("Query was unsuccessful. Info : " + JSON.stringify(error));
    //     })
    //     .always(function () {
    //         alert("Query finished.");
    //     });
                    
    // }
    // function ajaxEditConso(user,id) {
    //     $.ajax({
    //         url: "users.php" + "?id=" + id + 
    //         "&lastname=" + user['LASTNAME']+
    //         "&firstname=" + user['FIRSTNAME']+
    //         "&birthday=" + user['BIRTHDAY']+
    //         "&likes=" + user['LIKES']+
    //         "&remarks=" + user['REMARKS'],
    //         method: "PUT",
    //     })
    //     .done(function (res) {
    //         //alert("User Updated." + res);
    //     })
    //     .fail(function (error) {
    //         alert("Query was unsuccessful. Info : " + JSON.stringify(error));
    //     })
    //     .always(function () {
    //         //alert("Query finished.");
    //     });
    // }
    /*
    *** Test de sélection du type d'aliment *** 
    */
    // function onFormSubmit() {
    //     event.preventDefault();
    //     
    //     var set_type = 1;
    //     var id_type = 0;
    //     var type = { SET_TYPE: set_type, ID_TYPE: id_type };
    //     ajaxSendIDType(type);
    // }
    // function ajaxSendIDType(type){
    //     $.ajax({
    //         url: "../backend/aliments.php" + 
    //         "?set_type=" + type['SET_TYPE'] +
    //         "&id_type=" + type['ID_TYPE'] ,
    //         method: "GET",
    //     })
    //     .done(function (data) {
    //         console.log(data);
    //     })         
    //     .fail(function (error) {
    //         alert("Query was unsuccessful. Info : " + JSON.stringify(error));
    //     })
    //     .always(function () {
    //         //alert("Query finished.");
    //     });        
    // }   
    </script>   
<?php
    require_once('template_footer.php');
?>