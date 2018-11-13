<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------
  | AUTO-LOADER
  | -------------------------------------------------------------------
  | This file specifies which systems should be loaded by default.
  |
  | In order to keep the framework as light-weight as possible only the
  | absolute minimal resources are loaded by default. For example,
  | the database is not connected to automatically since no assumption
  | is made regarding whether you intend to use it.  This file lets
  | you globally define which systems you would like loaded with every
  | request.
  |
  | -------------------------------------------------------------------
  | Instructions
  | -------------------------------------------------------------------
  |
  | These are the things you can load automatically:
  |
  | 1. Packages
  | 2. Libraries
  | 3. Drivers
  | 4. Helper files
  | 5. Custom config files
  | 6. Language files
  | 7. Models
  |
 */

/*
  | -------------------------------------------------------------------
  |  Auto-load Packages
  | -------------------------------------------------------------------
  | Prototype:
  |
  |  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
  |
 */
$autoload['packages'] = array();

/*
  | -------------------------------------------------------------------
  |  Auto-load Libraries
  | -------------------------------------------------------------------
  | These are the classes located in system/libraries/ or your
  | application/libraries/ directory, with the addition of the
  | 'database' library, which is somewhat of a special case.
  |
  | Prototype:
  |
  |	$autoload['libraries'] = array('database', 'email', 'session');
  |
  | You can also supply an alternative library name to be assigned
  | in the controller:
  |
  |	$autoload['libraries'] = array('user_agent' => 'ua');
 */
$autoload['libraries'] = array('database', 'session');

/*
  | -------------------------------------------------------------------
  |  Auto-load Drivers
  | -------------------------------------------------------------------
  | These classes are located in system/libraries/ or in your
  | application/libraries/ directory, but are also placed inside their
  | own subdirectory and they extend the CI_Driver_Library class. They
  | offer multiple interchangeable driver options.
  |
  | Prototype:
  |
  |	$autoload['drivers'] = array('cache');
 */
$autoload['drivers'] = array();

/*
  | -------------------------------------------------------------------
  |  Auto-load Helper Files
  | -------------------------------------------------------------------
  | Prototype:
  |
  |	$autoload['helper'] = array('url', 'file');
 */
$autoload['helper'] = array('url', 'date', 'common');

/*
  | -------------------------------------------------------------------
  |  Auto-load Config files
  | -------------------------------------------------------------------
  | Prototype:
  |
  |	$autoload['config'] = array('config1', 'config2');
  |
  | NOTE: This item is intended for use ONLY if you have created custom
  | config files.  Otherwise, leave it blank.
  |
 */
$autoload['config'] = array();

/*
  | -------------------------------------------------------------------
  |  Auto-load Language files
  | -------------------------------------------------------------------
  | Prototype:
  |
  |	$autoload['language'] = array('lang1', 'lang2');
  |
  | NOTE: Do not include the "_lang" part of your file.  For example
  | "codeigniter_lang.php" would be referenced as array('codeigniter');
  |
 */
$autoload['language'] = array();

/*
  | -------------------------------------------------------------------
  |  Auto-load Models
  | -------------------------------------------------------------------
  | Prototype:
  |
  |	$autoload['model'] = array('first_model', 'second_model');
  |
  | You can also supply an alternative model name to be assigned
  | in the controller:
  |
  |	$autoload['model'] = array('first_model' => 'first');
 */
$autoload['model'] = array  (
                                'Iprf_model' => 'irf',
                                'Weber_model' => 'weber',
                                'Dashboard_model' => 'dashboard',
                                'ldf_lrf_model' => 'ldf_lrf',
                                'Terceiro_model'=>'terceiro', 
                                'Audiometrico_model'=>'audiometrico', 
                                'Equipamentos_model'=>'Equipamentos', 
                                'Empresas_model'=>'Empresas', 
                                'Equipamentos_model'=>'equipamento', 
                                'Consulta_model' => 'consulta',
                                'Paciente_model' => 'paciente',
                                'Modelos_model' => 'modelos',
                                'Parecer_model' => 'parecer',
                                'TipoExame_model'=>'tipoExame', 
                                'Classificacao_model'=>'classificacao', 
                                'Mascaramento_model' => 'mascaramento',
                                'Funcaotubaria_model' => 'funcaotubaria',
                                'Timpanometria_model' => 'timpanometria',
                                'Timpanograma_model' => 'timpanograma', 
                                'Meatoscopia_model' => 'meatoscopia', 
                                'Complacencia_model' => 'complacencia', 
                                'Monitoramento_model' => 'monitoramento', 
                                'Impedanciometria_model' => 'impedanciometria',
                                'Audiometria_aasi_model' => 'audiometria_aasi',
                                'TecnicasUtilizadas_model' => 'tecnicasUtilizadas',
                                'Tecnicasutilizadas_has_consulta_model' => 'tecnicasutilizadas_has_consulta',
                                'Reflexoestapediano_model' => 'reflexoestapediano',
                                'Audiometriacampolivre_model' => 'audiometriacampolivre',
                                'InstrumentoSonsAmbientais_model' => 'instrumentossonsambientais',
                                'Consulta_Audiometrico_model' => 'Consulta_Audiometrico',
                                'Modelo_has_TipoParecer_model' => 'Modelo_has_TipoParecer'
                            );
