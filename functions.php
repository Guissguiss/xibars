<?php
function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
?>

<?php
/**
 * Supprimer les attributs width et height des images à la une dans les modules Blog spécifiques
 */
function custom_remove_img_dimensions( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
    // Cibler uniquement les images générées par le module Blog avec notre classe spécifique
    // ATTENTION : Cette logique pourrait nécessiter un ajustement fin si le HTML est plus complexe
    if ( strpos( $html, 'blog-miniatures-special' ) !== false ) { // Vérifie si la classe est présente dans le HTML de l'image
        $html = preg_replace( '/(width|height)="\d+"/', '', $html ); // Supprime les attributs width et height
        $html = preg_replace( '/(width|height):\s*\d+px;/', '', $html ); // Supprime les styles inline si présents
    }
    return $html;
}
// Appliquer le filtre pour les images à la une de WordPress (général)
add_filter( 'post_thumbnail_html', 'custom_remove_img_dimensions', 10, 5 );

// Si le filtre ci-dessus ne suffit pas, Divi pourrait avoir son propre filtre.
// Vous pouvez essayer de cibler les images après le chargement du module Blog avec JS si le PHP ne marche pas.
?>