function checkFormSupport(type) {
  var input = document.createElement("input");
  input.setAttribute("type", type);
  return input.type == type;
}

(function ($) {

  Drupal.behaviors.oneTweaks = {
    attach: function (c) {
      $('input[type=password]').hidePassword(true);
      $('input.text-box[name*="email"],input[type=email],input#edit-name').emailautocomplete();
    }
  };

  Drupal.behaviors.makeFormsMoreGood = {
    attach: function (c, s) {

      if (checkFormSupport('email') !== false) {

        $('input.text-box[name*=phone]').attr('type', 'tel');
        $('input.text-box[name*=email]').attr('type', 'email');

        $('input.text-box[name*="email"]').on('blur', function () {
          $(this).attr('value', $(this).attr('value').toLowerCase());
          $(this).css('textTransform', 'none');
        });

        $('input.text-box[name*="postcode"]').on('blur', function () {
          $(this).attr('value', $(this).attr('value').toUpperCase());
        });

        if ($('.messages.error').length > 0) {
          $('html, body').animate({
            scrollTop: $('.messages.error').offset().top - 50
          }, 200);
        }

      }

    }
  };


  // Override the alert() function.
  window.alert = function (text) {
    if (typeof console != "undefined") {
      console.error("Alert: " + text);
    }
    return true;
  };

  setTimeout(function () {

    $('#admin-menu-wrapper a:contains(Flush all caches)').on('click', function (e) {
      e.preventDefault();
      if (confirm('Are you sure you want to flush ALL caches?\n\nThis is an expensive operation and can\naffect the site performance for some time.')) {
        window.location = $(this).attr('href');
      }
    });

  }, 1700);

})(jQuery);

