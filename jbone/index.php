<?php get_header(); ?>
<?php 
global $post;
$authordata = wp_get_current_user();
$categorias = get_the_category();
$Categoria_ID = $categorias[0]->cat_ID;

$idpost = $post->ID;
$post_type = get_post_type();

if (is_single()) {
    $url_actual = "wp/v2/" . $post_type .'s/' . $idpost. '/';   
} elseif (is_category()) {
    $url_actual = "wp/v2/categories/" . $categorias[0]->cat_ID;
} else {
    $url_actual = "wp/v2/comments/1";
}
//$url_actual = "wp/v2/" . $post_type .'s/' . $idpost. '/';
$endpoint = get_rest_url(null,$url_actual);
$codigo_fuente = file_get_contents($endpoint,true);
$codigo_fuente = json_decode($codigo_fuente, true);
echo @$categorias[0]->cat_ID;
echo @$codigo_fuente[title][rendered];
echo @$codigo_fuente[content][rendered];


 echo "<pre>";
 print_r($codigo_fuente);
 echo "</pre>";
// echo "<pre>";
// print_r($authordata);
// echo "</pre>";
// echo "<pre>";
// print_r($categorias);
// echo "</pre>";

?>
<?php get_footer(); ?>

