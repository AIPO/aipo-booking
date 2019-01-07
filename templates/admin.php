<div class="wrap">
    <h1><?php echo __( "Aipo Booking Plugin", 'aipo-booking' ); ?></h1>
	<?php settings_errors() ?>
    <ul class="nav-tabs">
        <li class="active"><a href="#tab-1"><?php echo __( "Manage Settings", "aipo-booking" ) ?></a></li>
        <li><a href="#tab-2">Updates</a></li>
        <li><a href="#tab-3">About Plugin</a></li>
    </ul>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <form method="post" action="options.php">
				<?php
				settings_fields( 'aipo_options_group' );
				do_settings_sections( 'aipo_booking' );
				submit_button();
				?>
            </form>
        </div>
    </div>
    <div class="tab-content">
        <div id="tab-2" class="tab-pane">
            <h3>Updates</h3>
        </div>
    </div>
    <div class="tab-content">
        <div id="tab-3" class="tab-pane">
            <h3>About</h3>
        </div>
    </div>
</div>
