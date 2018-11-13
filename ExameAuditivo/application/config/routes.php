<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */

$route['default_controller'] = 'Dashboard';
$route['pdf/audimetrico/(:num)'] = 'Audiometria_Controller/index/$1';
$route['report/audiometria/(:num)/(:any)'] = 'Report_Controller/audiometria/$1/$2';
  
$route['Paciente/'] = 'Paciente/index/';
$route['Paciente/(:num)'] = 'Paciente/index/(:num)';
$route['Paciente/Listar/(:num)'] = 'Paciente/Listar/$1';
$route['Funcionario/(:num)'] = 'Funcionario/index/$1';
$route['Dashboard/(:num)'] = 'Dashboard/index/$1';
$route['Consulta/(:num)'] = 'Consulta/index/$1';
$route['Imprime/(:any)'] = 'Imprime/index/$1';
$route['Consulta/(:num)/(:num)'] = 'Consulta/index/$1/$2';
$route['Meatoscopia/(:num)'] = 'Meatoscopia_Controller/indexConsulta/$1';
$route['Meatoscopia/salvarConsulta'] = 'Meatoscopia_Controller/salvarConsulta';

$route['Consulta/Meatoscopia/(:num)'] = 'Meatoscopia/index/$1';
$route['Audiometrico/(:num)'] = 'Audiometrico/index/$1';
$route['Mascaramento/(:num)'] = 'Mascaramento/index/$1';
$route['Ldf_lrf/(:num)'] = 'Ldf_lrf/index/$1';
$route['Irf/(:num)'] = 'Irf/index/$1';
$route['Weber/(:num)'] = 'Weber/index/$1';
$route['Impedanciometria/(:num)'] = 'Impedanciometria/index/$1';
$route['Timpanometria/(:num)'] = 'Timpanometria/index/$1';
$route['ReflexoEstapediano/(:num)'] = 'ReflexoEstapediano/index/$1';
$route['FuncaoTubaria/(:num)'] = 'FuncaoTubaria/index/$1';
$route['InstrumentoSonsAmbientais/(:num)'] = 'InstrumentoSonsAmbientais/index/$1';
$route['Audiometria_aasi/(:num)'] = 'Audiometria_aasi/index/$1';
$route['AudiometriaCampoLivre/(:num)'] = 'AudiometriaCampoLivre/index/$1';

$route['TipoTDT/(:num)'] = 'TipoTDT_Controller/index/$1';
$route['TipoTDT'] = 'TipoTDT_controller/index';
$route['TipoTDT/save'] = 'TipoTDT_controller/save';
$route['TipoTDT/inserir'] = 'TipoTDT_Controller/inserir';
$route['TipoTDT/Alterar/(:num)'] = 'TipoTDT_Controller/Alterar/$1';
$route['TipoTDT/Excluir/(:num)'] = 'TipoTDT_Controller/Excluir/$1';

$route['TipoReacao/(:num)'] = 'TipoReacao_Controller/index/$1';
$route['TipoReacao'] = 'TipoReacao_controller/index';
$route['TipoReacao/save'] = 'TipoReacao_Controller/save';
$route['TipoReacao/inserir'] = 'TipoReacao_Controller/inserir';
$route['TipoReacao/Alterar/(:num)'] = 'TipoReacao_Controller/Alterar/$1';
$route['TipoReacao/Excluir/(:num)'] = 'TipoReacao_Controller/Excluir/$1';

$route['Classificacao/(:num)'] = 'Classificacao_Controller/index/$1';
$route['Classificacao'] = 'Classificacao_Controller/index';
$route['Classificacao/save'] = 'Classificacao_Controller/save';
$route['Classificacao/inserir'] = 'Classificacao_Controller/inserir';
$route['Classificacao/Alterar/(:num)'] = 'Classificacao_Controller/Alterar/$1';
$route['Classificacao/Excluir/(:num)'] = 'Classificacao_Controller/Excluir/$1';

