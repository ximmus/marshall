// IE z-index fix
$(function() {
  var zIndexNumber = 1000;
  // Put your target element(s) in the selector below!
  $(".ie7 .courses").each(function() {
      $(this).css('zIndex', zIndexNumber);
      zIndexNumber -= 10;
  });
});

/*  
Click Event Function:
takes two parameters
1. Target class
2. Open state class 
*/

//Define the function:
var windowClick = function( targetClass, defaultClass, activeClass ) {
  
  var target = "."+ targetClass;
  var def = "." + defaultClass;
  var active   = activeClass; 

  $( document ).click( function() {
    $( target ).find( def ).removeClass( active );
  });

  $( target ).click( function(e) {
    e.stopPropagation(); 
    return false;        
  });

  $( target ).click( function() {
    $( this ).children( def ).toggleClass( active );
    $( target ).not( this ).children( def ).removeClass( active );
  });
  
};

//Call the function
$( document ).ready( windowClick( "courses", "course-description","course-description-open" ));