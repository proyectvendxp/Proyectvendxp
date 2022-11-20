let http = require('http');
let static = require('node-static');
let fileServer = new static.Server('./client');
let fs = require('fs');

let uploads = Object.create(null);

function onUpload(req, res) {
  let fileId = req.headers['x-file-id'];
  let startByte = +req.headers['x-start-byte'];

  if (!fileId) {
    res.writeHead(400, "No file id");
    res.end();
  }

  let filePath = './upload/files';

  if (!uploads[fileId]) uploads[fileId] = {};
  let upload = uploads[fileId];
  let fileStream;

  if (!startByte) {
    upload.bytesReceived = 0;
    fileStream = fs.createWriteStream(filePath+"/"+fileId, {
      flags: 'w'
    });
  } else {
    if (upload.bytesReceived != startByte) {
      res.writeHead(400, "Error");
      res.end(upload.bytesReceived);
      return;
    }
    fileStream = fs.createWriteStream(filePath+"/"+fileId, {
      flags: 'a'
    });
  }


  req.on('data', function(data) {
    upload.bytesReceived += data.length;
  });
  req.pipe(fileStream);

  fileStream.on('close', function() {
    if (upload.bytesReceived == req.headers['x-file-size']) {
      console.log("done");
      delete uploads[fileId];

     //file done

      res.end("Success " + upload.bytesReceived);
    } else {
      // connection lost, we still have the unfinished file
      res.end();
    }
  });

  // error
  fileStream.on('error', function(err) {
    console.log(err);
    res.writeHead(500, "File error");
    res.end();
  });

}
//status
function onStatus(req, res) {
  let fileId = req.headers['x-file-id'];
  let upload = uploads[fileId];
  if (!upload) {
    res.end("0")
  } else {
    res.end(String(upload.bytesReceived));
  }
}

//handle reqss
function accept(req, res) {
  if (req.url == '/status') {
    onStatus(req, res);
  } else if (req.url == '/upload' && req.method == 'POST') {
    onUpload(req, res);
  } else {
    fileServer.serve(req, res);
  }

}


  http.createServer(accept).listen(8080);
  console.log('Server listening at port 8080');