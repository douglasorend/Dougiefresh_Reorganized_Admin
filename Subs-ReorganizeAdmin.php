<?php
/**********************************************************************************
* Subs-ReorganizeAdmin.php - Function to reorganize Admin menu
*********************************************************************************
* This program is distributed in the hope that it is and will be useful, but
* WITHOUT ANY WARRANTIES; without even any implied warranty of MERCHANsectionILITY
* or FITNESS FOR A PARTICULAR PURPOSE .
**********************************************************************************/

function RA_Reorganize(&$areas)
{
	global $txt;

	//==========================================================================
	// Insert some new areas into the Admin area:
	//==========================================================================
	$new = array();
	foreach ($areas as $needle => $section)
	{
		if ($needle == 'layout')
		{
			// Create "Package Manager" section, removing it from "Main" section:
			if (isset($areas['forum']['areas']['packages']))
				$new['packages'] = array(
					'title' => $txt['package'],
					'permission' => $areas['forum']['areas']['packages']['permission'],
					'areas' => array(
						'packages' => $areas['forum']['areas']['packages'],
					),
				);

			// Create "Mods" section using "Modifications Settings" area:
			$new['mods'] = array(
				'title' => $txt['admin_mods'],
				'permission' => array('admin_forum'),
				'areas' => array(
					'modsettings' => $areas['config']['areas']['modsettings'],
				),
			);

			// Create a "Security" section using "Security and Moderation" settings here:
			$new['security'] = array(
				'title' => $txt['admin_security'],
				'permission' => array('admin_forum'),
				'areas' => array(
					'securitysettings' => $areas['config']['areas']['securitysettings'],
				),
			);

			// Create a "Search" section using "Search" settings from "Forum" here:
			$new['search'] = array(
				'title' => $txt['manage_search'],
				'permission' => array('admin_forum'),
				'areas' => array(
					'managesearch' => $areas['layout']['areas']['managesearch'],
				),
			);
			if (isset($areas['layout']['areas']['sengines']))
				$new['search']['areas']['sengines'] = $areas['layout']['areas']['sengines'];
			elseif (isset($areas['portal']['areas']['sengines']))
				$new['search']['areas']['sengines'] = $areas['portal']['areas']['sengines'];		
		}
		elseif ($needle == 'maintenance')
		{
			// Create a "Permissions" section using "Permissions" settings from "Members" here:
			$new['permissions'] = array(
				'title' => $txt['edit_permissions'],
				'permission' => array('manage_permissions'),
				'areas' => array(
					'permissions' => $areas['members']['areas']['permissions'],
				),
			);
		}
		$new[$needle] = $section;
	}
	$areas = $new;
	unset($new);
	unset($areas['layout']['areas']['sengines']);
	unset($areas['portal']['areas']['sengines']);
	unset($areas['config']['areas']['securitysettings']);
	unset($areas['config']['areas']['modsettings']);
	unset($areas['forum']['areas']['packages']);
	unset($areas['layout']['areas']['managesearch']);
	unset($areas['members']['areas']['permissions']);

	//==========================================================================
	// Move "Reports" from "Maintenance" area to "Main" area:
	//==========================================================================
	$areas['forum']['areas']['reports'] = $areas['maintenance']['areas']['reports'];
	unset($areas['maintenance']['areas']['reports']);

	//==========================================================================
	// Move "Optimus Brave" section to the new "Search" area:
	//==========================================================================
	if (isset($areas['config']['areas']['optimus']))
		$areas['search']['areas']['optimus'] = $areas['config']['areas']['optimus'];
	unset($areas['config']['areas']['optimus']);

	//==========================================================================
	// Move the "AntiSpam" section to the "Security" area:
	//==========================================================================
	if (!empty($areas['config']['areas']['antispam']))
		$areas['security']['areas']['antispam'] = $areas['config']['areas']['antispam'];
	unset($areas['config']['areas']['antispam']);

	//==========================================================================
	// Create "Akismet" section under "Security" area:
	//==========================================================================
	if (isset($areas['mods']['areas']['modsettings']['subsections']['akismet']))
	{
		$areas['security']['areas']['akismet'] = array(
			'label' => $txt['akismet_title'],
			'file' => 'Subs-Akismet.php',
			'function' => 'RA_ModifyAkismetSettings',
			'subsections' => array(
			),
		);
		unset($areas['mods']['areas']['modsettings']['subsections']['akismet']);
	}

	//==========================================================================
	// Move the "httpBL", "Bad Behavior" and "Forum FireWall" section to "Security" area:
	//==========================================================================
	if (isset($areas['config']['areas']['forumfirewall']))
		$areas['security']['areas']['forumfirewall'] = $areas['config']['areas']['forumfirewall'];
	unset($areas['config']['areas']['forumfirewall']);

	if (isset($areas['config']['areas']['badbehavior']))
		$areas['security']['areas']['badbehavior'] = $areas['config']['areas']['badbehavior'];
	unset($areas['config']['areas']['badbehavior']);

	if (isset($areas['members']['areas']['httpBL']))
		$areas['security']['areas']['httpBL'] = $areas['members']['areas']['httpBL'];
	unset($areas['members']['areas']['httpBL']);

	//==========================================================================
	// Create "Avatar" section under "Members" area:
	//==========================================================================
	$areas['members']['areas']['avatars'] = array(
		'label' => $txt['attachment_manager_avatars'],
		'file' => 'ManageAttachments.php',
		'function' => 'RA_ManageAvatarSettings',
		'icon' => 'boards.gif',
		'permission' => array('manage_attachments'),
		'subsections' => array(
			'avatars' => array($txt['attachment_manager_avatar_settings']),
			'browse' => array($txt['attachment_manager_browse']),
			'settings' => array($txt['mods_cat_modifications_misc']),
		),
	);
	unset($areas['layout']['areas']['manageattachments']['subsections']['avatars']);
	$areas['layout']['areas']['manageattachments']['label'] = $txt['attachment_manager_attachments'];

	//==========================================================================
	// Move "eMail Inactive Users" section to "Members" area if it exists:
	//==========================================================================
	if (isset($areas['config']['areas']['eiu']))
		$areas['members']['areas']['eiu'] = $areas['config']['areas']['eiu'];
	unset($areas['config']['areas']['eiu']);

	//==========================================================================
	// Move "Mentions", "Like Posts" and "Related Topics" from "Configuration" sections to "Forum" area:
	//==========================================================================
	$new = array();
	foreach ($areas['layout']['areas'] as $id => $area)
	{
		$new[$id] = $area;
		if ($id == 'postsettings')
		{
			if (isset($areas['config']['areas']['relatedtopics']))
				$new['relatedtopics'] = $areas['config']['areas']['relatedtopics'];
			unset($areas['config']['areas']['relatedtopics']);

			if (isset($areas['config']['areas']['likeposts']))
				$new['likeposts'] = $areas['config']['areas']['likeposts'];
			unset($areas['config']['areas']['likeposts']);

			if (isset($areas['mods']['areas']['modsettings']['subsections']['mentions']))
			{
				$new['mentions'] = array(
					'label' => $txt['mentions'],
					'file' => 'Mentions.php',
					'function' => 'RA_ModifyMentionsSettings',
					'subsections' => array(
					),
				);
				unset($areas['mods']['areas']['modsettings']['subsections']['mentions']);
			}
		}
	}
	$areas['layout']['areas'] = $new;

	//==========================================================================
	// Remove most modifications from "Configuration" area and put under "Mods" area:
	//==========================================================================
	$new = array();
	if (isset($areas['config']['areas']['serversettings']))
		$security = $areas['config']['areas']['serversettings'];
	unset($areas['config']['areas']['serversettings']);
	$haystack = array('antispam', 'corefeatures', 'featuresettings', 'languages', 'serversettings',
		'modsettings', 'current_theme', 'theme');
	foreach ($areas['config']['areas'] as $id => $area)
	{
		if (!in_array($id, $haystack))
			$areas['mods']['areas'][$id] = $area;
		else
			$new[$id] = $area;
		if ($id == 'featuresettings')
		{
			if (isset($security))
				$new['serversettings'] = $security;
			$new['paidsubscribe'] = $areas['members']['areas']['paidsubscribe'];
			unset($areas['members']['areas']['paidsubscribe']);
			$new['managecalendar'] = $areas['layout']['areas']['managecalendar'];
			unset($areas['layout']['areas']['managecalendar']);
		}
	}
	$areas['config']['areas'] = $new;
	unset($new);

	//==========================================================================
	// Create "Block EMail Usernames" section under "Members" area:
	//==========================================================================
	if (isset($areas['mods']['areas']['modsettings']['subsections']['blockemail']))
		$areas['members']['areas']['blockemail'] = array(
			'label' => $txt['blockemail'],
			'file' => 'Subs-BlockEmailUsernames.php',
			'function' => 'RA_ModifyBlockEmailSettings',
			'subsections' => array(
			),
		);
	unset($areas['mods']['areas']['modsettings']['subsections']['blockemail']);
	
	//==========================================================================
	// Move "SimpleAds" areas under "Mods" area:
	//==========================================================================
	if (isset($areas['ads']))
		$areas['mods']['areas'] = array_merge($areas['mods']['areas'], $areas['ads']['areas']);
	unset($areas['ads']);

	//==========================================================================
	// Move "SMF Gallery" areas under "Mods" area:
	//==========================================================================
	if (isset($areas['gallery']))
		$areas['mods']['areas'] = array_merge($areas['mods']['areas'], $areas['gallery']['areas']);
	unset($areas['gallery']);

	//==========================================================================
	// Move "Facebook Integration" mod under "Mods" area:
	//==========================================================================
	if (isset($areas['sa_fb']))
	{
		$areas['mods']['areas'] = array_merge($areas['mods']['areas'], $areas['sa_fb']['areas']);
		$areas['mods']['areas']['facebook']['label'] = $areas['sa_fb']['title'];
	}
	unset($areas['sa_fb']);

	//==========================================================================
	// Seperate known avatar options in Mod Settings into their own tab:
	//==========================================================================
	$areas['mods']['areas']['modsettings']['function'] = 'RA_ModifyModSettings';
}

