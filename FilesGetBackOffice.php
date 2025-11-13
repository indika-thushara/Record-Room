<?php
require __DIR__ . '/vendor/autoload.php';
require_once 'db_connection.php';

$sql = "Call filesGetBackOff()";
$result = mysqli_query($conn, $sql);
$title = "Files are get back to the office.";
$html = "<h2 style='text-align:center; margin-bottom:15px;'>$title</h2>";
$html .= "<table border='1' cellpadding='8' cellspacing='0' width='100%'>
    <tr style='background:#f2f2f2;'>
    <th>File number</th><th>File name</th><th>Get back to office on</th><th>Department</th><th>Officer name</th>
    </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<tr>
        <td>{$row['fileNumber']}</td>
        <td>{$row['fileName']}</td>
        <td>{$row['getBackOfficeOn']}</td>
        <td>{$row['departmentName']}</td>
        <td>{$row['officerName']}</td>        
        </tr>";
}
$html .= "</table>";

// Initialize mPDF
$mpdf = new \Mpdf\Mpdf([
    'margin_top' => 30,   // leave space for header
    'margin_bottom' => 20 // leave space for footer
]);

$header = '
    <div style="text-align:left; font-size:12px; border-bottom:1px solid #000; padding-bottom:5px;">
        <img src="' . __DIR__ . '/logo.png" height="60" style="vertical-align:middle; margin-right:10px;">
        <span><strong>Record Room Management System</strong></span>
    </div>';

$mpdf->SetHTMLHeader($header);

// FOOTER
$footer = '
    <div style="text-align:center; font-size:10px; border-top:1px solid #000; padding-top:5px;">
        ©copyright at ' . date("Y-m-d") . ' | ABC Company | Page {PAGENO} of {nb}
    </div>';

$mpdf->SetHTMLFooter($footer);

// Write content
$mpdf->WriteHTML($html);

// Output
$mpdf->Output("FilesAreGetBacktoOffice.pdf", "I");
