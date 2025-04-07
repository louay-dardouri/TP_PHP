<?php

include_once 'vendor/autoload.php';
include_once 'isAuthentificated.php';

ob_start();
include 'strippedListSection.php';
$htmlContent = ob_get_clean();

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

$dompdf->loadHtml($htmlContent);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('sections.pdf', ['Attachment' => false]);
