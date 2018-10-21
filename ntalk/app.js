var express = require("express"),
  consign = require("consign"),
  morgan = require("morgan"),
  bodyParser = require("body-parser"),
  // cookieParser = require("cookie-parser"),
  session  = require("express-session"),
  path = require("path"),
  app = express();

app.use(morgan("dev"));

app.use(bodyParser.json({ type: 'application/*+json' }));
app.use(bodyParser.urlencoded({ extended: true }));
app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
// app.use(cookieParser("ntalk"));
app.use(session({
  secret: 'ntalk',
  resave: false,
  saveUninitialized: true
}));


app.use(express.static(__dirname + "/public"));
// module.exports = app;

consign({ cwd: path.join(__dirname, ".") })
  .include("models")
  .then("controllers")
  .then("routes")
  .into(app);
app.listen(3000, function() {
  console.log("Ntalk no ar.");
});
