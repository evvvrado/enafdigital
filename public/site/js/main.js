$('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function (event) {
        // On-page links
        if (
            location.pathname.replace(/^\//, "") ==
                this.pathname.replace(/^\//, "") &&
            location.hostname == this.hostname
        ) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length
                ? target
                : $("[name=" + this.hash.slice(1) + "]");
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top,
                    },
                    1000,
                    function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) {
                            // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr("tabindex", "-1"); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                    }
                );
            }
        }
    });

$(document).ready(() => {
    $(".fade").first().removeClass("fade");

    $(".back-drop").animate(
        {
            opacity: 0,
        },
        3000
    );
    var i = 0;
    $(document).scroll(() => {
        if ($(document).scrollTop() !== 0) {
            $("header").addClass("_active");
        } else {
            $("header").removeClass("_active");
        }

        $(".fade").each(function () {
            if (
                $(document).scrollTop() >=
                $(this).closest("div.container-fav").offset().top -
                    ($(window).height() * 3) / 4
            ) {
                $(this).removeClass("fade");
            }
        });

        if ($(".s_depoimentos .container-fav ._numeros").length) {
            if (
                $(document).scrollTop() >=
                $(".s_depoimentos .container-fav").offset().top -
                    $(".s_depoimentos .container-fav ._numeros").height() * 2
            ) {
                while (i < $(".s_depoimentos ._boxes ._box").length) {
                    var max =
                        document.getElementsByClassName("counting")[i]
                            .innerHTML;
                    animateValue(
                        document.getElementsByClassName("counting")[i],
                        0,
                        max,
                        3000
                    );
                    i++;
                }
            }
        }
    });

    var oldScroll = 0;
    var circleAnimation = 0;

    $("._hamburguer, .close_superMenu").click(() => {
        $(".d_superMenu").toggleClass("_showed");
    });


    $("._carrinho_button, .d_carrinho ._close").click(() => {
        $(".d_carrinho").toggleClass("active");
    });

    $("._filter nav ._filterItem:first-child").click(() => {
        $("._filter nav ._filterItem").removeClass("active");
        $("._filter nav ._filterItem:first-child").addClass("active");

        $("._cursosList ._curso.presencial").css("display", "inline-block");
        $("._cursosList ._curso.ead").css("display", "inline-block");
        $("._cursosList ._curso.online").css("display", "inline-block");
    });
    $("._filter nav ._filterItem:nth-child(2)").click(() => {
        $("._filter nav ._filterItem").removeClass("active");
        $("._filter nav ._filterItem:nth-child(2)").addClass("active");

        $("._cursosList ._curso.presencial").css("display", "none");
        $("._cursosList ._curso.ead").css("display", "none");
        $("._cursosList ._curso.online").css("display", "inline-block");
    });
    $("._filter nav ._filterItem:nth-child(3)").click(() => {
        $("._filter nav ._filterItem").removeClass("active");
        $("._filter nav ._filterItem:nth-child(3)").addClass("active");

        $("._cursosList ._curso.presencial").css("display", "none");
        $("._cursosList ._curso.online").css("display", "none");
        $("._cursosList ._curso.ead").css("display", "inline-block");
    });
    $("._filter nav ._filterItem:last-child").click(() => {
        $("._filter nav ._filterItem").removeClass("active");
        $("._filter nav ._filterItem:last-child").addClass("active");

        $("._cursosList ._curso.online").css("display", "none");
        $("._cursosList ._curso.ead").css("display", "none");
        $("._cursosList ._curso.presencial").css("display", "inline-block");
    });

    $("._menu ._previous").click(function () {
        var content = $(this).closest("div.container-fav").find("div._content");
        content.scrollLeft(content.scrollLeft() - content.width());

        content.scroll(() => {
            verifyIndicator(content);
        });
    });

    $("._menu ._next").click(function () {
        var content = $(this).closest("div.container-fav").find("div._content");
        content.scrollLeft(content.scrollLeft() + content.width());

        content.scroll(() => {
            verifyIndicator(content);
        });
    });


    $("form label input,form label textarea").focus(function () {
        $(this).parent().find("span").addClass("active");
    });

    $("form label input,form label textarea").focusout(function () {
        if ($(this).val() == "") {
            $(this).parent().find("span").removeClass("active");
        }
    });

 
    $(".s_galeria .container-fav ._content ._galeriaList ._picture img").click(
        (e) => {
            if (document.fullscreenElement == null)
                e.target.requestFullscreen();
            else document.exitFullscreen();
        }
    );

    $(
        "body#treinador section.s_duvidas .container-fav ._duvidas ._box ._main, section.s_content .container-fav ._modulos ._box ._main"
    ).click(function () {
        $(this).closest("div._box").toggleClass("active");
    });

    // A FEIRA

    $(
        "body#feira .s_backtoFeira .container-fav, .s_feira ._filter ._close"
    ).click(() => {
        $(".s_feira ._filter").toggleClass("active");
    });

    $("    .b_b, .a_b, .a_b_b").click(() => {
        $("._blackground, ._form").show();
    });
    $("._form ._close").click(() => {
        $("._blackground, ._form").hide();
    });

    $(".area_SCA").click(() => {
        $("._box").addClass("sca");
        $("._blackground").show();
    });

    $(".area_REDE").click(() => {
        $("._box").addClass("rede");
        $("._blackground").show();
    });

    $(".area_GYMPASS").click(() => {
        $("._box").addClass("gympass");
        $("._blackground").show();
    });

    $(".area_LION").click(() => {
        $("._box").addClass("lionfit");
        $("._blackground").show();
    });

    $("._box ._close").click(() => {
        $("._box").attr("class", "_box");
        $("._blackground").hide();
    });

    $(".a_d ._t").hover(() => {
        $(".a_d ._t ._bubble").toggleClass("active");
    });
    $(".a_d_b ._t").hover(() => {
        $(".a_d_b ._t ._bubble").toggleClass("active");
    });
    $(".a_c picture").hover(() => {
        $(".a_c ._bubble").toggleClass("active");
    });
    $(".a_c ._bubble").hover(() => {
        $(".a_c ._bubble").toggleClass("active");
    });
    $(".b_c picture").hover(() => {
        $(".b_c ._bubble").toggleClass("active");
    });
    $(".b_c ._bubble").hover(() => {
        $(".b_c ._bubble").toggleClass("active");
    });
    $(".b_a ._bubble").hover(() => {
        $(".b_a ._bubble").toggleClass("active");
    });
    $(".b_v ._bubble").hover(() => {
        $(".b_v ._bubble").toggleClass("active");
    });

    $("._l ._c ._bubble").hover(function () {
        $(this).closest("._c").find("._bubble").toggleClass("active");
    });
});

