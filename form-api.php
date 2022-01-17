<?php

	//Campos via GET
	$nome		=		$_GET['nome'];
	$email		=		$_GET['email'];

	//Conexão
	$url = 'https://homolog.dropserv.com.br/api/v2/employer-register';
	$post = array(
				'nome'	=> $nome,
				'email'	=> $email
	);

	$request = curl_init($url); 
	curl_setopt($request, CURLOPT_HEADER, 0); 
	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($request, CURLOPT_POSTFIELDS, $data); 
	curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

	//Enviar os dados
	$response = (string)curl_exec($request); // execute curl post and store results in $response

	//Encerrar conexão
	curl_close($request);

	//Se não tiver conexão alertar
	if ( !$response ) {
		die('Nada foi devolvido.');
	}

	//Retornar resultados
	$result 			= 	unserialize($response);
	$result_status 		= 	$result['status'];
	$result_mensagem 	= 	$result['mensagemRetorno'];

	echo $result_status . ' : ' . $result_mensagem;

?>