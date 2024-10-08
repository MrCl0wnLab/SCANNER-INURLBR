<?php

function __renewTOR(): void {
    $cor = $GLOBALS['COR'];
    system("[ -z 'pidof tor' ] || pidof tor | xargs sudo kill -HUP;");
    $request = __request_info('http://dynupdate.no-ip.com/ip.php', $_SESSION["config"]["proxy"]);
    __plus();
    echo PHP_EOL, "{$cor->whit}[ INF ]{$cor->red2}[ IP NETWORK TOR RENEWED ]::: {$cor->whit}[ {$request['corpo'] } ]{$cor->end}", PHP_EOL;
    __plus();
    /* https://pt.wikipedia.org/wiki/Pidof
     * pidof é um utilitário Linux que encontra o ID de um programa em execução.
     * Note que o próprio nome é a junção dos termos pid, que significa identidade
     * de um processo e of que significa de. Portanto pidof quer dizer identidade 
     * de processo de...
     * O equivalente no Solaris é pgrep. pidof firefox-bin O commando acima retorna 
     * o pid do processo que está executando firefox-bin.
     * Pode-se combinar o commando 'pidof' com o commando kill dessa forma:
     * kill -9 $(pidof firefox-bin) pidof é simplesmente uma ligação simbólica 
     * para o programa killall5,que está localizado em /sbin.
     */
}