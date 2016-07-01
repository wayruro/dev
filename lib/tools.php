<?php

/*
*
*	Spartan functions
*	------------------------------------------------
*
*
*/

/* Add template path
  ================================================== */
function show_template() {

	global $template;

	$path = $template;
	$path_part = explode('/', $path);
	$path_part = array_slice($path_part, 5);
	$new_path = implode(' ', $path_part);
	$new_path = str_replace('themes', 'skin', $new_path);
	$new_path = str_replace('plugins', 'modules', $new_path);
	$new_path = str_replace('.php', '', $new_path);

	return $new_path;

}



/* Add browser info to the HTML tag
  ================================================== */
function spartan_html_class($output) {

	$server_info = ' class="no-js spartan '. show_template().'"';
	$server_info .= ' data-useragent="' . $_SERVER['HTTP_USER_AGENT'] . '"';
	$server_info .= ' data-spartan="' . show_template(). '"';

  return $output . $server_info;

}
add_filter('language_attributes', 'spartan_html_class');



/* Add tools: viewport dimensions on the footer
================================================== */
function spartan_viewport_size() {

  $content = '<p class="absol"><span id="width"></span>:<span id="height"><span></p>'. "\n";

  $content .= '<script type="text/javascript">'. "\n";

	  $content .= '(function($){'. "\n";

	  	$content .= '$(window).on("load", function() {'. "\n";
	   		$content .= '   $("html").addClass("loaded sp")'. "\n";
	  	$content .= '});'. "\n";

			$content .= "\n";

		  $content .= '$(document).ready(function() {'. "\n";

			  $content .= ' showViewportSize();'. "\n";

				  $content .= ' $(window).resize(function(e) {'. "\n";
				  $content .= '   showViewportSize();'. "\n";
				  $content .= ' });'. "\n";

					$content .= "\n";

				  $content .= ' function showViewportSize() {'. "\n";
					  $content .= '   var the_width = $(window).width();'. "\n";
					  $content .= '   var the_height = $(window).height();'. "\n";
					  $content .= '   $("#width").text(the_width);'. "\n";
					  $content .= '   $("#height").text(the_height);'. "\n";
				  $content .= ' }'. "\n";

		  $content .= '});'. "\n";

	  $content .= '})(jQuery)'. "\n";

  $content .= '</script>'. "\n";

  $content .= '<style id="tool" type="text/css">';
  $content .= '.absol{position:fixed;display:inline-block;font-size:1rem;margin:0;font-weight:normal;text-align:center;';
  $content .= 'color:#fff;bottom:0;right:0;padding:.3rem;background-color:rgba(0,0,0,0.5);opacity:0;z-index:99999;}';
  $content .= '.loaded .absol{opacity:1;}';
  $content .= '</style>'. "\n";

  echo $content;

}
add_action('wp_footer', 'spartan_viewport_size', 40 );
