<?php
   include("../functions/funcoes.php");
   $recebeu = recebeNomeCliente($conexao);
?>
<!DOCTYPE html">
<html lang="pt-BR">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Delivery de serviços | Entrega de serviços online | Peça iServices</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/switch.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="navbar-header">
        <a href="http://localhost:8080/iservices/index.php" target="_blank" class="navbar-brand"> 
            <i class="glyphicon glyphicon-home"></i>&nbspiServices
        </a>
    </div>
    <div class="container">
        <ul class="nav nav-tabs">
            <li role="presentation" class="active">
                <a href="#cadastro" arial-controls="cadastro" data-toggle="tab" role="tab">Serviços</a>
            </li>
            <li role="presentation">
                <a href="#historico" arial-controls="historico" data-toggle="tab" role="tab">Histórico</a>
            </li>
            <li role="presentation">
                <a href="#servicoSolicitado" arial-controls="servicoSolicitado" data-toggle="tab" role="tab">Serviços Solicitados</a>
            </li>
            <li role="presentation">
                <a href="#avaliacoes" arial-controls="avaliacaes" data-toggle="tab" role="tab">Avaliações</a>
            </li>
            <li class="navbar-right"><a href="" id="dropdownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="glyphicon glyphicon-user"></i>&nbspSeja bem vindo, <?=$recebeu;?>!</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown" href="#funcao-construcao-modal" data-toggle="modal"><i class="glyphicon glyphicon-pencil"></i>&nbspMeu Perfil</a></li>
                    <li><a class="dropdown" href="#servicoSolicitado" data-toggle="tab"><i class="glyphicon glyphicon-file"></i>&nbspContratos</a></li>
                    <li><a class="deslogar dropdown" href="#"><i class="glyphicon glyphicon-off"></i>&nbspSair</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="cadastro">
            <div class="container" style="margin-top: 2px;">
                <div class="row">
                    <div class="panel panel-primary panel-table animated slideInDown">
                        <div class="panel-heading" style="padding: 10px;">
                            <div class="row">
                                <div class="col col-xs-12 text-center">
                                    <h1 class="panel-title">Serviços</h1>
                                    <a href="" class="btn btn-info pull-right h1"
                                        data-toggle="modal" data-target="#modalCadastro"> 
                                        <i class="glyphicon glyphicon-plus"></i>&nbspNovo Serviço
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-servicos">
                            <thead>
                                <tr>
                                    <th>Tipo de Serviço</th>
                                    <th>Preço</th>
                                    <th class="actions">Ações</th>
                                    <th>Ativo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                          $servicos = carregaServico($conexao);
                                          foreach ($servicos as $recebe) {
                                          
                                ?>
                                <tr>
                                    <td>
                                        <?=$recebe['tiposervico'];?>
                                    </td>
                                    <td>R$ <?=$recebe['valor'];?>
                                    </td>
                                    <td class="actions">
                                        <a href="" class="visualizar-servico btn btn-default"
                                        data-toggle="modal" 
                                        data-balao="tooltip"
                                        title="Clicando neste botão você estará visualizando o serviço."
                                        data-id="<?=$recebe['idServico'];?>"
                                        data-tipo="<?=$recebe['tiposervico'];?>"
                                        data-valor="<?=$recebe['valor'];?>"
                                        data-descricao="<?=$recebe['descricao'];?>"
                                        data-horarioinicial="<?=$recebe['horarioInicial'];?>"
                                        data-horariofinal="<?=$recebe['horarioFinal'];?>"
                                        data-diainicial="<?=$recebe['diaInicial'];?>"
                                        data-diafinal="<?=$recebe['diaFinal'];?>"
                                        data-check="<?=$recebe['checkClicado'];?>">
                                        <i class="glyphicon glyphicon-file"></i>
                                        </a> 
                                        <a href="" class="editar-servico btn btn-primary"
                                        data-toggle="modal" 
                                        data-balao="tooltip"
                                        title="Clicando neste botão você estará editando o serviço."
                                        data-id="<?=$recebe['idServico'];?>"
                                        data-tipo="<?=$recebe['tiposervico'];?>"
                                        data-valor="<?=$recebe['valor'];?>"
                                        data-descricao="<?=$recebe['descricao'];?>"
                                        data-horarioinicial="<?=$recebe['horarioInicial'];?>"
                                        data-horariofinal="<?=$recebe['horarioFinal'];?>"
                                        data-diainicial="<?=$recebe['diaInicial'];?>"
                                        data-diafinal="<?=$recebe['diaFinal'];?>"
                                        data-check="<?=$recebe['checkClicado'];?>">
                                        <i class="glyphicon glyphicon-edit"></i>
                                        </a> 
                                        <a href="" class="btn-excluir btn btn-danger" 
                                        data-toggle="modal"
                                        data-balao="tooltip"
                                        title="Clicando neste botão você estará excluíndo o serviço."
                                        data-name="<?=$recebe['tiposervico'];?>"
                                        data-id="<?=$recebe['idServico'];?>">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <label class="switch"> 
                                            <input type="checkbox" class="checkando" id="checkando"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará visualizando o serviço." 
                                            data-name="<?=$recebe['tiposervico'];?>"
                                            data-id="<?=$recebe['idServico'];?>"
                                            data-ativo = "<?=$recebe['ativo'];?>">
                                            </input>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="servicoSolicitado">
            <div class="container" style="margin-top: 2px;">
                <div class="row">
                    <div class="panel panel-primary panel-table animated slideInDown">
                        <div class="panel-heading" style="padding: 37px;">
                            <div class="row">
                                <div class="col col-xs-12 text-center">
                                    <h1 class="panel-title">Serviços Solicitados</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-servicosSolicitados">
                            <thead>
                                <tr>
                                    <th>Contrato</th>
                                    <th>Tipo de Serviço</th>
                                    <th>Preço</th>
                                    <th>Contratante</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th class="actions">Ações</th>
                                    <th>Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                         $contratosSolicitados = carregarContratoCliente($conexao);
                                         foreach ($contratosSolicitados as $recebe) {
                                         
                                ?>
                                <tr>
                                    <td>
                                        <?=$recebe['idContrato'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['tiposervico'];?>
                                    </td>
                                    <td>R$ <?=$recebe['preco'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['nome'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['telefone'];?>
                                    </td>
                                    <td class="status" data-name="<?=$recebe['status'];?>">
                                        <?=$recebe['status'];?>
                                    </td>
                                    <td class="actions">
                                        <button class="btn-visualizar-modal-servico btn btn-default"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará 'Visualizando' a proposta de serviço solicitado pelo <?=$recebe['nome'];?>."
                                            data-id="<?=$recebe['idContrato']?>"
                                            data-tipo="<?=$recebe['tiposervico']?>"
                                            data-valor="<?=$recebe['preco']?>"
                                            data-descricao="<?=$recebe['descricao']?>"
                                            data-status="<?=$recebe['status'];?>"
                                            data-horarioInicial="<?=$recebe['horarioInicial']?>"
                                            data-horariofinal="<?=$recebe['horarioFinal']?>"
                                            data-diainicial="<?=$recebe['diaInicial']?>"
                                            data-diafinal="<?=$recebe['diaFinal']?>"
                                            data-contratante="<?=$recebe['nome']?>"
                                            data-telefonecontratante="<?=$recebe['telefone']?>"
                                            data-emailcontratante="<?=$recebe['email']?>"
                                            data-enderecocontratante="<?=$recebe['endereco']?>"
                                            data-detalhes="<?=$recebe['detalhes']?>"
                                            data-check="<?=$recebe['checkClicado']?>">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                        </button>
                                        <button class="btn-conclui-proposta btn btn-default" value="btn-conclui-proposta"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará 'Concluindo' a proposta de serviço solicitado pelo <?=$recebe['nome'];?>."
                                            data-idcontrato="<?=$recebe['idContrato']?>"
                                            data-status="<?=$recebe['status'];?>">
                                            <i class="glyphicon glyphicon-ok icon-success"></i>
                                        </button>
                                        <button class="btn-rejeitar-proposta btn btn-default"
                                            data-balao="tooltip"
                                            title="Clicando neste botão você estará 'Rejeitando' a proposta de serviço solicitado pelo <?=$recebe['nome'];?>."
                                            data-idcontrato="<?=$recebe['idContrato']?>"
                                            data-status="<?=$recebe['status'];?>">                                            
                                            <i class="glyphicon glyphicon-remove icon-remove"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn-detalhes-tab-solicitacao btn btn-default"
                                            data-balao="tooltip"
                                            title="Ao clicar neste botão você estará 'Visualizando' os datalhes da proposta de serviço solicitado pelo <?=$recebe['nome'];?>."
                                            data-id="<?=$recebe['idContrato']?>"
                                            data-tipo="<?=$recebe['tiposervico']?>"
                                            data-valor="<?=$recebe['preco']?>"
                                            data-descricao="<?=$recebe['descricao']?>"
                                            data-status="<?=$recebe['status'];?>"
                                            data-horarioInicial="<?=$recebe['horarioInicial']?>"
                                            data-horariofinal="<?=$recebe['horarioFinal']?>"
                                            data-diainicial="<?=$recebe['diaInicial']?>"
                                            data-diafinal="<?=$recebe['diaFinal']?>"
                                            data-contratante="<?=$recebe['nome']?>"
                                            data-telefonecontratante="<?=$recebe['telefone']?>"
                                            data-emailcontratante="<?=$recebe['email']?>"
                                            data-enderecocontratante="<?=$recebe['endereco']?>"
                                            data-detalhes="<?=$recebe['detalhes']?>"
                                            data-check="<?=$recebe['checkClicado']?>"
                                            data-inicial="<?=$recebe['dataInicial'];?>">
                                            <i class="glyphicon glyphicon-plus"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="historico">
            <div class="container" style="margin-top: 2px;">
                <div class="row">
                    <div class="panel panel-primary panel-table animated slideInDown">
                        <div class="panel-heading" style="padding: 10px;">
                            <div class="row">
                                <div class="col col-xs-12 text-center">
                                    <h1 class="panel-title">Histórico</h1>
                                    <a href="#funcao-construcao-modal" data-toggle="modal" class="btn btn-info pull-right h1"> 
                                        <i class="glyphicon glyphicon-print"></i>&nbspGerar Relatório
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-historicos">
                            <thead>
                                <tr>
                                    <th>Contrato</th>
                                    <th>Tipo de Serviço</th>
                                    <th>Preço</th>
                                    <th>Contratante</th>
                                    <th>Telefone</th>
                                    <th>E-mail</th>
                                    <th>Preço Pago</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                         $contratosFinalizado = carregaHistoricoCliente($conexao);
                                         foreach ($contratosFinalizado as $recebe) {
                                         
                                ?>
                                <tr>
                                    <td>
                                        <?=$recebe['idContrato'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['tiposervico'];?>
                                    </td>
                                    <td>R$ <?=$recebe['preco'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['nome'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['telefone'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['email'];?>
                                    </td>
                                    <td>
                                        R$ <?=$recebe['pgto'];?>
                                    </td>
                                    <td class="status" data-name="<?=$recebe['status'];?>">
                                        <?=$recebe['status'];?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="avaliacoes">
            <div class="container" style="margin-top: 2px;">
                <div class="row">
                    <div class="panel panel-primary panel-table animated slideInDown">
                        <div class="panel-heading" style="padding: 37px;">
                            <div class="row">
                                <div class="col col-xs-12 text-center">
                                    <h1 class="panel-title">Avaliações</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="list" class="row">
                    <div class="table-responsive col-md-12">
                        <table class="table table-striped table-bordered table-list" cellspacing="0" cellpadding="0" id="tab-avaliacoes">
                            <thead>
                                <tr>
                                    <th>Contratante</th>
                                    <th>Telefone</th>                                    
                                    <th>E-mail</th>
                                    <th>Comentário</th>
                                    <th>Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                         $avaliacao = recebeAvaliacao($conexao);
                                         foreach ($avaliacao as $recebe) {
                                         
                                ?>
                                <tr>
                                    <td>
                                        <?=$recebe['nome'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['telefone'];?>
                                    </td>
                                    <td>R$ <?=$recebe['email'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['comentario'];?>
                                    </td>
                                    <td>
                                        <?=$recebe['voto'];?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal para cadastro de serviço -->
    <div id="modalCadastro" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div align="center">
                        <img src="../img/logo.png" alt="Logo da empresa"></img>
                    </div>
                </div>
                <div class="modal-body">
                    <form role="form" method="GET">
                        <label for="tipoServico">Tipo de Serviço:</label> 
                        <select type="text" name="tipo-servico-cadastro" class="form-control">
                            <option>Selecione Serviço</option>
                            <option>Babá</option>
                            <option>Mecânico Automotivo</option>
                            <option>Eletricista</option>
                            <option>Encanador</option>
                            <option>Bombeiro Hidráulico</option>
                        </select> 
                        <label for="valor">Preço do Serviço:</label> 
                        <input type="text" name="valor-servico" class="form-control"></input> 
                        <label for="descricao">Descrição:</label>
                        <textarea type="text" name="descricao-servico" class="form-control"></textarea>
                        </br>
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox8" type="checkbox"> 
                            <label for="checkbox8">Horário de Atendimento:</label>
                            <div id="horario-atendimento">
                            <span>De:</span> 
                                <select class="horario form-control" name="horario-atendimento-inicial">
                                    <option>00:00</option>
                                    <option>00:30</option>
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                    <option>13:00</option>
                                    <option>13:30</option>
                                    <option>14:00</option>
                                    <option>14:30</option>
                                    <option>15:00</option>
                                    <option>15:30</option>
                                    <option>16:00</option>
                                    <option>16:30</option>
                                    <option>17:00</option>
                                    <option>17:30</option>
                                    <option>18:00</option>
                                    <option>18:30</option>
                                    <option>19:00</option>
                                    <option>19:30</option>
                                    <option>20:00</option>
                                    <option>20:30</option>
                                    <option>21:00</option>
                                    <option>21:30</option>
                                    <option>22:00</option>
                                    <option>22:30</option>
                                    <option>23:00</option>
                                    <option>23:30</option>
                                </select> 
                                <span>à</span> 
                                <select class="horario form-control" name="horario-atendimento-final">
                                    <option>00:00</option>
                                    <option>00:30</option>
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                    <option>13:00</option>
                                    <option>13:30</option>
                                    <option>14:00</option>
                                    <option>14:30</option>
                                    <option>15:00</option>
                                    <option>15:30</option>
                                    <option>16:00</option>
                                    <option>16:30</option>
                                    <option>17:00</option>
                                    <option>17:30</option>
                                    <option>18:00</option>
                                    <option>18:30</option>
                                    <option>19:00</option>
                                    <option>19:30</option>
                                    <option>20:00</option>
                                    <option>20:30</option>
                                    <option>21:00</option>
                                    <option>21:30</option>
                                    <option>22:00</option>
                                    <option>22:30</option>
                                    <option>23:00</option>
                                    <option>23:30</option>
                                </select>
                                - <span>De:</span> 
                                <select class="dia form-control" name="dia-atendimento-inicial">
                                    <option>Segunda-feira</option>
                                    <option>Terça-feira</option>
                                    <option>Quarta-feira</option>
                                    <option>Quinta-feira</option>
                                    <option>Sexta-feira</option>
                                    <option>Sábado</option>
                                    <option>Domingo</option>
                                </select> 
                                <span>à</span> 
                                <select class="dia form-control" name="dia-atendimento-final">
                                    <option>Segunda-feira</option>
                                    <option>Terça-feira</option>
                                    <option>Quarta-feira</option>
                                    <option>Quinta-feira</option>
                                    <option>Sexta-feira</option>
                                    <option>Sábado</option>
                                    <option>Domingo</option>
                                </select>
                            </div>
                        </div>
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox9" type="checkbox"> 
                            <label for="checkbox9">Urgência:</label>
                            <div id="horario-urgencia">
                                <span>Segunda à Domingo - 24horas</span>
                            </div>
                        </div>
                    </form>
                    <div align="right">
                        <button type="submit" name="cadastro-servico"
                            value="cadastro-servico" class="btn btn-primary" id="btn-cadastrar-servico">
                            <i class="glyphicon glyphicon-thumbs-up"></i>&nbspCadastrar
                        </button>
                        <button type="button" name="fecha" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-thumbs-down"></i>&nbspFechar
                        </button>
                    </div>
                    </br>
                    <div id="carregando-modal-cadastrar-servico" align="center">
                        <img src="../img/carregando.gif"></br><span>Cadastrando</span>
                    </div>
                    <div class="alert alert-warning" id="alert-warning-cadastro-servico">
                        <a href="#" class="close" aria-label="close">&times;</a> 
                        <strong>Atenção!</strong> Selecione uma modalidade de atendimento.
                    </div>
                    <div class="alert alert-success" id="alert-success-cadastrar-servico">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sucesso!</strong> Serviço cadastrado.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para Excluir Cadastro-->
    <div class="modal fade" id="excluir-servico-modal" tabindex="-1"
        role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente excluir este item? <span class="nome"></span>&nbsp<span class="id-servico"></span>
                </div>
                <div class="modal-footer">
                    <button name="btn-ok" value="excluir" type="button" class="btn-confirma-exclusao btn btn-primary">
                        <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                    </button>
                    <a href="#" type="button" class="btn btn-default" data-dismiss="modal"> 
                        <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                    </a>
                </div>
                <div id="retorno"></div>
            </div>
        </div>
    </div>
    <!-- Modal para funções em construção Cadastro-->
    <div class="modal fade" id="funcao-construcao-modal" tabindex="-1"
        role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Esta função está Inativa, pois a mesma se encontra em fase de desenvolvimento.
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-primary" data-dismiss="modal">OK</a>
                </div>
                <div id="retorno"></div>
            </div>
        </div>
    </div>
    <!-- Modal para cancelar serviço-->
    <div class="modal fade" id="cancelar-servico-modal" tabindex="-1"
        role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Cancelar Item</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente cancelar a proposta de serviço? <span class="cancela-idcontrato" style="display: none;"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" name="" value="btn-sim-cancela-servico-prestador" class="btn-sim-cancela-servico-prestador btn btn-primary"> 
                        <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                    </button> 
                    <button href="#" type="button" class="btn btn-default" data-dismiss="modal"> 
                        <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                    </button>
                    <div id="carregando-modal-cancelar-servico" align="center">
                        <img src="../img/carregando.gif"></br><span>Cancelando Serviço</span>
                    </div>                    
                </div>
                <div class="alert alert-warning" id="alert-warning-cancelar-servico">
                    <a href="#" class="close" aria-label="close">&times;</a> 
                    <strong>Atenção!</strong> Não foi possível cancelar o serviço, pois o mesmo já foi pago pelo contratante.
                </div>
                <div class="alert alert-success" id="alert-success-cancelar-servico">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Sucesso!</strong> Proposta de serviço cancelada.
                </div>
                <div class="alert alert-danger" id="alert-danger-cancelar-servico">
                    <a href="#" class="close" aria-label="close">&times;</a>
                    <strong>Error!</strong> Ocorreu uma inconsistência ao aceitar o serviço.
                </div>
            </div>
        </div>
    </div>
    <!--Modal de Conclusão do serviço-->
    <div class="modal fade" id="concluido-servico-modal" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </br>
                <div id="carregando-modal-conclui-servico" align="center">
                    <img src="../img/carregando.gif"></br><span>Concluindo Serviço</span>
                </div>
                <div id="modal-body-agradecimento" class="step3" style="display: block;">
                    <p class="thanks">Serviço concluído, obrigado!</p>
                </div> 
                </br>
            </div>
        </div>
    </div>
    <!--Modal de ativação do serviço-->
    <div class="modal fade" id="ativacao-modal" tabindex="-1" role="dialog"
        aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Ativar Serviço</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente ativar o serviço? <span id="ativando-servico" style="display: none;"></span>
                </div>
                <div class="modal-footer">
                    <a name="ativar" value="excluir" type="button"
                        class="btn btn-primary" id="ativar-servico"> 
                        <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                    </a> 
                    <a type="button" class="btn btn-default"
                        data-dismiss="modal" id="nao-ativa"> 
                        <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--Modal de desativação do serviço-->
    <div class="modal fade" id="desativacao-modal" tabindex="-1"
        role="dialog" aria-labelledby="modalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Desativar Serviço</h4>
                </div>
                <div class="modal-body">
                    Deseja realmente desativar o serviço? <span id="desativando-servico" style="display:none;"></span>
                </div>
                <div class="modal-footer">
                    <a name="desativar" value="excluir" type="button"
                        class="btn btn-primary" id="desativar-servico"> 
                        <i class="glyphicon glyphicon-thumbs-up"></i>&nbspSim
                    </a> 
                    <a href="#" type="button" class="btn btn-default"
                        data-dismiss="modal" id="nao-desativa"> 
                        <i class="glyphicon glyphicon-thumbs-down"></i>&nbspN&atilde;o
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para Editar cadastro de serviço -->
    <div id="modal-editar-cadastro" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div align="center">
                        <img src="../img/logo.png" alt="Logo da empresa"></img>
                    </div>
                </div>
                <div class="modal-body">
                    <form role="form" method="GET">
                        <label for="identificador">Identificador:</label> 
                        <input type="text" name="editar-identificador" class="form-control" id="identificador" readonly="true"></input> 
                        <label for="tipoServico">Tipo de Serviço:</label> 
                        <select type="text" name="editar-tipoServico" class="form-control" id="tipoServico">
                            <option>Selecione Serviço</option>
                            <option>Babá</option>
                            <option>Mecânico Automotivo</option>
                            <option>Eletricista</option>
                            <option>Encanador</option>
                            <option>Bombeiro Hidráulico</option>
                        </select> 
                        <label for="valor">Preço do Serviço:</label> 
                        <input type="text" name="editar-valor" class="form-control" id="preco"></input> 
                        <label for="descricao">Descrição:</label>
                        <textarea type="text" name="editar-descricao-servico" class="form-control"></textarea>
                        </br>
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox10" type="checkbox" name="editar-horario-atendimento"> 
                            <label for="checkbox10">Horário de Atendimento:</label>
                            <div id="editar-horario-atendimento">
                                <span>De:</span> 
                                <select class="horario form-control" name="editar-horario-atendimento-inicial">
                                    <option>00:00</option>
                                    <option>00:30</option>
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                    <option>13:00</option>
                                    <option>13:30</option>
                                    <option>14:00</option>
                                    <option>14:30</option>
                                    <option>15:00</option>
                                    <option>15:30</option>
                                    <option>16:00</option>
                                    <option>16:30</option>
                                    <option>17:00</option>
                                    <option>17:30</option>
                                    <option>18:00</option>
                                    <option>18:30</option>
                                    <option>19:00</option>
                                    <option>19:30</option>
                                    <option>20:00</option>
                                    <option>20:30</option>
                                    <option>21:00</option>
                                    <option>21:30</option>
                                    <option>22:00</option>
                                    <option>22:30</option>
                                    <option>23:00</option>
                                    <option>23:30</option>
                                </select> 
                                <span>à</span> 
                                <select class="horario form-control" name="editar-horario-atendimento-final">
                                    <option>00:00</option>
                                    <option>00:30</option>
                                    <option>01:00</option>
                                    <option>01:30</option>
                                    <option>02:00</option>
                                    <option>02:30</option>
                                    <option>03:00</option>
                                    <option>03:30</option>
                                    <option>04:00</option>
                                    <option>04:30</option>
                                    <option>05:00</option>
                                    <option>05:30</option>
                                    <option>06:00</option>
                                    <option>06:30</option>
                                    <option>07:00</option>
                                    <option>07:30</option>
                                    <option>08:00</option>
                                    <option>08:30</option>
                                    <option>09:00</option>
                                    <option>09:30</option>
                                    <option>10:00</option>
                                    <option>10:30</option>
                                    <option>11:00</option>
                                    <option>11:30</option>
                                    <option>12:00</option>
                                    <option>12:30</option>
                                    <option>13:00</option>
                                    <option>13:30</option>
                                    <option>14:00</option>
                                    <option>14:30</option>
                                    <option>15:00</option>
                                    <option>15:30</option>
                                    <option>16:00</option>
                                    <option>16:30</option>
                                    <option>17:00</option>
                                    <option>17:30</option>
                                    <option>18:00</option>
                                    <option>18:30</option>
                                    <option>19:00</option>
                                    <option>19:30</option>
                                    <option>20:00</option>
                                    <option>20:30</option>
                                    <option>21:00</option>
                                    <option>21:30</option>
                                    <option>22:00</option>
                                    <option>22:30</option>
                                    <option>23:00</option>
                                    <option>23:30</option>
                                </select> 
                                - <span>De:</span> 
                                <select class="dia form-control" name="editar-dia-atendimento-inicial">
                                    <option>Segunda-feira</option>
                                    <option>Terça-feira</option>
                                    <option>Quarta-feira</option>
                                    <option>Quinta-feira</option>
                                    <option>Sexta-feira</option>
                                    <option>Sábado</option>
                                    <option>Domingo</option>
                                </select> 
                                <span>à</span> 
                                <select class="dia form-control" name="editar-dia-atendimento-final">
                                    <option>Segunda-feira</option>
                                    <option>Terça-feira</option>
                                    <option>Quarta-feira</option>
                                    <option>Quinta-feira</option>
                                    <option>Sexta-feira</option>
                                    <option>Sábado</option>
                                    <option>Domingo</option>
                                </select>
                            </div>
                        </div>
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox11" type="checkbox" name="editar-tipo-atendimento"> 
                            <label for="checkbox11">Urgência:</label>
                            <div id="editar-horario-urgencia">
                                <span>Segunda à Domingo - 24horas</span>
                            </div>
                        </div>
                    </form>
                    <button type="submit" name="alterar" value="alterar-servico"
                        id="btn-alterar-servico" class="btn btn-primary">
                        <i class="glyphicon glyphicon-ok"></i>&nbspAlterar
                    </button>
                    <button type="button" name="cancelar" class="btn btn-default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-remove"></i>&nbspCancelar
                    </button>
                    <div id="carregando-modal-alterar" align="center">
                        <img src="../img/carregando.gif"></br><span>Alterando Serviço</span>
                    </div>
                </div>
                <div class="alert alert-warning" id="alert-warning-alterar">
                    <a href="#" class="close" aria-label="close">&times;</a> 
                    <strong>Atenção!</strong> Não foi selecionada nenhuma modalidade de atendimento.
                </div>
                <div class="alert alert-success" id="alert-success-alterar">
                    <a href="#" class="close" aria-label="close">&times;</a> 
                    <strong>Sucesso!</strong> Serviço foi alterado com sucesso.
                </div>
                <div class="alert alert-danger" id="alert-danger-alterar">
                    <a href="#" class="close" aria-label="close">&times;</a> 
                    <strong>Error!</strong> Não foi possível realizar a alteração do serviço.
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para visualizar e aceitação do cadastro de serviço atendimento definido -->
    <div id="modal-visualizacao" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div align="center">
                        <img src="../img/logo.png" alt="Logo da empresa"></img>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="dados-visualizacao-servico">
                        Identificador do serviço: <span name="visualizacao-id-servico"></span></br>
                        Tipo de Serviço: <span name="visualizacao-tipo-servico"></span></br>
                        Preço do Serviço: <span name="visualizacao-valor-servico"></span></br>
                        Descrição: <span name="visualizacao-descricao-servico"></span></br>
                        Atendimento: De: <span name="visualizacao-horainicial-servico"></span>
                        às <span name="visualizacao-horafinal-servico"></span>
                        / De: <span name="visualizacao-diainicial-servico"></span>
                        à <span name="visualizacao-diafinal-servico"></span></br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para visualizar e aceitação do cadastro de serviço atendimento urgência -->
    <div id="modal-visualizacao-dois" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div align="center">                        
                        <img src="../img/logo.png" alt="Logo da empresa"></img>
                    </div>
                </div>
                <div class="modal-body">
                    <div id="dados-visualizacao-servico">
                        Identificador do serviço: <span name="visualizacao-id-servico-dois"></span></br> 
                        Tipo de Serviço: <span name="visualizacao-tipo-servico-dois"></span></br> 
                        Preço do Serviço: <span name="visualizacao-valor-servico-dois"></span></br> 
                        Descrição: <span name="visualizacao-descricao-servico-dois"></span></br> 
                        Atendimento: <span name="visualizacao-horainicial-servico-dois"></span> 
                        De: <span name="visualizacao-diainicial-servico-dois"></span></span></br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal de visualização de contratação de serviço-->
    <div class="modal fade" id="detalhes-servico-modal-dois" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container">
                        <ul class="nav nav-tabs" id="menu-modal-contratacao" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab-informacoes" arial-controls="" data-toggle="tab" role="tab">Informações</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab-detalhes" arial-controls="" data-toggle="tab" role="tab">Detalhes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Serviço 24hrs = 1-->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab-informacoes">
                        <div class="modal-body">
                            <div id="dados-visualizacao-servico">
                                Número de contrato: <span name="visualizacao-solicitacao-id-servico-dois"></span></br> 
                                Tipo de Serviço: <span name="visualizacao-solicitacao-tipo-servico-dois"></span></br>
                                Preço do Serviço: <span name="visualizacao-solicitacao-valor-servico-dois"></span></br>
                                Descrição: <span name="visualizacao-solicitacao-descricao-servico-dois"></span></br>
                                Atendimento: <span name="visualizacao-solicitacao-horainicial-servico-dois"></span>
                                De: <span name="visualizacao-solicitacao-diainicial-servico-dois"></span></span></br>
                                Contratante: <span name="visualizacao-solicitacao-contratante-servico-dois"></span></br>
                                Telefone: <span name="visualizacao-solicitacao-telefone-servico-dois"></span></br>
                                E-mail: <span name="visualizacao-solicitacao-email-servico-dois"></span></br>
                                Endereço: <span name="visualizacao-solicitacao-endereco-servico-dois"></span></br></br>
                                Data inicial: <input type="date" name="data-inicial-dois" class="data form-control" id="data-visualizacao-servico">
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-detalhes">
                        <div class="modal-body">
                            <form>
                                <div class="form">
                                    <label for="message-text" class="col-form-label">Detalhamento da ocorrência</label>
                                    <textarea class="form-control" id="message-text"
                                        placeholder="Digite aqui o detalhamento da sua ocorrência..."
                                        name="detalhes-solicitacao-modal-contratar-dois">
                                    </textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn-aceita-contratar-modal-dois btn btn-primary"
                        name="aceitar" value="aceitar-servico">
                        <i class="glyphicon glyphicon-ok"></i>&nbspAceitar Proposta
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-remove"></i>&nbspCancelar
                    </button>
                    </br></br>
                    <div id="carregando-modal-aceitar-servico-dois" align="center"><img src="../img/carregando.gif"></br><span>Aceitando Serviço</span>
                    </div>
                </div>
                <div class="alert alert-danger" id="alert-danger-aceita-servico-prestador-dois">
                    <a href="#" class="close" aria-label="close">&times;</a>
                    <strong>Error!</strong> Ocorreu uma inconsistência ao aceitar o serviço.
                </div>
                <div class="alert alert-success" id="alert-success-aceita-servico-prestador-dois">
                    <a href="#" class="close">&times;</a> 
                    <strong>Sucesso!</strong> Proposta de serviço aceita.
                </div>
                <div class="alert alert-warning"
                    id="alert-warning-aceita-servico-prestador-dois">
                    <a href="#" class="close">&times;</a> 
                    <strong>Atenção!</strong> Informe a data inicial do serviço.
                </div>
            </div>
        </div>
    </div>
    <!--Modal de visualização dois de contratação de serviço-->
    <div class="modal fade" id="detalhes-servico-modal" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container">
                        <ul class="nav nav-tabs" id="menu-modal-contratacao" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab-informacoes-dois" arial-controls="" data-toggle="tab" role="tab">Informações</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab-detalhes-dois" arial-controls="" data-toggle="tab" role="tab">Detalhes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Serviço Atendimento = 0-->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active"
                        id="tab-informacoes-dois">
                        <div class="modal-body">
                            <div id="dados-visualizacao-servico">
                                Número de contrato: <span name="visualizacao-solicitacao-id-servico"></span></br> 
                                Tipo de Serviço: <span name="visualizacao-solicitacao-tipo-servico"></span></br>
                                Preço do Serviço: <span name="visualizacao-solicitacao-valor-servico"></span></br>
                                Descrição: <span name="visualizacao-solicitacao-descricao-servico"></span></br>
                                Atendimento: De: <span name="visualizacao-solicitacao-horainicial-servico"></span> 
                                às <span name="visualizacao-solicitacao-horafinal-servico"></span>
                                / De: <span name="visualizacao-solicitacao-diainicial-servico"></span>
                                à <span name="visualizacao-solicitacao-diafinal-servico"></span></br>
                                Contratante: <span name="visualizacao-solicitacao-contratante-servico"></span></br>
                                Telefone: <span name="visualizacao-solicitacao-telefone-servico"></span></br>
                                E-mail: <span name="visualizacao-solicitacao-email-servico"></span></br>
                                Endereço: <span name="visualizacao-solicitacao-endereco-servico"></span></br> </br> 
                                Data inicial: <input type="date" name="data-inicial" class="data form-control" id="data-visualizacao-servico"></input>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-detalhes-dois">
                        <div class="modal-body">
                            <form>
                                <div class="form">
                                    <label for="message-text" class="col-form-label">Detalhamento da ocorrência</label>
                                    <textarea class="form-control" id="message-text"
                                        placeholder="Digite aqui o detalhamento da sua ocorrência..."
                                        name="detalhes-solicitacao-modal-contratar">
                                    </textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn-aceita-contratar-modal btn btn-primary" name="aceitar"
                        value="aceitar-servico">
                        <i class="glyphicon glyphicon-ok"></i>&nbspAceitar Proposta
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-remove"></i>&nbspCancelar
                    </button>
                    </br> </br>
                    <div id="carregando-modal-aceitar-servico" align="center">
                        <img src="../img/carregando.gif"></br><span>Aceitando Serviço</span>
                    </div>
                </div>
                <div class="alert alert-danger" id="alert-danger-aceita-servico-prestador">
                    <a href="#" class="close" aria-label="close">&times;</a> 
                    <strong>Error!</strong> Ocorreu uma inconsistência ao aceitar o serviço.
                </div>
                <div class="alert alert-success" id="alert-success-aceita-servico-prestador">
                    <a href="#" class="close">&times;</a> 
                    <strong>Sucesso!</strong> Proposta de serviço aceita.
                </div>
                <div class="alert alert-warning" id="alert-warning-aceita-servico-prestador">
                    <a href="#" class="close">&times;</a> 
                    <strong>Atenção!</strong> Informe a data inicial do serviço.
                </div>
            </div>
        </div>
    </div>
    <!--Modal que é aberto ao clicar no botão detalhes da Tab "Serviços Solicitador"-->
    <div class="modal fade" id="detalhes-solicitacao-servico-modal-dois" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container">
                        <ul class="nav nav-tabs" id="menu-modal-contratacao" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab-informacoes" arial-controls="" data-toggle="tab" role="tab">Informações</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab-detalhes" arial-controls="" data-toggle="tab" role="tab">Detalhes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Serviço 24hrs = 1-->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="tab-informacoes">
                        <div class="modal-body">
                            <div id="dados-visualizacao-servico">
                                Número de contrato: <span name="detalhes-visualizacao-solicitacao-id-servico-dois"></span></br> 
                                Tipo de Serviço: <span name="detalhes-visualizacao-solicitacao-tipo-servico-dois"></span></br>
                                Preço do Serviço: <span name="detalhes-visualizacao-solicitacao-valor-servico-dois"></span></br>
                                Descrição: <span name="detalhes-visualizacao-solicitacao-descricao-servico-dois"></span></br>
                                Atendimento: <span name="detalhes-visualizacao-solicitacao-horainicial-servico-dois"></span>
                                De: <span name="detalhes-visualizacao-solicitacao-diainicial-servico-dois"></span></span></br>
                                Contratante: <span name="detalhes-visualizacao-solicitacao-contratante-servico-dois"></span></br>
                                Telefone: <span name="detalhes-visualizacao-solicitacao-telefone-servico-dois"></span></br>
                                E-mail: <span name="detalhes-visualizacao-solicitacao-email-servico-dois"></span></br>
                                Endereço: <span name="detalhes-visualizacao-solicitacao-endereco-servico-dois"></span></br>
                                Data inicial: <span name="detalhes-data-inicial"></span>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-detalhes">
                        <div class="modal-body">
                            <form>
                                <div class="form">
                                    <label for="message-text" class="col-form-label">Detalhamento da ocorrência</label>
                                    <textarea class="form-control" id="message-text"
                                        placeholder="Digite aqui o detalhamento da sua ocorrência..."
                                        name="detalhes-textarea-solicitacao-modal-contratar-dois">
                                    </textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-remove"></i>&nbspFechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal dois que é aberto ao clicar no botão detalhes da Tab "Serviços Solicitador"-->
    <div class="modal fade" id="detalhes-solicitacao-servico-modal" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="container">
                        <ul class="nav nav-tabs" id="menu-modal-contratacao" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#tab-informacoes-dois" arial-controls="" data-toggle="tab" role="tab">Informações</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab-detalhes-dois" arial-controls="" data-toggle="tab" role="tab">Detalhes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Serviço Atendimento = 0-->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active"
                        id="tab-informacoes-dois">
                        <div class="modal-body">
                            <div id="dados-visualizacao-servico">
                                Número de contrato: <span name="detalhes-visualizacao-solicitacao-id-servico"></span></br> 
                                Tipo de Serviço: <span name="detalhes-visualizacao-solicitacao-tipo-servico"></span></br>
                                Preço do Serviço: <span name="detalhes-visualizacao-solicitacao-valor-servico"></span></br>
                                Descrição: <span name="detalhes-visualizacao-solicitacao-descricao-servico"></span></br>
                                Atendimento: De: <span name="detalhes-visualizacao-solicitacao-horainicial-servico"></span> 
                                às <span name="detalhes-visualizacao-solicitacao-horafinal-servico"></span>
                                / De: <span name="detalhes-visualizacao-solicitacao-diainicial-servico"></span>
                                à <span name="detalhes-visualizacao-solicitacao-diafinal-servico"></span></br>
                                Contratante: <span name="detalhes-visualizacao-solicitacao-contratante-servico"></span></br>
                                Telefone: <span name="detalhes-visualizacao-solicitacao-telefone-servico"></span></br>
                                E-mail: <span name="detalhes-visualizacao-solicitacao-email-servico"></span></br>
                                Endereço: <span name="detalhes-visualizacao-solicitacao-endereco-servico"></span></br> 
                                Data inicial: <span name="detalhes-data-inicial"></span>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tab-detalhes-dois">
                        <div class="modal-body">
                            <form>
                                <div class="form">
                                    <label for="message-text" class="col-form-label">Detalhamento da ocorrência</label>
                                    <textarea class="form-control" id="message-text"
                                        placeholder="Digite aqui o detalhamento da sua ocorrência..."
                                        name="detalhes-textarea-solicitacao-modal-contratar">
                                    </textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-remove"></i>&nbspFechar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxaIU8lVDlpJRJcP6xMcx8VXZvxdCmX9c&callback=initMap" async defer></script>
    <script type="text/javascript" src="../js/scripts.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.tracksale.co/tracksale-js/internal/modal.css?v=1.3.4">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
</body>
</html>