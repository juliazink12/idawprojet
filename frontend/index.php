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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>  
    <title>Index</title>   
</head>
<body>
    <table cellspacing="5" cellpadding="5" border="0">
            <tbody><tr>
                <button class="button " value = "d" onclick = "SendTimeSpan(this)">Aujourd'hui</button>
                <button class="button " value = "w" onclick = "SendTimeSpan(this)">Semaine</button>
                <button class="button " value = "a" onclick = "SendTimeSpan(this)">Tout</button>
            </tr>
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
    // _span : variable globale contenant l'intervalle de temps sur lequel 
    // sélectionner les consommations
    var _span = 'a';
    function onFormSubmit() {
        event.preventDefault();
        // Test de sélection du type d'aliment
        var set_type = 1;
        var id_type = 0;
        var type = { SET_TYPE: set_type, ID_TYPE: id_type };
        ajaxSendIDType(type);
    }
    $(document).ready(function() {
        //ajaxGETAliments(); 
        // $('.advancedAutoComplete').autoComplete({
        //     resolver: 'custom',
        //     events: {
        //         search: function (qry, callback) {
        //             // let's do a custom ajax call
        //             $.ajax(
        //                 '../backend/aliments.php',
        //                 {
        //                     data: { 'type': qry}
        //                 }
        //             ).done(function (res) {
        //                 callback(res.results)
        //             });
        //         }
        //     }
        // });
        $('input.typeahead').typeahead({  
            source:  function (query, process) {  
            return $.get('../backend/aliments.php', { type: query }, function (data) {  
                    console.log(data);  
                    data = $.parseJSON(data);  
                    return process(data);  
                });  
            }  
        });  
        $('#example').DataTable( {
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
        })

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