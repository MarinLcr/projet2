<?php mesmerize_get_header();
/* Template name: Page Ventes */ ?>

<div class="content post-page">
	<div class="gridContainer">
		<div class="row">


<div class="post-list-item col-xs-12 space-bottom col-sm-12" data-masonry-width="<?php mesmerize_print_masonry_col_class(true); ?>">
    <div id="post-<?php the_ID(); ?>" <?php post_class('blog-post card '); ?>>
        <div class="post-content">
    <h2 class="title_loc">Appartements à vendre</h2>
    <p>Retrouver l’ensemble de nos biens immobiliers mis en ventes par notre agence sur l’ensemble du territoire français. L’ensemble des chalets proposés par notre agence ont été examiné afin de s’assurer qu’ils répondent aux exigences de notre agence et de notre clientèle.</p>

            <div class="row space-bottom spaced-cols center-sm">
    <?php $loop = new WP_Query( array( 'post_type' => 'nosventes', 'posts_per_page' => '10' ) ); ?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div class="col-xs-12 col-sm-4 text-center col-md-6 coljs ">
<div class="card no-padding bordered">
<a href="<?php the_permalink(); ?>">	    
<div class="contentswap-effect contentswap-overlay hover">
	    <?php 
$image = get_field('photos');
if( !empty($image) ): ?>
    <div class="initial-image"><img class="img_log_first" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/></div>
<?php endif; ?> 
<div class="overlay bg-color6"></div>
<div class="swap-inner col-xs-12"><div class="row full-height-row middle-xs middle-sm"><div class="col-xs-12 text-center content-holder"></div></div></div>
<div class="col-xs-12 inte_try">
    <div class="space-bottom space-top">
<h5><?php the_title() ?></h5>
       <p><?php the_field('mini_description'); ?></p>
<img class="custom-image" src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/cropped-plus-1-1.png" alt="" title="cropped-plus-1-1.png">
</div>
    </div>
</div>
</a>
</div>
</div>
<?php endwhile; wp_reset_query(); ?>



</div>
<button type="button">Plus</button>
 </div>

        </div>
    </div>
</div>
</div>
</div>
</div>

<?php get_footer(); ?>


<? /* <div class="<?php mesmerize_print_archive_entry_class(); ?>" data-masonry-width="<?php mesmerize_print_masonry_col_class(true); ?>"> */ ?>