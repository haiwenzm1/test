//dom加载完成后执行的js
$(function() {

    $('.right-wrap').find('.panel').css('min-height', document.documentElement.clientHeight - 100);

    //全选的实现
    $(".check-all").click(function() {
        $(".ids").prop("checked", this.checked);
    });
    $(".ids").click(function() {
        var option = $(".ids");
        option.each(function(i) {
            if (!this.checked) {
                $(".check-all").prop("checked", false);
                return false;
            } else {
                $(".check-all").prop("checked", true);
            }
        });
    });





    /**顶部警告栏*/
    var content = $('#main');
    var top_alert = $('#top-alert');
    top_alert.find('.close').on('click', function() {
        top_alert.removeClass('block').slideUp(200);
        // content.animate({paddingTop:'-=55'},200);
    });

    window.updateAlert = function(text, c) {
        text = text || 'default';
        c = c || false;
        if (text != 'default') {
            top_alert.find('.alert-content').text(text);
            if (top_alert.hasClass('block')) {} else {
                top_alert.addClass('block').slideDown(200);
                // content.animate({paddingTop:'+=55'},200);
            }
        } else {
            if (top_alert.hasClass('block')) {
                top_alert.removeClass('block').slideUp(200);
                // content.animate({paddingTop:'-=55'},200);
            }
        }
        if (c != false) {
            top_alert.removeClass('alert-error alert-warn alert-info alert-success').addClass(c);
        }
    };
});