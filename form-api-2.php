<?php

	//Campos via GET
	$nome		=		$_GET['nome'];
	$email		=		$_GET['email'];
	
	//Conexão
	$url = 'https://homolog.dropserv.com.br/api/v2/employer-register';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, true);

    $data = array(
        'nome' => $nome,
        'email' => $email
    );

	//Enviar os dados
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);

	//Exibir Info do Curl
	//$info = curl_getinfo($ch);
	//print_r ($info);

	//Encerrar conexão
    curl_close($ch);
	
	//Retornar resultados
	$result 			= 	unserialize($output);
	$result_status 		= 	$result['status'];
	$result_mensagem 	= 	$result['mensagemRetorno'];

	echo $result_status . ' : ' . $result_mensagem;

?>