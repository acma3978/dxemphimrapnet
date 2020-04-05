var MResponsive = {};

$(document).ready(function(e) {
    MResponsive.init();
});

MResponsive.init = function() {
    MResponsive.Core.init();
};

MResponsive.Core = {
    init: function() {

        MResponsive.Core.templateHeader();

    },

    templateHeader: function() {
        $(document).ready(function() {

            //Xử lý khi ấn vào nút menu
            $(".btn-humber").click(function() {

                var $menu = $(".main-menu");
                var overlay = '<div id="overlay_menu" onclick="$(\'.btn-humber\').click()"></div>';
                $this = $(this);
                var hw = $(window).height();
                if ($menu.hasClass('expanded')) {
                    $menu.removeClass('expanded');
                    $this.removeClass('active');
                    $('#overlay_menu').remove();
                } else {
                    //$('.main-menu').height(hw);
                    $menu.addClass('expanded');
                    $this.addClass('active');
                    $('body').append(overlay);
                    setTimeout(function() {
                        $('#overlay_menu').addClass('slide');
                    }, 300)

                }
            });

            $(".fa-search.mobile").click(function() {
                var $this = $(this);
                var $formsearch = $("#mform_search");
                var overlay = '<div id="overlay_search" onclick="$(\'.fa-search.mobile\').click()"></div>';
                if ($formsearch.hasClass('expanded')) {
                    $formsearch.removeClass('expanded');
                    $('#overlay_search').remove();
                } else {
                    $formsearch.addClass('expanded');
                    $('body').append(overlay);
                    $("#mkeyword").focus();
                }
            });

            $(".menu-item>a").click(function(){
                  var $this = $(this);
                  var $sub = $this.next();
                           
                  //Nếu không có submenu thì redirect luôn vào link đc click
                  if(!$sub.hasClass('sub-menu')){
                     var link = $this.attr('href');
                     window.location.href = link;
                  }else{
                     if($sub.hasClass('expanded')){
                        $sub.removeClass('expanded');
                        $this.removeClass('active');
                        
                     }else{
                        $('.sub-menu').removeClass('expanded');
                        $sub.addClass('expanded');
                        $this.addClass('active');
                     }
                     return false;
                  }
                });

        });
    },
};