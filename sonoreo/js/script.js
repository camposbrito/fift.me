$('.awesome-tooltip').tooltip({
    placement: 'left'
}); 
// Sticky Header
$(window).scroll(function() {
     if (!$('.mobile-toggle').is(':visible')){
        // if ($(window).scrollTop() > window.screen.availHeight - 160) {
        //     $('.main_h').addClass('sticky');
        //     $('nav.secondary').attr('style', 'display: table !important');
        //     $('nav.initial').css('display','none');
        //     // alert(4);
        // } else {
        //     $('.main_h').removeClass('sticky');
        //     $('nav.secondary').attr('style', 'display: none !important');
        //     $('nav.initial').css('display','table');        
        //     // alert(5);
        // }

        $('.home-slide').each(function(){
            //if(!isScrolledIntoView($(this))){
            if(!isElementInView($(this),false)){    
                $('.main_h').addClass('sticky',500);
                $('nav.secondary').attr('style', 'display: table !important',500);
                $('nav.initial').css('display','none',500);
            }
            else{
                $('.main_h').removeClass('sticky',500);
                $('nav.secondary').attr('style', 'display: none !important',500);
                $('nav.initial').css('display','table',500);
            }
          });
    }
    
    function isElementInView(element, fullyInView) {
        console.debug('isElementInView');
        var pageTop = $(window).scrollTop();
        var pageBottom = pageTop + $(window).height()  ;
        var elementTop = $(element).offset().top;
        var elementBottom = elementTop + $(element).height() -160 ;

        if (fullyInView === true) {
            return ((pageTop < elementTop) && (pageBottom > elementBottom));
        } else {
            return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
        }
    }
    function isScrolledIntoView(elem){
        console.debug('isScrolledIntoView');
        var $elem = $(elem);
        var $window = $(window);
    
        var docViewTop = $window.scrollTop();
        var docViewBottom = docViewTop + $window.height();
    
        var elemTop = $elem.offset().top;
        var elemBottom = elemTop + $elem.height();
    
        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
});
$(window).resize(function(){
    // var scrollWidth = getBrowserScrollSize().width;
  
    // var w = window.screen.availWidth - scrollWidth;
    // var h = window.screen.availHeight; 	
    // var hPrincipal = h - 74;
    // var hSecondary = h - 111;
    // hPrincipal = h ;
    // hSecondary = h - 40;
    // $('.home-slide').height(hPrincipal);
});
// Mobile Navigation
$('.mobile-toggle').click(function() {
    if ($('.main_h').hasClass('open-nav')) {
        $('.main_h').removeClass('open-nav');

        $('nav.secondary').attr('style', 'display: none !important');
        
        $('nav.initial').fadeOut('fast'); 
        setTimeout(function() {
            $('nav.initial .logo img').css('width','70%'); 
        }, 500);
    } else {
        $('.main_h').addClass('open-nav');
        // setTimeout(function() {
            
        $('nav.initial').fadeIn('fast').css('display','table'); 
        //   }, 500);
         
        // if ($(window).scrollTop() > window.screen.availHeight - 160) {
            // $('.main_h').addClass('sticky');
            // $('nav.secondary').attr('style', 'display: table !important');
            // $('nav.initial').css('display','none');
            
        // } else {
            // $('.main_h').removeClass('sticky');
            $('nav.secondary').attr('style', 'display: none !important');
            // $('nav.initial').css('display','table'); 
            $('nav.initial .logo img').css('width','20%'); 
        // }
    }
});

$('.main_h li a').click(function() {
    if ($('.main_h').hasClass('open-nav')) {
        $('.navigation').removeClass('open-nav');
        $('.main_h').removeClass('open-nav');
        $('nav.secondary').attr('style', 'display: none !important');
        $('nav.initial').css('display','none');
    }
});

// navigation scroll lijepo radi materem
$('nav a').click(function(event) {
    var id = $(this).attr("href");
    var NavHeight = (($('.initial').height() == 0) ?  $('.navbar-nav-secondary').height() : $('.initial').height()) ;
    console.log( '-------------- ');
    console.log( 'Total: ' + NavHeight);
    console.log( 'id: ' +  id);
    console.log( 'navbar-nav-secondary: ' + $('.navbar-nav-secondary').height());
    console.log( 'secondary: ' + $('.secondary').height());
    console.log( '-------------- '); 
    if (NavHeight >= 74 ){
        if (id == '.slider-wrapper'){
            var offset = 100
        }else{
            var offset = 40
        }
    } 
    else if ((NavHeight >= 56 ) &&  (NavHeight <= 73 )){
        if (id == '.slider-wrapper'){
            var offset = 82
        }else{
            var offset = 22
        }
    }
    else if ((NavHeight >= 51 ) &&  (NavHeight <= 55 )){
        if (id == '.slider-wrapper'){
            var offset = 82
        }else{
            var offset = 40
        }
    }
    else{
            if (id == '.slider-wrapper'){
            var offset = 100
        }else{
            var offset = 40
        }
    }
    console.log('outerHeight: ' +$('.initial').outerHeight());
    console.log('Height: ' + $('.initial').height());
	console.log('offset: ' + offset);
    var target = $(id).offset().top - offset;
    $('html, body').animate({
        scrollTop: target
    }, 500);
    event.preventDefault();
}); 

function getBrowserScrollSize(){

    var css = {
        "border":  "none",
        "height":  "200px",
        "margin":  "0",
        "padding": "0",
        "width":   "200px"
    };

    var inner = $("<div>").css($.extend({}, css));
    var outer = $("<div>").css($.extend({
        "left":       "-1000px",
        "overflow":   "scroll",
        "position":   "absolute",
        "top":        "-1000px"
    }, css)).append(inner).appendTo("body")
    .scrollLeft(1000)
    .scrollTop(1000);

    var scrollSize = {
        "height": (outer.offset().top - inner.offset().top) || 0,
        "width": (outer.offset().left - inner.offset().left) || 0
    };

    outer.remove();
    return scrollSize;
}
$(document).ready(function(){
    $('.main_h').removeClass('esconder', 1000);               
    $('.home-slide').removeClass('esconder', 1000);
    $('section').removeClass('esconder', 1000);

    if ($('.main_h').hasClass('open-nav')) {
        if ($(window).scrollTop() > window.screen.availHeight - 160) {
            $('.main_h').addClass('sticky');
            $('nav.secondary').attr('style', 'display: table !important');
            $('nav.initial').css('display','none; ; height: 0');
            
        } else {
            $('.main_h').removeClass('sticky');
            $('nav.secondary').attr('style', 'display: none !important; height: 0');
            $('nav.initial').css('display','table');
            
        }
        // alert(1);
    }
    else{
        $('nav.initial').css('display','none;');   
        $('nav.secondary').css('display','none');
        // alert(2);
    }
   var scrollWidth = getBrowserScrollSize().width;
  
    var w = window.screen.availWidth - scrollWidth;
    var h = window.screen.availHeight; 	
    // var h = $(window).height();
    var hPrincipal = h - 74;
    var hSecondary = h - 111;
    hPrincipal = h ;
    hSecondary = h - 90;
    console.debug(w);
    console.debug(hPrincipal);
     // if (w > 719)
    {  
    var home = $('.home-slide').DrSlider(
                    {
                        width: w, //slide width
                        height: hPrincipal ,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
                    }
                ); //Yes! that's it!
            }  
          
    var clientes = $('.clientes-slide').DrSlider(
					{
                        width: w, //slide width
                        height:  hSecondary,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
					}
				); //Yes! that's it!

	var Diferenciais = $('.Diferenciais-slide').DrSlider(
					{
                        width: w, //slide width
                        height: hSecondary ,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
					}
				); //Yes! that's it!
    if (w > 719){        
        var QuemSomos = $('.QuemSomos-slide').DrSlider(
                        {
                            width: w, //slide width
                            height: hSecondary ,  //slide height
                            navigationType: 'circle',
                            duration: 10000,
                            showProgress:true,
                            showNavigation: true,
                            showControl: true,
                            positionNavigation:'in-center-bottom'
                        }
                    ); //Yes! that's it!
    }    
	var Contato = $('.Contato-slide').DrSlider(
					{
                        width: w, //slide width
                        height: hSecondary ,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
					}
                ); //Yes! that's it!
    var solucoes = $('.solucoes-slide').DrSlider(
                    {
                        width: w, //slide width
                        height: hSecondary ,  //slide height
                        navigationType: 'circle',
                        duration: 10000,
                        showProgress:true,
                        showNavigation: true,
                        showControl: true,
                        positionNavigation:'in-center-bottom'
                    }
    ); //Yes! that's it! 
            
   
});
//paste this code under the head tag or in a separate js file.
// Wait for window load
$(window).load(function(event) {
    // Animate loader off screen   
  
    $(".se-pre-con").fadeOut("slow");  
    $('html, body').animate({
        scrollTop: 0
    }, 1);      
    event.preventDefault();
});
 
