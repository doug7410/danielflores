$(document).ready(function () {
	$("#contactForm").prepend("<div style='display: none' class='alert alert-success'> Thank you! Your email has been sent. I will get back to you shorly.");
	
	$('#contactForm').submit(function(e){
		e.preventDefault();
		
		//get the action-url of the form
        var actionurl = e.currentTarget.action;

        //do your own request an handle the results
         $.ajax({
                url: actionurl,
                type: 'post',
                data: $("#contactForm").serialize()
            }).done(function(msg){
            	$(".alert").slideDown(800).delay(5000).slideUp(800);
            	$("#contactForm")[0].reset()
            });

		return false
	});
});