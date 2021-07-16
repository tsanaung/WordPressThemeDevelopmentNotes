<?php 
/**
* Article Link: https://wisdmlabs.com/blog/create-link-current-category-wordpress/
**/
  $the_cat = get_the_category();
  $category_name = $the_cat[0]->cat_name;
  $category_link = get_category_link( $the_cat[0]->cat_ID );
?>
  <a href="<?php echo $category_link ?>" class="button is-small is-primary is-rounded"> <?php echo $category_name ?> </a>

<?php
/**
* Article Link: https://wordpress.stackexchange.com/questions/274018/get-category-url-for-current-post
**/
  $category = get_the_category();
  $first_category = $category[0];
  echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name );
?>
