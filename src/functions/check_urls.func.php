<?php
function __checkURLs($resultado, $url_) {

    __plus();
    $code = !is_null($_SESSION["config"]["ifcode"]) ? $_SESSION["config"]["ifcode"] : 200;
    $valor = ($resultado['server']['http_code'] == $code) ? "{$_SESSION["c4"]}" : NULL;

    echo PHP_EOL."{$_SESSION["c1"]}  |_[ INF ]{$_SESSION["c0"]}[{$_SESSION["c1"]} {$_SESSION['config']['cont_valores']} {$_SESSION["c0"]}]".PHP_EOL;
    echo "{$_SESSION["c1"]}  |_[ INF ][URL] {$_SESSION["c0"]}::{$_SESSION["c9"]}{$valor} {$url_} {$_SESSION["c0"]}".PHP_EOL;
    echo "{$_SESSION["c1"]}  |_[ INF ][STATUS]::{$valor} {$resultado['server']['http_code']} {$_SESSION["c0"]}".PHP_EOL;

    __timeSec('delay');
    echo "{$_SESSION["c1"]}{$_SESSION['config']['line']}{$_SESSION["c0"]}";
    __plus();

    $target_ = ['url_clean' => $url_, 'url_xpl' => $url_];

    if ($resultado == $code):

        $_SESSION['config']['resultado_valores'].= $url_.PHP_EOL;
        __saveValue($_SESSION["config"]["arquivo_output"], $url_);
        __plus();

        (__not_empty($_SESSION['config']['sub-file']) &&
                is_array($_SESSION['config']['sub-file']) ? __subExecExploits($target_['url_xpl'], $_SESSION['config']['sub-file']) : NULL);
        __plus();

        (__not_empty($_SESSION['config']['command-vul']) ? __command($_SESSION['config']['command-vul'], $target_) : NULL);
        __plus();

        (__not_empty($_SESSION['config']['exploit-vul-id']) ?
                        __configExploitsExec($_SESSION['config']['exploit-vul-id'], $target_) : NULL);
        __plus();
    endif;

    (__not_empty($_SESSION['config']['exploit-all-id']) ? __configExploitsExec($_SESSION['config']['exploit-all-id'], $target_) : NULL);
    __plus();

    (__not_empty($_SESSION['config']['command-all']) ? __command($_SESSION['config']['command-all'], $target_) : NULL);
    __plus();

    $_SESSION['config']['cont_valores'] ++;

    __plus();
}