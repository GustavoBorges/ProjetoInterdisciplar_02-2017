<?php

   include("../conexao/conecta.php");	
   session_start();

?>

<?php

	function carregaServico($conexao) {
	$servicos = array();

	$idCliente = $_SESSION['idCliente'];

	$sql = mysqli_query($conexao, "SELECT idServico, tiposervico, valor, descricao, horarioInicial, horarioFinal, diaInicial, diaFinal, checkClicado, ativo FROM servico WHERE idcliente = '{$idCliente}'");
	
	 
	while ($recebe = mysqli_fetch_array($sql)) {
		array_push($servicos, $recebe);			
	}

	return $servicos;

	}
	
?>



<?php
	
	function carregaContrato($conexao){
		$contratos = array();

		$idUsuario = $_SESSION['idUsuario'];

		$sql = mysqli_query($conexao, "SELECT contrato.idContrato, 
			servico.tiposervico, 
			contrato.preco,
			contrato.idCliente, 
			servico.descricao, 
			servico.horarioInicial,
			servico.horarioFinal,
			servico.diaInicial,
			servico.diaFinal, 
			cliente.nome, 
			cliente.telefone,
			contrato.status,
			contrato.detalhes,
			date_format(contrato.dataInicial, '%d/%c/%Y') As dataInicial,
			date_format(contrato.dataFinal, '%d/%c/%Y') As dataFinal,
			servico.checkClicado,
			CONCAT(contrato.rua,', ',
			contrato.numero,' - ',
			contrato.complemento,' - ',
			contrato.bairro,'/ ',
			contrato.cidade) AS endereco 
			FROM contrato 
			INNER JOIN cliente 
			ON contrato.idCliente = cliente.idCliente 
			INNER JOIN servico 
			ON contrato.idServico = servico.idServico
			WHERE contrato.idUsuario = '{$idUsuario}' 
			AND contrato.status = '0'
			OR contrato.status = '1'
			OR contrato.status = '2'
			OR contrato.status = '4'");

		while($recebe = mysqli_fetch_array($sql)){
			array_push($contratos, $recebe);
		}

		return $contratos;

	}


?>

<?php
	
	function carregarContratoCliente($conexao){

		$carregaContrato = array();

		$idCliente = $_SESSION['idCliente'];

		$recebeServicoSolicitado = mysqli_query($conexao, "SELECT contrato.idContrato, 
			servico.tiposervico, 
			contrato.preco, 
			servico.descricao, 
			servico.horarioInicial,
			servico.horarioFinal,
			servico.diaInicial,
			servico.diaFinal, 
			usuario.nome, 
			usuario.email, 
			usuario.telefone,
			contrato.status,
			contrato.detalhes,
			date_format(contrato.dataInicial, '%d/%c/%Y') As dataInicial,
			servico.checkClicado,
			CONCAT(contrato.rua,', ',
			contrato.numero,' - ',
			contrato.complemento,' - ',
			contrato.bairro,'/ ',
			contrato.cidade) AS endereco 
			FROM contrato 
			INNER JOIN usuario 
			ON contrato.idUsuario = usuario.idUsuario 
			INNER JOIN servico 
			ON contrato.idServico = servico.idServico
			WHERE contrato.idCliente = '{$idCliente}' 
			AND contrato.status = '0'
			OR contrato.status = '1'
			OR contrato.status = '2'");

		while ($recebe = mysqli_fetch_array($recebeServicoSolicitado)) {
				array_push($carregaContrato, $recebe);
		}

		return $carregaContrato;

	}

?>

<?php

	function carregaHistoricoCliente($conexao){

		$carregaContratoFinalizado = array();

		$idCliente = $_SESSION['idCliente'];

		$recebeContratoFinalizado = mysqli_query($conexao, "SELECT contrato.idContrato, 
			servico.tiposervico, 
			contrato.preco,
			usuario.nome, 
			usuario.email, 
			usuario.telefone,
			contrato.pgto,
			contrato.status,			
			date_format(contrato.dataInicial, '%d/%c/%Y') As dataInicial
			FROM contrato 
			INNER JOIN usuario 
			ON contrato.idUsuario = usuario.idUsuario 
			INNER JOIN servico 
			ON contrato.idServico = servico.idServico
			WHERE contrato.idCliente = '{$idCliente}' 
			AND contrato.status = '3'
			OR contrato.status = '4'
			OR contrato.status = '5'");

		while ($recebe = mysqli_fetch_array($recebeContratoFinalizado)) {
				array_push($carregaContratoFinalizado, $recebe);
		}

		return $carregaContratoFinalizado;

	}

?>

<?php

	function carregaServicoUsuario($conexao) {


	$servicos = array();

	$sql = mysqli_query($conexao, "SELECT servico.idServico, servico.tiposervico, servico.valor, servico.descricao, cliente.nome, cliente.telefone FROM servico 
								   INNER JOIN cliente ON servico.idCliente = cliente.idCliente");
	 
	while ($recebe = mysqli_fetch_array($sql)) {
		array_push($servicos, $recebe);			
	}

	return $servicos;

	}
	
?>

<?php
	
	function carregaHistoricoUsuario($conexao){
		$contratos = array();

		$idUsuario = $_SESSION['idUsuario'];

		$sql = mysqli_query($conexao, "SELECT c.idContrato, s.tiposervico, s.valor, s.descricao, cl.nome, cl.telefone, c.status FROM contrato AS c
							INNER JOIN servico AS s
							ON c.idServico = s.idServico
							INNER JOIN usuario AS u
							ON c.idUsuario = u.idUsuario
                            INNER JOIN cliente AS cl 
                            ON c.idCliente = cl.idCliente WHERE c.idUsuario = '{$idUsuario}' AND c.status = 'Finalizado' OR c.status = 'Cancelado' OR c.status = 'Rejeitado'");

		while($recebe = mysqli_fetch_array($sql)){
			array_push($contratos, $recebe);
		}

		return $contratos;

	}


?>

<?php

	function recebeNomeUsuario($conexao){

				$idUsuario = $_SESSION['idUsuario'];
				$sql = mysqli_query($conexao, "SELECT nome FROM usuario WHERE idUsuario = '{$idUsuario}' ");
				$recebendoNome = mysqli_fetch_row($sql);
				$recebeu = $recebendoNome[0];

				return $recebeu;

	}
	
?>

<?php

	function recebeNomeCliente($conexao){

				$idCliente = $_SESSION['idCliente'];
				$sql = mysqli_query($conexao, "SELECT nome FROM cliente WHERE idCliente = '{$idCliente}' ");
				$recebendoNome = mysqli_fetch_row($sql);
				$recebeu = $recebendoNome[0];

				return $recebeu;

	}
	
?>