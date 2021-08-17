<?php
/*$dados = http_build_query(array(
	'j_username' => 'contarq',
	'j_password' => '8205181920'
));

$contexto = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'content' => $dados,
        'header' => "Content-type: application/x-www-form-urlencoded\r\n" . "Content-Length: " . strlen($dados) . "\r\n",
    )
));

$resposta = file_get_contents('http://sistemas.casamagalhaes.com.br/j_spring_security_check', null, $contexto);

echo $resposta;
*/

/*function get_req($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
    $return = curl_exec($curl);
    curl_close($curl);
    return $return;
};

echo file_get_contents('http://sistemas.casamagalhaes.com.br/home.cm');
*/
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
	$.post('http://sistemas.casamagalhaes.com.br/j_spring_security_check', {j_username:'contarq', j_password:'8205181920'}, function(result){
		print_r(result);
	});

</script>