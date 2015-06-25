<?php

	/*
	*
	*	Spartan functions plugins & theme updates
	*	------------------------------------------------
	*
	*
	*/

	/* Enables updates plugins
	================================================== */
	add_filter( 'auto_update_plugin', '__return_true' );


	/* Enables updates themes
	================================================== */
	add_filter( 'auto_update_theme', '__return_true' );


	/* Enable major version updates:
	================================================== */
	add_filter( 'allow_major_auto_core_updates', '__return_true' );


	/* Disable update emails
	================================================== */
	add_filter( 'auto_core_update_send_email', '__return_false' );

