<?php 
$select_db="SELECT * FROM news ORDER BY id DESC LIMIT 10";
$result_db=mysql_query($select_db,$conn);
//$result_write = mysql_fetch_array($result_db);
while (False !==  $result_write = mysql_fetch_array($result_db)){
    echo '<div class="new_text">'.
        '<div><h3>'.$result_write['title'].'</h3>'.
        '<p><img src="'.$result_write['img_src'].'">'.$result_write['text'].'</p></div>'.
        '<span class="date_public">Дата публикации: '.$result_write['date'].'</span>'.
        '</div>';

}

?>