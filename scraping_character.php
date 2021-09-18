<?php
include ('simple_html_dom.php');
include ('config.php');

$html = file_get_html('https://www.gensh.in/characters/');
$html->find('title', 0)->plaintext;

$character_li = $html->find('div[class="row character-list"]', 0);
$banyak_karakter = 42;
$i = 0;
for($i = 0; $i < $banyak_karakter; $i++){
    echo $nomor = $i+1;
    echo $nama_karakter = $character_li->children($i)->children(0)->children(1)->children(0)->plaintext;
    echo ' <br>';
    echo $rarity = $character_li->children($i)->children(0)->children(1)->children(1)->plaintext;
    echo '<br>';
    echo $link = $character_li->children($i)->children(0)->href;
    echo '<br>';
    $sql = "insert into character_list(nomor, nama_karakter, rarity, link) value ('$nomor', '$nama_karakter', '$rarity', 'https://www.gensh.in$link')";
    $query = mysqli_query($db_connection, $sql);
    //if($query){
        //header('Location: index.php?status=sukses');
    //}else{
    //    echo mysqli_error($db_connection);
    //}
}
