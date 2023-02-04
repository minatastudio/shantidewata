<?php
$new_url = str_replace('.html', '', $_SERVER['REQUEST_URI']);
$url_arr = explode('/', $new_url);
array_splice($url_arr, 0, 2);

$_GET['version'] = $new_url;

$_GET['path1'] = $url_arr[0];
$path1 = $url_arr[0];

$_GET['path2'] = $url_arr[1];
$path2 = $url_arr[1];

$_GET['path3'] = $url_arr[2];
$path3 = $url_arr[2];

$_GET['path4'] = $url_arr[3];
$path4 = $url_arr[3];

$_GET['path5'] = $url_arr[4];
$path5 = $url_arr[5];

$_GET['path6'] = $url_arr[5];
$path6 = $url_arr[6];

$_GET['path7'] = $url_arr[6];
$path7 = $url_arr[7];

$_GET['path8'] = $url_arr[7];
$path8 = $url_arr[8];

$_GET['path9'] = $url_arr[8];
$path9 = $url_arr[9];

$_GET['path10'] = $url_arr[9];
$path10 = $url_arr[10];


$root = "http://shantidewata.project";
$copyright1 = " ©2023 Bali Ride. All Right Reserved. <a href=$root>Shanti Dewata Property</a> ";
$copyright2 = "Design by <a href=http://www.minatastudio.com target=_blank style=margin-left:2px;><img src=$root/assets/image/minata.png style=height:12px; /></a>";


$pathimg_property = $root . "/assets/image/property/";
$pathimg_content = $root . "/assets/image/content/";
$wap_link = "https://api.whatsapp.com/send?phone=&text=hi,i would like to now more about casa batu belig";

function getname($table, $id, $link)
{
    $get = mysqli_query($link, "select * from $table where id = '$id'");
    $get_value = mysqli_fetch_array($get, MYSQLI_BOTH);
    $name = $get_value[name];
    return $name;
}
function getalias($table, $id, $link)
{
    $get = mysqli_query($link, "select * from $table where id = '$id'");
    $get_value = mysqli_fetch_array($get, MYSQLI_BOTH);
    $name = $get_value[alias];
    return $name;
}
function label($active)
{
    if ($active == "1") {
        $label = "<span class=\"label label-sm label-success\"> Approved </span>";
    } else if ($active == "2") {
        $label = "<span class=\"label label-sm label-info\"> Sold </span>";
    } else {
        $label = "<span class=\"label label-sm label-danger\"> Deleted </span>";
    }
    return $label;
}
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
function yes($data)
{
    if ($data == "1") {
        $hasil = "Yes";
    } else {
        $hasil = "No";
    }
    return $hasil;
}
function pricing($data)
{
    if ($data == "2") {
        $info = " / Day";
    } else if ($data == "3") {
        $info = " / Week";
    } else if ($data == "4") {
        $info = " /er Month";
    } else if ($data == "5") {
        $info = " / Year";
    } else if ($data == "6") {
        $info = " / Are";
    } else if ($data == "7") {
        $info = " / 100M<sup>2</sup>";
    } else if ($data == "8") {
        $info = " / Are / Year";
    } else if ($data == "9") {
        $info = " / 100M<sup>2</sup> / Year";
    } else {
        $info = "";
    }
    return $info;
}