//==========================================================================
// Helper functions to make all the new sections work:
//==========================================================================
function RA_ModifyMentionsSettings()
{
	global $sourcedir;
	isAllowedTo('admin_forum');
	require_once($sourcedir . '/ManageSettings.php');
	loadGeneralSettingParameters(array(), 'general');
	ModifyMentionsSettings();
}

function RA_ModifyAkismetSettings()
{
	global $sourcedir;
	isAllowedTo('admin_forum');
	require_once($sourcedir . '/ManageSettings.php');
	loadGeneralSettingParameters(array(), 'general');
	ModifyAkismetSettings();
}

function RA_ModifyBlockEmailSettings()
{
	global $sourcedir;
	isAllowedTo('admin_forum');
	require_once($sourcedir . '/ManageSettings.php');
	loadGeneralSettingParameters(array(), 'general');
	ModifyBlockEmailSettings();
}

function RA_ManageAvatarSettings()
{
	global $txt, $context;
	isAllowedTo('manage_attachments');
	loadTemplate('ManageAttachments');

	// This uses admin tabs - as it should!
	$context[$context['admin_menu_name']]['tab_data'] = array(
		'title' => $txt['attachments_avatars'],
		'help' => 'manage_files',
		'description' => $txt['attachments_desc'],
	);
	if (isset($_REQUEST['sa']) && $_REQUEST['sa'] == 'browse')
	{
		$_REQUEST['avatars'] = true;
		BrowseFiles();
	}
	elseif (isset($_REQUEST['sa']) && $_REQUEST['sa'] == 'settings')
		RA_MiscAvatarSettings();
	else
		ManageAvatarSettings();
}

