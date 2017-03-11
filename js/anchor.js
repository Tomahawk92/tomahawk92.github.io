		$(document).ready(function() {
		$('a[href^="#assortment"]').click
		(function () { 
		elementClick = $(this).attr("href");
		destination = $(elementClick).offset().top;
		if($.browser.chrome || $.browser.safari){
		$('body').animate( { scrollTop: destination }, 1100 );
		 }else{
		$('html').animate( { scrollTop: destination }, 1100 );
		}
		return false;
		});
		});
		
		$(document).ready(function() {
		$('a[href^="#get"]').click
		(function () { 
		elementClick = $(this).attr("href");
		destination = $(elementClick).offset().top;
		if($.browser.chrome || $.browser.safari){
		$('body').animate( { scrollTop: destination }, 1100 );
		 }else{
		$('html').animate( { scrollTop: destination }, 1100 );
		}
		return false;
		});
		});		
		
		$(document).ready(function() {
		$('a[href^="#delivery"]').click
		(function () { 
		elementClick = $(this).attr("href");
		destination = $(elementClick).offset().top;
		if($.browser.chrome || $.browser.safari){
		$('body').animate( { scrollTop: destination }, 1100 );
		 }else{
		$('html').animate( { scrollTop: destination }, 1100 );
		}
		return false;
		});
		});
		
		$(document).ready(function() {
		$('a[href^="#questions"]').click
		(function () { 
		elementClick = $(this).attr("href");
		destination = $(elementClick).offset().top;
		if($.browser.chrome || $.browser.safari){
		$('body').animate( { scrollTop: destination }, 1100 );
		 }else{
		$('html').animate( { scrollTop: destination }, 1100 );
		}
		return false;
		});
		});