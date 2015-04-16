<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konvertor latinice u ћирилицу i ћирилице u latinicu</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!-- My theme modification -->
    <link href="css/theme.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class='container'>
    <div class='row'>
        <div class="page-header">
            <h1>Convertor latinice u ћирилицу i ћирилице u latinicu</h1>
            <!-- <hr> -->
            <h3><hr>-----Alat za konverziju srpskohrvatskih pisama--Pismo se automatski detektuje--Moguće je zadržati latinični tekst unutar ćiriličnog-----<hr></h3>
        </div>
        <div class="row" id="app">
            <textarea class="form-control" rows="6" id="textToConvert">  Дубровчанин, capitaneus turmae Damianius Gotius, тражио надокнаду од девет стотина либри гламског сребра, јер га је маглена bestia јако осакатила in lo regno di Rassa - одгризавши му шести прст, незаменљив приликом лажног размеравања платна.</textarea>
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="checkbox">Zadrži latinske citate
                </label>
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="button" id="convert">Go!</button>
        </div>
    </div>
</div>
<div class="row" >
    <div id="mainLink">
    <a href='http://halbstar.url.ph'><img src="favicon.png" alt="Go to Halbstars Blog" title= "Visit Halbstars Blog. Leave comment or report a problem with this project." height="80" width="80"></a>
        </div>
</div>
<?php
include_once "scripts/ServerData.php";
$s = new ServerData();

echo "<script>var serverReq = ".json_encode($s->getServerDataArr())."</script>";
?>
<script>
    $(document).ready(function(){
        $("#convert").click(function(){
            var text = $("#textToConvert").val();
            $.ajax({
                url:"scripts/ajax.php",
                type:"POST",
                data: {inputText : text, serverReq : serverReq},
                dataType: "html",
                success:function(result){
                }});
            var convertLat = ($('#checkbox').is(':checked'));
            $("#textConverted").remove();

            text = convert(text, !convertLat);
            $("#app").append("<textarea class=\"form-control\" rows=\"6\" id=\"textConverted\">" + text + "</textarea>")


        });
    });

</script>




<script src="js/convertor.js"></script>

</body>
</html>