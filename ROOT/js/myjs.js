$(document).ready(function() {
	$('.scrollTo').click(function() {
		$('html, body').animate({
			scrollTop: $($(this).attr('href')).offset().top}, 700);
	});
});

//script tooltip text
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip(); 
});

//script to open link
function openLink(blank, link){
	if(blank == false){
		location.href=link;
	}else{
		window.open(link);
	}
}