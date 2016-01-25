/*!
 * @copyright Copyright &copy; Roman Korolov, 2016
 * @version 1.0.0
 */



statusaction = (function ($) {
    var pub = {
        change: function(event, pjaxId) {
            url = $(event).attr('href');
            $.post(url, {}, function(data) {
                if (pjaxId) {
                    $.pjax.reload({container:'#' + pjaxId});
                }
                if (typeof app.renderAlert === "function") {
                    app.renderAlert(data);
                }
            });
            return false;
        }
    }
    return pub;
})(jQuery);


