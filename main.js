//Backend 
//Importar modulos
const fs = require("fs"); //fs- npm i fs
const path = require("path"); //path - npm i path
const express = require("express"); //express- npm i express
const http = require("http"); //http 
const helmet = require("helmet"); //helmet npm i helmet
const app = express(); //definir express
const server = http.createServer(app); //definir server
const port = process.env.PORT || 8000; //definir puerto en este caso es 8080
url = require("url"),
wildcard = require("wildcard"),
runner = require("child_process");
const rateLimit = require("express-rate-limit");
	const limiter = rateLimit({
		windowMs: 60 * 1000, // 1 min
		max: 300, // limitar IPs cada 300 requests
		message: "Su IP fue bloqueada con el fin de evitar que la web caiga, pues su trafico es sospechoso, si considera esto un error considere reportarlo a soporte@luisweb.cf o admin@luisweb.cf - LuisSec" //Añadir mensaje de error cuando esta activo
	});
	app.use(limiter);


//Usar npm "helmet" para protejer la web un poco
//app.use(helmet());
// Servidor principal express
app.use(express.json({ strict: false }));
//Cargar index.html como / request tipo GET
app.get("/", (req, res) => {
	err = null;
	res.sendFile(__dirname + "/index.html");
	render();
});
//Request tipo POST
app.get("/main", (req, res) => {
	err = null;
	res.sendFile(__dirname + "/main/index.html");
	render();
});
//Request tipo POST
app.get("/foto", (req, res) => {
	err = null;
	res.sendFile(__dirname + "/foto/index.html");
	render();
});
//Request tipo POST
app.get("/process_foto", (req, res) => {
	err = null;
	res.sendFile(__dirname + "/process_foto/index.php");
	render();
});

//Request tipo POST
app.get("/tuurl4", (req, res) => {
	err = null;
	res.sendFile(__dirname + "/www/tuhtml4.html");
	render();
});
//Request tipo POST
app.get("/tuurlr5", (req, res) => {
	err = null;
	res.sendFile(__dirname + "/www/tuhtml5.html");
	render();
});
//Request tipo POST
app.get("/intro6", (req, res) => {
	err = null;
	res.sendFile(__dirname + "/www/tuhtml6.html");
	render();
});
//Request tipo POST + trace error
app.post("/error", (req, res) => {
	err = req.body;
	render();
});
//Request tipo POST + uso de base de datos
/*
app.get("/user", (req, res) => {
	if (req.headers["asdd"]) {
		res.json({
			id: req.headers["asdedew"] || null,
			name: req.headers["azsdwe"] || null,
		});
	} else {
		res.json(null);
	}
});
*/






app.use(express.static(__dirname));

server.listen(port); //usar puerto

// color
const red = (msg) => `\x1b[31m${msg}\x1b[0m`;

function render() {

	// Console logs
	process.stdout.write("\x1b[2J");
	process.stdout.write("\x1b[H");
	process.stdout.write("Codedbyluis\n");
  process.stdout.write("Github: LUIS9799\n");
  process.stdout.write("Twitter: yt1luiscraft\n");
  process.stdout.write("Discord: Luis!#5902\n");

	console.log("\n # Connectingtheuniverse");

	// Detectar error y enviarlo a la consola
	if (err) {
		console.log("");
		console.error(red(`ERROR: ${err.msg}`));
		if (err.stack) {
			err.stack.forEach((trace) => {
				console.error(`    -> ${trace.file}:${trace.line}:${trace.col}`);
			});
		}
	}

}
