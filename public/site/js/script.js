ifl1 = {};
const iflSlider = {
  redim: false,
  init: function (slider) {
    iflSlider.ajustaTamanho(slider);
    slider.find(".sliderBtn button").each(function (idx, btn) {
      $(btn).click(function (event) {
        let pre = $(slider).find(".sliderPreCorpo");
        let i = $(slider).find(".sliderItem");
        let w = i.outerWidth(true);
        let novo = 0;
        if (idx == 1 || $(btn).hasClass("proximo")) novo = pre[0].scrollLeft + w;
        else novo = pre[0].scrollLeft - w;
        if ("scrollBehavior" in document.documentElement.style)
          pre[0].scroll({ left: novo, behavior: "smooth" });
        else pre.stop(true, true).animate({ scrollLeft: novo }, 300);
      });
    });
  },
  initTodos: function () {
    $(".slider").each(function (idxS, slider) {
      iflSlider.init($(slider));
    });
  },
  resizeTodos: function () {
    $(".slider .sliderItem").css("width", "");
    $(".slider .sliderPreCorpo").css("width", "");
    if (iflSlider.redim) {
      clearTimeout(iflSlider.redim);
      iflSlider.redim = false;
    }
    iflSlider.redim = setTimeout(function () {
      $(".slider").each(function (idxS, slider) {
        iflSlider.ajustaTamanho($(slider));
        iflSlider.redim = false;
      });
    }, 100);
  },
  ajustaTamanho: function (slider) {
    let pre = $(slider).find(".sliderPreCorpo");
    if (pre.length) {
      let corpo = $(slider).find(".sliderCorpo");
      let i = $(slider).find(".sliderItem");
      let w = i.outerWidth(true);
      let sw = pre.outerWidth(true);
      if (sw < w) i.css("width", sw + "px");
      if (pre[0].offsetWidth < corpo[0].offsetWidth) slider.find(".sliderBtn").css("opacity", "");
      else slider.find(".sliderBtn").css("opacity", "0");
    }
  },
};
const backdrop = {
  visivel: true,
  init: function () {
    setTimeout(function () {
      if (backdrop.visivel) {
        //console.log('Demorando para carregar...');
        backdrop.esconde();
      }
    }, 10 * 1000);
  },
  esconde: function () {
    $("#backdrop").css("background", "");
    $("#backdrop>div").fadeOut();
    $("#backdrop").delay(350).fadeOut("slow");
    $("body").delay(350).css("overflow", "");
    backdrop.visivel = false;
  },
};
const wfform = {
  init: function () {
    $("form .input").on("focus, blur, keydown, change, select,textInput, input", (e) =>
      wfform.valida(e.target)
    );
    $("form .input").blur((e) => wfform.blur(e.target));
    $("form .input").keydown((e) => wfform.keydown(e));
    $("form button.botao").click((e) => wfform.envia(e.target));
  },
  valida: (i) => {
    const l = i.labels[0];
    let valido = false;
    //if(i.name=='nome')valido= /^\w\w+( \w\w+)+$/.test(ifl1.formatador.limpar(i.value));
    if (i.name == "nome") valido = ifl1.formatador.limpar(i.value).length >= 3;
    else if (i.name == "celular" || i.name == "telefone")
      valido = /^\(?[1-9]{2}\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$/.test(
        ifl1.formatador.soNumeros(i.value)
      );
    else if (i.name == "email")
      valido = /^[^@ ]+@([^@ ]+[.][^@ ]+)+$/.test(ifl1.formatador.limpar(i.value));
    else if (i.name == "cpf")
      valido = ifl1.validador.validar.cpf(ifl1.formatador.soNumeros(i.value));
    else if (i.name == "cep")
      valido = ifl1.validador.validar.cep(ifl1.formatador.soNumeros(i.value));
    else if (i.name == "rg" || i.name == "cidade" || i.name == "bairro" || i.name == "logradouro")
      valido = ifl1.formatador.limpar(i.value).length > 3;
    else if (i.name == "nascimento") valido = ifl1.formatador.soNumeros(i.value).length == 8;
    else if (i.name == "sexo" || i.name == "uf") valido = i.value != -1;
    else if (i.name == "numero") valido = ifl1.formatador.soNumeros(i.value) != "";
    else valido = true;
    if (valido) {
      l.classList.add("valido");
      l.classList.remove("invalido");
      if (i.name == "celular" || i.name == "telefone")
        fetch(
          "https://brasilapi.com.br/api/ddd/v1/" + ifl1.formatador.soNumeros(i.value).substr(0, 2),
          { method: "GET", credentials: "omit", cache: "default" }
        ).then((r) => r.json().then((json) => (i.dataset.uf = json.state)));
      else if (i.name == "cep")
        fetch("https://brasilapi.com.br/api/cep/v1/" + ifl1.formatador.soNumeros(i.value), {
          method: "GET",
          credentials: "omit",
          cache: "default",
        }).then((r) =>
          r.json().then((json) => {
            if (json.hasOwnProperty("state")) {
              wfform.valida($(i.form).find('.input[name="uf"]').val(json.state)[0]);
              wfform.valida($(i.form).find('.input[name="cidade"]').val(json.city)[0]);
              wfform.valida($(i.form).find('.input[name="bairro"]').val(json.neighborhood)[0]);
              wfform.valida($(i.form).find('.input[name="logradouro"]').val(json.street)[0]);
            } else {
              wfform.valida($(i.form).find('.input[name="uf"]').val("")[0]);
              wfform.valida($(i.form).find('.input[name="cidade"]').val("")[0]);
              wfform.valida($(i.form).find('.input[name="bairro"]').val("")[0]);
              wfform.valida($(i.form).find('.input[name="logradouro"]').val("")[0]);
            }
          })
        );
    } else {
      l.classList.add("invalido");
      l.classList.remove("valido");
      if (i.name == "celular" || i.name == "telefone") delete i.dataset.uf;
      else if (i.name == "cep") {
        wfform.valida($(i.form).find('.input[name="uf"]').val("")[0]);
        wfform.valida($(i.form).find('.input[name="cidade"]').val("")[0]);
        wfform.valida($(i.form).find('.input[name="bairro"]').val("")[0]);
        wfform.valida($(i.form).find('.input[name="logradouro"]').val("")[0]);
      }
    }
  },
  blur: (i) => {
    if (i.name == "cep" || i.name == "complemento")
      $(i.form).find('.input[name="complemento"]').parent().addClass("valido");
    if (i.labels[0].classList.contains("valido")) {
      if (i.name == "nome" || i.name == "logradouro" || i.name == "bairro" || i.name == "cidade")
        i.value = ifl1.formatador.digitado.nome(ifl1.formatador.limpar(i.value));
      else if (i.name == "celular" || i.name == "telefone")
        i.value = ifl1.formatador.digitado.telefone(ifl1.formatador.soNumeros(i.value));
      else if (i.name == "cpf")
        i.value = ifl1.formatador.digitado.cpf(ifl1.formatador.soNumeros(i.value));
      else if (i.name == "cep")
        i.value = ifl1.formatador.digitado.cep(ifl1.formatador.soNumeros(i.value));
      else i.value = ifl1.formatador.limpar(i.value);
    }
  },
  keydown: (e) => {
    const n = e.target.labels[0].nextElementSibling;
    if (e.keyCode == 13) {
      e.preventDefault();
      if (n.nodeName == "LABEL") n.focus();
      else if (n.nodeName == "BUTTON") n.click();
      return false;
    }
  },
  envia: (btn) => {
    btn.disabled = true;
    btn.innerHTML = "Enviando...";
    $(btn.form).find("label.radio").addClass("valido").removeClass("invalido");
    if ($(btn.form).find(".valido").length < $(btn.form).find("label").length) {
      let aviso = $(btn.form).find(".aviso").first();
      aviso.html("Um ou mais campos não está preenchidos corretamente.");
      aviso.addClass("exibe");
      setTimeout(() => aviso.removeClass("exibe"), 3000);
      $(btn.form).find("label:not(.valido)").first().focus();
      $(btn.form).find(".invalido").first().focus();
      btn.disabled = false;
    } else {
      let dados = { formulario: location.pathname.substr(1) };
      $(btn.form)
        .find(".input")
        .each((k, i) => {
          if (i.name == "celular" || i.name == "telefone") {
            dados[i.name] = ifl1.formatador.soNumeros(i.value);
            dados[i.name + "UF"] = i.dataset.uf;
          } else if (i.name == "cpf" || i.name == "cep")
            dados[i.name] = ifl1.formatador.soNumeros(i.value);
          else if (i.type == "radio") {
            if (i.checked) dados[i.name] = i.value;
          } else dados[i.name] = i.value;
        });
      const opt = {
        redirect: "follow",
        method: "POST",
        credentials: "include",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(dados),
        cache: "no-cache",
      };
      //console.log('dados',dados);
      fetch("/_ajax.php?cadastro", opt).then((r) =>
        r.json().then((json) => {
          btn.disabled = false;
          let aviso = $(btn.form).find(".aviso").first();
          aviso.html(json.msg);
          aviso.addClass("exibe");
          setTimeout(() => aviso.removeClass("exibe"), 10000);
          if (json.sucesso) {
            btn.form.reset();
            $(btn.form).find(".valido,.invalido").removeClass("valido invalido");
            window.location.href = "/cadastro-concluido" + "?" + location.pathname.substr(1);
          }
        })
      );
    }
  },
};
const movel = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
$(function () {
  function ajustes() {
    if (window.innerWidth > 1290) $("#blog .gradeBlog>div:nth-child(n+3)").addClass("magro");
    else $("#blog .gradeBlog>div:nth-child(n+3)").removeClass("magro");
  }

  if ("serviceWorker" in navigator) {
    //navigator.serviceWorker.register('/sw.js');
  }
  iflSlider.initTodos();
  ajustes();
  $(window).resize(function () {
    ajustes();
    iflSlider.resizeTodos();
  });
  $("header nav button.menu").click((e) => {
    $("header nav").toggleClass("sobe");
    $("header nav .menuLateral").scrollTop(0);
  });
  $(document).on("wheel", "header>nav", (e) => {
    const y = event.deltaY > 0 ? 1 : event.deltaY < 0 ? -1 : 0;
    const x = event.deltaX > 0 ? 1 : event.deltaX < 0 ? -1 : 0;
    if (y < 0 && $(e.target).is("nav") && window.innerWidth <= 977) {
      $("header nav").addClass("sobe");
      $("header nav .menuLateral").scrollTop(0);
    }
  });
  document.addEventListener("scroll", (e) => {
    if (window.innerWidth <= 977) {
      $("header nav").addClass("sobe");
      $("header nav .menuLateral").scrollTop(0);
    }
  });

  if (!movel)
    $("a.whatsapp").each(function () {
      $(this).attr("href", "https://web." + $(this).attr("href").substr(12));
    });

  $("a.ancora").click((e) => {
    if (location.pathname == "/") {
      e.preventDefault();
      let href = $(e.target).attr("href") || $(e.target).closest("a").attr("href");
      if (
        href.length >= location.pathname.length &&
        href.substr(0, location.pathname.length) == location.pathname
      )
        href = href.substr(location.pathname.length);
      const alvo = href[0] == "#" ? $("#" + href.substr(1)) : $("header");
      $("html,body").animate({ scrollTop: alvo.offset().top - 50 }, 500);
      return false;
    }
  });
});

$(window).on("load", function () {
  // 	let debug=3;
  // 	let viewPadrao='';
  // 	ifl1.init.iniciar(debug,viewPadrao);
  backdrop.esconde();
  //if(window.innerWidth>=1440)setTimeout(()=>$('header nav').removeClass('sobe'),750);

  if (location.hash != "") {
    location.hash == "";
    window.history.replaceState({}, "", "/");
  }
  let pathname = location.pathname;
  if (pathname[pathname.length - 1] == "/") pathname = pathname.substr(0, pathname.length - 1); //remove "/" do fim do endereço
  if (pathname.includes("%20")) pathname = pathname.split("%20").join("-"); //troca espaços por traços
  if (pathname != location.pathname) window.history.replaceState({}, "", pathname); //efetiva correções, se necessário
  wfform.init();
});

$(" section.s_detail .container-fav .card-button").click(() => {
  $("section.s_detail .container-fav .card-area").toggleClass("active");
  $(" section.s_detail .container-fav .card-button").toggleClass("active");
});
