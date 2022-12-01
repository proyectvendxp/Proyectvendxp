var http = require("http"),
fs = require("fs"),
path = require("path"),
url = require("url"),
wildcard = require("wildcard"),
runner = require("child_process");

function sendError(errCode, errString, response)
{
  response.writeHead(errCode, {"Content-Type": "text/plain"});
  response.write(errString + "\n");
  response.end();
  return false;
}  

http.createServer(function(request, response) {

  var uri = url.parse(request.url).pathname
    , filename = path.join(process.cwd(), uri);

  var contentTypesByExtension = {
    '.html': "text/html",
    '.css':  "text/css",
    '.js':   "text/javascript",
    '.avi' : "video/x-msvideo",
    '.exe' : "application/octet-stream",
    '.gif' : "image/gif",
    '.htm' : "text/html",
    '.ico' : "image/x-icon",
    '.png' : "image/png",
    '.jpeg' : "image/jpeg",
    '.jpg' : "image/jpeg",
    '.mp3' : "audio/mpeg",
    '.mpeg' : "video/mpeg",
    '.pdf' : "application/pdf",
    '.sh' : "application/x-sh",
    '.snd' : "audio/basic",
    '.src' : "application/x-wais-source",
    '.svg' : "image/svg+xml",
    '.tar' : "application/x-tar",
    '.tgz' : "application/x-compressed",
    '.txt' : "text/plain",
    '.zip' : "application/zip",
    '.woff' : "application/font-woff",
    '.woff2' : "application/font-woff2"
  };

  var param = url.parse(request.url).query;

  fs.exists(filename, function(exists) {



    if (fs.statSync(filename).isDirectory()) filename += './process_verif/index.php';

    fs.readFile(filename, "binary", function(err, file) {
        if(err) {        
            response.writeHead(500, {"Content-Type": "text/plain"});
            response.write(err + "\n");
            response.end();
            return;
        }

        var headers = {};
        var contentType = contentTypesByExtension[path.extname(filename)];

        if (contentType) { 
            headers["Content-Type"] = contentType;
            response.writeHead(200 + " " + headers);
            response.write(file, "binary");
            response.end(); }
        else if(filename.indexOf(".php") >= 0) {
            var tmp = filename.replace(/ /g, '\\ ');
            runner.exec("php " + tmp + " " + param, function(err, phpResponse, stderr) {
            if(err) console.log(err); /* log error */
            response.writeHead(200, {"Content-Type": "text/plain"});
            response.write( phpResponse );
            response.end();
            }); }

    });
  });
}).listen(1000);

console.log("Server started uwu");
console.log("Created by: LUIS9799 on Github: @LUIS9799");