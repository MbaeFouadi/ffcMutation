jQuery(document).ready(function() {
    /* On surveille les cliques sur les liens du menu */
    jQuery(".mn button").click(function(e) {
        /* On désactive l'action par défaut des liens */
        e.preventDefault();

        /* On récupère la valeur de l'onglet à activer */
        var tab = jQuery(this).data("tab");
        console.log(tab);

        /* On masque tous les contenus */
        jQuery(".tab").removeClass("tab-active");

        /* On affiche le contenu qui doit l'être */
        jQuery("#" + tab).addClass("tab-active");

        /* On désactive tous les onglets */
        jQuery(".mn button").removeClass("active");

        /* On active l'onglet qui a été cliqué */
        jQuery(this).addClass("active");
    });
});