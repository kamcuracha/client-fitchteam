jQuery(document).ready(function($) {
    var util = {
        Global: {
            init: function() {
                this.stickyNav();
                this.showFeaturette();
                this.targetBlank();
            },
            stickyNav: function() {
                $(window).scroll(function() {
                    clearTimeout($.data(this, "scrollCheck")), $.data(this, "scrollCheck", setTimeout(function() {
                        $(window).scrollTop() > 160 ? $("body").addClass("navbar-shrink").trigger('shrinked') : $("body").removeClass("navbar-shrink").trigger('unshrinked')
                    }, 10))
                });
            },
            showFeaturette: function() {
                $(".btn-toggler").click(function (event) {
                    var btnlink = jQuery( this );

                    event.preventDefault();
                    $(this).toggleClass("collapsed");
                    $("div.featurette").slideToggle("fast");

                    if (btnlink.hasClass('collapsed')) {
                        btnlink.text('Read Less');
                    } else {
                        btnlink.text('Read More');
                    }
                });
            },
            targetBlank: function() {
                $(".target-blank a").attr("target", "_blank");
            }
        }
    };

    $(window).load(function() {
        $("#preloader").fadeOut("slow", function() {
            $(this).remove()
        })
    });

    util.Global.init();

    $(".animatedParent").appear();

    $(document.body).on("appear", ".animatedParent", function(t, e) {
        var i = $(this).find(".animated"),
            s = $(this);
        if (void 0 != s.attr("data-sequence")) {
            var n = $(this).find(".animated:first").attr("data-id"),
                o = n,
                a = $(this).find(".animated:last").attr("data-id");
            $(s).find(".animated[data-id=" + o + "]").addClass("go"), o++, delay = Number(s.attr("data-sequence")), $.doTimeout(delay, function() {
                return $(s).find(".animated[data-id=" + o + "]").addClass("go"), ++o, a >= o ? !0 : void 0
            })
        } else i.addClass("go")
    }), $(document.body).on("disappear", ".animatedParent", function(t, e) {
        $(this).hasClass("animateOnce") || $(this).find(".animated").removeClass("go")
    }), $(window).load(function() {
        $.force_appear()
    }), "function" != typeof Object.create && (Object.create = function(t) {
        function e() {}
        return e.prototype = t, new e
    })
});