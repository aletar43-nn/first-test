<?php
// вывод информации из БД
    $select_db="SELECT * FROM news ORDER BY id DESC LIMIT 10";
    $result_db=mysqli_query($conn, $select_db);

    $max_posts=10;
    $num_post=mysqli_num_rows($result_db);
    $num_pages=intval(($num_post-1)/$max_posts)+1;


echo '<div class="news_write"><header><h2>НОВОСТИ</h2></header>'; // блок вывода новостей
    while ($result_write = mysqli_fetch_array($result_db)){
        echo '<div class="new_text">'.
            '<div><h3>'.$result_write['title'].'</h3>'.
            '<p><img src="'.$result_write['img_src'].'">'.$result_write['text'].'</p></div>'.
            '<span class="date_public">Дата публикации: '.$result_write['date'].'</span>'.
            '</div>';

    }
echo '</div>'; // конец блока вывода новостей

echo '<div class="news_footer">'.   // блок для постраничной навигации
        '<ul>'.
        '<li><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li> <li><a href="#">...</a></li> <li><a href="#">Последняя</a></li>'.
        '</ul>'.
        '</div>'.

        '</div>'.

            '</body>'.

        '</html>';

?>