(function ($) {    
    $(".dot-good").off("click");

    
    $(".dot-good").click(function () {
        if ($(this).hasClass('done')) {
            $(this).removeClass('done');
            var id = $(this).data("id"),
                action = $(this).data('action'),
                rateHolder = $(this).children('.count');
            var ajax_data = {
                action: "cancelDotGood",
                um_id: id,
                um_action: action
            };
            $.post(themeAdminAjax.url, ajax_data,function (data) {
                $(rateHolder).html(data);
            });
            // $(".fullname").click();
            $(".dot-good").removeClass("dot-good:focus");
            return false;
        } else {
            $(this).addClass('done');
            var id = $(this).data("id"),
                action = $(this).data('action'),
                rateHolder = $(this).children('.count');
            var ajax_data = {
                action: "dotGood",
                um_id: id,
                um_action: action
            };
            $.post(themeAdminAjax.url, ajax_data,function (data) {
                $(rateHolder).html(data);
            });
            return false;
        }
    });

})(jQuery);