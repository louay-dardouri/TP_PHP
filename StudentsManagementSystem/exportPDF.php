<?php

include_once 'vendor/autoload.php';
include_once 'isAuthentificated.php';

ob_start();
include './strippedListEtudiant.php';
$htmlContent = ob_get_clean();

$mpdf = new \Mpdf\Mpdf;
$mpdf->WriteHTML($htmlContent);
$mpdf->Output('etudiants.pdf', 'I');
