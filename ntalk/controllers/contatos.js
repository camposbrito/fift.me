module.exports = function(app) {
  var ContatoController = {
    index: function(req, res) {
        //console.log('ContatoController');
        //console.log(req.session);
      var usuario = req.session.usuario,
        params = { usuario: usuario };
      res.render("contatos/index", params);
    }
  };
  return ContatoController;
};

