<!--
    hey
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <title>Index</title>
    <link rel="shortcut icon" href="">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/sp-2.0.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/sp-2.0.0/datatables.min.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap Autocomplete Plugin -->
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>
    
</head>
<body>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Aliment</th>
            </tr>
        </thead>
    </table>
    <form id="addConsoForm" action="" onsubmit="onFormSubmit();">
        <label for="inputTypeID" class="col-sm-2 col-form-label">Type ID</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="inputTypeID">
        </div>
        <button type="submit" class="btn btn-primary form-submit">Submit</button>
    </form>
 <script> 
    function onFormSubmit() {
            event.preventDefault();
            // TODO variables from click
            var set_type = 1;
            var id_type = 0;
            var type = { SET_TYPE: set_type, ID_TYPE: id_type };
            ajaxSendIDType(type);
        }
    $(document).ready(function() {
        //ajaxGETAliments(); 
        $('#example').DataTable( {
            "processing": true,
            //"serverSide": true,
            "ajax": {
                "url": "../backend/aliments.php",
                "type": "POST",
                "pageLength": 20,
                "dataSrc": function ( json ){
                    return json;
                }
            },
            "columns": [
                { "data": "nom" }
            ]
        } );
    } );
    
    function ajaxGETAliments(){  
        $.ajax({
            url:"../backend/aliments.php",
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
    function ajaxAddConso(conso){
        $.ajax({
            url: "consommation.php",
            method: "POST",
            dataType: "json",
            data: user
        })
        .done(function () {
        })         
        .fail(function (error) {
            alert("Query was unsuccessful. Info : " + JSON.stringify(error));
        })
        .always(function () {
            //alert("Query finished.");
        });
                
    }
    function ajaxRemoveConso(id){
        $.ajax({
            url: "users.php" + "?id=" + id ,
            method: "DELETE",
        })
        .done(function () {
            alert("User deleted.");  
        })
        .fail(function (error) {
            alert("Query was unsuccessful. Info : " + JSON.stringify(error));
        })
        .always(function () {
            alert("Query finished.");
        });
                    
    }
    function ajaxEditConso(user,id) {
        $.ajax({
            url: "users.php" + "?id=" + id + 
            "&lastname=" + user['LASTNAME']+
            "&firstname=" + user['FIRSTNAME']+
            "&birthday=" + user['BIRTHDAY']+
            "&likes=" + user['LIKES']+
            "&remarks=" + user['REMARKS'],
            method: "PUT",
        })
        .done(function (res) {
            //alert("User Updated." + res);
        })
        .fail(function (error) {
            alert("Query was unsuccessful. Info : " + JSON.stringify(error));
        })
        .always(function () {
            //alert("Query finished.");
        });
    }
    function ajaxSendIDType(type){
        $.ajax({
            url: "../backend/aliments.php" + 
            "?set_type=" + type['SET_TYPE'] +
            "&id_type=" + type['ID_TYPE'] ,
            method: "GET",
        })
        .done(function (data) {
            console.log(data);
        })         
        .fail(function (error) {
            alert("Query was unsuccessful. Info : " + JSON.stringify(error));
        })
        .always(function () {
            //alert("Query finished.");
        });        
    }
    function addConsoIntoHTMLTable(conso){
            $("#exemple").append(`
            <tr><td>${conso['aliment_n']}</td>
            <td>
                <button class="button delete" onclick = "deleteUser(this)">Delete</button>
                <button class="button " value = "Add" onclick = "EditMode(this)">Edit</button>
            </td></tr>`);
    }    
 </script>   
</body>