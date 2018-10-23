CREATE TABLE `usuarios` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `ativo` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


insert into `usuarios`(`nome`,`email`,`login`,`senha`,`ativo`) values ('Rodrigo de Campos Brito','camposbrito@gmail.com','camposbrito','825e964d6e5c69c9f1257c0868e7a73a','1');
insert into `usuarios`(`nome`,`email`,`login`,`senha`,`ativo`) values ('Administrador',null,'sindico','036f32a059c4b6f20f1d6a95ae0a02b0','1');
insert into `usuarios`(`nome`,`email`,`login`,`senha`,`ativo`) values ('Administradora',null,'administradora','093bfa797a51334dc7649ff23bc5e248','1');

