<?php
setlocale(LC_ALL, 'pt_BR.utf8');

include '../../services/connect.php';

$report1 = mysqli_query($con, "SELECT M.NAME AS MEMBER, E.NAME AS EVENT FROM MEMBERS M
INNER JOIN EVENTS E ON E.MEMBER_ID = M.ID;");

$report2 = mysqli_query($con, "SELECT MN.NAME, COUNT(M.ID) AS QTD FROM MINISTRYS MN
INNER JOIN MEMBERS M ON M.MINISTRY_ID = MN.ID 
GROUP BY MN.NAME;");

$report3 = mysqli_query($con, "SELECT M.NAME, TIMESTAMPDIFF(YEAR, M.BIRTH_DATE, CURDATE()) AS AGE, M.ADDRESS, M.EMAIL, M.PHONE, MN.NAME AS MINISTRY
FROM MEMBERS M
INNER JOIN MINISTRYS MN ON MN.ID = M.MINISTRY_ID
WHERE TIMESTAMPDIFF(YEAR, M.BIRTH_DATE, CURDATE()) > 18;");

$alias = $_GET['alias'];
$data = array();

switch ($alias) {
    case 'membersXevents':
        while ($row = mysqli_fetch_array($report1)) {
            $data[] = $row;
        }
        break;

    case 'ministrysXmembers':
        while ($row = mysqli_fetch_array($report2)) {
            $data[] = $row;
        }
        break;

    case 'membersUp18':
        while ($row = mysqli_fetch_array($report3)) {
            $data[] = $row;
        }
        break;
}
// Nome do arquivo CSV
$filename = "" . $alias . ".csv";

// Definir cabeçalho do tipo de conteúdo para download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');

// Abrir o ponteiro de saída para o arquivo CSV
$output = fopen('php://output', 'w');


switch ($alias) {
    case 'membersXevents':
        fputcsv($output, array('NAME', 'EVENT'));
        break;

    case 'ministrysXmembers':
        fputcsv($output, array('NAME', 'QTD'));

        break;

    case 'membersUp18':
        fputcsv($output, array('NAME', 'AGE', 'ADDRESS', 'EMAIL', 'PHONE'));
        break;
}

// Escrever os dados no arquivo CSV
foreach ($data as $row) {
    array_walk($row, function (&$value) {
        $value = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $value);
    });
    fputcsv($output, $row);
}

// Fechar o ponteiro de saída
fclose($output);
