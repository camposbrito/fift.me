var express = require("express"),
  consign = require("consign"),
  morgan = require("morgan"),
  bodyParser = require("body-parser"),
   methodOverride = require('method-override'),
  // cookieParser = require("cookie-parser"),
  session  = require("express-session"),
  path = require("path"),
  error = require('./middleware/error'),
  app = express();

app.use(morgan("dev"));

app.use(bodyParser.json({ type: 'application/*+json' }));
app.use(bodyParser.urlencoded({ extended: true }));
app.use(methodOverride('_method'))
// app.use(app.router);
app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
// app.use(cookieParser("ntalk"));
app.use(session({secret: 'ntalk',resave: false,saveUninitialized: true}));
app.use(express.static(__dirname + "/public"));


consign({ cwd: path.join(__dirname, ".") })
  .include("models")
  .then("controllers")
  .then("routes")
  .into(app);

  app.use(error.notFound);
app.use(error.serverError);
app.listen(3000, function() {
  console.log("Ntalk no ar.");
});
