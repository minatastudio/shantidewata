<?php
$pathimg_testimonial = "../assets/image/testimonial/";
$pathimg_property = "../assets/image/property/";
$pathimg_content = "../assets/image/content/";


function load_page($url)
{
    $new = explode('?', $url);
    $path = explode('&&', $new[1]);
    $new_path = explode('=', $path[0]);
    $page = $new_path[1] . ".php";
    return $page;
}

function posturl($url)
{
    $new = explode('/', $url);
    $page = $new[2];
    return $page;
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
function nomer($table, $link)
{
    $query = "select * from $table ";
    $nn = mysqli_query($link, $query) or die("Query Failed = $query");
    $nn1 = mysqli_num_rows($nn);
    $no = $nn1 + 1;
    return $no;
}

function insert_harga($id, $id_pro, $tipe, $harga, $ac, $table, $link)
{
    $sql = mysqli_query($link, "insert into $table values ('$id','$id_pro','$tipe','$harga','$ac')");
    return $sql;
}


function insert_1($id, $name, $content, $img, $imgname, $meta, $table, $link)
{
    $names = str_replace("'", "&acute;", $name);
    //alias
    $contents = str_replace("'", "&acute;", $content);
    $new_ali = preg_replace(array('/<span>/', '/<span>/', '/[^a-zA-Z0-9]/', '/--/'), "-", $names);


    $contents = str_replace("'", "&acute;", $content);
    $sql = "insert into $table values ('$id','$names','$contents','$img','$imgname','1','$meta','$new_ali')";
    $cek = mysqli_query($link, "select * from $table where name = '$names'");
    if ($ceks = mysqli_fetch_array($cek, MYSQLI_BOTH)) {
        $hasil = "<div class=\"alert alert-danger\">";
        $hasil .= "<p><strong>Error!!!</strong> Data Already in database, plase add another datas....!</p></div>";
    } else {
        $insert = mysqli_query($link, $sql) or die("Query Failed = $sql");
        if ($insert) {
            $hasil = "<div class=\"alert alert-success\">";
            $hasil .= "<p>Data Update Successfully....!</p></div>";
        }
    }
    return $hasil;
}


function edit_1($id, $name, $content, $img, $imgname, $meta, $table, $link)
{
    $names = str_replace("'", "&acute;", $name);
    //alias
    $contents = str_replace("'", "&acute;", $content);
    $new_ali = preg_replace(array('/<span>/', '/<span>/', '/[^a-zA-Z0-9]/', '/--/'), "-", $names);

    $contents = str_replace("'", "&acute;", $content);
    $sql = "update $table set name='$names', content ='$contents', image = '$img', imgname = '$imgname', meta = '$meta', alias = '$new_ali' where id = '$id'";
    $cek = mysqli_query($link, "select * from $table where name = '$names' and id != '$id'");
    if ($ceks = mysqli_fetch_array($cek, MYSQLI_BOTH)) {
        $hasil = "<div class=\"alert alert-danger\">";
        $hasil .= "<p><strong>Error!!!</strong> Data Already in database, plase add another datas....!</p></div>";
    } else {
        $insert = mysqli_query($link, $sql) or die("Query Failed = $sql");
        if ($insert) {
            $hasil = "<div class=\"alert alert-success\">";
            $hasil .= "<p>Data Update Successfully....!</p></div>";
        }
    }
    return $hasil;
}

function getname($table, $id, $link)
{
    $get = mysqli_query($link, "select * from $table where id = '$id'");
    $get_value = mysqli_fetch_array($get, MYSQLI_BOTH);
    $name = $get_value[name];
    return $name;
}
