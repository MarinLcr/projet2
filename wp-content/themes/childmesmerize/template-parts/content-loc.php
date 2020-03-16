<div id="post-<?php the_ID(); ?>"<?php post_class(); ?>>

    <div class="post-content-single">

        <FORM>
<INPUT TYPE="button" 
    VALUE="RETOUR"
    onClick="history.back()"
    class="input_back">
</FORM>

        <h2 class="h1"><?php mesmerize_single_item_title(); ?></h2>
<div class="taxo_bloc">       
<div><img src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/place-localizer.png" alt="" class="ico_tax"><?php the_terms( $post->ID, 'adresses', '' ); ?></div>   
<div><img src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/multiple-users-silhouette.png" alt="" class="ico_tax"><?php the_terms( $post->ID, 'personnes', '' );?> <p class="tax_pref">personnes</p></div>
<div><img src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/square.png" alt="" class="ico_tax"><?php the_terms( $post->ID, 'superficies', '' );?><p class="tax_pref">m²</p></div>
</div>

    <?php 

$image = get_field('photos');

if( !empty($image) ): ?>

    <img class="img_log_first" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>

<?php endif; ?> 

<?php
// Contrôler si ACF est actif
if ( !function_exists('get_field') ) return;
?>

<div class="contener_compos">
<ul class="compos_log">
    <li><img class="icone_compos" src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/bathtub.png" alt=""><strong>Salle(s) de bain</strong><?php the_field('salles_de_bain'); ?></li>
    <li><img class="icone_compos" src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/cooking-on-fire.png" alt=""><strong>Cuisine(s)</strong><?php the_field('cuisines'); ?></li>
    <li><img class="icone_compos" src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/double-bed.png" alt=""><strong>Chambre(s)</strong><?php the_field('chambres'); ?></li>
    <li><img class="icone_compos" src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/toilet.png" alt=""><strong>Toilette(s) séparée(s)</strong><?php the_field('toilettes_separees'); ?></li>
    <li><img class="icone_compos" src="http://leclercmarin.fr/projet1/wp-content/uploads/2018/10/moon.png" alt=""><strong>Séjour minimum</strong><?php the_field('sejour_minimum'); ?></li>
</ul>
<h3 class="equip">Equipements</h3>
<div class="contener_equip"><?php the_terms( $post->ID, 'equipementsslocations', '' ); ?></div>
</div>


<h3 class="equip descrip">Description</h3>
        <div class="post-content-inner">
            
            <?php
            
            if (has_post_thumbnail()) {
                the_post_thumbnail(array(1120), array("class" => "space-bottom-small space-bottom-xs"));
                
            }
            
            the_content();
            
            wp_link_pages(array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'mesmerize') . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'mesmerize') . ' </span>%',
                'separator'   => '<span class="screen-reader-text">,&nbsp;</span>',
            ));
            
            ?>

        </div>



        <?php echo get_the_tag_list('<p class="tags-list"><i data-cp-fa="true" class="font-icon-25 fa fa-tags"></i>&nbsp;', ' ', '</p>'); ?>

    </div>
    
    
    <?php
    
    the_post_navigation(array(
        'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__('Next:', 'mesmerize') . '</span> ' .
                       '<span class="screen-reader-text">' . esc_html__('Next post:', 'mesmerize') . '</span> ' .
                       '<span class="post-title">%title</span><i class="font-icon-post fa fa-angle-double-right"></i>',
        'prev_text' => '<i class="font-icon-post fa fa-angle-double-left"></i>' .
                       '<span class="meta-nav" aria-hidden="true">' . esc_html__('Previous:', 'mesmerize') . '</span> ' .
                       '<span class="screen-reader-text">' . esc_html__('Previous post:', 'mesmerize') . '</span> ' .
                       '<span class="post-title">%title</span>',
    ));
    
    
    
    ?>

</div>
