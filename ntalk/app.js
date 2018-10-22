var express = require("express"),
  consign = require("consign"),
  morgan = require("morgan"),
  bodyParser = require("body-parser"),
  methodOverride = require("method-override"),
  cookieParser = require("cookie-parser"),
  session = require("express-session"),
  path = require("path"),
  error = require("./middleware/error"),
  app = express(),
  server = require("http").createServer(app),
  io = require("socket.io").listen(server);

app.use(morgan("dev"));

app.use(bodyParser.json({ type: "application/*+json" }));
app.use(bodyParser.urlencoded({ extended: true }));

const KEY = 'ntalk.sid', SECRET = 'ntalk';
var cookie = cookieParser(SECRET)
, store = new session.MemoryStore()
, sessOpts = {secret: SECRET, key: KEY, store: store, resave: false, saveUninitialized: true}
// , session = session(sessOpts);

app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
app.use(cookieParser("ntalk"));
app.use(session(sessOpts));
app.use(cookie);
app.use(express.static(__dirname + "/public"));

io.set('authorization', function(data, accept) {
  cookie(data, {}, function(err) {
  var sessionID = data.signedCookies[KEY];
  store.get(sessionID, function(err, session) {
  if (err || !session) {
  accept(null, false);
  } else {
  data.session = session;
  accept(null, true);
  }
  });
  });
  });
consign({ cwd: path.join(__dirname, ".") })
  .include("models")
  .then("controllers")
  .then("routes")
  .into(app);

  consign({ cwd: path.join(__dirname, ".") })
  .include('sockets')
  .into(io);

app.use(methodOverride("_method"));
app.use(error.notFound);
app.use(error.serverError);

// io.sockets.on("connection", function(client) {
//   client.on("send-server", function(data) {
//     var msg = "<b>" + data.nome + ":</b> " + data.msg + "<br>";
//     client.emit("send-client", msg);
//     client.broadcast.emit("send-client", msg);
//   });
// });
//server.listen(4000);
app.listen(3000, function() {
  console.log("Ntalk no ar.");
});
