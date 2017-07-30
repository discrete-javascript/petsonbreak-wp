<?php

echo'	<div class="wrap">
			<div><img style="float:left;" src="'.MOV_LOGO_URL.'"></div>
			<h1>
				'.__("OTP Verification",MoConstants::TEXT_DOMAIN).'
				<a class="add-new-h2" href="'.$profile_url.'">'.__("Account",MoConstants::TEXT_DOMAIN).'</a>
				<a class="add-new-h2" href="'.$help_url.'">'.__("Troubleshooting",MoConstants::TEXT_DOMAIN).'</a>
				<a class="add-new-h2" href="'.$license_url.'">'.__("License",MoConstants::TEXT_DOMAIN).'</a>
			</h1>	
		</div>';

echo'	<div id="tab">
			<h2 class="nav-tab-wrapper">';

echo '			<a class="nav-tab '.($active_tab == 'mosettings' ? 'nav-tab-active' : '').'" href="'.$settings		.'">
																						'.__("Forms",MoConstants::TEXT_DOMAIN).'</a>
				<a class="nav-tab '.($active_tab == 'otpsettings'? 'nav-tab-active' : '').'" href="'.$otpsettings	.'">
																						'.__("OTP Settings",MoConstants::TEXT_DOMAIN).'</a>
				<a class="nav-tab '.($active_tab == 'config'   	 ? 'nav-tab-active' : '').'" href="'.$config		.'">
																						'.__("SMS/Email Templates",MoConstants::TEXT_DOMAIN).'</a>
				<a class="nav-tab '.($active_tab == 'messages' 	 ? 'nav-tab-active' : '').'" href="'.$messages		.'">
																						'.__("Messages",MoConstants::TEXT_DOMAIN).'</a>
				<a class="nav-tab '.($active_tab == 'pricing' 	 ? 'nav-tab-active' : '').'" href="'.$license_url	.'">
																						'.__("Licensing Tab",MoConstants::TEXT_DOMAIN).'</a>

				<!--<a class="nav-tab '.($active_tab == 'custom'   	 ? 'nav-tab-active' : '').'" href="'.$custom.'">Send Custom Message</a>-->
			</h2>
		</div>';