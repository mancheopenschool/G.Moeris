$(document).ready(function(){	

			
 /*$("#datepicker").datepicker($.datepicker.regional["fr"]); 
   "d M, y"*/
       
  	/* jQuery(function($){
		$("#datepicker").datepicker(); 
						}); */
   
  $(function() {
    $( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );
    $( "#locale" ).change(function() {
      $( "#datepicker" ).datepicker( "option",
        $.datepicker.regional[ $( this ).val() ] );
    });
  });
  /*$(function() {
    $( ".c" ).slider();
				});*/
  $(function() {
    $( ".c1" ).slider({
      range: "min",
      value: 0 ,
      min: 0,
      max: 5,
      slide: function( event, ui ) {
        $( "#amount1" ).val( ui.value );
      }
    });
  });
  $(function() {
    $( ".c2" ).slider({
      range: "min",
      value: 0,
      min: 0,
      max: 5,
      slide: function( event, ui ) {
        $( "#amount2" ).val( ui.value );
      }
    });
  });
    $(function() {
    $( ".c3" ).slider({
      range: "min",
      value: 0,
      min: 0,
      max: 5,
      slide: function( event, ui ) {
        $( "#amount3" ).val( ui.value );
      }
    });
  });
/*$(".selector").slider(min: 10);
	$('button').click(function(){
	};*/
$("#ui-datepicker-div").toggleClass('ui-corner-all')
});                                                                                                                          
/*$("#text").addClass('highlighted')*/