$route['Timpanograma/(:num)'] = 'Timpanograma_Controller/index/$1';
$route['Timpanograma'] = 'Timpanograma_Controller/index';
$route['Timpanograma/save'] = 'Timpanograma_Controller/save';
$route['Timpanograma/inserir'] = 'Timpanograma_Controller/inserir';
$route['Timpanograma/Alterar/(:num)'] = 'Timpanograma_Controller/Alterar/$1';
$route['Timpanograma/Excluir/(:num)'] = 'Timpanograma_Controller/Excluir/$1';

$route['TecnicasUtilizadas/(:num)'] = 'TecnicasUtilizadas_Controller/index/$1';
$route['TecnicasUtilizadas'] = 'TecnicasUtilizadas_Controller/index';
$route['TecnicasUtilizadas/save'] = 'TecnicasUtilizadas_Controller/save';
$route['TecnicasUtilizadas/inserir'] = 'TecnicasUtilizadas_Controller/inserir';
$route['TecnicasUtilizadas/Alterar/(:num)'] = 'TecnicasUtilizadas_Controller/Alterar/$1';
$route['TecnicasUtilizadas/Excluir/(:num)'] = 'TecnicasUtilizadas_Controller/Excluir/$1';

$route['Modelos/(:num)'] = 'Modelos_Controller/index/$1';
$route['Modelos'] = 'Modelos_Controller/index';
$route['Modelos/save'] = 'Modelos_Controller/save';
$route['Modelos/inserir'] = 'Modelos_Controller/inserir';
$route['Modelos/Alterar/(:num)'] = 'Modelos_Controller/Alterar/$1';
$route['Modelos/Excluir/(:num)'] = 'Modelos_Controller/Excluir/$1';

$route['Equipamentos/(:num)'] = 'Equipamentos_Controller/index/$1';
$route['Equipamentos'] = 'Equipamentos_Controller/index';
$route['Equipamentos/save'] = 'Equipamentos_Controller/save';
$route['Equipamentos/inserir'] = 'Equipamentos_Controller/inserir';
$route['Equipamentos/Alterar/(:num)'] = 'Equipamentos_Controller/Alterar/$1';
$route['Equipamentos/Excluir/(:num)'] = 'Equipamentos_Controller/Excluir/$1';


$route['Empresas/(:num)'] = 'Empresas_Controller/index/$1';
$route['Empresas'] = 'Empresas_Controller/index';
$route['Empresas/save'] = 'Empresas_Controller/save';
$route['Empresas/inserir'] = 'Empresas_Controller/inserir';
$route['Empresas/Alterar/(:num)'] = 'Empresas_Controller/Alterar/$1';
$route['Empresas/Excluir/(:num)'] = 'Empresas_Controller/Excluir/$1';


$route['Instrumentos/(:num)'] = 'Instrumentos_Controller/index/$1';
$route['Instrumentos'] = 'Instrumentos_Controller/index';
$route['Instrumentos/save'] = 'Instrumentos_Controller/save';
$route['Instrumentos/inserir'] = 'Instrumentos_Controller/inserir';
$route['Instrumentos/Alterar/(:num)'] = 'Instrumentos_Controller/Alterar/$1';
$route['Instrumentos/Excluir/(:num)'] = 'Instrumentos_Controller/Excluir/$1';


$route['TipoExame/(:num)'] = 'TipoExame_Controller/index/$1';
$route['TipoExame'] = 'TipoExame_Controller/index';
$route['TipoExame/save'] = 'TipoExame_Controller/save';
$route['TipoExame/inserir'] = 'TipoExame_Controller/inserir';
$route['TipoExame/Alterar/(:num)'] = 'TipoExame_Controller/Alterar/$1';
$route['TipoExame/Excluir/(:num)'] = 'TipoExame_Controller/Excluir/$1';

$route['Relatorios/(:num)'] = 'Relatorios_Controller/index/$1';
$route['Relatorios'] = 'Relatorios_Controller/index';
$route['Relatorios/save'] = 'Relatorios_Controller/save';
$route['Relatorios/inserir'] = 'Relatorios_Controller/inserir';
$route['Relatorios/Alterar/(:num)'] = 'Relatorios_Controller/Alterar/$1';
$route['Relatorios/Excluir/(:num)'] = 'Relatorios_Controller/Excluir/$1';

