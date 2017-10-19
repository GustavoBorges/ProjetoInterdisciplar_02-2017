<?php
	//Dados do banco de dados
	$servidor = "localhost";
	$usuario = "root";
	$senha = "guga100";
	$banco = "iservices";

	//String de conexão com o banco de dados
	$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
	//Verificação de conexão
	if (!$conexao){
		die("Erro ao conectar: " . mysqli_error());
	}

	
	session_start();

?>

<?php

	function carregaServico($conexao) {
	$servicos = array();

	$idCliente = $_SESSION['idUsuario'];

	$sql = mysqli_query($conexao, "SELECT * FROM servico WHERE idcliente = '{$idCliente}'");
	 
	while ($recebe = mysqli_fetch_array($sql)) {
		array_push($servicos, $recebe);			
	}

	return $servicos;

	}
	
?>

<?php
	
	function carregaContrato($conexao){
		$contratos = array();

		$idUsuario = $_SESSION['id'];

		$sql = mysqli_query($conexao, "SELECT c.idContrato, s.tiposervico, s.valor, s.descricao, cl.nome, cl.telefone, c.status FROM contrato AS c
							INNER JOIN servico AS s
							ON c.idServico = s.idServico
							INNER JOIN usuario AS u
							ON c.idUsuario = u.idUsuario
                            INNER JOIN cliente AS cl 
                            ON c.idCliente = cl.idCliente WHERE c.idUsuario = '{$idUsuario}' AND c.status <> 'Rejeitado' AND c.status <> 'Cancelado' AND c.status <> 'Finalizado'");

		while($recebe = mysqli_fetch_array($sql)){
			array_push($contratos, $recebe);
		}

		return $contratos;

	}


?>

<?php
	
	function carregarContratoCliente($conexao){

		$carregaContrato = array();

		$idCliente = $_SESSION['idUsuario'];

		$recebeServicoSolicitado = mysqli_query($conexao, "SELECT c.idContrato, s.tiposervico, s.valor, s.descricao, u.nome, u.email, u.telefone, c.status FROM contrato AS c
												INNER JOIN servico AS s
												ON c.idServico = s.idServico
												INNER JOIN usuario AS u
												ON c.idUsuario = u.idUsuario
												WHERE c.idCliente = '{$idCliente}' AND c.status <> 'Rejeitado' AND c.status <> 'Cancelado' AND c.status <> 'Finalizado' AND c.status <> 'Concluido'");

		while ($recebe = mysqli_fetch_array($recebeServicoSolicitado)) {
				array_push($carregaContrato, $recebe);
		}

		return $carregaContrato;

	}

?>

<?php

	function carregaHistoricoCliente($conexao){

		$carregaContratoFinalizado = array();

		$idCliente = $_SESSION['idUsuario'];

		$recebeContratoFinalizado = mysqli_query($conexao, "SELECT c.idContrato, s.tiposervico, s.valor, s.descricao, u.nome, u.email, u.telefone, REPLACE(c.status, 0, 'Finalizado') AS status FROM contrato AS c
												INNER JOIN servico AS s
												ON c.idServico = s.idServico
												INNER JOIN usuario AS u
												ON c.idUsuario = u.idUsuario
												WHERE c.idCliente = {$idCliente} AND c.status = '0'");

		while ($recebe = mysqli_fetch_array($recebeContratoFinalizado)) {
				array_push($carregaContratoFinalizado, $recebe);
		}

		return $carregaContratoFinalizado;


	}

?>

<?php

	function carregaServicoUsuario($conexao) {


	$servicos = array();

	$sql = mysqli_query($conexao, "SELECT servico.idServico, servico.tiposervico, servico.valor, servico.descricao, cliente.nome FROM servico 
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

		$idUsuario = $_SESSION['id'];

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

				$idUsuario = $_SESSION['id'];
				$sql = mysqli_query($conexao, "SELECT nome FROM usuario WHERE idUsuario = '{$idUsuario}' ");
				$recebendoNome = mysqli_fetch_row($sql);
				$recebeu = $recebendoNome[0];

				return $recebeu;

	}
	
?>

<?php

	function recebeNomeCliente($conexao){

				$idCliente = $_SESSION['idUsuario'];
				$sql = mysqli_query($conexao, "SELECT nome FROM cliente WHERE idCliente = '{$idCliente}' ");
				$recebendoNome = mysqli_fetch_row($sql);
				$recebeu = $recebendoNome[0];

				return $recebeu;

	}
	
?>