<?php /* Template Name: Library */ ?>
<?php get_header(); ?>
    <main id="primary" class="site-main">
		<br class="divider"/><br class="divider"/>
		<?php
        echo '<div class="nu my036"><br/>';
        ?>
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <label>
            <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
            <input class="search-field" placeholder="<?php echo esc_attr_x( 'What are you looking for …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
        </label>
        <div class="">
            <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
        </div>
        </form>
        <br/></div>

        <div class="nu my036"> <div class="catday">
            <?php
            $categories = get_categories();
            foreach($categories as $category) {
                $springmm_cat = $category->name;
                $springmm_cat_id = $springmm_cat[0]->cat_ID;
                $springmm_catname = $springmm_cat[0]->name; 
                $springmm_catlink = get_category_link($category->term_id); 
                $springmm_cat_data = get_option("category_$category->term_id");
                $springmm_cat_imgurl = $springmm_cat_data['img'];
                $springmm_catpostcount = $springmm_cat[0]->count;
                ?>
                
                
                    <a href="<?php echo $springmm_catlink; ?>">
                        <div class="catday-cont" style="background-image:url('<?php echo $springmm_cat_imgurl; ?>');background-position:center;background-repeat:no-repeat;background-size:cover;background-blend-mode:multiply;">
                            <br/><br/><br/><br/><span class="catday-content"><?php echo $springmm_cat; ?></span><br/><span class="catday-content"><?php echo $category->count.'&nbsp;Posts'; ?></span>
                        </div>
                    </a>
                
                

            <?php
            }
            ?>
        </div> </div>
        
        <div class="nu my036">
            <?php
                $tags = get_tags();
                foreach ( $tags as $tag ) :
                $tag_link = get_tag_link( $tag->term_id );
            ?>
            <a href='<?php echo $tag_link; ?>' title='<?php echo $tag->name; ?>' class='<?php echo $tag->slug ?>'><span class="nu ctags"><i class="bi bi-tag">&nbsp;</i><?php echo $tag->name ?></span></a>
            <?php
                endforeach;
            ?>
	</main>

<script>
    document.getElementById("library").style.color = "#1966c9";
    document.getElementById("library").style.borderBottom = "thick solid #1966c9";
</script>
<?php
get_sidebar();
get_footer();
