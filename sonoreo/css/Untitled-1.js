// ==UserScript==
// @name     Gerar TXT Lançamentos CCU
// @version  1
// @grant    none
// @author 	 RcBrito
// @require  http://code.jquery.com/jquery-3.3.1.js
// ==/UserScript==
var gerarArquivo = 1
var colaborador = "8100"; //Rodrigo Brito
var meses = ["2017-11-01", "2017-12-01", "2018-01-01"]
//var mes = meses[0]
var url = "https://intranet.mps.com.br/Lancamentos/DoMesJSON?idColaborador=" + colaborador + "&mes="
var txtJSON = '{"matricula":861,"tipoVinculo":"Funcionário","horasPorDia":8,"itens":[{"Id":1353189,"Hora":"201711010810","CCU":"POS1341503","Descritivo":"RT 61831 *TI* Solicitante: rafael.marques. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Envio de Clientes para o Veloce. Solução: Teste Inicial.~61831"},{"Id":1354028,"Hora":"201711011200","CCU":"---","Descritivo":""},{"Id":1354029,"Hora":"201711011400","CCU":"POS1341503","Descritivo":"RT 61968 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Programação.~61968"},{"Id":1354030,"Hora":"201711011813","CCU":"---","Descritivo":""},{"Id":1354334,"Hora":"201711030820","CCU":"POS1341503","Descritivo":"RT 61968 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Programação.~61968"},{"Id":1355173,"Hora":"201711031200","CCU":"---","Descritivo":""},{"Id":1355174,"Hora":"201711031400","CCU":"POS1341503","Descritivo":"RT 61968 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Programação.~61968"},{"Id":1355176,"Hora":"201711031840","CCU":"---","Descritivo":""},{"Id":1355177,"Hora":"201711060830","CCU":"POS1341503","Descritivo":"RT 61968 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Programação.~61968"},{"Id":1356675,"Hora":"201711061200","CCU":"---","Descritivo":""},{"Id":1356682,"Hora":"201711061400","CCU":"POS1341501","Descritivo":"RT 61087 *SU* Solicitante: rodrigocesar. Tela/Procedimento: . Solicitação: (-PRJ-) COMISSÃO - Liberação da Versão 409. Solução: Suporte.~61087"},{"Id":1356719,"Hora":"201711061615","CCU":"POS1341503","Descritivo":"RT 61931 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Liberação da Versão 410. Solução: Suporte.~61931"},{"Id":1356721,"Hora":"201711061640","CCU":"POS1341503","Descritivo":"RT 61931 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Liberação da Versão 410. Solução: Suporte.~61931"},{"Id":1356720,"Hora":"201711061830","CCU":"---","Descritivo":""},{"Id":1357507,"Hora":"201711070830","CCU":"POS1341503","Descritivo":"RT 61968 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Programação.~61968"},{"Id":1357510,"Hora":"201711070845","CCU":"POS1341503","Descritivo":"RT 61931 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Liberação da Versão 410. Solução: Atendimento ao Luiz.~61931"},{"Id":1357511,"Hora":"201711070900","CCU":"POS1341503","Descritivo":"RT 61968 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Programação.~61968"},{"Id":1357508,"Hora":"201711071130","CCU":"POS1341503","Descritivo":"RT 61931 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Liberação da Versão 410. Solução: Atendimento ao Luiz.~61931"},{"Id":1357512,"Hora":"201711071200","CCU":"POS1341501","Descritivo":"RT 61087 *SU* Solicitante: rodrigocesar. Tela/Procedimento: . Solicitação: (-PRJ-) COMISSÃO - Liberação da Versão 409. Solução: Suporte na homologação de comissão PNLD.~61087"},{"Id":1357509,"Hora":"201711071300","CCU":"---","Descritivo":""},{"Id":1357820,"Hora":"201711071400","CCU":"POS1341503","Descritivo":"RT 61968 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Programação.~61968"},{"Id":1357821,"Hora":"201711071720","CCU":"POS1341503","Descritivo":"RT 61970 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Resolução de Problemas de Importação do Veloce. Solução: Programação.~61970"},{"Id":1357822,"Hora":"201711071800","CCU":"---","Descritivo":""},{"Id":1358298,"Hora":"201711080830","CCU":"POS1341503","Descritivo":"RT 61970 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Resolução de Problemas de Importação do Veloce. Solução: Programação.~61970"},{"Id":1359300,"Hora":"201711081200","CCU":"---","Descritivo":""},{"Id":1359301,"Hora":"201711081400","CCU":"POS1341503","Descritivo":"RT 61970 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Resolução de Problemas de Importação do Veloce. Solução: Programação.~61970"},{"Id":1359302,"Hora":"201711081830","CCU":"---","Descritivo":""},{"Id":1359303,"Hora":"201711090835","CCU":"POS1341503","Descritivo":"RT 61970 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Resolução de Problemas de Importação do Veloce. Solução: Programação.~61970"},{"Id":1361899,"Hora":"201711091200","CCU":"---","Descritivo":""},{"Id":1361900,"Hora":"201711091400","CCU":"POS1341503","Descritivo":"RT 61970 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Resolução de Problemas de Importação do Veloce. Solução: Programação.~61970"},{"Id":1361901,"Hora":"201711091612","CCU":"POS1341503","Descritivo":"RT 61968 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Programação.~61968"},{"Id":1361902,"Hora":"201711091640","CCU":"POS1341503","Descritivo":"RT 62138 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Zeros a esquerda na integração de empresas. Solução: Programação.~62138"},{"Id":1361904,"Hora":"201711091700","CCU":"POS1341503","Descritivo":"RT 61970 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Resolução de Problemas de Importação do Veloce. Solução: Programação.~61970"},{"Id":1361905,"Hora":"201711091820","CCU":"---","Descritivo":""},{"Id":1360936,"Hora":"201711100815","CCU":"POS1341503","Descritivo":"RT 61970 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Resolução de Problemas de Importação do Veloce. Solução: Programação.~61970"},{"Id":1360937,"Hora":"201711101230","CCU":"---","Descritivo":""},{"Id":1361228,"Hora":"201711101400","CCU":"POS1341503","Descritivo":"RT 61970 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Resolução de Problemas de Importação do Veloce. Solução: Programação.~61970"},{"Id":1361229,"Hora":"201711101700","CCU":"POS1341503","Descritivo":"RT 61968 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo Serviço de Importação de Pedidos do Veloce. Solução: Teste Final.~61968"},{"Id":1361231,"Hora":"201711101710","CCU":"POS1341503","Descritivo":"RT 61969 *TI* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Nova tela de Log de Importação do Veloce. Solução: Teste Inicial.~61969"},{"Id":1361233,"Hora":"201711101730","CCU":"POS1341503","Descritivo":"RT 62154 *TI* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Envio de Clientes. Solução: Teste Inicial.~62154"},{"Id":1361235,"Hora":"201711101804","CCU":"---","Descritivo":""},{"Id":1361652,"Hora":"201711130810","CCU":"POS1341503","Descritivo":"RT 62153 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Mais de um erro no log do upload da planilha de clientes. Solução: Teste Final.~62153"},{"Id":1361653,"Hora":"201711130830","CCU":"POS1341503","Descritivo":"RT 62138 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Zeros a esquerda na integração de empresas. Solução: Teste Final.~62138"},{"Id":1361906,"Hora":"201711131200","CCU":"---","Descritivo":""},{"Id":1362484,"Hora":"201711131400","CCU":"POS1341503","Descritivo":"RT 61971 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo processo de Geração de Retorno Simbólico. Solução: Programação.~61971"},{"Id":1362486,"Hora":"201711131600","CCU":"POS1341503","Descritivo":"RT 61971 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo processo de Geração de Retorno Simbólico. Solução: Programação.~61971"},{"Id":1362487,"Hora":"201711131700","CCU":"POS1341503","Descritivo":"RT 61931 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Liberação da Versão 410. Solução: Verificando erro de execução do serviço na maquina do cliente.~61931"},{"Id":1362488,"Hora":"201711131803","CCU":"---","Descritivo":""},{"Id":1363115,"Hora":"201711140815","CCU":"POS1341503","Descritivo":"RT 62239  *PR* Solicitante: rodrigo.brito. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Formatos de data e Hora, e espaços na URL da API do Veloce. Solução: Programação.~62239"},{"Id":1363116,"Hora":"201711141200","CCU":"---","Descritivo":""},{"Id":1363321,"Hora":"201711141400","CCU":"POS1341503","Descritivo":"RT 61971 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo processo de Geração de Retorno Simbólico. Solução: Programação.~61971"},{"Id":1363633,"Hora":"201711141801","CCU":"---","Descritivo":""},{"Id":1364055,"Hora":"201711160830","CCU":"POS1341503","Descritivo":"RT 61971 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo processo de Geração de Retorno Simbólico. Solução: Programação.~61971"},{"Id":1364054,"Hora":"201711160900","CCU":"POS1341503","Descritivo":"RT 62256 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Cabeçalho do Pedido de Venda em nome da Escola. Solução: Programação.~62256"},{"Id":1364126,"Hora":"201711161000","CCU":"POS1341503","Descritivo":"RT 62257 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Valor dos itens inseridos no pedido. Solução: Programação.~62257"},{"Id":1364451,"Hora":"201711161200","CCU":"---","Descritivo":""},{"Id":1364530,"Hora":"201711161225","CCU":"POS1341503","Descritivo":"RT 62258 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Envio de Clientes - Máscaras. Solução: Programação.~62258"},{"Id":1364531,"Hora":"201711161324","CCU":"---","Descritivo":""},{"Id":1364691,"Hora":"201711161400","CCU":"POS1340198","Descritivo":"RT 62191 *PR* Solicitante: Juliana Garippe. Tela/Procedimento: . Solicitação: ALUNOS: Calculo de Alunos em pedidos ED. Solução: Programação.~62191"},{"Id":1364986,"Hora":"201711161810","CCU":"---","Descritivo":""},{"Id":1365446,"Hora":"201711170830","CCU":"POS1341503","Descritivo":"RT 62285 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Não permitir excluir produto da grid Contrato/Catálogo. Solução: Suporte.~62285"},{"Id":1365445,"Hora":"201711171040","CCU":"POS1341503","Descritivo":"RT 62288 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Popular tabela de preços Cielo LIO. Solução: Suporte.~62288"},{"Id":1365447,"Hora":"201711171130","CCU":"POS1341503","Descritivo":"RT 62285 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Não permitir excluir produto da grid Contrato/Catálogo. Solução: Suporte.~62285"},{"Id":1365771,"Hora":"201711171200","CCU":"---","Descritivo":""},{"Id":1365772,"Hora":"201711171400","CCU":"POS1341503","Descritivo":"RT 62296 *PR* Solicitante: LUIZ FELIPE. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - ?Erro ao liberar pedido. Solução: Programação.~62296"},{"Id":1365774,"Hora":"201711171545","CCU":"POS1341503","Descritivo":"RT 62285 *SU* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Não permitir excluir produto da grid Contrato/Catálogo. Solução: Suporte.~62285"},{"Id":1365934,"Hora":"201711171750","CCU":"POS1340194","Descritivo":"RT 62294 *SU* Solicitante: Mateus Queiroz Matos. Tela/Procedimento: . Solicitação: FS#62204 - Tabela de Preços 2018 - TP4 Cielo Lio. Solução: Suporte.~62294"},{"Id":1365946,"Hora":"201711171800","CCU":"---","Descritivo":""},{"Id":1366631,"Hora":"201711200830","CCU":"POS1341503","Descritivo":"RT 61971 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo processo de Geração de Retorno Simbólico. Solução: Programação.~61971"},{"Id":1366920,"Hora":"201711201200","CCU":"---","Descritivo":""},{"Id":1366921,"Hora":"201711201400","CCU":"POS1341503","Descritivo":"RT 61971 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo processo de Geração de Retorno Simbólico. Solução: Programação.~61971"},{"Id":1366922,"Hora":"201711201802","CCU":"---","Descritivo":""},{"Id":1367613,"Hora":"201711210815","CCU":"POS1340198","Descritivo":"RT 62121 *PR* Solicitante: Sandro Luz. Tela/Procedimento: . Solicitação: FS#58785 - Relatório 25% CO-910. Solução: Programação.~62121"},{"Id":1367615,"Hora":"201711211200","CCU":"---","Descritivo":""},{"Id":1367616,"Hora":"201711211400","CCU":"POS1341503","Descritivo":"RT 62328 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Tabela de preço na digitação da Remessa. Solução: Programação.~62328"},{"Id":1367620,"Hora":"201711211600","CCU":"POS1341503","Descritivo":"RT 62325 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo campo Número Lógico. Solução: Programação.~62325"},{"Id":1367621,"Hora":"201711211800","CCU":"---","Descritivo":""},{"Id":1368423,"Hora":"201711220810","CCU":"POS1341503","Descritivo":"RT 62325 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo campo Número Lógico. Solução: Programação.~62325"},{"Id":1368422,"Hora":"201711221000","CCU":"POS1340194","Descritivo":"RT 62341 *SU* Solicitante: Felipe. Tela/Procedimento: . Solicitação: LOJA NA ESCOLA: Correção de contratos em massa.. Solução: Suporte.~62341"},{"Id":1368424,"Hora":"201711221200","CCU":"---","Descritivo":""},{"Id":1368864,"Hora":"201711221400","CCU":"POS1341503","Descritivo":"RT 62258 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Envio de Clientes - Máscaras. Solução: Teste Final.~62258"},{"Id":1368918,"Hora":"201711221430","CCU":"POS1341503","Descritivo":"RT 62328 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Tabela de preço na digitação da Remessa. Solução: Teste Final.~62328"},{"Id":1368865,"Hora":"201711221500","CCU":"POS1341503","Descritivo":"RT 62271 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Erro ao faturar pedido com múltiplos bimestres. Solução: Teste Final.~62271"},{"Id":1368913,"Hora":"201711221530","CCU":"POS1341503","Descritivo":"RT 62325 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo campo Número Lógico. Solução: Teste Final.~62325"},{"Id":1368867,"Hora":"201711221600","CCU":"POS1341503","Descritivo":"RT 62285 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Não permitir excluir produto da grid Contrato/Catálogo. Solução: Teste Final.~62285"},{"Id":1368869,"Hora":"201711221630","CCU":"POS1341503","Descritivo":"RT 62296 *TF* Solicitante: LUIZ FELIPE. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - ?Erro ao liberar pedido. Solução: Teste Final.~62296"},{"Id":1368929,"Hora":"201711221700","CCU":"POS1341503","Descritivo":"RT 61971 *TF* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Novo processo de Geração de Retorno Simbólico. Solução: Teste Final.~61971"},{"Id":1368930,"Hora":"201711221810","CCU":"---","Descritivo":""},{"Id":1369976,"Hora":"201711230815","CCU":"POS1341503","Descritivo":"RT 62363 *EF* Solicitante: rodrigo.brito. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Estimativa de horas - Novo Relatório Remessa Cielo LIO. Solução: Estimativa de Horas.~62363"},{"Id":1369977,"Hora":"201711231220","CCU":"---","Descritivo":""},{"Id":1369889,"Hora":"201711231330","CCU":"POS1341503","Descritivo":"RT 62358 *TI* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: CIELO LIO - Retorno simbolico deve sair todo em nome da escola. Solução: Teste Inicial.~62358"},{"Id":1370085,"Hora":"201711231520","CCU":"POS1340198","Descritivo":"RT 62180 *PR* Solicitante: Felipe. Tela/Procedimento: . Solicitação: PEDIDO: Impressão de pedido em digitação. Solução: Programação.~62180"},{"Id":1370481,"Hora":"201711231700","CCU":"POS1340198","Descritivo":"RT 62089 *PR* Solicitante: Daniel Filipak. Tela/Procedimento: . Solicitação: FS#61099 - Trava do Estoque - Empenho de Pedidos Faturados Parcialmente. Solução: Programação.~62089"},{"Id":1370482,"Hora":"201711231810","CCU":"---","Descritivo":""},{"Id":1370483,"Hora":"201711240815","CCU":"POS1340198","Descritivo":"RT 62089 *PR* Solicitante: Daniel Filipak. Tela/Procedimento: . Solicitação: FS#61099 - Trava do Estoque - Empenho de Pedidos Faturados Parcialmente. Solução: Programação.~62089"},{"Id":1370805,"Hora":"201711241100","CCU":"POS1340194","Descritivo":"RT 62374 *SU* Solicitante: Felipe. Tela/Procedimento: . Solicitação: PP: Pedido 1167725 - Problemas no workflow. Solução: Suporte.~62374"},{"Id":1370806,"Hora":"201711241200","CCU":"---","Descritivo":""},{"Id":1371087,"Hora":"201711241400","CCU":"POS1341503","Descritivo":"RT 62365 *TI* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Informações de pagamento. Solução: Teste Inicial.~62365"},{"Id":1371088,"Hora":"201711241546","CCU":"POS1340198","Descritivo":"RT 62089 *PR* Solicitante: Daniel Filipak. Tela/Procedimento: . Solicitação: FS#61099 - Trava do Estoque - Empenho de Pedidos Faturados Parcialmente. Solução: Programação.~62089"},{"Id":1371332,"Hora":"201711241800","CCU":"---","Descritivo":""},{"Id":1372065,"Hora":"201711270815","CCU":"POS1340193","Descritivo":"*PR* RT 999105 Ajustes azucrinator,~999105"},{"Id":1372066,"Hora":"201711271000","CCU":"POS1340198","Descritivo":"RT 62180 *PR* Solicitante: Felipe. Tela/Procedimento: . Solicitação: PEDIDO: Impressão de pedido em digitação. Solução: Programação.~62180"},{"Id":1372069,"Hora":"201711271030","CCU":"POS1340198","Descritivo":"RT 62089 *PR* Solicitante: Daniel Filipak. Tela/Procedimento: . Solicitação: FS#61099 - Trava do Estoque - Empenho de Pedidos Faturados Parcialmente. Solução: Programação.~62089"},{"Id":1372498,"Hora":"201711271200","CCU":"---","Descritivo":""},{"Id":1372502,"Hora":"201711271500","CCU":"POS1340198","Descritivo":"RT 61143 *PR* Solicitante: Alinne Lopes do Carmo Novinski. Tela/Procedimento: . Solicitação: FS#56703 - [E-commerce] Relatórios faturamento. Solução: Programação.~61143"},{"Id":1372503,"Hora":"201711271830","CCU":"---","Descritivo":""},{"Id":1373979,"Hora":"201711280810","CCU":"POS1341503","Descritivo":"RT 62419 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Dados ao reprocessar pedido Cielo LIO. Solução: Programação.~62419"},{"Id":1373978,"Hora":"201711280906","CCU":"POS1341503","Descritivo":"RT 61931 *LI* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Liberação da Versão 410. Solução: Liberação de Versão.~61931"},{"Id":1373981,"Hora":"201711281200","CCU":"---","Descritivo":""},{"Id":1373982,"Hora":"201711281400","CCU":"POS1341503","Descritivo":"RT 62426 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Considerar de acordo com o descritivo da bandeira do cartão. Solução: Programação.~62426"},{"Id":1373984,"Hora":"201711281630","CCU":"POS1341503","Descritivo":"RT 61931 *LI* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Liberação da Versão 410. Solução: Liberação de Versão.~61931"},{"Id":1373985,"Hora":"201711281823","CCU":"---","Descritivo":""},{"Id":1374780,"Hora":"201711290830","CCU":"POS1341503","Descritivo":"RT 61931 *LI* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Liberação da Versão 410. Solução: Liberação de Versão.~61931"},{"Id":1374783,"Hora":"201711291030","CCU":"POS1341503","Descritivo":"RT 62426 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Considerar de acordo com o descritivo da bandeira do cartão. Solução: Programação.~62426"},{"Id":1374784,"Hora":"201711291203","CCU":"---","Descritivo":""},{"Id":1374779,"Hora":"201711291400","CCU":"POS1340194","Descritivo":"RT 62425 *SU* Solicitante: Fernando Wroblewski. Tela/Procedimento: . Solicitação: FS#62838 - Alteração de Convenio SGE. Solução: Suporte.~62425"},{"Id":1374776,"Hora":"201711291430","CCU":"POS1340101","Descritivo":"RT 62438 *PR* Solicitante: Felipe. Tela/Procedimento: . Solicitação: Ecommerce: O valor do abatimento não pode ser superior ao credito atual da Escola.. Solução: Programação.~62438"},{"Id":1374943,"Hora":"201711291530","CCU":"POS1340101","Descritivo":"RT 62442 *SU* Solicitante: Felipe. Tela/Procedimento: . Solicitação: FS#62822 - Liberação de pedido. Solução: Suporte.~62442"},{"Id":1374785,"Hora":"201711291830","CCU":"---","Descritivo":""},{"Id":1375647,"Hora":"201711300830","CCU":"POS1341503","Descritivo":"RT 62446 *PR* Solicitante: Luiz Felipe Blum. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Integração com erro via HTTPS. Solução: EM PROGRAMAÇÃO.~62446"},{"Id":1375810,"Hora":"201711301200","CCU":"---","Descritivo":""},{"Id":1375811,"Hora":"201711301405","CCU":"POS1340198","Descritivo":"RT 61143 *PR* Solicitante: Alinne Lopes do Carmo Novinski. Tela/Procedimento: . Solicitação: FS#56703 - [E-commerce] Relatórios faturamento. Solução: Programação.~61143"},{"Id":1375855,"Hora":"201711301600","CCU":"POS1341503","Descritivo":"RT 62363 *EF* Solicitante: rodrigo.brito. Tela/Procedimento: . Solicitação: (-PRJ-) CIELO LIO - Estimativa de horas - Novo Relatório Remessa Cielo LIO. Solução: Especificação Funcional.~62363"},{"Id":1375812,"Hora":"201711301832","CCU":"---","Descritivo":""}]}';


