<?php

include_once 'vendor/autoload.php';
include_once 'isAuthentificated.php';

ob_start();
include './strippedListEtudiant.php';
$htmlContent = ob_get_clean();

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$options->set('enable_remote', true);
$dompdf = new Dompdf($options);

$dompdf->loadHtml($htmlContent);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('etudiants.pdf', ['Attachment' => false]);
