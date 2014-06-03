// hover open mega-menu only when above the media-query (desktop)
$( ".main-menu-item").hover( function() {
  
  // check to see if some mobile features are active (above the media query)
  if ( $( "#menu-icon" ).css( "display" ) == "none" ){
    $( this ).find( "> .sub-menu" ).toggleClass( "hide" );
  }

});

// open the side-slide menu
$( "#menu-icon" ).click( function() {
  $( "#top-menu" ).toggleClass( "clicked" );
  $( ".sub-menu" ).addClass( "hide" );
  $( ".svg-default" ).removeClass( "svg-active" );
});

// open the.sub-menu
$( ".svg-default" ).click( function() {
  
  var button   = $( this ); // the clicked button
  var buttons  = $( ".svg-active" ); // all the other buttons
  var submenu  = $( button ).next( ".sub-menu" ); // the submenu of that button
  var submenus = $( ".sub-menu" ); // all the other submenus
  var wrapper  = $(".menu-wrapper"); // the whole menu

  // spin the sign //
  button.toggleClass( "svg-active" );
  buttons.not(button).toggleClass( "svg-active" );
  
  // open the submenu //
  submenu.toggleClass( "hide" );
  submenus.not(submenu).addClass( "hide" );

  // scroll back to the top
  wrapper.animate({
    scrollTop: 0
  }, 0);
});

$( document ).ready(function() {
  
  $( "img" ).parent( "a" ).addClass( "no-line" );

  // check if parent is an anchor tag 
  // if ( $( "img" ).parent() == "a" ){
  //   $( this ).addClass( ".no-line" );
  // }
});