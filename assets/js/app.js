var App = {};

$(document).ready(function(e) {
    App.Pack();
});

App.Pack = function() {
    App.test.init();
    App.Home.init();
};

App.test = {
    init: function() {
        $(document).ready(function(e) {
            App.test.root();
        })
    },

    root: function() {

    },
}

App.Core = {
    abc: function() {

    },
}

App.Home = {
    init: function() {
        $(document).ready(function(e) {
            App.Home.carousel();
            App.Home.Tab();
            App.Home.showmore();
            App.Home.navbarscroll();
            App.Home.btnrating();
            App.Home.player();
        })
    },
    btnrating: function(){
        $(".btnrating").on('click',(function(e) {

            var previous_value = $("#selected_rating").val();

            var selected_value = $(this).children().attr("data-attr");

            $("#selected_rating").val(selected_value);

            $(".selected-rating").empty();
            $(".selected-rating").html(selected_value);

            for (i = 1; i <= selected_value; ++i) {
                $("#rating-star-"+i).toggleClass('btn-warning');
                $("#rating-star-"+i).toggleClass('btn-default');
            }

            for (ix = 1; ix <= previous_value; ++ix) {
                $("#rating-star-"+ix).toggleClass('btn-warning');
                $("#rating-star-"+ix).toggleClass('btn-default');
            }

        }));
    },
    player: function(){
        if ($("#f_box_player").length > 0){
            //jwplayer.key = "hOhKLZmhSNIQgWnNwiqoGjn1Or48MGPC";
        }
    },
    navbarscroll: function(){
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {myFunction()};

// Get the navbar
        var navbar = document.getElementById("f_navbar");

// Get the offset position of the navbar
        var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    },
    showmore: function(){
        $("a.showmore").click(function(e) {
            //e.preventDefault();
            //$(this).parent().next().slideToggle("fast");
            //console.log($(this).parent());
        });
    },
    carousel: function() {
        $('.carousel').carousel({
            interval: false,
            touch: true
        });
        $('.f_block_carousel_actor').carousel({
            interval: false,
            touch: true
        });
    },
    Tab: function () {
        $(function () {
            var $a = $(".f_tabs li");
            $a.click(function() {
                $a.removeClass("active");
                $(this).addClass("active");
            });

            $(document).off('click.bs.tab.data-api', '[data-hover="tab"]');
            $(document).on('mouseenter.bs.tab.data-api', '[data-toggle="tab"], [data-hover="tab"]', function () {
                $(this).tab('show');
            });


        });
    }
}