function makeTextFile(text) {
        var data = new Blob([text], { type: 'text/plain' });

        // If we are replacing a previously generated file we need to
        // manually revoke the object URL to avoid memory leaks.
        if (textFile !== null) {
            window.URL.revokeObjectURL(textFile);
        }

        var textFile = window.URL.createObjectURL(data);

        return textFile;
};

function imprimir(data, mes) {
    var txt = ""
    var link = $("<a>Lançamentos CCU " + mes + "</a>");
    $.each(data, function (i, itens) {
        if (i == 'itens') {
            var a = itens;
            $.each(a, function (j, item) {
                txt = txt + item.Hora + " " + item.CCU + " " + item.Descritivo + "\n";
            });
        }

    });
    
    link.attr({
        id: "downloadlink" + mes,
        class: 'link',
        href: makeTextFile(txt),
        download: "Lançamentos CCU" + mes + ".txt",
        style: "display:block"
    });

    $("body").append(link);
    $("#downloadlink").trigger('click');
}

$(document).ready(function () {    
    var links = [];  
  	if (gerarArquivo == 1){
      if (url == "") {
          var data = JSON.parse(txtJSON);
          imprimir(data);
      }
      else {
          $(document).ready(function () {
              $.each(meses, function (index, mes) {
                  
                  if (1 == 1 ){  
                    $.get(url + mes, function (data, value) {
                      imprimir(data,mes);
                    });
                  }else{
                    var data = JSON.parse(txtJSON);
                    imprimir(data,mes);
                  }
              });

          });
      }   
    }
});