module.exports = function(app) {
  var HomeController = {
    index: function(req, res) {
      res.render("home/index");
    },
    login: function(req, res) {
        // ============= log4js =================
        const log4js = require('log4js');
        log4js.configure({
        appenders: { cheese: { type: 'file', filename: 'cheese.log' } },
        categories: { default: { appenders: ['cheese'], level: 'error' } }
        });
        
        const logger = log4js.getLogger('cheese');
        //console.error("login");
        logger.error(req);
        //console.log(req.body.nome);
        //console.log(req.body.usuario);
        //console.log(req.body.usuario.email);
        // ============= log4js =================
        var email = req.body.usuario.email,
          nome = req.body.usuario.nome;
          //console.debug(email);
          //console.debug(nome);
        if (email && nome) {
          var usuario = req.body.usuario;
          usuario["contatos"] = [];
          req.session.usuario = usuario;
          //console.debug('req.session.usuario = usuario;');
          //console.debug(usuario);
          res.redirect("/contatos");
        } else {
          res.redirect("/");
        }
    },
    logout: function(req, res) {
      req.session.destroy();
      res.redirect("/");
    }
  };
  return HomeController;
};
