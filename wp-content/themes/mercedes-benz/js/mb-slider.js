$(window).load(function () {
    /*
     function animateMB(args) {

     slideCaptions = $(args.container).find('li .caption');
     slideCaptions.height(slideCaptions.parent().height()).width(slideCaptions.parent().width());
     currentSlide = $('#mb-slideshow .slides > li.flex-active-slide');

     // Image + Info
     imageInfoCaption = $(args.container).find('li.image-info .caption');

     imageInfoCaption.find(".slide").each(function(index){

     objectText = $(this).find('.text');
     objectButtons = $(this).find('.buttons');

     objectText.css({
     'opacity': objectText.data('startOpacity'),
     'top' : objectText.data('v-start'),
     'left': objectText.data('h-start'),
     });
     objectButtons.css({
     'opacity': objectButtons.data('startOpacity'),
     'top' : objectButtons.data('v-start'),
     'left': objectButtons.data('h-start'),
     });

     if(currentSlide.hasClass('image-info')){

     objectText.delay(objectText.data('animDelay')).animate({
     top: objectText.data('vEnd'),
     bottom: '',
     right: '',
     left:'0%',
     opacity: objectText.data('endOpacity'),
     },objectText.data('animSpeed')).css({
     'text-align' : objectText.data('align'),
     });


     objectButtons.delay(objectButtons.data('animDelay')).animate({
     top: objectButtons.data('vEnd'),
     bottom: '',
     right: '',
     left:'0%',
     opacity: objectButtons.data('endOpacity'),
     },objectButtons.data('animSpeed')).css({
     'text-align' : objectButtons.data('align'),
     });

     }

     });

     // Two objects
     twoObjectsCaption = $(args.container).find('li.two-objects .caption');

     twoObjectsCaption.find(".object").each(function(index){

     objectInfo = $(this).find('.info');
     objectButton = $(this).find('.buttons');
     objectCar = $(this).find('.car');

     objectInfo.css({
     'opacity': objectInfo.data('startOpacity'),
     'top' : objectInfo.data('v-start'),
     'left': objectInfo.data('h-start'),
     });

     objectButton.css({
     'opacity': objectButton.data('startOpacity'),
     'top' : objectButton.data('v-start'),
     'left': objectButton.data('h-start'),
     });

     objectCar.css({
     'opacity': objectCar.data('startOpacity'),
     'top' : objectCar.data('v-start'),
     'left': objectCar.data('h-start'),
     });

     if(currentSlide.hasClass('two-objects')){

     objectInfo.delay(objectInfo.data('animDelay')).animate({
     top: objectInfo.data('vEnd'),
     bottom: '',
     right: '',
     left:'0%',
     opacity: objectInfo.data('endOpacity'),
     },objectInfo.data('animSpeed')).css({
     'text-align' : objectInfo.data('align'),
     });

     objectButton.delay(objectButton.data('animDelay')).animate({
     top: objectButton.data('vEnd'),
     bottom: '',
     right: '',
     left:'0%',
     opacity: objectButton.data('endOpacity'),
     },objectButton.data('animSpeed')).css({
     'text-align' : objectButton.data('align'),
     });

     objectCar.delay(objectCar.data('animDelay')).animate({
     top: objectCar.data('vEnd'),
     bottom: '',
     right: '',
     left:'0%',
     opacity: objectCar.data('endOpacity'),
     },objectCar.data('animSpeed')).css({
     'text-align' : objectCar.data('align'),
     });
     }

     });

     $('#mb-slideshow .flex-direction-nav a').click(function(){
     $('#mb-slideshow').find('li').each(function(index){
     objectText = $(this).find('.caption .text');
     objectButtons = $(this).find('.caption .buttons');

     objectText.css({
     'opacity': objectText.data('startOpacity'),
     'top' : objectText.data('v-start'),
     'left': objectText.data('h-start'),
     });
     objectButtons.css({
     'opacity': objectButtons.data('startOpacity'),
     'top' : objectButtons.data('v-start'),
     'left': objectButtons.data('h-start'),
     });
     })
     });

     }

     /*function animateAF(args){

     $(args.container).find('li .caption').animate({
     bottom: '0%',
     opacity: 1,
     },500);

     $('#af-slideshow .flex-direction-nav a').click(function(){
     $('#af-slideshow').find('li').each(function(index){
     if($(this).hasClass('flex-active-slide')){
     $(this).find('.caption').css({
     'bottom' : '-25%',
     'opacity': 0,
     });
     }
     else {
     $(this).find('.caption').animate({
     bottom: '-25%',
     opacity: 0,
     },200);
     }
     })
     });
     }*/

    /*$('#mb-slideshow').flexslider({
     animation: "slide",				//String: Select your animation type, "fade" or "slide"
     slideDirection: "horizontal",	//String: Select the sliding direction, "horizontal" or "vertical"
     slideshow: true,				//Boolean: Animate slider automatically
     slideshowSpeed: 7000,			//Integer: Set the speed of the slideshow cycling, in milliseconds
     animationDuration: 600,			//Integer: Set the speed of animations, in milliseconds
     directionNav: true,				//Boolean: Create navigation for previous/next navigation? (true/false)
     smoothHeight: true,
     animationLoop: true,			//Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
     pauseOnAction: true,			//Boolean: Pause the slideshow when interacting with control elements, highly recommended.
     pauseOnHover: true,			//Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
     useCSS: true,
     touch: true,
     start: animateMB,
     after: animateMB,
     });

     /*$('#af-slideshow').flexslider({
     animation: "slide",				//String: Select your animation type, "fade" or "slide"
     slideDirection: "horizontal",	//String: Select the sliding direction, "horizontal" or "vertical"
     slideshow: true,				//Boolean: Animate slider automatically
     slideshowSpeed: 7000,			//Integer: Set the speed of the slideshow cycling, in milliseconds
     animationDuration: 600,			//Integer: Set the speed of animations, in milliseconds
     directionNav: true,				//Boolean: Create navigation for previous/next navigation? (true/false)
     smoothHeight: false,
     animationLoop: false,			//Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
     pauseOnAction: true,			//Boolean: Pause the slideshow when interacting with control elements, highly recommended.
     pauseOnHover: true,			//Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
     useCSS: true,
     touch: true,
     start: animateAF,
     after: animateAF,
     });*/
});