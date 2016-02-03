/*
 * slider.js
 * Detta är JS filen för framside snurran.
 */
/*
 $(function () {
 function InitializeSlider() {
 $('.slides').hide();

 $('#frontpage-slider').flexslider({
 animation: "slide",
 nextText: "&#155;",
 prevText: "&#139;"
 });

 setTimeout(function() {$(window).trigger('resize'); $('.slides').fadeIn();}, 100);

 $('#frontpage-sldier').trigger('resize');
 }

 $.ajax({
 type: "GET",
 url: "bildspel/bildspel.xml",
 cache: false,
 dataType: "xml",
 success: function(xml) {
 $(xml).find('bilder').each(function(){
 $(this).find("bild").each(function () {
 // Skapa nya objektet
 var newImage = $('<li/>');

 // Hämta alla variabler från XML objektet
 var imageSrc = 'bildspel/' + $(this).find('adress').text();
 var imageText = $(this).find('bildtext').text();
 var imageLinkHref = $(this).find('länk').text();
 var imageLinkTarget = $(this).find('mål').text();
 if (imageLinkTarget == "") {imageLinkTarget = "_self"}


 // Konstruktera det nya objektet
 newImage.append('<img src="'+ imageSrc +'">')

 if (imageText != "") {
 newImage.append('<span class="caption">');
 newImage.children('.caption').append('<span>' + imageText + '</span>');
 newImage.children('.caption').append('<a href="'+ imageLinkHref +'" target="'+ imageLinkTarget +'">Läs mer »</a>');
 }

 // Lägg in objektet i slidern
 $('#frontpage-slider .slides').append(newImage);

 });
 });

 // Initializera slidern EFTER vi lagt in alla bilder
 InitializeSlider();
 }
 });
 })


 */