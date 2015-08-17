/**
 * User: Michael Lazarev mihailaz.90@gmail.com
 * Date: 13.08.15
 * Time: 22:18
 */

$(function(){
	var btn = $('.contacts_btn');
	btn.on('click', function(e){
		e.preventDefault();
		$.ajax({
			url: btn.attr('data-url'),
			type: 'post',
			data: {_token: btn.attr('data-token')},
			success: function(data){
				btn.after('<ul class="list-unstyled"><li>Phone: ' + data.phone + '</li><li>Email: <a href="mailto:' + data.email + '">' + data.email + '</a></li>');
				btn.remove();
			},
			error: function(){
				console.log('error');
			}
		});
		return false;
	});
});

$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
	event.preventDefault();
	$(this).ekkoLightbox();
});