//CONTADOR DE NÚMEROS

function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        obj.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

function verifyIndicator(content) {
    var container = content.closest("div.container-fav");
    container.addClass("passing");
    if (content.scrollLeft() <= 1210) {
        $(".passing ._menu ._indicator img").removeClass("active");
        $(".passing ._menu ._indicator img:first-child").addClass("active");
    } else if (content.scrollLeft() >= 1210 && content.scrollLeft() < 2410) {
        $(".passing ._menu ._indicator img").removeClass("active");
        $(".passing ._menu ._indicator img:nth-child(2)").addClass("active");
    } else {
        $(".passing ._menu ._indicator img").removeClass("active");
        $(".passing ._menu ._indicator img:last-child").addClass("active");
    }
    container.removeClass("passing");
}

var depoimentoSlideIndicator = 0;
var depoimentoSliderFrom = true;
function depoimentoSlide() {
    if (depoimentoSlideIndicator <= 2 && depoimentoSliderFrom === true) {
        var content = $(
            "body#treinador section.s_depoimentos-single .container-fav main ._content "
        );
        content.scrollLeft(content.scrollLeft() + content.width());

        depoimentoSlideIndicator++;

        if (depoimentoSlideIndicator === 2)
            depoimentoSliderFrom = !depoimentoSliderFrom;
    } else if (
        depoimentoSlideIndicator >= 0 &&
        depoimentoSliderFrom === false
    ) {
        var content = $(
            "body#treinador section.s_depoimentos-single .container-fav main ._content "
        );
        content.scrollLeft(content.scrollLeft() - content.width());

        depoimentoSlideIndicator--;

        if (depoimentoSlideIndicator === 0)
            depoimentoSliderFrom = !depoimentoSliderFrom;
    }
}

setInterval(depoimentoSlide, 5000);

console.log(
    "%cSe perdeu? Está tudo bem!",
    "color: #FF3434; font-family:monospace; font-size: 35px"
);
console.log(
    "%c                             Desenvolvido por: %c@hyp8tec",
    "color:#5cedd7; font-family:monospace; font-size: 15px",
    "color: #0379E8; font-family:monospace; font-size: 15px"
);