function RA_MiscAvatarSettings()
{
	global $sourcedir, $modSettings, $context, $scripturl;
	
	isAllowedTo('admin_forum');
	require_once($sourcedir . '/ManageSettings.php');
	loadGeneralSettingParameters(array(), 'general');
	$modSettings['integrate_general_mod_settings'] = 'RA_Avatar_Settings';
	ModifyGeneralModSettings();
	$context['post_url'] = $scripturl . '?action=admin;area=avatars;sa=avatars;save';
}

function RA_ModifyModSettings($return_config = false)
{
	global $modSettings;
	$modSettings['integrate_general_mod_settings'] = 'RA_General_Settings,' . $modSettings['integrate_general_mod_settings'];
	return ModifyModSettings($return_config);
}

//==========================================================================
// Hook functions
//==========================================================================
function RA_Avatar_Settings(&$config)
{	
	$haystack = array('enable_banned_membav', 'enable_default_avatar', 'default_male_avatar_url',
		'default_female_avatar_url', 'default_avatar_url', 'default_avatar_opacity');
	foreach ($config as $id => $line)
	{
		if (is_array($line) && !in_array($line[1], $haystack))
			unset($config[$id]);
		elseif (!is_array($line))
			unset($config[$id]);
	}
}

function RA_General_Settings(&$config)
{	
	$haystack = array('enable_banned_membav', 'enable_default_avatar', 'default_male_avatar_url',
		'default_female_avatar_url', 'default_avatar_url', 'default_avatar_opacity');
	foreach ($config as $id => $line)
	{
		if (is_array($line))
			if (in_array($line[1], $haystack))
				unset($config[$id]);
	}
}

?>