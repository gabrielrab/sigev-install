<?php
$step = (isset($_GET['step'])) ? (int) $_GET['step'] : null;

//Quantidades de step's
$qtnEstapas = 5;

if(empty($step) || $step > $qtnEstapas) {
    header('Location: ./?step=1');
}

require_once('step/pagina-'.$step.'.php');
?>