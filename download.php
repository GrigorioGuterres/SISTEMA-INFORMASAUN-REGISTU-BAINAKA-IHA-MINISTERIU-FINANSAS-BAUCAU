<?php
// Sambungkan ke database atau proses data sesuai kebutuhan Anda
// ...

// Buat dokumen Word baru dengan PHPWord atau library PHP Word lainnya
require_once 'vendor/autoload.php'; // Sesuaikan dengan library yang Anda gunakan

// Inisialisasi objek PHPWord
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Buat sektion dokumen
$section = $phpWord->addSection();

// Tambahkan konten ke dalam dokumen (sesuaikan dengan struktur konten Anda)
$section->addText('Contoh Data:');

// Tambahkan tabel ke dalam dokumen
$table = $section->addTable();
$table->addRow();
$table->addCell(2000)->addText('ID BAINAKA');
$table->addCell(2000)->addText('NARAN BAINAKA');
$table->addCell(2000)->addText('IMAGEN');
$table->addCell(2000)->addText('SEXO');
$table->addCell(2000)->addText('DATA REJISTU');
$table->addCell(2000)->addText('NO-HP');
$table->addCell(2000)->addText('MUNICIPIU');
$table->addCell(2000)->addText('KOMPANIA');
$table->addCell(2000)->addText('TIPU REJISTU');

// Ambil data dari database atau sumber data lainnya dan masukkan ke dalam tabel

// Simpan dokumen ke dalam file temporer
$tempFileName = 'temp.docx';
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save($tempFileName);

// Tentukan nama file yang akan diunduh
$fileName = 'data_word.docx';

// Set header untuk mengunduh dokumen Word
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
readfile($tempFileName);

// Hapus file temporer setelah diunduh
unlink($tempFileName);

// Selesai
exit;
?>
