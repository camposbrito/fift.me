module.exports = function(app) {
    var chat = app.controllers.chat,
    autenticar = require("./../middleware/autenticador");
    app.get('/chat/:email', chat.index);
    };