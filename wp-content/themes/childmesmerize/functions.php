<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
function wpc_acf_google_map_api($api) {
	$api['key'] = 'AIzaSyDEAn2W2pBumOuYib6-6FQ2z-6y29KXK5k';
	return $api;
}
add_filter('acf/fields/google_map/api', 'wpc_acf_google_map_api');
/* Custom post type Achat */
/*
* On utilise une fonction pour créer notre custom post type 'Séries TV'
*/


function wpm_custom_post_type() {

		// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Locations', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Location', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Locations'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les locations'),
		'view_item'           => __( 'Voir les locations'),
		'add_new_item'        => __( 'Ajouter une nouvelle location'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la location'),
		'update_item'         => __( 'Modifier la location'),
		'search_items'        => __( 'Rechercher une loation'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Locations'),
		'description'         => __( 'Tous sur locations'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-admin-multisite',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'nos-locations'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'noslocations', $args );

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Ventes', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Vente', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Ventes'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les ventes'),
		'view_item'           => __( 'Voir les ventes'),
		'add_new_item'        => __( 'Ajouter une nouvelle vente'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer la vente'),
		'update_item'         => __( 'Modifier la vente'),
		'search_items'        => __( 'Rechercher une vente'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Ventes'),
		'description'         => __( 'Tous sur les ventes'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-admin-network',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'nos-ventes'),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'nosventes', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );

/*
* On utilise une fonction pour créer notre custom post type 'Séries TV'
*/


add_action( 'init', 'wpm_custom_post_type', 0 );

// Deuxième partir du code 

add_action( 'init', 'wpm_add_taxonomies', 0 );

//On crée 3 taxonomies personnalisées: Année, Réalisateurs et Catégories de série.

function wpm_add_taxonomies() {


		// Taxonomie Localisation
	
	$labels_adressetry = array(
		'name'                       => _x( 'Adresses', 'taxonomy general name'),
		'singular_name'              => _x( 'Adresse', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une adresse'),
		'all_items'                  => __( 'Toutes les adresses'),
		'edit_item'                  => __( 'Editer une adresse'),
		'update_item'                => __( 'Mettre à jour une adresse'),
		'add_new_item'               => __( 'Ajouter une nouvelle adresse'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une adresse'),
		'not_found'                  => __( 'Pas d adresse trouvées'),
		'menu_name'                  => __( 'Adresse'),
	);

	$args_adressetry = array(
		'hierarchical'          => false,
		'labels'                => $labels_adressetry,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'adressestry' ),
	);

	register_taxonomy( 'adressestry', 'noslocations', $args_adressetry );
	
	// Taxonomie Année

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_personnetry = array(
		'name'              			=> _x( 'Personnes', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Personne', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher un nombre de personne'),
		'all_items'        				=> __( 'Toutes les personnes'),
		'edit_item'         			=> __( 'Editer le nombre de personne'),
		'update_item'       			=> __( 'Mettre à jour le nombre de personne'),
		'add_new_item'     				=> __( 'Ajouter un nouveau nombre de personne'),
		'new_item_name'     			=> __( 'Valeur du nouveau nombre de personne'),
		'separate_items_with_commas'	=> __( 'Séparer le nombre de personne par une virgule'),
		'menu_name'         => __( 'Personnes'),
	);

	$args_personnetry = array(
	// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
		'hierarchical'      => false,
		'labels'            => $labels_personnetry,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'personnes' ),
	);

	register_taxonomy( 'personnestry', 'noslocations', $args_personnetry );

	// Taxonomie Superficie
	
	$labels_superficietry = array(
		'name'                       => _x( 'Superficies', 'taxonomy general name'),
		'singular_name'              => _x( 'Superficie', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une superficie'),
		'all_items'                  => __( 'Toutes les superficies'),
		'edit_item'                  => __( 'Editer une superficie'),
		'update_item'                => __( 'Mettre à jour une superficie'),
		'add_new_item'               => __( 'Ajouter une nouvelle superficie'),
		'new_item_name'              => __( 'Taille de la nouvelle superficie'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une superficie'),
		'not_found'                  => __( 'Pas de superfice trouvées'),
		'menu_name'                  => __( 'Superficie'),
	);

	$args_superficietry = array(
		'hierarchical'          => false,
		'labels'                => $labels_superficietry,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'superficies' ),
	);

	register_taxonomy( 'superficiestry', 'noslocations', $args_superficietry );
	
	/* Taxonomie pour les ventes */
			// Taxonomie Localisation
	
	$labels_adresse = array(
		'name'                       => _x( 'Adresses', 'taxonomy general name'),
		'singular_name'              => _x( 'Adresse', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une adresse'),
		'all_items'                  => __( 'Toutes les adresses'),
		'edit_item'                  => __( 'Editer une adresse'),
		'update_item'                => __( 'Mettre à jour une adresse'),
		'add_new_item'               => __( 'Ajouter une nouvelle adresse'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une adresse'),
		'not_found'                  => __( 'Pas d adresse trouvées'),
		'menu_name'                  => __( 'Adresse'),
	);

	$args_adresse = array(
		'hierarchical'          => false,
		'labels'                => $labels_adresse,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'adresses' ),
	);

	register_taxonomy( 'adresses', 'nosventes', $args_adresse );
	
	// Taxonomie Année

	// On déclare ici les différentes dénominations de notre taxonomie qui seront affichées et utilisées dans l'administration de WordPress
	$labels_personne = array(
		'name'              			=> _x( 'Personnes', 'taxonomy general name'),
		'singular_name'     			=> _x( 'Personne', 'taxonomy singular name'),
		'search_items'      			=> __( 'Chercher un nombre de personne'),
		'all_items'        				=> __( 'Toutes les personnes'),
		'edit_item'         			=> __( 'Editer le nombre de personne'),
		'update_item'       			=> __( 'Mettre à jour le nombre de personne'),
		'add_new_item'     				=> __( 'Ajouter un nouveau nombre de personne'),
		'new_item_name'     			=> __( 'Valeur du nouveau nombre de personne'),
		'separate_items_with_commas'	=> __( 'Séparer le nombre de personne par une virgule'),
		'menu_name'         => __( 'Personnes'),
	);

	$args_personne = array(
	// Si 'hierarchical' est défini à false, notre taxonomie se comportera comme une étiquette standard
		'hierarchical'      => false,
		'labels'            => $labels_personne,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'personnes' ),
	);

	register_taxonomy( 'personnes', 'nosventes', $args_personne );

	// Taxonomie Superficie
	
	$labels_superficie = array(
		'name'                       => _x( 'Superficies', 'taxonomy general name'),
		'singular_name'              => _x( 'Superficie', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher une superficie'),
		'all_items'                  => __( 'Toutes les superficies'),
		'edit_item'                  => __( 'Editer une superficie'),
		'update_item'                => __( 'Mettre à jour une superficie'),
		'add_new_item'               => __( 'Ajouter une nouvelle superficie'),
		'new_item_name'              => __( 'Taille de la nouvelle superficie'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer une superficie'),
		'not_found'                  => __( 'Pas de superfice trouvées'),
		'menu_name'                  => __( 'Superficie'),
	);

	$args_superficie = array(
		'hierarchical'          => false,
		'labels'                => $labels_superficie,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'superficies' ),
	);

	register_taxonomy( 'superficies', 'nosventes', $args_superficie );


	// Catégorie de locations

	$labels_cat_equip = array(
		'name'                       => _x( 'Equipements de locations', 'taxonomy general name'),
		'singular_name'              => _x( '<Equipement de location', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher un équipement'),
		'popular_items'              => __( 'Equipements populaires'),
		'all_items'                  => __( 'Tous les équipements'),
		'edit_item'                  => __( 'Editer un équipement'),
		'update_item'                => __( 'Mettre à jour un équipement'),
		'add_new_item'               => __( 'Ajouter un nouvel équipement'),
		'new_item_name'              => __( 'Nom du nouvel équipement'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer un équipement'),
		'choose_from_most_used'      => __( 'Choisir parmi les équipements les plus utilisés'),
		'not_found'                  => __( 'Pas d équipements trouvés'),
		'menu_name'                  => __( 'Equipements de locations'),
	);

	$args_cat_equip = array(
	// Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
		'hierarchical'          => true,
		'labels'                => $labels_cat_equip,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'equipements-locations' ),
	);

	register_taxonomy( 'equipementsslocations', 'noslocations', $args_cat_equip );

		$labels_cat_equiptry = array(
		'name'                       => _x( 'Equipements de locations', 'taxonomy general name'),
		'singular_name'              => _x( '<Equipement de location', 'taxonomy singular name'),
		'search_items'               => __( 'Rechercher un équipement'),
		'popular_items'              => __( 'Equipements populaires'),
		'all_items'                  => __( 'Tous les équipements'),
		'edit_item'                  => __( 'Editer un équipement'),
		'update_item'                => __( 'Mettre à jour un équipement'),
		'add_new_item'               => __( 'Ajouter un nouvel équipement'),
		'new_item_name'              => __( 'Nom du nouvel équipement'),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer un équipement'),
		'choose_from_most_used'      => __( 'Choisir parmi les équipements les plus utilisés'),
		'not_found'                  => __( 'Pas d équipements trouvés'),
		'menu_name'                  => __( 'Equipements de locations'),
	);

	$args_cat_equiptry = array(
	// Si 'hierarchical' est défini à true, notre taxonomie se comportera comme une catégorie standard
		'hierarchical'          => true,
		'labels'                => $labels_cat_equiptry,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'equipements-locations' ),
	);

	register_taxonomy( 'equipementsslocationstry', 'nosventes', $args_cat_equiptry );

}


$client = get_post_meta($post->ID, "client", true);
$date = get_post_meta($post->ID, "date", true);
$technique = get_post_meta($post->ID, "technique", true);


