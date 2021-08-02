<h1>get_the_category();</h1>
<h3>Understanding get_the_category() function</h3>
<br/>
<h1>Syntax <code>get_the_category( $id )</code></h1>
<h1>Parameters</h1>
<code>Parameter: $id</code><br/>
<code>Details: (int) (Optional) default to current post ID. The post ID.</code>
<p>The get_the_category() returns an array, which means that it can't be directly echo the value returned. 
The following list is objects of each category that you can print:</p>
<ul>Objects
<li>term_id</li>
<li>name</li>
<li>slug</li>
<li>term_group</li>
<li>term_taxonomy_id</li>
<li>taxonomy</li>
<li>description</li>
<li>parent</li>
<li>count</li>
<li>object_id</li>
<li>filter</li>
<li>cat_ID</li>
<li>category_count</li>
<li>category_description</li>
<li>cat_name</li>
<li>category_nicename</li>
<li>category_parent</li>
</ul>
<h3>Usage:</h3>
<code><?php</code>
<code>//This is example of echoing category name and link </code>
<code>//You can see this example @https://github.com/tsanaung/WordPressThemeDevelopmentNotes/blob/master/category/get_category_name_and_link.php </code>
&nbsp<code>&nbsp $the_cat = get_the_category(); </code>
&nbsp<code>&nbsp $category_name = $the_cat[0]->cat_name; </code>
&nbsp<code>&nbsp $category_link = get_category_link( $the_cat[0]->cat_ID ); </code>
<code>?> </code>
&nbsp<code> <a href="<?php echo $category_link ?>" class="button is-small is-primary is-rounded"> <?php echo $category_name ?> </a></code>
<p>Trick: you can make category cover photo inserting the image link as description easily :) </p>
