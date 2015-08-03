<?php
// вывод информации из БД
    $select_db="SELECT * FROM news ORDER BY id DESC LIMIT 10";
    $result_db=mysql_query($select_db,$conn);

    $max_posts=10;
    $num_post=mysql_num_rows($result_db);
    $num_pages=intval(($num_post-1)/$max_posts)+1;



while (False !==  $result_write = mysql_fetch_array($result_db)){
    echo '<div class="new_text">'.
        '<div><h3>'.$result_write['title'].'</h3>'.
        '<p><img src="'.$result_write['img_src'].'">'.$result_write['text'].'</p></div>'.
        '<span class="date_public">Дата публикации: '.$result_write['date'].'</span>'.
        '</div>';

}

?>