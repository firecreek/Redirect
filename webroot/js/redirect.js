/**
 * Redirect
 *
 */
var Redirect = {};

/**
 * functions to execute when document is ready
 *
 * @return void
 */
Redirect.documentReady = function() {
  Redirect.addRedirect();
  Redirect.removeRedirect();
}



/**
 * add redirect field
 *
 * @return void
 */
Redirect.addRedirect = function() {
    $('a.add-redirect').click(function() {
        $.get(Croogo.basePath+'admin/redirect/redirect/add_field', function(data) {
            $('#route-fields').append(data);
        });
        return false;
    });
}

/**
 * remove redirect field
 *
 * @return void
 */
Redirect.removeRedirect = function() {
    $('div.route a.remove-route').live('click',function() {
      $(this).parents('.route').remove();
      return false;
    });
}


/**
 * document ready
 *
 * @return void
 */
$(document).ready(function() {
  Redirect.documentReady();
});