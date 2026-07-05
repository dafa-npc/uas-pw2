<?php
require_once ('vendor/autoload.php');
include 'koneksi.php';

$pdf = new TCPDF();
$pdf->setCreator(PDF_CREATOR);
$pdf->setTitle("Katalog Menu Restoran");
$pdf->setHeaderData('', 0, "Katalog Menu Resto 622", 'Laporan Master Data');
$pdf->setMargins(15, 27, 15);
$pdf->AddPage();

$query = "SELECT * FROM tb_menu ORDER BY kategori ASC";
$result = mysqli_query($koneksi, $query);

$html = '<h2 style="text-align: center;">Daftar Harga & Menu</h2><br/>';
$html .= '<table border="1" cellpadding="5">
    <thead>
    <tr style="background-color: #555555; color: #fff; text-align: center; font-weight: bold;">
        <th width="10%">No</th>
        <th width="20%">Kode</th>
        <th width="35%">Nama Menu</th>
        <th width="15%">Kategori</th>
        <th width="20%">Harga (Rp)</th>
    </tr>
    </thead>
    <tbody>';

$no = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>
        <td width="10%" align="center">' . $no++ . '</td>
        <td width="20%" align="center">' . $row['kode_menu'] . '</td>
        <td width="35%">' . $row['nama_menu'] . '</td>
        <td width="15%" align="center">' . $row['kategori'] . '</td>
        <td width="20%" align="right">' . number_format($row['harga'],0,',','.') . '</td>
    </tr>';
}
$html .= '</tbody></table>';

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output("Katalog_Resto622.pdf", "I");
?>