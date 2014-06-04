<?php
/* 
Removes the <p> or <br> tags that WP likes to add when you use shortcodes in the editor. 
To use, add affected shortcodes to $shortcodes array.
*/

add_filter("the_content", "the_content_filter");
 
function the_content_filter($content) {
    
    // Bad shortcodes, no tags for you!
    $shortcodes = array(
        "subcontent",
        "subcontent_wrapper",
        "uflui",
        "uflui_wrapper",
        "staff_profile",
        "ufl_button",
        "ufl_row",
        "ufl_column",
        "courses"
        );

    // array of custom shortcodes requiring the fix 
    $block = join("|", $shortcodes );
 
    // opening tag
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
        
    // closing tag
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
 
    return $rep;
}