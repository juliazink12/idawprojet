<!--
    hey
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="">
    <!-- Import jquery before bootstrap-typehead -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <!-- Import Datatables after JQuery-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/date-1.1.2/r-2.2.9/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/date-1.1.2/r-2.2.9/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/datatables.min.js"></script>
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> 
    <script  src="https://cdn.datatables.net/plug-ins/1.11.5/dataRender/datetime.js"></script>
     
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
        <table id="example" class="display" style="width:100%">

            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                </tr>
            </thead>
        </table>
        <div class="row">  
            <div class="col-md-12 text-left">   
                <div> Sélectionnez un type</div>     
                <input class="typeahead form-control" style="width:300px;" type="text">  
            </div>  
        </div>  
    </table>
<script>

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
    // _span : globall
    var _span = 'all';
    function onFormSubmit() {
        event.preventDefault();
        // Test de sélection du type d'aliment
        var set_type = 1;
        var id_type = 0;
        var type = { SET_TYPE: set_type, ID_TYPE: id_type };
        ajaxSendIDType(type);
    }
    $(document).ready(function() {
        //Select the type of food item
        $('input.typeahead').typeahead({  
            source:  function (query, process) {  
            return $.get('../backend/aliments.php', { type: query }, function (data) {  
                    console.log(data);  
                    data = $.parseJSON(data);  
                    return process(data);  
                }); 
            }, 
            updater: function(item) {
            // updater is run after user click
                console.log(item);
            } 
        });
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });
        //Define 'Consommation' table
        var table_conso = $('#example').DataTable( {
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
                { data : "date"}
            ]
        });
        // Refilter the table
        $('#min, #max').on('change', function () {
            table_conso.draw();
        }); 

        
    } );

    function SendTimeSpan(btn){
        _span = $(btn).val();
        $('#example').DataTable().ajax.reload();               
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
</body>