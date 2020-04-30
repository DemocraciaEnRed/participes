(function ($) {
    "use strict";

    //single listing
    var single_listing = $(".atbd_single_listing");
    var slWidth = single_listing.width();
    if(slWidth <= 300){
        single_listing.addClass("rs_fix");
    }

    // initialize select 2
    $(document).ready(function () {
        $("#at_biz_dir-category").select2({
            placeholder: "Seleccionar categoria",
            width: "100%",
            containerCssClass: "form-control"
        });

        $("#at_biz_dir-location").select2({
            multiple: false,
            width: "100%",
            placeholder: "Estado",
            containerCssClass: "form-control"
        });

        $(".ad_search_category").select2({
            placeholder: "Select Category",
            width: "100%",
            containerCssClass: "form-control"
        });
        $("#atbd_tags").select2({
            tags: true,
            tokenSeparators: [','],
            placeholder: "Select or insert new tags",
            width: "100%",
            containerCssClass: "form-control form-control-tags"
        });
    });

    // enable bootstrap tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // replace all SVG images with inline SVG
    $("img.svg").each(function () {
       var $img = $(this);
       var imgID = $img.attr("id");
       var imgClass = $img.attr("class");
       var imgURL = $img.attr("src");

       $.get(imgURL, function (data) {
           //get the svg tag, ignore the rest
           var $svg = jQuery(data).find("svg");

           //Add replaced image's ID to the new SVG
           if(typeof imgID !== "undefined"){
               $svg = $svg.attr("id", imgID);
           }

           //Add replaced image's classes to the new SVG
           if(typeof imgClass !== "undefined"){
               $svg = $svg.attr('class', imgClass + " replaced-svg");
           }

           // remove any invalid XML tags as per http://validator.w3.org
           $svg = $svg.removeAttr('xmlns:a');

           //replace image width new SVG
           $img.replaceWith($svg);

       }, 'xml');
    });

    // testimonial-carousel
    $(".testimonial-carousel").owlCarousel({
        items: 1,
        dots: false,
        nav: true,
        navText: ['<span class="i la la-long-arrow-left"></span>', '<span class="i la la-long-arrow-right"></span>']
    });

    // logo carousel
    $(".logo-carousel").owlCarousel({
        items: 5,
        nav: false,
        dots: false,
        margin: 100,
        responsive: {
            0:{
                items: 2
            },
            575:{
                items: 3
            },
            767:{
                items: 3
            },
            991:{
                items: 5
            }
        }
    });

    //setting css bg image as inline in html
    $(".bg_image_holder").each(function(){
        var $this = $(this);
        var imgLink = $this.children().attr("src");
        $this.css({
            "background-image": "url(" + imgLink + ")",
            "opacity": "1"
        }).children().attr('alt', imgLink)
    });

    // listing details gallery
    $(".gallery-images").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<span class="slick-arrow prev-arrow"><i class="la la-angle-left"></i></span>',
        nextArrow: '<span class="slick-arrow next-arrow"><i class="la la-angle-right"></i></span>',
        fade: true,
        asNavFor: ".gallery-thumbs"
    });
    $(".gallery-thumbs").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: ".gallery-images",
        dots: false,
        arrows: false,
        focusOnSelect: true
    });

    /* bar rating plugin installation */
    $('.give_rating').barrating({
        theme: 'fontawesome-stars',
        showSelectedRating: true
    });

    /* FAQ Accordion */
    var allPanels = $('p.ac-body').hide();
    var selectedPanel = $(".accordion-single.selected p.ac-body").show();
    $('.accordion-single > .faq-title > a').on("click", function(e) {
        allPanels.slideUp();
        $(this).parent().next().slideDown();
        $(this).parent().parent().addClass('selected').siblings().removeClass('selected');
        e.preventDefault();
    });

    /* review reply form */
    $(".review_content .reply").on("click", function (e) {
        e.preventDefault();
        if($(this).parent().next().hasClass("active")){
            $(this).parent().next().removeClass("active")
        }else {
            $(this).parent().next().addClass("active");
        }
    });

    /* custom upload file name */
    $("#atbd_review_attachment").on("change", function () {
       var file = $("#atbd_review_attachment")[0].files[0].name;
       $("#file_name").html(file);
    });

    $(".atbdp_child_category").hide();
    $(".atbdp_parent_category > li > span").on("click", function () {
       $(this).siblings(".atbdp_child_category").slideToggle();
       if($(this).hasClass("active")){
           $(this).removeClass("active")
       }else{
           $(this).addClass("active");
       }
    });

    //custom scrollbar
    $(".tags-checklist, .showContent").mCustomScrollbar({
        axis: "y",
        scrollInertia: 300,
        scrollEasing: "easeIn"
    });

    //show more / less js for features in sidebar search
    $(".filter-checklist .show-link").on("click", function (e) {
        e.preventDefault();
        var $this = $(this);
        var $content = $this.prev(".feature-checklist");
        var linkText = $this.text().toUpperCase();

        if(linkText === "SHOW MORE"){
            linkText = "Show Less";
            $content.toggleClass("hideContent").addClass("showContent");
        }else{
            linkText = "Show More";
            $content.toggleClass("showContent").addClass("hideContent");
        }
        $this.text(linkText);
    });


    // Price Range Slider
    var slider_range = $(".slider-range");
    slider_range.each(function () {
        $(this).slider({
            range: true,
            min: 0,
            max: 5000,
            values: [150, 2000],
            slide: function (event, ui) {
                $(".amount").text("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
    });
    $(".amount").text("$" + slider_range.slider("values", 0) + " - $" + slider_range.slider("values", 1));

    //add listing pricing options
    var priceOne = $("#price-input");
    var priceTwo = $("#price-input-range").hide();
    $("#price_one").on("click", function (e) {
        if($(this).is(":checked")){
            priceOne.show();
            $("#price_two").prop("checked", false);
            priceTwo.hide();
        }else {
            e.preventDefault();
        }
    });
    $("#price_two").on("click", function (e) {
        if($(this).is(":checked")){
            priceTwo.show();
            $("#price_one").prop("checked", false);
            priceOne.hide();
        }else {
            e.preventDefault();
        }
    });

    // social information in add listing page
    $(".copy-btn").on("click", function (e) {
        var $el = $("#social-form-fields");
        $el.clone(true).appendTo(".atbdp_social_field_wrapper");
        e.preventDefault();
    });
    $("#removeSocial").on("click", function () {
        $(this).parents("#social-form-fields:not(:first-child)").remove();
    });

    //map coordinate
    var menual_cor = $("#hide_if_no_manual_cor").hide();
    $("#manual_coordinate").on("click", function () {
       if($(this).is(":checked")){
           menual_cor.show();
       }else{
           menual_cor.hide();
       }
    });

    //counter
    $(".count_up").counterUp({
        time: 1000
    });

    //search categories
    var search_field = $(".top-search-field");
    search_field.on("click", function (e) {
        $(this).parents(".search_module").addClass("active");
        e.stopPropagation();
    });
    $(document).on("click", function () {
        $(".search_module").removeClass("active");
    });

    /* offcanvas menu */
    var oc_menu = $(".offcanvas-menu__contents");
    $(".offcanvas-menu__user").on("click", function (e) {
        oc_menu.addClass("active");
        e.preventDefault();
    });
    $(".offcanvas-menu__close").on("click", function (e) {
        oc_menu.removeClass("active");
        e.preventDefault();
    });

    //Video Popup
    $('.video-iframe').magnificPopup({
        type: 'iframe',
        iframe: {
            markup: '<div class="mfp-iframe-scaler">' +
            '<div class="mfp-close"></div>' +
            '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
            '</div>',
            patterns: {
                youtube: {
                    index: 'youtube.com/',
                    id: function(url) {
                        var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
                        if ( !m || !m[1] ) return null;
                        return m[1];
                    },
                    src: '//www.youtube.com/embed/%id%?rel=0&autoplay=1'
                },
                vimeo: {
                    index: 'vimeo.com/',
                    id: function(url) {
                        var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                        if ( !m || !m[5] ) return null;
                        return m[5];
                    },
                    src: '//player.vimeo.com/video/%id%?autoplay=1'
                }
            },
            srcAction: 'iframe_src'
        },
        mainClass: 'mfp-fade'
    });

    miscPolyfillsForIE();

    /*
    let accordion = new Collapse(element, { option: value}).init();

      Options - { option: defaultValue }
        accordion: false,
        initClass: 'collapse-init',
        activeClass: 'panel-active',
        heightClass: 'collapse-reading-height',

      Methods - accordion.method(panel)
        open(panel)
        close(panel)
        toggle(panel)
        openSinglePanel(panel) [AKA accordion mode]
        openAll()
        closeAll()

      Events - panel.addEventListener('event')
        openingPanel
        openedPanel
        closingPanel
        closedPanel
    */

    class Collapse {
      constructor(container, options = {}) {
        let defaults = {
          accordion: false,
          initClass: 'collapse-init',
          activeClass: 'panel-active',
          heightClass: 'collapse-reading-height',
        }

        this.settings = Object.assign({}, defaults, options);

        this._container = container;
        this._panels = container.querySelectorAll("details");

        this.events = {
          openingPanel: new CustomEvent('openingPanel'),
          openedPanel: new CustomEvent('openedPanel'),
          closingPanel: new CustomEvent('closingPanel'),
          closedPanel: new CustomEvent('closedPanel'),
        };
      }

      // Sets height of panel content
      _setPanelHeight( panel ) {
        let contents = panel.querySelector("summary + *");

        contents.style.height = contents.scrollHeight + "px";
      }

      // Removes height of panel content
      _removePanelHeight( panel ) {
        let contents = panel.querySelector("summary + *");

        contents.style.height = null;
      }

      //=== Open panel
      open(panel) {
        panel.dispatchEvent( this.events.openingPanel );

        panel.open = true;
      }

      // Add height and active class, this triggers opening animation
      _afterOpen(panel) {
        this._setPanelHeight(panel);
        panel.classList.add(this.settings.activeClass);
      }

      // Remove height on animation end since it's no longer needed
      _endOpen(panel) {
        panel.dispatchEvent( this.events.openedPanel );

        this._removePanelHeight(panel);
      }

      //=== Close panel, not toggling the actual [open] attr!
      close(panel) {
        panel.dispatchEvent( this.events.closingPanel );
        this._afterClose(panel);
      }

      // Set height, wait a beat, then remove height to trigger closing animation
      _afterClose(panel) {
        this._setPanelHeight(panel);

        setTimeout(() => {
          panel.classList.remove(this.settings.activeClass);
          this._removePanelHeight(panel);
        }, 100); //help, this is buggy and hacky
      }

      // Actually closes panel once animation finishes
      _endClose(panel) {
        panel.dispatchEvent( this.events.closedPanel );

        panel.open = false;
      }

      //=== Toggles panel... just in case anyone needs this
      toggle(panel) {
        panel.open ? this.close(panel) : this.open(panel);
      }

      //=== Accordion closes all panels except the current passed panel
      openSinglePanel(panel) {
        this._panels.forEach((element) => {
          if (panel == element && !panel.open) {
            this.open(element);
          } else {
            this.close(element);
          }
        });
      }

      //=== Opens all panels just because
      openAll() {
        this._panels.forEach((element) => {
          this.open(element);
        });
      }

      //=== Closes all panels just in case
      closeAll() {
        this._panels.forEach((element) => {
          this.close(element);
        });
      }

      // Now put it all together
      _attachEvents() {
        this._panels.forEach(panel => {
          let toggler = panel.querySelector("summary");
          let contents = panel.querySelector("summary + *");

          // On panel open
          panel.addEventListener("toggle", e => {
            let isReadingHeight = panel.classList.contains(this.settings.heightClass);

            if (panel.open && !isReadingHeight) {
              this._afterOpen(panel);
            }
          });

          toggler.addEventListener("click", e => {
            // If accordion, stop default toggle behavior
            if (this.settings.accordion) {
              this.openSinglePanel(panel);
              e.preventDefault();
            }

            // On attempting close, stop default close behavior to substitute our own
            else if (panel.open) {
              this.close(panel);
              e.preventDefault();
            }

            // On open, proceed as normal (see toggle listener above)
          });

          /*
            transitionend fires once for each animated property,
            but we want it to fire once for each click.
            So let's make sure to watch only a single property
            Note this makes complex animations with multiple transition-durations impossible
            Sorry
          */
          let propToWatch = '';

          // On panel finishing open/close animation
          contents.addEventListener("transitionend", (e) => {
            // Ignore transitions from child elements
            if(e.target !== contents) {
              return;
            }

            // Set property to watch on first fire
            if ( !propToWatch ) propToWatch = e.propertyName;

            // If watched property matches currently animating property
            if ( e.propertyName == propToWatch ) {
              let wasOpened = panel.classList.contains(this.settings.activeClass);
              wasOpened ? this._endOpen(panel) : this._endClose(panel);
            }
          });
        });
      }

      init() {
        // Attach functionality
        this._attachEvents();

        // If accordion, open the first panel
        if (this.settings.accordion) {
          this.openSinglePanel(this._panels[0]);
        }

        // For styling purposes
        this._container.classList.add(this.settings.initClass);

        return this;
      }
    }

    let makeMePretty = document.querySelector(".collapse");
    let accordion = new Collapse(makeMePretty, { accordion: true }).init();

    // Toggle accordion behavior
    document.querySelector("#accordion-toggle")
      .addEventListener("change", function() {
        this.checked ?
          accordion.settings.accordion = false :
          accordion.settings.accordion = true ;
    });

    // hoisthoistupwego I'm stuck on a machine with IE11
    function miscPolyfillsForIE() {
      // NodeList.forEach() polyfill
      // https://developer.mozilla.org/en-US/docs/Web/API/NodeList/forEach#Browser_Compatibility
      if (window.NodeList && !NodeList.prototype.forEach) {
        NodeList.prototype.forEach = Array.prototype.forEach;
      }

      // Object.assign() polyfill
      // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/assign
      "function"!=typeof Object.assign&&Object.defineProperty(Object,"assign",{value:function(e,t){"use strict";if(null==e)throw new TypeError("Cannot convert undefined or null to object");for(var n=Object(e),r=1;r<arguments.length;r++){var o=arguments[r];if(null!=o)for(var c in o)Object.prototype.hasOwnProperty.call(o,c)&&(n[c]=o[c])}return n},writable:!0,configurable:!0});

      // CustomEvent polyfill
      // https://developer.mozilla.org/en-US/docs/Web/API/CustomEvent
      !function(){if("function"==typeof window.CustomEvent)return!1;function t(t,e){e=e||{bubbles:!1,cancelable:!1,detail:void 0};var n=document.createEvent("CustomEvent");return n.initCustomEvent(t,e.bubbles,e.cancelable,e.detail),n}t.prototype=window.Event.prototype,window.CustomEvent=t}();
    }

})(jQuery);
miscPolyfillsForIE();





let makeMePretty = document.querySelector(".collapse");
let accordion = new Collapse(makeMePretty, { accordion: true }).init();

// Toggle accordion behavior
document.querySelector("#accordion-toggle")
  .addEventListener("change", function() {
    this.checked ?
      accordion.settings.accordion = false :
      accordion.settings.accordion = true ;
});

// hoisthoistupwego I'm stuck on a machine with IE11
function miscPolyfillsForIE() {
  // NodeList.forEach() polyfill
  // https://developer.mozilla.org/en-US/docs/Web/API/NodeList/forEach#Browser_Compatibility
  if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
  }

  // Object.assign() polyfill
  // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/assign
  "function"!=typeof Object.assign&&Object.defineProperty(Object,"assign",{value:function(e,t){"use strict";if(null==e)throw new TypeError("Cannot convert undefined or null to object");for(var n=Object(e),r=1;r<arguments.length;r++){var o=arguments[r];if(null!=o)for(var c in o)Object.prototype.hasOwnProperty.call(o,c)&&(n[c]=o[c])}return n},writable:!0,configurable:!0});

  // CustomEvent polyfill
  // https://developer.mozilla.org/en-US/docs/Web/API/CustomEvent
  !function(){if("function"==typeof window.CustomEvent)return!1;function t(t,e){e=e||{bubbles:!1,cancelable:!1,detail:void 0};var n=document.createEvent("CustomEvent");return n.initCustomEvent(t,e.bubbles,e.cancelable,e.detail),n}t.prototype=window.Event.prototype,window.CustomEvent=t}();
}
