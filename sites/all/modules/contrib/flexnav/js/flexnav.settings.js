/**
 * @file
 * flexnav.settings.js
 */
(function($) {

  /**
   * jQuery Behaviors for Flexnav.
   */
  Drupal.behaviors.flexnav = {
    attach: function (context, settings) {
      // Attach settings.
      for (var instance in settings.flexnav) {
        var menu = $('#' + instance);
        $(menu).flexNav(settings.flexnav[instance].options);

        // Attempt to set active trail by path.
        if (settings.flexnav[instance].settings.activeTrail) {
          var pathname = $(location).attr('pathname');
          var path = pathname.replace(Drupal.settings.basePath, '');

          $.each($(menu).children().find('a'), function(index, value) {
            var linkPath = $(value).attr('href').replace(Drupal.settings.basePath, '');

            if (linkPath.length && path.toLowerCase().indexOf(linkPath) >= 0) {
              $(value).addClass('active-trail');
            }
          });
        }
      }
    }
  };

})(jQuery);
