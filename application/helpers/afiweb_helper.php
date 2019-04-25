<?php

function info($mensaje, $severity = 'info', $link = '')
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['info']['mensaje'] = $mensaje;
    $_SESSION['info']['link'] = base_url() . $link;
    $_SESSION['info']['severity'] = $severity;

    redirect(base_url() . 'anonymous/info');
}

?>