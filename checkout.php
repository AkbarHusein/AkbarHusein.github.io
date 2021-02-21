<?php

if (isset($_POST['no_transaksi']) and isset($_POST['jenis_member']) and isset($_POST['merk']) and isset($_POST['jumlah_barang'])) {
    $no_transaksi = $_POST['no_transaksi'];
    $jenis_member = $_POST['jenis_member'];
    $merk = $_POST['merk'];
    $jumlah_barang = $_POST['jumlah_barang'];
} else {
    die("ada variable yg belum didefinisikan");
}

function cekMerk($merk_)
{
    if ($merk_ == "guess") {
        return  2000000;
    } else if ($merk_ == "coach") {
        return  3000000;
    } else if ($merk_ == "zara") {
        return  1500000;
    } else if ($merk_ == "bodypack") {
        return  1000000;
    } else {
        return "Merk tidak ada";
    }
}

function hitungTotalHarga($jenisMember, $jumlahBarang, $merk_)
{
    switch ($jenisMember) {
        case "platinum": {
                if ($jumlahBarang >= 3) {
                    $hargaJumlahBarang = (cekMerk($merk_) * $jumlahBarang);
                    $diskon = (10 / 100) *  $hargaJumlahBarang;
                    return ($hargaJumlahBarang - $diskon);
                } else {
                    return (cekMerk($merk_) * $jumlahBarang);
                }
                break;
            }
        case "gold": {
                if ($jumlahBarang >= 5) {
                    $hargaJumlahBarang = (cekMerk($merk_) * $jumlahBarang);
                    $diskon = (10 / 100) * $hargaJumlahBarang;
                    return ($hargaJumlahBarang - $diskon);
                } else {
                    return (cekMerk($merk_) * $jumlahBarang);
                }
                break;
            }
        case "silver": {
                if ($jumlahBarang >= 3) {
                    $hargaJumlahBarang = (cekMerk($merk_) * $jumlahBarang);
                    $diskon = (5 / 100) * $hargaJumlahBarang;
                    return ($hargaJumlahBarang - $diskon);
                } else {
                    return (cekMerk($merk_) * $jumlahBarang);
                }
                break;
            }
        default: {
                if ($jumlahBarang >= 10) {
                    $hargaJumlahBarang = (cekMerk($merk_) * $jumlahBarang);
                    $diskon = (5 / 100) * $hargaJumlahBarang;
                    return ($hargaJumlahBarang - $diskon);
                } else {
                    return (cekMerk($merk_) * $jumlahBarang);
                }
            }
    }
}



echo "No Transaksi  : {$no_transaksi} <br>";
echo "Jenis Member  : {$jenis_member} <br>";
echo "Merk          : {$merk} <br>";
echo "Harga satuan  : Rp." . cekMerk($merk) . "<br>";
echo "Jumlah Barang : {$jumlah_barang} <br>";
echo "Total Harga   : Rp." . (cekMerk($merk) * $jumlah_barang) . "<br>";
echo "Harga setelah diskon : Rp." . hitungTotalHarga($jenis_member, $jumlah_barang, $merk);
