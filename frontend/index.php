<!--
    hey
-->
<!doctype html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <title>Index</title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/sp-2.0.0/datatables.min.css"/>
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/sp-2.0.0/datatables.min.js"></script>
</head>
<body>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Aliment</th>
            </tr>
        </thead>
    </table>
 <script>
    
    $(document).ready(function() {
        // ajaxGETAliments(); 
        $('#example').DataTable( {
            "processing": true,
            //"serverSide": true,
            "ajax": {
                "url": "../backend/aliments.php",
                "type": "POST",
                "pageLength": 20,
                "dataSrc": function ( json ){alert(json);
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
    function ajaxAddUser(user){
        $.ajax({
            url: "users.php",
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
    function ajaxRemoveUser(id){
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
    function ajaxEditUser(user,id) {
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
    function addAlimentIntoHTMLTable(aliment){
            $("#exemple").append(`
            <tr><td>${user['LASTNAME']}</td>
            <td>${user['FIRSTNAME']}</td>
            <td>${user['BIRTHDAY']}</td>
            <td>${user['LIKES']}</td>
            <td>${user['REMARKS']}</td>
            <td>
                <button class="button delete" onclick = "deleteUser(this)">Delete</button>
                <button class="button " value = "Add" onclick = "EditMode(this)">Edit</button>
            </td></tr>`);
    }    
 </script>   
</body>