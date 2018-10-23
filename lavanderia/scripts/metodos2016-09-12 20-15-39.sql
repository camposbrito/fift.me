CREATE TABLE `metodos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classe` varchar(50) DEFAULT NULL,
  `metodo` varchar(50) DEFAULT NULL,
  `identificacao` varchar(100) DEFAULT NULL,
  `privado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('welcome','index','welcome/index',0);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('utilizacao','index','utilizacao/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('apartamentos','index','apartamentos/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('relatorios','index','relatorios/index',0);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('regras','index','regras/index',0);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('contato','index','contato/index',0);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('maquinas','index','maquinas/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('parametros','index','parametros/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('dashboard','index','dashboard/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('tags','index','tags/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('metodos','index','metodos/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('usuarios','index','usuarios/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('permissoes','index','permissoes/index',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('permissoes','salvar','permissoes/salvar',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('metodos','salvar','metodos/salvar',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('apartamentos','salvar','apartamentos/salvar',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('tags','salvar','tags/salvar',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('tags','inserir','tags/inserir',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('maquinas','salvar','maquinas/salvar',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('parametros','salvar','parametros/salvar',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('usuarios','inserir','usuarios/inserir',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('usuarios','salvar','usuarios/salvar',1);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('contato','salvar','contato/salvar',0);
insert into `metodos`(`classe`,`metodo`,`identificacao`,`privado`) values ('contato','relatorio','contato/relatorio',1);