$route['Meatos/(:num)'] = 'Meatoscopia_Controller/index/$1';
$route['Meatos'] = 'Meatoscopia_Controller/index';
$route['Meatos/save'] = 'Meatoscopia_Controller/save';
$route['Meatos/inserir'] = 'Meatoscopia_Controller/inserir';
$route['Meatos/Alterar/(:num)'] = 'Meatoscopia_Controller/Alterar/$1';
$route['Meatos/Excluir/(:num)'] = 'Meatoscopia_Controller/Excluir/$1';

$route['Monitoramento/(:num)'] = 'Monitoramento_Controller/index/$1';
$route['Monitoramento'] = 'Monitoramento_Controller/index';
$route['Monitoramento/save'] = 'Monitoramento_Controller/save';
$route['Monitoramento/inserir'] = 'Monitoramento_Controller/inserir';
$route['Monitoramento/Alterar/(:num)'] = 'Monitoramento_Controller/Alterar/$1';
$route['Monitoramento/Excluir/(:num)'] = 'Monitoramento_Controller/Excluir/$1';

$route['Timpanograma/(:num)'] = 'Timpanograma_Controller/index/$1';
$route['Timpanograma'] = 'Timpanograma_Controller/index';
$route['Timpanograma/save'] = 'Timpanograma_Controller/save';
$route['Timpanograma/inserir'] = 'Timpanograma_Controller/inserir';
$route['Timpanograma/Alterar/(:num)'] = 'Timpanograma_Controller/Alterar/$1';
$route['Timpanograma/Excluir/(:num)'] = 'Timpanograma_Controller/Excluir/$1';

$route['MedidasComplacencia/(:num)'] = 'MedidasComplacencia_Controller/index/$1';
$route['MedidasComplacencia'] = 'MedidasComplacencia_Controller/index';
$route['MedidasComplacencia/save'] = 'MedidasComplacencia_Controller/save';
$route['MedidasComplacencia/inserir'] = 'MedidasComplacencia_Controller/inserir';
$route['MedidasComplacencia/Alterar/(:num)'] = 'MedidasComplacencia_Controller/Alterar/$1';
$route['MedidasComplacencia/Excluir/(:num)'] = 'MedidasComplacencia_Controller/Excluir/$1';

$route['Meatos/(:num)'] = 'Meatoscopia_Controller/index/$1';
$route['Meatos'] = 'Meatoscopia_Controller/index';
$route['Meatos/save'] = 'Meatoscopia_Controller/save';
$route['Meatos/inserir'] = 'Meatoscopia_Controller/inserir';
$route['Meatos/Alterar/(:num)'] = 'Meatoscopia_Controller/Alterar/$1';
$route['Meatos/Excluir/(:num)'] = 'Meatoscopia_Controller/Excluir/$1';


$route['Parecer/(:num)'] = 'Parecer_Controller/index/$1';
//$route['Parecer'] = 'Parecer_Controller/index';

$route['Parecer/save'] = 'Parecer_Controller/save';
$route['reports/(:any)/(:any)'] = 'Pages_Controller/index/$1/$2';
//$route['reports/(:any)/(:any)'] = 'Pages_Controller/view/$1/$2'; 
//$route['Parecer/inserir'] = 'Parecer_Controller/inserir';
//$route['Parecer/Alterar/(:num)'] = 'Parecer_Controller/Alterar/$1';
//$route['Parecer/Excluir/(:num)'] = 'Parecer_Controller/Excluir/$1';
//$route['Paciente/'] = 'Paciente/index/';

$route['seo/sitemap\.xml'] = "seo/sitemap";

//$route['report/(:any)'] = 'report/$1';
//$route['paciente/consulta/alterar/(:num)'] = 'consulta/alterar/$1';
///$route['paciente/consulta/audiometrico/(:num)/(:num)'] = 'paciente/consulta/audiometrico/$1/$2';


//$route['404_override'] = 'pagina_404';
$route['translate_uri_dashes'] = true;
