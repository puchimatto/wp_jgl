var SITE = {
    common: {
        init: function() {
           
            // Add ECMA262-5 Array methods if not supported natively
            if (!('lastIndexOf' in Array.prototype)) {
                Array.prototype.lastIndexOf= function(find, i /*opt*/) {
                    if (i===undefined) i= this.length-1;
                    if (i<0) i+= this.length;
                    if (i>this.length-1) i= this.length-1;
                    for (i++; i-->0;) /* i++ because from-argument is sadly inclusive */
                        if (i in this && this[i]===find)
                            return i;
                    return -1;
                };
            }            
            var cownter=0;
            
          
            // Smooth scroll between sections
            $(".end a").smoothScroll({
                offset:     $(".site-nav").height() / -2
            });

            // Hovering nav menu
            $("body").scrollspy({
                min:        $(".site-nav").offset().top,
                max:        $("body").height(),
                onEnter:    function(e,p) {
                    $(".site-nav").addClass("sticky");
                },
                onLeave:    function(e,p) {
                    $(".site-nav").removeClass("sticky");
                }
            });
            $("ul.main li a").hover(function(){
                window.fadeInMenu = function(_this){
                    $(_this).next().stop().fadeIn(800);
                };
                window.fadeInMenu(this);
            }, function(e){
                $(this).next().stop().fadeOut(0);
            });
            /*
            $("img").each(function(){
                $(this).after("<figure></figure>");
                $(this).next().html($(this));
            });*/
            $(".site-nav a").click(function(){
                setTimeout(function(){
                    var documentScroll = $(document).scrollTop();
                    $(document).scrollTop(documentScroll - 20);
                }, 50);
            });
            documentScroll = $(document).scrollTop();
            if(documentScroll > 160){
                $(".site-nav").addClass("sticky");
                $(document).scrollTop(documentScroll - 20);
            }
            $(document).on('click', '.spm', function(){
                var btn = $(this),
                    form = $(this).parent(),
                    rsp = $(this).attr("data-rsp").split("_");
                var val = parseInt(rsp[0]) + parseInt(rsp[1]),
                    res = parseInt(form.find("[name=resp]").first().val()),
                    dataForm = form.find("[name=data]").first().val();
                if(val === res){
                    form.css("opacity", .2);
                    btn.removeClass("spm");
                    $.ajax({
                        type: "POST",
                        data: dataForm,
                        url: "wp-content/themes/jgl/inc/func.php",
                        success: function(a){
                            form.html(a);
                            form.css("opacity", 1);
                            console.log(a);
                        },
                        error: function(a,b){
                            console.log(a,b);
                        }
                    });
                } else{
                    form.find("input[type=text]").css("border","1px solid #ff0000");
                }
            });
            $(document).on('click', '.spmOut', function(){
                var btn = $(this),
                    form = $(this).parent(),
                    rsp = $(this).attr("data-rsp").split("_");
                var val = parseInt(rsp[0]) + parseInt(rsp[1]),
                    res = parseInt(form.find("[name=resp]").first().val()),
                    dataForm = form.find("[name=data]").first().val(),
                    id = form.attr("id");
                if(val === res){
                    form.css("opacity", .2);
                    btn.removeClass("spm");
                    $.ajax({
                        type: "POST",
                        data: dataForm,
                        url: "../wp-content/themes/jgl/inc/func.php",
                        success: function(a){
                            form.html(a);
                            form.css("opacity", 1);
                            console.log(a);
                            if(id=="comment-form") $("#comment-form").prev().remove();
                            else if(id=="comment-form-contact"){
                                $("#cuadro").html(a);
                                $("#cuadro").show();
                                $("#fondo").show();
                            }
                            /*setTimeout(function(){
                                $("#about-testimonials").animate({
                                    height: "768px"
                                }, 650);
                            },5000);*/
                        },
                        error: function(a,b){
                            console.log(a,b);
                        }
                    });
                } else{
                    form.find("input[type=text]").css("border","1px solid #ff0000");
                }
            });
        },
        finalize: function() {}
    },
    home: {
        init: function() {
            var onEnterTimer = 600;
            //Acomodar elementos de sucursales
            $("#hidden-locations p.direccion-corta").each(function(a){
                var lat = $(this).next().attr("data-gmap-lat"),
                    lon = $(this).next().attr("data-gmap-long"),
                    srcimg = $("img.image-map").eq(a).attr("src");
                    html = $(this).html();
                //$(this).html(html.substring(0,html.lastIndexOf("<br>") - 1));
                $("ul.location-list-li li").eq(a).attr('data-gmap-lat', lat);
                $("ul.location-list-li li").eq(a).attr('data-gmap-long', lon);
                $("ul.location-list-li li").eq(a).attr('data-img', srcimg);
                $("ul.location-list-li li").eq(a).append("<p>" + $(this).html() + "</p>");
            });
            $("#hidden-locations").remove();

            // Initial carousel
            (function($){
                var panels = $("#home-intro .carousel-bg div"),
                    textPanels = $("#home-intro .carousel-text div"),
                    controlDiv = $("#home-intro .carousel-controls"),
                    controls,
                    notPanels,
                    notTextPanels,
                    slideSwitch,
                    textSwitch,
                    controlLink = $("<a>");

                panels.each(function(i,e){
                    controlLink.clone().appendTo(controlDiv);
                });
                controls = controlDiv.children("a");
                controls.eq(0).addClass("active");

                notPanels = panels.not(".active");
                notTextPanels = textPanels.not(".active");

                slideSwitch = function(dest) {

                    var targets = {},
                        transitionText = arguments[1],
                        duration = 1000;

                    if( transitionText === true ) {
                        targets.from = textPanels.filter(".active");
                        targets.dest = textPanels.eq(dest);

                    //} else {
                        targets.from2 = panels.filter(".active");
                        targets.dest2 = panels.eq(dest);
                    }

                    if( targets.from.is(targets.dest) ) {
                        return false;
                    }

                    targets.dest.fadeIn(duration);
                    targets.dest2.fadeIn(duration);
                    targets.from.fadeOut(duration,function(){
                        if( transitionText !== true) {
                            setTimeout(function(){
                                slideSwitch(dest, true);
                            }, 800);
                        }
                    });
                    targets.from2.fadeOut(duration,function(){
                        if( transitionText !== true) {
                            setTimeout(function(){
                                slideSwitch(dest, true);
                            }, 800);
                        }
                    });

                    targets.from.removeClass("active");
                    targets.dest.addClass("active");
                    targets.from2.removeClass("active");
                    targets.dest2.addClass("active");

                    //if( transitionText !== true ) {
                        controls.filter(".active").removeClass("active");
                        controls.eq(dest).addClass("active");
                    //}
                }

                controls.each(function(i,e){
                    $(this).bind("click",function(e){
                        if((controls.length - 1) == i ) $(".carousel-text").first().hide();
                        else $(".carousel-text").first().show();
                        slideSwitch(i, true);
                    });
                });

                $(".arrow-carousel").each(function(k){
                    var parent = $(this).next();
                    var dot = $(this).parent();
                    $(this).find('.prev-arrow').click(function(m){
                        var hasClassActive = -1;
                        num = parent.find('div').length;
                        
                        parent.find('div').each(function(n){                            
                            if($(this).hasClass('active'))
                                hasClassActive = n;
                        });    
                        
                        dot.find('a').removeClass('active');

                        if(0 == hasClassActive){
                            dot.find('a').eq(num).addClass('active');
                            slideSwitch(num, true);

                        }else{
                            dot.find('a').eq(hasClassActive-1).addClass('active');
                            slideSwitch(hasClassActive-1, true);

                        }
                    });
                    $(this).find('.next-arrow').click(function(q){
                        var hasClassActive = -1;
                        num = parent.find('div').length;

                        parent.find('div').each(function(s){
                            if ($(this).hasClass('active'))
                                hasClassActive = s;
                        });

                        dot.find('a').removeClass('active');

                        if(num == hasClassActive){
                            dot.find('a').eq(0).addClass('active');  
                            slideSwitch(0, true);

                        } else {
                            dot.find('a').eq(hasClassActive+1).addClass('active');                        
                            slideSwitch(hasClassActive+1, true);
                        }
                    });
                    return false;
                });


                /*
                $(".arrow-carousel").each(function(k){
                var parent = $(this).parent();
                var bolitas = $(this).parent().parent().next();
                    
                $(this).find(".prev-arrow").first().click(function(m){
                    var hasClassActive = -1,
                    num = parent.find("img").length-1;

                    parent.find("div").each(function(n){
                        if($(this).hasClass("active"))
                            hasClassActive = n;
                    });

                    bolitas.find("a").removeClass("active");

                    if(0 == hasClassActive){
                        bolitas.find("a").eq(num).addClass("active");
                        parent.find('img.active').animate({
                            opacity:0
                        },800, function(){

                            $(this).css('opacity', 1);
                            $(this).removeClass('active').css("opacity", 0);
                            parent.find("img").eq(num).css("opacity", 0).addClass('active');
                            parent.find("img").eq(num).animate({
                                opacity: 1
                            }, 800);
                            
                        });

                    } else {

                        bolitas.find("a").eq(hasClassActive - 1).addClass("active");                        

                        parent.find("img.active").animate({
                            opacity:0
                        },800, function(){
                            $(this).css("opacity", 1);
                            $(this).removeClass('active').css("opacity", 0);                            
                            parent.find("img").eq(hasClassActive-1).css("opacity", 0).addClass('active');
                            parent.find("img").animate({
                                opacity:1
                            },800);
                        });

                    }
                });
                $(this).find(".next-arrow").first().click(function(m){
                    var hasClassActive = -1,
                    num = parent.find("img").length -1;

                    parent.find("img").each(function(n){
                        if($(this).hasClass("active"))
                            hasClassActive = n;
                    });

                    bolitas.find("a").removeClass("active");

                    if(num == hasClassActive){

                        bolitas.find("a").eq(0).addClass("active");
                        parent.find("img.active").animate({
                            opacity:0
                        },800, function(){
                            $(this).css("opacity", 1);
                            $(this).removeClass('active').css("opacity", 0);                                                        
                            parent.find("img").eq(0).css("opacity", 0).addClass('active');
                            parent.find("img").animate({
                                opacity:1
                            },800);
                        });

                    } else{
                        
                        bolitas.find("a").eq(hasClassActive + 1).addClass("active");                        
                        parent.find("img.active").animate({
                            opacity:0
                        },800, function(){
                            $(this).css("opacity", 1); 
                            $(this).removeClass('active').css("opacity", 0);                                                       
                            parent.find("img").eq(hasClassActive+1).css("opacity", 0).addClass('active');
                            parent.find("img").animate({
                                opacity:1
                            },800);
                        });

                    }
                });
            });

                */

            })(jQuery);

            // Section 2 carousel
            (function($){
                var deg = 0,
                    items = $("#home-about .carousel-rotate .item"),
                    count = items.length,
                    stage = $("#home-about .carousel-rotate .stage"),
                    textSlides = $("#home-about .carousel-details .item"),
                    size = {
                        h:      items.outerHeight(),
                        w:      items.outerWidth(),
                        font:   parseFloat(items.css("fontSize"))
                    },
                    center = {
                        x:  Math.round( ( stage.width() - size.w ) / 2),
                        y:  Math.round( ( stage.height() - size.h ) / 2)
                    }, timeoutCarousel;

                // In case of no CSS transforms (IE, looking at you)
                if( Modernizr.csstransforms !== true ) {
                    var urlre = /url\("?(.*?)"?\)/;
                    items.each(function(i,e){
                        //var bg = $(e).css("backgroundImage").match(urlre)[1];
                        //$(e).css({ backgroundImage: "none" });
                        //$("<img>")
                            //.prop("src", bg)
                            //.css({
                                //position:   "absolute",
                                //top:        0,
                                //left:       0,
                                //zIndex:     -1
                            //})
                            //.appendTo(e);
                    });
                }

                window.rotate = function(step, total) {

                    stage.css({ position: "relative" });
                    deg += step;
                    deg = deg % 360; // To avoid this growing really high

                    var eSin, eCos, q;

                    for( var i = 0; i < count; i++ ) {
                        q = ( ( 360 / count) * i + deg ) * ( Math.PI / 180 );
                        eSin = Math.sin(q);
                        eCos = Math.cos(q) * -1;

                        q = ( 0.92 + eSin * 0.08 );

                        var newWidth = q * size.w,
                            newHeight = q * size.h,
                            newFontSize = q * size.font;

                        el = items.eq(i);
                        el.css({
                            zIndex:     Math.round( 80 + eSin * 20 )
                        });

                        if( eSin == 1 ) {
                            textSlides.filter(".active").css("display", "none");
                            textSlides.filter(".active").removeClass("active");

                            el.addClass("active");
                            textSlides.eq(el.index()).fadeIn(200).addClass("active");
                        } else {
                            el.removeClass("active");
                        }

                        if( Modernizr.csstransforms !== true ) {
                            el.width(newWidth)
                              .height(newHeight)
                              .css({
                                  top:      center.y + ( (size.h - newHeight) / 2) + 100,
                                  left:     ( center.x + 240 * eCos) + ( ( size.w - newWidth) / 2 ),
                                  fontSize: newFontSize
                            });
                        } else {
                            el.css({
                                transform:  "scale("+q+")",
                                top:        center.y + 100 * eSin,
                                left:       center.x + 240 * eCos
                            });
                        }
                    }

                    total -= Math.abs(step);
                    if( total <= 0 ) return false;
                    clearTimeout(timeoutCarousel);
                    timeoutCarousel = setTimeout( function(){ rotate(step, total); }, 40 );
                };

                rotate(10, 360/count); // Prepares the elements in their position

                setInterval( function() {
                    textSlides.fadeOut(200).filter(".active").removeClass("active");
                    rotate(10, 360/count);
                }, 10000 );

            })(jQuery);

            $(".rotate").click(function(e){
                e.preventDefault();
                console.log("fired");
                var top = $(this).parent().css("top");
                var left = $(this).parent().css("left");
                console.log(top, left);
                if ($.browser.webkit){
                    if(top == "-1px"){
                        rotate(10, 180);
                    } else if(top == "99px"){
                        if(left == "-8px")
                            rotate(10, 90);
                        else
                            rotate(10, 270);
                    }
                } else{
                    if(top == "0px"){
                        rotate(10, 180);
                    } else if(top == "100px"){
                        if(left == "-8px")
                            rotate(10, 90);
                        else
                            rotate(10, 270);
                    }
                }

            });

            // Section 2 phrases
            (function($){
                var carousel = $("#home-about .carousel-phrase"),
                    items = carousel.children(".phrase");

                var slideSwitch = function() {
                    var itemCount   = items.length,
                        currentItem = items.filter(".active"),
                        isLast      = (currentItem.index() === (items.length - 1));

                    var nextItem    = items.eq( (isLast ? 0 : currentItem.index() + 1) );

                    currentItem.fadeOut(500).removeClass("active");
                    nextItem.fadeIn(500).addClass("active");
                };

                setInterval(slideSwitch, 5000);

            })(jQuery);

            (function($){

                var joinServices = function(){
                    var cells = $("#home-services .cells ul li"), row = 1, xx, yy;

                    cells.each(function(c){
                        if(c <= 2) yy = 145;
                        else if( c <= 5) yy = 332;
                        else yy = 519;

                        if(row == 1) xx = 10; else if(row == 2) xx = 320; else xx = 640;

                        if(c != 4) {
                            $(this).animate({
                                top: yy + "px",
                                left: xx + "px",
                                opacity: 1
                            }, 1000);
                        } else {
                            $(this).animate({
                                top: yy + "px",
                                left: xx + "px",
                                width: "300px",
                                height: "160px",
                                opacity: 1
                            }, 1000);
                        }
                        if(row == 3) row = 0;
                        row++;
                    });
                };
                var explodeServices = function(){
                    var cells = $("#home-services .cells ul li"), row = 1, xx, yy;
                    cells.each(function(c){
                        if(c <= 2) yy = -50;
                        else if( c <= 5) yy = 332;
                        else yy = 750;

                        if(row == 1) xx = "-100";
                        else if(row == 2) xx = 330;
                        else xx = 1000;

                        if(c != 4) {
                            $(this).css({
                                top: yy + "px",
                                left: xx + "px",
                                opacity: 0
                            });
                        } else {
                            $(this).css({
                                top: "480px",
                                left: "425px",
                                width: "10px",
                                height: "10px",
                                opacity: 0
                            });
                        }
                        if(row == 3) row = 0;
                        row++;
                    });
                };
                $("#home-services").scrollspy({
                    min: $("#home-services").position().top - screen.height + 300,
                    max: $("#home-services").position().top + $("#home-services").height(),
                    onEnter: function(a,b){
                        console.log("enter home-services");
                        setTimeout(joinServices, onEnterTimer);
                    },
                    onLeave: function(a,b){
                        console.log("leave home-services");
                        explodeServices();
                    }
                });
                var showPlans = function(){
                    $("#home-plans .pages").animate({
                        opacity: 1
                    }, 1800, function(){
                        $("#home-plans .main").animate({ opacity: 1 }, 1800);
                    });
                    
                };

                var hidePlans = function(){
                    $("#home-plans .pages").css("opacity", 0);
                    $("#home-plans .main").css("opacity", 0);
                }

                $("#home-plans").scrollspy({
                    min: $("#home-plans").position().top - screen.height + 300,
                    max: $("#home-plans").position().top + $("#home-plans").height(),
                    onEnter: function(a,b){
                        console.log("enter home-plans");
                        setTimeout(showPlans, onEnterTimer);
                    },
                    onLeave: function(a,b){
                        console.log("leave home-plans");
                        setTimeout(hidePlans, onEnterTimer);
                    }
                });

                var showLocations = function(){
                    $("#hide-locations").animate({ opacity: 1 }, 2300);
                };
                var hideLocations = function(){
                    $("#hide-locations").css({ opacity: 0 } );
                };
                hideLocations();

                $("#home-locations").scrollspy({
                    min: $("#home-locations").position().top - screen.height + 300,
                    max: $("#home-locations").position().top + $("#home-locations").height(),
                    onEnter: function(a,b){
                        console.log("enter home-locations");
                        setTimeout(showLocations, onEnterTimer);
                    },
                    onLeave: function(a,b){
                        console.log("leave home-locations");
                        hideLocations();
                    }
                });

                $("#home-blog").scrollspy({
                    min: (screen.height > 900) ? $("#home-blog").position().top - $("#home-locations").position().top : $("#home-blog").position().top - screen.height + 300,
                    max: $("#home-blog").position().top + $("#home-blog").height(),
                    onEnter: function(a,b){
                        console.log("enter home-blog");
                        setTimeout(function(){
                            $("#home-blog .columns").first().animate({height:"558px"}, 900);
                        }, onEnterTimer);
                    },
                    onLeave: function(a,b){
                        console.log("leave home-blog");
                        $("#home-blog .columns").first().height("10px");
                    }
                });

            })(jQuery);

            // Section 3 columns
            $("#home-services .cells li:nth-child(3n+1)").addClass("first-col");
            $("#home-services .cells li:nth-child(3n)").addClass("last-col");

            // Section 5 bullets
            var s5bullet = $("<i>").addClass("icon-chevron-right").addClass("bullet");
            $("#home-locations .location-list li").each(function(i,e){
                $(this).prepend(s5bullet.clone());
            });

            // Section 6 columns
            $("#home-blog .columns article").removeClass("col1").each(function(i){
                var idx = i + 1;
                $(this).addClass("col" + idx);
            });

            // Google Maps
            // TEMPORARY API KEY:
            // AIzaSyCQ6x8LUKpGC3hckCqwpNCld53ifT08Zo0
            (function(w,$){

                // Styling
                var mapStyle = [
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                            { "color": "#212f60" }
                        ]
                    },{
                        "featureType": "road",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            { "color": "#e1d9ce" }
                        ]
                    },{
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            { "color": "#c3d3d3" }
                        ]
                    },{
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            { "color": "#c8dcdc" }
                        ]
                    },{
                        "featureType": "landscape.natural",
                        "elementType": "geometry.fill",
                        "stylers": [
                            { "color": "#b19e84" }
                        ]
                    },{
                        "featureType": "landscape.man_made",
                        "elementType": "all",
                        "stylers": [
                            { "color": "#ffffff" }
                        ]
                    },{
                        "featureType": "water",
                        "stylers": [
                            { "color": "#ffffff" }
                        ]
                    },{
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            { "color": "#d0c0ab" }
                        ]
                    },{
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            { "color": "#f3ece2" }
                        ]
                    },{
                        "featureType": "poi",
                        "elementType": "labels.icon",
                        "stylers": [
                            { "color": "#ffffff" }
                        ]
                    },{
                        "featureType": "transit",
                        "stylers": [
                            { "visibility": "off" }
                        ]
                    }
                ];

                // Start coordinates
                var mx = {};
                mx.lat = 19.465297;
                mx.lon = -99.132132;

                w.gmap = function() {
                    var start = new google.maps.LatLng( mx.lat, mx.lon ),
                        opts = {
                            zoom:               12,
                            mapTypeId:          google.maps.MapTypeId.ROADMAP,
                            mapTypeControl:     false,
                            streetViewControl:  false,
                            center:             start,
                            styles:             mapStyle
                        },
                        map = new google.maps.Map(document.getElementById("map-canvas"),opts);

                    var locations = $("#home-locations .location-list li");

                    // Directions
                    var dirD = new google.maps.DirectionsRenderer(),
                        dirS = new google.maps.DirectionsService();

                    dirD.setMap(map);

                    // Create general infowindow to reuse
                    var infowindowOpts = {};
                    var infowindow = new google.maps.InfoWindow(infowindowOpts);

                    var openInfo = function(e,pos){
                        var infoContent = $("<div>");
                        infoContent.append(e.find("h4").first().clone());
                        infoContent.append(e.find("p").first().clone());

                        infowindow.setContent(infoContent[0]);
                        infowindow.open(map);
                        infowindow.setPosition(pos)
                    }

                    locations.each(function(i,e){
                        var _item = $(this);

                        var coords = new google.maps.LatLng( _item.data("gmap-lat"), _item.data("gmap-long") );

                        // Click handlers to pan to the marker
                        _item.bind("click",function(e){
                            e.preventDefault();

                            locations.filter(".active").removeClass("active");
                            $(this).addClass("active");

                            map.setCenter( coords );
                            map.panTo( coords );
                            map.setZoom( 14 );

                            openInfo(_item, coords);
                            $("#photo-map").attr("src", _item.attr("data-img"));
                            console.log(_item.attr("data-img"));

                        });
                    });

                    // Directions service
                    $("#home-locations .directions form").bind("submit.gmaps",function(e){
                        e.preventDefault();
                        var current = $("#home-locations .location-list li.active");

                        var to = new google.maps.LatLng( current.data("gmap-lat"), current.data("gmap-long") ),
                            from = $(this).find(".from").val(),
                            request = {
                                origin:         from,
                                destination:    to,
                                travelMode:     google.maps.DirectionsTravelMode.DRIVING
                            };

                        if( from === "" || current.length === 0 ) {
                            return false;
                        }

                        dirS.route(request, function(r,s) {
                            if( s == google.maps.DirectionsStatus.OK ) {
                                dirD.setDirections(r);
                            }
                        });
                    });
                }

                var gmk = "AIzaSyCQ6x8LUKpGC3hckCqwpNCld53ifT08Zo0",
                    gms = document.createElement("script"),
                    scr = document.getElementsByTagName("script")[0];

                gms.type = "text/javascript";
                gms.src = ("https:" == location.protocol ? "https:" : "http:") + "//maps.googleapis.com/maps/api/js?libraries=geometry,places&sensor=true&callback=gmap";
                gms.async = "true";

                scr.parentNode.insertBefore(gms,scr);

            })(window,jQuery);

            //promo form
            $("#promociones").submit(function(e){
                e.preventDefault();
                $("#name-promo, #email-promo").css("border", "1px solid #bbbbbb");
                $('.error_promo').hide();
                var name = $("#name-promo").val(),
                    email = $("#email-promo").val(),
                    as = $(this).find("[name=as]").first().val();
                if(name == ""){
                    $("#name-promo").css("border", "1px solid #ffabab");
                    $('.error_promo').css({'display':'block'});                       
                    return;
                } else if(!email.match(/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/)){
                    $("#email-promo").css("border", "1px solid #ffabab");
                    $('.error_promo').css({'display':'block' ,'left':'160px'});                    

                    return;
                } else{

                    $("#promociones").html("<p>" + $(this).attr("data-sum") + " (Filtro antispam)</p><input type='text' name='resp'><input type='hidden' name='data' value='" + $(this).serialize() + "&action=promociones" + "'><button type='button' class='spm' data-rsp='" + as + "'>Enviar</button>");
                }
            });
            //plan form
            $("#planes").submit(function(e){
                e.preventDefault();
                $("#name-plan, #email-plan").css("border", "1px solid #bbbbbb");
                $('.error_plan').hide();                
                var name = $("#name-plan").val(),
                    email = $("#email-plan").val(),
                    as = $(this).find("[name=as]").first().val();
                if(name == ""){
                    $("#name-plan").css("border", "1px solid #ffabab");
                    $('.error_plan').css({'display':'block'});                       

                    return;
                } else if(!email.match(/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/)){
                    $("#email-plan").css("border", "1px solid #ffabab");
                    $('.error_plan').css({'display':'block', 'left':'160px'});                       

                    return;
                } else{
                    $("#planes").html("<p>" + $(this).attr("data-sum") + " (Filtro antispam)</p><input type='text' name='resp'><input type='hidden' name='data' value='" + $(this).serialize() + "&action=planes" + "'><button type='button' class='spm' data-rsp='" + as + "'>Enviar</button>");
                }
            });


            //erase blog's columns

            $(".columns p, .columns ul, .columns ol").each(function(){
                if(!$(this).hasClass("home") && !$(this).hasClass("more"))
                    $(this).remove();
            });

        }
    },
    about: {
        init: function() {
            $(".caption").each(function(a){
                $(this).html($("#info-history p").eq(a).html());
            });
            $("#info-history").remove();
            var num = $("#about-campaigns>p").length;
            var p = [];
            $("#about-campaigns>p").each(function(e){
                if(e >= num - 3 ){
                    p.push($(this).clone());
                    $(this).remove();
                }
            });
            for (var i = 0; i < p.length; i++) {
                $("#about-campaigns .details").eq(i).prepend(p[i]);
            };
            // S3 floating dandelion seed
            /*(function(w,$){
                var seed = $("<div>",{"class":"seed"});
                $("#about-values .cells").append(seed);

                $("#about-values .item").each(function(i,e){
                    var _this = $(this),
                        pos = _this.position();
                    _this.bind("mouseenter",function(e){
                        if(_this.index() !== seed.data("pos")) {
                            var rot = 30 - (Math.round(Math.random() * 60));
                            seed.css({
                                transform:  "rotate("+rot+"deg)"
                            }).stop(true).animate({
                                top:    pos.top,
                                left:   pos.left - seed.outerWidth()
                            },500,"easeInOutCubic").data("pos",_this.index());
                        }
                    });
                });

                $("#about-values .item.honesty").trigger("mouseenter");
            })(window,jQuery); */

            // S4 Lightbox
            var s4FancyboxOpts = {
                padding: 0,
                tpl: {
                    closeBtn: '<a class="fancybox-item fancybox-close-text" href="javascript:;">Cerrar</a>',
                    next: '<a class="fancybox-nav fancybox-next href="javascript:;">Siguiente&gt;</a>',
                    prev: '<a class="fancybox-nav fancybox-prev href="javascript:;">&lt;Anterior</a>'
                },
                helpers: {
                    overlay: {
                        css: {
                            background: "rgba(0,0,0,0.9)"
                        }
                    }
                }
            }

            $("#about-history .photo .fancybox").fancybox( $.extend({}, s4FancyboxOpts, {type: "image"}) );
            $("#about-history .video .fancybox").fancybox( $.extend({}, s4FancyboxOpts, {type: "iframe"}) );

            // S5 Campaigns

            // Split gallery items into many lists, in order to use the carousel
            var itemsPerPage = 8;
            $("#about-campaigns .gallery").each(function(i,e){
                var container = $("<div>", {"class": "listContainer"}),
                    extraList = $("<ul>"),
                    list = $(this),
                    items = list.children(".item"),
                    numCols = Math.ceil( items.length / itemsPerPage );

                list.before(container);
                list.detach();

                var extraLists = [];

                for(var i = 0; i < numCols; i++) {
                    var listClone = extraList.clone();
                    listClone.addClass(list.attr("class"))
                             .addClass("col" + (i + 1))
                             .appendTo(container);
                    extraLists[i] = listClone;
                }

                items.each(function(i,e){
                    var colNum = Math.floor( i / itemsPerPage );
                    $(this).appendTo(extraLists[colNum]);
                });

                extraList.remove();
                list.remove();
            });

            // Lightboxes
            var counter = 0;
            $("#about-campaigns .category").each(function(a){
                if(a==3) return;
                $(this).find(".item").each(function(b){
                    $(this).find(".grouped_elements" + counter).fancybox(s4FancyboxOpts);
                    counter++;
                });;
            });
            //$("#about-campaigns .fancybox2").fancybox(s4FancyboxOpts);
            $("#about-campaigns .fancybox3").fancybox( $.extend({}, s4FancyboxOpts, {type: "iframe"}) );

            // Carousels
            $("#about-campaigns .category").each(function(i,e){
                var carousel = $(this).find(".carousel"),
                    items = carousel.find("ul"),
                    pager = $(this).find(".pager"),
                    pageLink = $("<a>",{"class":"pageLink",href:"#"});

                carousel.jcarousel();

                items.each(function(i,e){
                    var link = pageLink.clone();
                    link.text(i + 1);
                    link.bind("click",function(e){
                        e.preventDefault();
                        carousel.jcarousel("scroll",i);
                        pager.find(".active").removeClass("active");
                        $(this).addClass("active");
                    });
                    link.appendTo(pager);
                });

                pager.children().eq(0).addClass("active");
            });

            // Category accordions
            $("#about-campaigns .category h3").each(function(i,e){
                $(this).bind("click",function(e){
                    var _el = $(this),
                        categories = $("#about-campaigns .category");
                    if( _el.parent().index() !== categories.filter(".active").index() ) {
                        categories.filter(".active").removeClass("active");
                        categories.find(".bullet").removeClass("icon-chevron-right")
                                                  .addClass("icon-chevron-down");
                        categories.find(".details").slideUp(200);

                        _el.parent().addClass("active");
                        _el.children(".bullet")
                           .removeClass("icon-chevron-down")
                           .addClass("icon-chevron-right");

                        _el.siblings(".details").slideDown(200);
                    }
                });

                if(i == 0) { $(this).click(); }
            });

            // S6 Calendar
            // Dynamically building a list of years and months for testing
            // Can be removed
            (function($){
                var calendar = $("#about-testimonials .calendar .yearly");
                var numYears = 4; // How many additional years

                for(var i = 0; i < numYears; i++) {
                    var year = 2013 - i - 1;
                    var el = calendar.children().eq(0).clone();

                    el.appendTo(calendar);
                    el.removeClass("year-2013").addClass("year-" + year);
                    el.children("h3").text(year);
                }

                calendar.children().each(function(i,e){
                    calendar.prepend(e);
                });

            })(jQuery);

            // S6 Calendar carousel
            /*
            (function($){
                var calendar = $("#about-testimonials .calendar"),
                    items = calendar.find(".yearly > li"),
                    calNavs = calendar.find(".calNav");

                calendar.jcarousel({ list: ".yearly"});
                calNavs.filter(".prev").jcarouselControl({target: "-=1"});
                calNavs.filter(".next").jcarouselControl({target: "+=1"});

                calendar.bind("scrollend.jcarousel",function(e){
                    calNavs.removeClass("inactive");
                    var pos = calendar.jcarousel('visible').index();

                    if( pos === 0 ) {
                        calNavs.filter(".prev").addClass("inactive");
                    } else if( pos === (items.length - 1) ) {
                        calNavs.filter(".next").addClass("inactive");
                    }
                });

                calendar.jcarousel("scroll","-1");
            })(jQuery);*/

            // S6 Ajax testimonials
            // Using local resource for testing
            /*(function($){
                var calendar = $("#about-testimonials .calendar .yearly"),
                    years = calendar.children("li"),
                    testimonialTarget = $("#about-testimonials .items");

                var setActiveMonth = function(yy,mm) {
                    years.find("a.active").removeClass("active");
                    years.filter(".year-"+yy).find("li").eq(mm - 1).children("a").addClass("active");
                }

                var getTestimonials = function(yy,mm) {

                    // Change the following to the actual URL containing the markup
                    // Ideally one per month (the mm variable), but this example is just per year
                    // See for example t-2012.html on the markup necessary
                    var target = "t-"+yy+".html";

                    $.ajax({
                        url:    target,
                        dataType: "html",
                        success: function(d,t,x) {
                            if(t === "success") {
                                testimonialTarget.children().fadeOut(200);
                                testimonialTarget.html(d);
                                testimonialTarget.children().hide().fadeIn(200);
                                setActiveMonth(yy,mm);
                            }
                        }
                    });
                }

                years.each(function(i){
                    var _this = $(this),
                        thisYear = _this.children("h3").text(),
                        months = _this.find(".monthly li");

                    months.each(function(i){
                        var _this = $(this),
                            thisLink = _this.children("a"),
                            thisMonth = thisLink.text(),
                            thisMonthIndex = _this.index() + 1;

                        thisLink.each(function(i){
                            $(this).bind("click",function(e){
                                e.preventDefault();
                                getTestimonials(thisYear,thisMonthIndex);
                            });
                        });
                    })
                });

                var today = new Date();
                getTestimonials( today.getFullYear(), today.getMonth() + 1 );

            })(jQuery);*/
            /*$("#about-values .item h3").click(function(){
                if($(this).next().css('display') == 'none'){
                    $(this).next().css('display', 'block');
                    $(this).find(".bullet").first().removeClass('change');
                }
                else{
                    $(this).next().css('display','none');
                    $(this).find(".bullet").first().addClass('change');
                }
            });*/
            $("#write").click(function(a){
                a.preventDefault();
                if(!$("#about-testimonials").hasClass("show-form")){
                    $("#about-testimonials").addClass("show-form");
                    $("#comment-form").show();
                }
                else{ 
                    $("#about-testimonials").removeClass("show-form");
                    $("#comment-form").hide();
                }

            });
            $("#comment-form form").first().submit(function(a){
                a.preventDefault();
                $("#content, #name").css("border", "1px solid #bbbbbb");
                var name = $("#name").val(),
                    email = $("#email").val(),
                    content = $("#content").val(),
                    form = $(this);
                var as = form.find("[name=as]").first().val();
                if(content == "" && name == ""){
                    $("#name, #content").css("border", "1px solid #ffabab");
                    return;
                }
                else if(email != "" && !email.match(/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/)){
                    $("#email").css("border", "1px solid #ffabab");
                }
                else{
                    form.html("<label>" + $(this).attr("data-sum") + " (Filtro antispam)</label><input type='text' name='resp'><input type='hidden' name='data' value='" + form.serialize() + "&action=testimonio" + "'><button type='button' class='spmOut' data-rsp='" + as + "'>Enviar</button><label></label>");
                }
            });

            $(document).on("click", ".move", function(e){
                console.log('hola');
                var year = $(this).attr("data-year");
                $.ajax({
                    url: homeURL + "wp-content/themes/jgl/inc/func.php",
                    data: "action=" + "test&year=" + year,
                    type: "POST",
                    success: function(a){
                        $(".archives").first().html(a);
                    }, 
                    error: function(a,b){
                        console.log(a,b);
                    }
                });
            });
            $(document).on("click", ".test", function(e){
                e.preventDefault();
                var year = $(this).attr("data-year"),
                    month = $(this).attr("data-month");
                $.ajax({
                    url: homeURL + "wp-content/themes/jgl/inc/func.php",
                    data: "action=" + "testpost&year=" + year + "&month=" + month,
                    type: "POST",
                    success: function(a){
                        $(".items").first().html(a);
                        console.log(a);
                    }, 
                    error: function(a,b){
                        console.log(a,b);
                    }
                });
            });
        }
    },
    services: {
        init: function(){

            // S1 floating dandelion seed
            (function(w,$){
                var seed = $("<div>",{"class":"seed"});
                $("#services-intro .details").append(seed);

                $("#services-intro .item").each(function(i,e){
                    var _this = $(this),
                        pos = _this.position();
                    _this.bind("mouseenter",function(e){
                        if(_this.index() !== seed.data("pos")) {
                            var rot = 30 - (Math.round(Math.random() * 60));
                            _this.parent().find("i.bullet").removeClass("icon-chevron-right").addClass("icon-chevron-down");
                            seed.css({
                                //transform:  "rotate("+rot+"deg)"
                            }).stop(true).animate({
                                top:    pos.top - 40,
                                left:   pos.left - seed.outerWidth() + 40
                            },500,"easeInOutCubic").data("pos",_this.index());
                            _this.find("i.bullet").removeClass("icon-chevron-down").addClass("icon-chevron-right");
                        }
                    });
                });

                $("#services-intro .item.custom").trigger("mouseenter");
            })(window,jQuery);

            // S6+S7 carousel and gallery
            (function($){
                var sections = $("#services-urns, #services-caskets");

                sections.each(function(i){
                    var carousel = $(this).find(".carousel"),
                        arrows = $(this).find(".galleryNav"),
                        focused = $(this).find(".focused img"),
                        caption = $(this).find(".focused .caption"),
                        thumbnails = $(this).find("li a");

                    arrows.filter(".prev").addClass("inactive");
                    carousel.jcarousel();

                    arrows.each(function(i,e){
                        var el = $(e), dir = el.hasClass("prev") ? "-" : "+";
                        el.jcarouselControl({ target: dir + "=4" });

                        el.bind("active.jcarouselcontrol",function(){
                            $(this).removeClass("inactive");
                        }).bind("inactive.jcarouselcontrol",function(){
                            $(this).addClass("inactive");
                        });
                    });

                    thumbnails.each(function(i){
                        var details = $(this).siblings(".details");
                        $(this).click(function(e){
                            e.preventDefault();
                            console.log("clicked");
                            focused[0].src = details.children("img").attr("src");
                            caption.text(details.children(".caption").text());
                        });
                    });
                    //thumbnails.eq(0).click();
                });

            })(jQuery);

            // S8 dropdown and details
            (function($){
                var details = $("#services-additional .details");

                details.children().eq(0).addClass("active");

                $("#choose-service").bind("change",function(){
                    var which = $(this).val();
                    details.children(".active").removeClass("active");
                    details.children().eq(which).addClass("active");
                });
            })(jQuery);
            //bullet embalming
            $("#services-embalming .details h3").each(function(){
                var h3 = $(this);
                h3.bind("click", function(){
                    if(h3.next().css("display") == "none")
                        h3.next().css("display", "block");
                    else
                        h3.next().css("display", "none");
                    if(h3.find(".bullet").first().hasClass("change"))
                        h3.find(".bullet").first().removeClass("change");
                    else
                        h3.find(".bullet").first().addClass("change");
                });
            });

            //form newsletter
            $("#newsletter").submit(function(e){
                e.preventDefault();
                $("#name-news, #email-news").css("border", "1px solid #bbbbbb");
                var name = $("#name-news").val(),
                    email = $("#email-news").val(),
                    as = $(this).find("[name=as]").first().val();
                if(name == ""){
                    $("#name-news").css("border", "1px solid #ffabab");
                    return;
                } else if(!email.match(/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/)){
                    $("#email-news").css("border", "1px solid #ffabab");
                    return;
                } else{
                    $("#newsletter").html("<p>" + $(this).attr("data-sum") + " (Filtro antispam)</p><input type='text' name='resp'><input type='hidden' name='data' value='" + $(this).serialize() + "&action=promociones" + "'><button type='button' class='spmOut' data-rsp='" + as + "'>Enviar</button>");
                }
            });

            var idService = $("#services-cremation").attr("data-id"),
                aLink = $("#services-cremation a").first();
            aLink.attr( "href" , aLink.attr("href") + "?id=" + idService);
            var idService = $("#services-embalming").attr("data-id"),
                aLink = $("#services-embalming a").first();
            aLink.attr( "href" , aLink.attr("href") + "?id=" + idService);
        }
    },
    plans: {
        init: function() {
            // Alternate plan layout
            $("section.plan:even").addClass("planLeft");
            $("section.plan:odd").addClass("planRight");
            $("section.planRight").each(function(i){
                $(this).children(".details").insertAfter($(this).children(".infobox"));
            });
            $(".plan").each(function(e){
                $(this).find(".financing h4").first().after($(this).find(".plazo").first());
                $(".end a").eq(e).attr('href', '#' + $(this).attr('id'));
            });

            $("#promociones").submit(function(e){
                e.preventDefault();
                $("#name, #email").css("border", "1px solid #bbbbbb");
                var name = $("#name").val(),
                    email = $("#email").val(),
                    as = $(this).find("[name=as]").first().val();
                if(name == ""){
                    $("#name").css("border", "1px solid #ffabab");
                    return;
                } else if(!email.match(/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/)){
                    $("#email").css("border", "1px solid #ffabab");
                    return;
                } else{
                    $("#promociones").html("<p>" + $(this).attr("data-sum") + " (Filtro antispam)</p><input type='text' name='resp'><input type='hidden' name='data' value='" + $(this).serialize() + "&action=promociones" + "'><button type='button' class='spmOut' data-rsp='" + as + "'>Enviar</button>");
                }
            });

        }
    },
    obituaries:{
        init: function(){

            $(".places-info .descripcion, .places-info .direccion-corta").remove();

            $(".end").last().remove();
            $("section.places").each(function(a){
                $(".end").eq(a).find("a").first().attr("href", "#" + $(this).attr('id'));
            });
            $("p.direccion br").each(function(){ $(this).remove(); });
            //Carousel
            (function($){
                /*var carousels = $("div.carousel");
                carousels.each(function(){
                    var target = $(this);
                    var transition = function(b){
                        var slides = target.find(".slide-group");
                        console.log("Sildes:", slides.length);
                    };

                });*/
                //ok
                /*
                $(".carousel-controls").each(function(a){
                    var controls = $(this);
                    $(this).find("a").each(function(b){
                        $(this).click(function(c){
                            c.preventDefault();
                            var slides = $("div.carousel").eq(a).find(".slide-group");

                            slides.removeClass("visible");

                            slides.eq(b).addClass("visible");
                            controls.find("a").removeClass("active");
                            controls.find("a").eq(b).addClass("active");
                        });
                    });
                });*/
                $(".carousel-controls").each(function(a){
                    var controls = $(this);
                    $(this).find("a").each(function(b){
                        $(this).click(function(c){
                            c.preventDefault();
                            var slides = $("div.carousel").eq(a).find(".slide-group");

                            $("div.carousel").eq(a).find(".visible").first().animate({
                                opacity: 0
                            }, 700, function(){
                                $(this).removeClass("visible");
                                $(this).css("opacity", 1);

                                slides.eq(b).css('opacity', 0);
                                slides.eq(b).addClass("visible");
                                slides.eq(b).animate({
                                    opacity: 1
                                }, 600);
                                controls.find("a").removeClass("active");
                                controls.find("a").eq(b).addClass("active");
                            });

                            
                        });
                    });
                });
            })(jQuery);

            //Esquelas: imprimir y enviar
            (function($){

                $(".overview .slide .slide-content").eq(2).html('<i class="god">&nbsp;</i><div class="desc"><p>Javier Arroyo le comunica el sensible fallecimiento de el Sr.</p><h4>Antonio Carrillo Escobedo</h4><p>Ocurrido en El Estado de México,el 04 de Abril del 2013</p><p>Agradecemos una oración en su memoria</p><p>Servicio de Inhumación<br>Satélite “Sala 1",Panteón Paruqe Memorial, 05 de abril del 2013 a las 11:35 Hrs sale cortejo </p><p>Misa 11:00 Hrs</p></div>');
                $(".slide-content").each(function(){
                    if($(this).children().eq(1).hasClass('desc'))
                        $(this).css("cursor", "pointer");
                });

                $(document).on("click",".overview .slide", function(a){
                    a.preventDefault();
                    if($(this).find(".slide-content").first().children().eq(1).hasClass('empty'))
                        return;
                    window.clon = $(this).clone();
                    $("body").append("<div id='glass' style='display:none'></div><div id='modal' style='display:none'><div class='mbox'></div><div class='buttons'><div class='left'><a href='#'><i></i><span>Imprimir</span></a></div><div class='right'><a href='#'><i></i><span>Enviar</span></a></div><div class='mid'><a href='#'><span style='margin-top:10px;'>Cerrar</span></a></div></div></div>");
                    $("#modal .mbox").first().html(clon);
                    $("#glass, #modal").fadeIn(400);

                });
                $(document).on("click",".right a", function(a){
                    a.preventDefault();
                    var frm = '<div class="form-obituaries"><h6>Envía la esquela por correo</h6><form><input type="text" placeholder="Tu nombre" id="from"><input type="text" placeholder="Nombre de destinatario" id="nombre"><input type="text" placeholder="Correo de destinatario" id="correo"><div id="err-message"></div><button type="submit">Enviar</button><div id="err"><p>ljkljljkn</p></div></form></div>';
                    $("#modal").append(frm);
                    $("#modal .form-obituaries").first().animate({
                        width: "250px"
                    }, 500);
                });
                $(document).on("click",".mid a", function(a){
                    a.preventDefault();
                    $("#glass, #modal").animate({
                                "margin-left": "-100%"
                            }, 400, function(){
                                $(this).remove();
                            });
                });
                $(document).on("click",".left a", function(a){
                    a.preventDefault();
                    var p1 = window.clon.find("p").eq(0).html(),
                        p2 = window.clon.find("h4").eq(0).html(),
                        p3 = window.clon.find("p").eq(1).html(),
                        p4 = window.clon.find("p").eq(2).html(),
                        p5 = window.clon.find("p").eq(3).html(),
                        p6 = window.clon.find("p").eq(4).html(),
                        mail = "<table style='width: 300px; line-height:13px; font-family: Trebuchet MS; color:#016a70; font-size:12px; text-align:center; border:1px solid #016a70;'> <tr> <td style='text-align:right;'> <img src='http://jglnuevo.vincoorbisdev.com/wp-content/themes/jgl/images/cruz.png' width='36' height='59' style='margin:5px'> </td> </tr> <tr> <td> <p style='font-size:14px; display:inline-block; width: 85%;'>" + p1 + "</p> </td> </tr> <tr> <td style='height25px;'> <div style='width:100%; height:25px; position:relative;'><img src='/wp-content/themes/jgl/images/cinta.png'><p style='text-align: center; line-height: 25px; text-transform: uppercase; font-size: 11px; height:25px; display:inline-block; width: 85%; position: absolute; top: -9px; left:50%; margin-left: -44%;'>" + p2 + "</p> </div></td> </tr> <tr> <td> <p style='font-size:14px; display:inline-block; width: 85%;'>" + p3 + "</p> </td> </tr> <tr> <td> <p style='display:inline-block; width: 85%;'>" + p4 + "</p> </td> </tr> <tr> <td> <p style='display:inline-block; width: 85%;'>" + p5 + "</p> </td> </tr> <tr> <td> <p style='display:inline-block; width: 85%;'>" + p6 + "</p> </td> </tr> <tr> <td style='hieght: 85px; width:100%;'></td> </tr> <tr> <td> <img src='http://jglnuevo.vincoorbisdev.com/wp-content/themes/jgl/images/logo-jgl.png' width='99' height='38' style='margin-bottom:10px'> </td> </tr> </table>";
                    var html = '<!DOCTYPE html><head><meta charset="utf-8"><title>J. García López  |   Esquelas </title><meta name="viewport" content="width=device-width"><link rel="shortcut icon" href="/wp-content/themes/jgl/images/favicon.ico" /><link rel="stylesheet" href="/wp-content/themes/jgl/styles/main.css"></head><body class="obituaries" style="background:none;" onload="print()">%content</body></html>';
                    html = html.replace(/%content/gi, mail);
                    var win = window.open();
                    win.document.write(html);
                    win.print();
                    /*var p = win.window.print;
                    win.window.print = function(){ p(); }
                    function callIt(f){
                        f.call();
                    }
                    win.document.body.onload = callIt(win.window.print);*/
                });
                $(document).on("submit",".form-obituaries",function(a){
                    a.preventDefault();
                    var p1 = window.clon.find("p").eq(0).html(),
                        p2 = window.clon.find("h4").eq(0).html(),
                        p3 = window.clon.find("p").eq(1).html(),
                        p4 = window.clon.find("p").eq(2).html(),
                        p5 = window.clon.find("p").eq(3).html(),
                        p6 = window.clon.find("p").eq(4).html(),
                        from = $("#from").val(),
                        nombre = $("#nombre").val(),
                        correo = $("#correo").val(),
                        mail = "<!DOCTYPE html><head><meta charset='utf-8'><title></title></head><body><h3>Tu amigo " + from + ", ha compartido una esquela contigo.</h3><table style='width: 300px; background: #016a70; font-family: Trebuchet MS; color:#fff; font-size:12px; text-align:center;'> <tr> <td style='text-align:right;'> <img src='http://www.jgarcialopez.com.mx/wp-content/themes/jgl/images/obituaries/god.gif' width='36' height='59'> </td> </tr> <tr> <td> <p style='font-size:14px; display:inline-block; width: 85%;'>" + p1 + "</p> </td> </tr> <tr> <td> <p style='background-color: rgb(143, 196, 198); text-align: center; line-height: 25px; text-transform: uppercase; font-size: 11px; height:25px; display:inline-block; width: 85%;'>" + p2 + "</p> </td> </tr> <tr> <td> <p style='font-size:14px; display:inline-block; width: 85%;'>" + p3 + "</p> </td> </tr> <tr> <td> <p style='display:inline-block; width: 85%;'>" + p4 + "</p> </td> </tr> <tr> <td> <p style='display:inline-block; width: 85%;'>" + p5 + "</p> </td> </tr> <tr> <td> <p style='display:inline-block; width: 85%;'>" + p6 + "</p> </td> </tr> <tr> <td style='hieght: 85px; width:100%;'></td> </tr> <tr> <td> <img src='http://jgarcialopez.com.mx/wp-content/themes/jgl/images/obituaries/little-logo.gif' width='99' height='38'> </td> </tr> </table></body></html>",
                        err_mes = "";
                        if(from == "" || nombre == "" || mail == ""){
                            err_mes += "No debe dejar ningún campo vacío";
                        } else if(!correo.match(/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/)){
                            err_mes += "<br>El correo proporcionado no es correcto";
                        }
                        if(err_mes != ""){
                            $("#err-message").html("<p>" + err_mes + "</p>");
                            return;
                        }
                    $.ajax({
                        url: "http://jglnuevo.vincoorbisdev.com/wp-content/themes/jgl/inc/func.php",
                        data: "action=obituaries&content=" + mail + "&name-to=" + nombre + "&mail-to=" + correo + "&name-from=" + from,
                        type: "POST",
                        success: function(a){
                            //console.log(a);
                            $("#glass, #modal").animate({
                                "margin-left": "-100%"
                            }, 400, function(){
                                $(this).remove();
                            });
                        },
                        error: function(a,b){
                            console.log(a,b);
                        }
                    });
                });
            })(jQuery);
        },
        finalize: function(){}
    }, maps:{
        init: function(){

            $("section.sucursal:even").addClass("sucursalLeft");
            $("section.sucursal:odd").addClass("sucursalRight");
            $("section.sucursalRight").each(function(i){
                $(this).children(".details").insertAfter($(this).children(".images"));
            });
            $(".direccion-corta").remove();

            $(".sucursal .padding-details").each(function(a){
                $(this).prepend("<h3>Dirección</h3>");
                $(this).find("p").first().after("<h4>Teléfono</h4>");
                var c = $(this).find(".descripcion").first();
                $(this).parent().find("div.descripcion").first().remove();
                $(this).parent().find("div.descripcion").first().html(c);
            });

            (function(w,$){

                // Styling
                var mapStyle = [
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [
                            { "color": "#1e2c5e" }
                        ]
                    },{
                        "featureType": "road",
                        "elementType": "labels.text.stroke",
                        "stylers": [
                            { "color": "#b3d4fc" }
                        ]
                    },{
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [
                            { "color": "#e1d9ce" }
                        ]
                    },{
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [
                            { "color": "#c8dcdc" }
                        ]
                    },{
                        "featureType": "landscape.natural",
                        "elementType": "geometry.fill",
                        "stylers": [
                            { "color": "#e1d9ce" }
                        ]
                    },{
                        "featureType": "landscape.man_made",
                        "elementType": "all",
                        "stylers": [
                            { "color": "#ffffff" }
                        ]
                    },{
                        "featureType": "water",
                        "stylers": [
                            { "color": "#c8dfe4" }
                        ]
                    },{
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [
                            { "color": "#e1d9ce" }
                        ]
                    },{
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            { "color": "#595945" }
                        ]
                    },{
                        "featureType": "poi",
                        "elementType": "labels.icon",
                        "stylers": [
                            { "color": "#595945" }
                        ]
                    },{
                        "featureType": "transit",
                        "stylers": [
                            { "visibility": "off" }
                        ]
                    }
                ];

                // Start coordinates
                var mx = {};
                mx.lat = 19.465297;
                mx.lon = -99.132132;

                w.gmap = function() {

                    var start = new google.maps.LatLng( mx.lat, mx.lon ),
                        opts = {
                            zoom:               12,
                            mapTypeId:          google.maps.MapTypeId.ROADMAP,
                            mapTypeControl:     false,
                            streetViewControl:  false,
                            center:             start,
                            styles:             mapStyle
                        },
                        myMaps = [];
                    var openInfo = function(pos, mapa, name, address){
                            var infowindowOpts = {};
                            var infowindow = new google.maps.InfoWindow(infowindowOpts);
                            var infoContent = $("<div>");
                            infoContent.append("<h4>" + name + "</h4>");
                            infoContent.append("<p>" + address + "</p>");

                            infowindow.setContent(infoContent[0]);
                            infowindow.open(mapa);
                            infowindow.setPosition(pos)
                        }
                        $(".map_canvas").each(function(e){
                            var par = $(this).parent().parent().parent().find("p.direccion").first();
                            var htitle = $(this).parent().parent().parent().find("h2").first();

                            var newMap = new google.maps.Map(document.getElementById("map" + e),opts);
                            myMaps.push(newMap);
                            openInfo(new google.maps.LatLng(par.attr('data-gmap-lat'), par.attr('data-gmap-long')), newMap, htitle.html(), par.html());
                        });

                        $(".directions form").each(function(e){
                            $(this).submit(function(a){
                                a.preventDefault();
                                var dirD = new google.maps.DirectionsRenderer(),
                                    dirS = new google.maps.DirectionsService();

                                dirD.setMap(myMaps[e]);

                                var to = new google.maps.LatLng( mx.lat, mx.lon ),//here
                                    from = $(this).find(".from").val(),
                                    request = {
                                        origin:         from,
                                        destination:    to,
                                        travelMode:     google.maps.DirectionsTravelMode.DRIVING
                                    };
                                if( from === "") {
                                    return false;
                                }
                                dirS.route(request, function(r,s) {
                                    if( s == google.maps.DirectionsStatus.OK ) {
                                        dirD.setDirections(r);
                                    }
                                });
                            });
                        });

                }

                var gmk = "AIzaSyDcLfhFZ3I0RG8VKbcJ2MTZMmsufFT1RGA",
                    gms = document.createElement("script"),
                    scr = document.getElementsByTagName("script")[0];

                gms.type = "text/javascript";
                gms.src = ("https:" == location.protocol ? "https:" : "http:") + "//maps.googleapis.com/maps/api/js?key="+gmk+"&sensor=false&callback=gmap";
                gms.async = "true";

                scr.parentNode.insertBefore(gms,scr);

            })(window,jQuery);


            $("#carousel-controls a").each(function(i){
                var a = $(this);
                $(this).click(function(e){
                    e.preventDefault;
                    if(!a.hasClass('active')){
                        $("#carousel-controls a").removeClass('active');
                        a.addClass('active');
                        $("#carousel img.active").animate({
                            opacity: 0
                        }, 800, function(){
                            $(this).css('opacity', 1);
                            $(this).removeClass('active');
                            $("#carousel img").eq(i).addClass('active');
                            $("#carousel img").eq(i).css("opacity", 0);
                            $("#carousel img").eq(i).animate({
                                opacity: 1
                            }, 800);
                        });
                    }
                    return false;
                });
            });

            $(".carousel-controls a").each(function(i){
                var a = $(this);

                $(this).click(function(e){
                    e.preventDefault;
                    if(!a.hasClass('active')){
                        a.parent().find("a.active").removeClass('active');
                        a.addClass('active');
                        a.parent().parent().find(".carousel img.active").animate({
                            opacity: 0
                        }, 800, function(){
                            $(this).css('opacity', 1);
                            $(this).removeClass('active');
                            $(".carousel img").eq(i).css("opacity", 0).addClass('active');
                            $(".carousel img").eq(i).animate({
                                opacity: 1
                            }, 800);
                        });
                    }
                    return false;
                });
            });

            
            $(".arrow-carousel").each(function(k){
                var parent = $(this).parent();
                var bolitas = $(this).parent().next();
                    
                $(this).find(".prev-arrow").first().click(function(m){
                    var hasClassActive = -1,
                    num = parent.find("img").length-1;

                    parent.find("img").each(function(n){
                        if($(this).hasClass("active"))
                            hasClassActive = n;
                    });

                    bolitas.find("a").removeClass("active");

                    if(0 == hasClassActive){
                        bolitas.find("a").eq(num).addClass("active");
                        parent.find('img.active').animate({
                            opacity:0
                        },800, function(){

                            $(this).css('opacity', 1);
                            $(this).removeClass('active').css("opacity", 0);
                            parent.find("img").eq(num).css("opacity", 0).addClass('active');
                            parent.find("img").eq(num).animate({
                                opacity: 1
                            }, 800);
                            
                        });

                    } else {

                        bolitas.find("a").eq(hasClassActive - 1).addClass("active");                        

                        parent.find("img.active").animate({
                            opacity:0
                        },800, function(){
                            $(this).css("opacity", 1);
                            $(this).removeClass('active').css("opacity", 0);                            
                            parent.find("img").eq(hasClassActive-1).css("opacity", 0).addClass('active');
                            parent.find("img").animate({
                                opacity:1
                            },800);
                        });

                    }
                });
                $(this).find(".next-arrow").first().click(function(m){
                    var hasClassActive = -1,
                    num = parent.find("img").length -1;

                    parent.find("img").each(function(n){
                        if($(this).hasClass("active"))
                            hasClassActive = n;
                    });

                    bolitas.find("a").removeClass("active");

                    if(num == hasClassActive){

                        bolitas.find("a").eq(0).addClass("active");
                        parent.find("img.active").animate({
                            opacity:0
                        },800, function(){
                            $(this).css("opacity", 1);
                            $(this).removeClass('active').css("opacity", 0);                                                        
                            parent.find("img").eq(0).css("opacity", 0).addClass('active');
                            parent.find("img").animate({
                                opacity:1
                            },800);
                        });

                    } else{
                        
                        bolitas.find("a").eq(hasClassActive + 1).addClass("active");                        
                        parent.find("img.active").animate({
                            opacity:0
                        },800, function(){
                            $(this).css("opacity", 1); 
                            $(this).removeClass('active').css("opacity", 0);                                                       
                            parent.find("img").eq(hasClassActive+1).css("opacity", 0).addClass('active');
                            parent.find("img").animate({
                                opacity:1
                            },800);
                        });

                    }
                });
            });
                   

            $(".sucursal").each(function(e){
                $(".end a").eq(e).attr('href', '#' + $(this).attr('id'));
            });

        },
        finalize: function(){}
    },
    results : {
        init: function() {

            // Ellipsis overflow on excerpt and link
            $(".result-list .excerpt").dotdotdot({
                ellipsis:   "…"
            });
        }
    },
    blog: {
        init: function(){
            $("#principal-content p").each(function(){
                if(!$(this).hasClass("portada") && !$(this).hasClass("more"))
                    $(this).remove();
            });
            $(".post-content p").each(function(){
                if(!$(this).hasClass("portada") && !$(this).hasClass("more"))
                    $(this).remove();
            });

            $(".carousel-controls a").each(function(i){
                var a = $(this);
                $(this).click(function(e){
                    e.preventDefault;
                    if(!a.hasClass('active')){
                        a.parent().find("a.active").removeClass('active');
                        //$(".carousel-controls a").removeClass('active');
                        a.addClass('active');
                        a.parent().parent().find(".slides img.active").first().animate({
                        //$(".carousel img.active").first().animate({
                            opacity: 0
                        }, 800, function(){
                            $(this).css('opacity', 1);
                            $(this).removeClass('active');
                            $("#carousel .slides img").eq(i).addClass('active');
                        });
                    }
                    return false;
                });
            });
             $(document).on("click", ".move", function(e){
                var category = $(this).attr('data-category');
                console.log(category);

                var year = $(this).attr("data-year");
                $.ajax({
                    url: homeURL + "wp-content/themes/jgl/inc/func.php",
                    data: "action=" + "archive&year=" + year+"&category="+category,                    
                    type: "POST",
                    success: function(a){
                        $(".archives").first().html(a);
                    }, 
                    error: function(a,b){
                        console.log(a,b);
                    }
                });
            });
        }
    },
    contact: {
        init: function(){
            var opt = $("#plan-options");
            opt.find("a").each(function(){
                var val = $(this).html();
                $(this).click(function(b){
                    b.preventDefault();
                    document.getElementById("plan").setAttribute("value", val);
                    opt.fadeOut(300);
                });
            });
            $("#key").click(function(){
                if(opt.css("display")== "none") opt.fadeIn(500);
                else opt.fadeOut(300);
            });

            $("#comment-form-contact").submit(function(e){
                e.preventDefault();
                $(this).find(".input-error").removeClass("input-error");
                $(this).find(".error").fadeOut("300");
                var name = $("#name").val(),
                    email = $("#email").val(),
                    numero = $("#tel").val();
                    band = 0,
                    as = $(this).find("[name=as]").first().val();

                if(name == ""){
                    $("#name").addClass("input-error");
                    $("#name").next().fadeIn(500);
                    band = 1;
                } else if (email == "" || !email.match(/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/)){
                    $("#email").addClass("input-error");
                    $("#email").next().fadeIn(500);
                    band = 1;
                } else if(numero.length > 0 && (!numero.match(/^[0-9]*$/) || numero.length > 10 || numero.length < 8)){
                    $("#tel").addClass("input-error");
                    $("#tel").next().fadeIn(500);
                    band = 1;
                }
                if(band == 1){
                    return;
                } else{
                    $("#plan").attr("enabled", true);
                    $("#comment-form-contact").html("<span>" + $(this).attr("data-sum") + " (Filtro antispam)</p><input type='text' name='resp'><input type='hidden' name='data' value='" + $(this).serialize() + "&action=savecommentcontact&plan=" + $("#plan").val() + "'><button type='button' class='spmOut' data-rsp='" + as + "'>Enviar</button>");
                }
            });
            $("#fondo").click(function(){
                $("#cuadro").hide();
                $("#fondo").hide();
                $("#comment-form input").val("");
                $("#comment-form textarea").val("");
            });
            $(document).on('click', '.icon-close', function(){
                $("#cuadro").hide();
                $("#fondo").hide();
                $("#comment-form input").val("");
                $("#comment-form textarea").val("");
            });
        }
    },
    digital: {
        init:function(){
            var cownter=0;
            
           $('.archive h2').each(function(){
                 $(this).addClass('this-'+cownter);
                 cownter++;

                 if($(this).hasClass('this-1')){
                    $(this).show();
                 } else{
                    $(this).hide();
                 }
           });
            console.log('semblanza');
             $(document).on("click", ".move", function(e){
                var category = $(this).attr('data-category');
                console.log(category);

                var year = $(this).attr("data-year");
                $.ajax({
                    url: homeURL + "wp-content/themes/jgl/inc/func.php",
                    data: "action=" + "archive&year=" + year+"&category="+category,                    
                    type: "POST",
                    success: function(a){
                        $(".archives").first().html(a);
                    }, 
                    error: function(a,b){
                        console.log(a,b);
                    }
                });
            });

            
           $( "#dateField" ).autocomplete({
               source: $.parseJSON(jsonSemblanza),
               select: function( event, ui ) {
                   $('#autocomplete_selected').val(ui.item.idpost);
               }
           });
                
            $('.semblanza-button').on('click', function(){
                console.log('print semblanza');
                counter = 0;
                
                $.each($.parseJSON(jsonSemblanza), function(x, z) {
                
                    if (z.idpost ==  $('#autocomplete_selected').val()){
                        $('#find').html('');
                        $('#semblanzas-recientes').hide();                        
                        $( "#find" ).append("<div class='separate'></div><div class='item-semblanza'><div class='text-semblanza'><h2>"+z.label+"</h2><p>"+z.contenido+"</p></div><a href='"+z.enlace+"' target='_blank'><img src='"+z.imagen+"' class='img-qr'></a></div>");
                        counter++;
                    }
                
                });
                
                var resultadosHTML = '<h3>Resultados: '+counter+'</h3>';
                
                $('#find').prepend(resultadosHTML);
            
            });
                
            $('#search-semblanza').datepicker({
                showOn: 'both', 
                buttonImageOnly: true, 
                buttonImage: 'http://jglnuevo.vincoorbisdev.com/wp-content/themes/jgl/images/semblanza/calendar01.png', 
                firstDay: 1, 
                dateFormat: "yy-mm-dd",
                changeMonth: true, 
                changeYear: true, 
                onSelect: function(){
                    console.log('aqui');
                    var day1 = $(this).datepicker('getDate').getDate();
                    var month1 = ('0' + ($(this).datepicker('getDate').getMonth()+1)).slice(-2);
                    var year1 = $(this).datepicker('getDate').getFullYear();
                    var dateString = year1+'-'+month1+'-'+day1;
                    $('#find').html('');
                    $('#find h3').html('');
                    count = 0;
                    $.each($.parseJSON(jsonSemblanza), function(i, v) {
                        console.log(v.fecha, v.label);
                        if (v.fecha == dateString) {
                            $('#semblanzas-recientes').hide();
                            $( "#find" ).append("<div class='separate'></div><div class='item-semblanza'><div class='text-semblanza'><h2>"+v.label+"</h2><p>"+v.contenido+"</p></div><a href='"+v.enlace+"' target='_blank'><img src='"+v.imagen+"' class='img-qr'></a></div>");
                            count++;
                        }                         
                    });
                    var resultadosHTML = '<h3>Resultados: '+count+'</h3>';
                    $('#find').prepend(resultadosHTML);
                    }
                });
        }
    },
    archive:{
        init: function(){

            $(".post-content p").each(function(a){
                if(!$(this).hasClass("portada") && !$(this).hasClass("more")) $(this).remove();
            });
            $(document).on("click", ".move", function(e){
                var category = $(this).attr('data-category');
                console.log(category);

                var year = $(this).attr("data-year");
                $.ajax({
                    url: homeURL + "wp-content/themes/jgl/inc/func.php",
                    data: "action=" + "archive&year=" + year+"&category="+category,                    
                    type: "POST",
                    success: function(a){
                        $(".archives").first().html(a);
                    }, 
                    error: function(a,b){
                        console.log(a,b);
                    }
                });
            });
        }
    },
    single:{
        init: function(){
            $("a[rel=next]").each(function(a){
                if(a==0)
                    $(this).addClass("bef");
                else
                    $(this).addClass("nxt");
            });
            $("#newsletter").submit(function(e){
                e.preventDefault();
                $("#name-news, #email-news").css("border", "1px solid #bbbbbb");
                var name = $("#name-news").val(),
                    email = $("#email-news").val(),
                    as = $(this).find("[name=as]").first().val();
                if(name == ""){
                    $("#name-news").css("border", "1px solid #ffabab");
                    return;
                } else if(!email.match(/([0-9a-zA-Z]+[-._+&])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}/)){
                    $("#email-news").css("border", "1px solid #ffabab");
                    return;
                } else{
                    $("#newsletter").html("<span>" + $(this).attr("data-sum") + " (Filtro antispam)</p><input type='text' name='resp'><input type='hidden' name='data' value='" + $(this).serialize() + "&action=newsletter" + "'><button type='button' class='spmOut' data-rsp='" + as + "'>Enviar</button>");
                }

            });
            $("#comment-form").submit(function(e){
                e.preventDefault();
                var name = $("#name").val(),
                    email = $("#email").val(),
                    content = $("#content").val();
                if(content == "")
                    return;
                else{
                    $("#comment-form").css("opacity", ".3");
                    $("#comment-form").find("button").remove();
                    $.ajax({
                        type: 'POST',
                        data: $(this).serialize() + "&action=savecomment&id_post=" + id_post,
                        url: "../wp-content/themes/jgl/inc/func.php",
                        success: function(a){
                            $("#comment-form").html(a);
                            $("#comment-form").css("opacity", 1);
                            $("#comment-form").prev().remove();
                        },
                        error: function(a, b){
                            console.log(a, b);
                        }
                    });
                }
            });
            $(document).on("click", ".move", function(e){
                var year = $(this).attr("data-year");
                $.ajax({
                    url: "../wp-content/themes/jgl/inc/func.php",
                    data: "action=" + "archive&year=" + year,
                    type: "POST",
                    success: function(a){
                        $(".archives").first().html(a);
                    }, 
                    error: function(a,b){
                        console.log(a,b);
                    }
                });
            });
            $(".print").each(function(a){
                $(this).click(function(b){
                    b.preventDefault();
                    window.print();
                });
            });
            $(".portada, .home").each(function(){
                $(this).remove();
            });
        }
    }
};

// DOM-based routing
// http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
UTIL = {

  fire : function(func,funcname, args){

    var namespace = SITE;  // indicate your obj literal namespace here

    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] == 'function'){
      namespace[func][funcname](args);
    }

  },

  loadEvents : function(){

    var bodyId = document.body.id;

    // hit up common first.
    UTIL.fire('common');

    // do all the classes too.
    $.each(document.body.className.split(/\s+/),function(i,classnm){
      UTIL.fire(classnm);
      UTIL.fire(classnm,bodyId);
      UTIL.fire(classnm,'finalize');
    });

    UTIL.fire('common','finalize');

  }

};
// COMUNIDAD


// kick it all off here
$(document).ready(UTIL.loadEvents);

