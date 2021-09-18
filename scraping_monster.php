<?php
include ('simple_html_dom.php');
include ('config.php');

$html = file_get_html('https://www.gensh.in/database/enemies');
$html->find('title', 0)->plaintext;

$hostile_li = $html->find('div[class="row"]', 0);
$neutral_li = $hostile_li->nextSibling(0);

$banyak_hostile = 114;
$banyak_neutral = 23;
$total_monster = $banyak_hostile + $banyak_neutral;

$i = 1;
for($i = 1; $i <= $total_monster; $i++){
    if($i <= $banyak_hostile){
        echo $nama_hostile = $hostile_li->children($i)->children(0)->children(0)->children(0)->children(0)->children(1)->children(0)->plaintext;
        echo ' <br>';
        echo $link_hostile = $hostile_li->children($i)->children(0)->href;
        echo '<br>';
        $sql = "insert into monster_list(nomor, nama_musuh, status, link) value ('$i','$nama_hostile', 'Hostile', 'https://www.gensh.in$link_hostile')";
        $query = mysqli_query($db_connection, $sql);
    }

    else{
        echo $nama_neutral = $neutral_li->children($i-$banyak_hostile)->children(0)->children(0)->children(0)->children(0)->children(1)->children(0)->plaintext;
        echo ' <br>';
        echo $link_neutral = $neutral_li->children($i-$banyak_hostile)->children(0)->href;
        echo '<br>';
        $sql = "insert into monster_list(nomor, nama_musuh, status, link) value ('$i','$nama_neutral', 'Neutral', 'https://www.gensh.in$link_neutral')";
        $query = mysqli_query($db_connection, $sql);
    }
    
    //if($query){
    //    echo 'mantul <br>';
    //}else{
    //    echo mysqli_error($db_connection);
    //}
}