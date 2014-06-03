// First and last
var $first = $( "#first" );
var $last  = $( "#last" );

// Targets
var $next  = $( "#next" );
var $prev  = $( "#prev" );

// Timer
var $time  = $( ".ufl-slider" ).data( "time" );

// Next Slide
function next_slide(){
  $( ".prev" ).removeClass( "prev" ).addClass( "hide" );
  $( ".current" ).removeClass( "current" ).addClass( "prev" );
  $( ".next" ).removeClass( "next" ).addClass( "current" );
  if ( $last.hasClass( "current" ) ){
    $first.addClass( "next" ).removeClass( "hide" );
  }
  else {
    $( ".current" ).next().removeClass( "hide" ).addClass( "next" );
  } 
}

// Previous Slide
function prev_slide(){
  $( ".next" ).removeClass( "next" ).addClass( "hide" );
  $( ".current" ).removeClass( "current" ).addClass( "next" );
  $( ".prev" ).removeClass( "prev" ).addClass( "current" );
  if ( $first.hasClass( "current" ) ){
    $last.addClass( "prev" ).removeClass( "hide" );
  }
  else {
    $( ".current" ).prev().removeClass( "hide" ).addClass( "prev" );
  }
}

// Click Events
$next.click( next_slide );
$prev.click( prev_slide );

// Timer Event
$( document ).ready(function() {
  
  setInterval( function() {
    next_slide();
  }, $time );

});