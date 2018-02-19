=== P3 (Plugin Performance Profiler) ===
Contributors: Godaddy, StarfieldTech, kurtpayne, asink
Tags: debug, debugging, developer, development, performance, plugin, profiler, speed
Requires at least: 3.3
Tested up to: 4.6
Stable tag: 1.5.3.9
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

See which plugins are slowing down your site.  This plugin creates a performance report for your site.

== Description ==

> <strong>Important:</strong> P3 is not compatible with PHP 7.0.0 or later

This plugin creates a profile of your WordPress site's plugins' performance by measuring their impact on your site's load time.  Often times, WordPress sites load slowly because of poorly configured plugins or because there are so many of them. By using the P3 plugin, you can narrow down anything causing slowness on your site.

This plugin uses the canvas element for drawing charts and requires requires Firefox, Chrome, Opera, Safari, or IE9 or later.  This plugin will not work in IE8 or lower.

== Screenshots ==

1. First, profile your site.  The scanner generates some traffic on your site and monitors your site's performance on the server, then shows you the results. With this information, you can decide what action to take.
2. After profiling, you'll see a breakdown of relative runtime for each plugin.
3. Callouts at the top give you quick information like how much load time (in seconds) is dedicated to plugins and how many database queries your site is running per page.
4. The detailed timeline gives you timing information for every plugin, the theme, and the core for every page during the profile.  Find out exactly what's happening on slow loading pages.
5. You can toggle each series on and off to customize this timeline for your precise needs.
6. The query timeline gives you the number of database queries for every page during the profile.  Find out which pages generate the most database queries.
7. Keep a history of your performance scans, compare your current performance with your previous performance.
8. Full in-app help documentation
9. Send a summary of your performance profile via e-mail.  If you want to show your developer, site admin, hosting support, or a plugin developer what's going on with your site, this is good way to start the conversation.
10. Use the advanced settings to activate debug mode, control cache busting, or lock down profiling to a set of IP addresses.
11. View the debug log on the help page to help troubleshoot if P3 isn't recording properly.

== Installation ==
Automatic installation

1. Log into your WordPress admin
2. Click __Plugins__
3. Click __Add New__
4. Search for __P3__
5. Click __Install Now__ under "P3 (Plugin Performance Profiler)"
6. Activate the plugin

Manual installation:

1. Download the plugin
2. Extract the contents of the zip file
3. Upload the contents of the zip file to the wp-content/plugins/ folder of your WordPress installation
4. Then activate the Plugin from Plugins page.

== Upgrade Notice ==

= 1.5.3.9 =
Security update: Escape URLs returned by add_query_arg and remove_query_arg

= 1.5.3.8 =
Bugfix for HTML element with space in the id

= 1.5.3.7 =
Ensure HTML element names are distinct. Props mogulbuster

= 1.5.3.6 =
Internal version bump to ensure new CSS/JS isn't cached

= 1.5.3.5 =
CSS fix for jQuery UI Dialogs

= 1.5.3.4 =
Fixes another CSS issue with overlays and some browsers

= 1.5.3.3 =
Fixes a CSS issue with overlays and some browsers

= 1.5.3.2 =
Style updates for 4.1

= 1.5.3.1 =
Fixed logic bug in determining debug_backtrace arguements

= 1.5.3 =
Improved scanner performance (props askapache). Fixed a CSS conflict in overlays

= 1.5.2 =
Fixed a race condition in the error detection logic.  Now P3 will auto deactivate 60 seconds after an error if it is not cleared.

= 1.5.1 =
Fix a bug which broke debug mode and caused scanning to not work properly for some users.

= 1.5.0 =
Avoid a race condition on NFS systems.  Also fix PHP strict notices and stylesheet conflict with MP6/3.8 admin theme.

= 1.4.1 =
Fixed 2 php notices and removed a reference to a missing stylesheet.

= 1.4 =
Added 3.5 compatibility and refreshed UI colors.

= 1.3.1 =
Fixed an error when upgrading to 1.3.x from 1.1.x and skipping the 1.2.x upgrade.

= 1.3.0 =
Internationalized P3, major refactoring for lower memory usage, compatibility with WordPress 3.4.

= 1.2.0 =
Many compatibility fixes based on user feedback.  Upgrading is recommended.

= 1.1.3 =
Fixed a regression bug re-introduced in v 1.1.2.  Thanks to user adamf for finding this so quickly!

= 1.1.2 =
Fix a few bugs reported by users.  Upgrading is optional if this plugin is working well for you.

= 1.1.1 =
This release addresses a bug which which broke the UI on sites that used other plugins that contained an apostrophe in their name.  Upgrading is recommended if you were affected by this bug.

= 1.1.0 =
Several usability enhancements and bugfixes.

= 1.0.5 =
This version addresses a path disclosure issue.  Users are encouraged to upgrade.

== Frequently Asked Questions ==

= I installed P3, what now? =

Open the **Tools** menu, then open **P3 Plugin Profiler** then click **Scan Now**.

= What if I get a warning about usort()? =

Warning messages like this: `Warning: usort() [function.usort]: Array was modified by the user comparison function` are due to a known php bug.  See [php bug #50688](https://bugs.php.net/bug.php?id=50688) for more information.  This warning does not affect the functionality of your site and it is not visible to your users.

= In the e-mail report, why is my theme detected as "unknown?" =

Previous version of the plugin (before 1.1.0) did not have theme name detection support.  If you performed a scan with a previous version, then upgraded to 1.1.0+ to view the scan, the theme name will show as "unknown."

= Help!  I used P3 and now my site is down! =

First, get your site back up!  There are two ways to do this.  Try the emergency shutoff switch first.  If that doesn't work, delete the plugin files.

Emergency Shutoff Switch

1. Visit yoursite.com/wordpress/index.php?P3_SHUTOFF=1

Delete the Plugin Files

1. Delete wp-content/plugins/p3-profiler (the whole folder)
2. Delete wp-content/mu-plugins/p3-profiler.php (if it exists)

This can happen if P3 hits the memory limit on your server while it's running.  This happens most often on sites with many active plugins or a complex theme.  Consider switching to the Twenty Eleven theme or deactivating a few plugins before re-running P3.

= I get "Warning: file_put_contents( .... )" =

Please check your media settings.  This is in Settings -> Media -> Store uploads in this folder.  If this folder is not set correctly, P3 won't know where to read the files.

= How do I use P3 with multisite? =

P3 is available on the Tools menu for each site in the network.

= How can I change the list of pages scanned with auto-scan? =

You can write a plugin to hook the `p3_automatic_scan_urls` filter.  Here's some sample code:

<code>
function my_p3_auto_scan_pages() {
	return array(
		'http://example.com/',
		'http://example.com/some-cool-post',
		'http://example.com/wp-admin/edit.php',
	);
}
add_filter( 'p3_automatic_scan_urls', 'my_p3_auto_scan_pages' );
</code>

== Changelog ==

= 1.5.3.9 =
Security update: Escape URLs returned by add_query_arg and remove_query_arg

= 1.5.3.8 =
Bugfix for HTML element with space in the id

= 1.5.3.7 =
Ensure HTML element names are distinct. Props mogulbuster

= 1.5.3.6 =
Internal version bump to ensure new CSS/JS isn't cached

= 1.5.3.5 =
* CSS fix for jQuery UI Dialogs.  props cklosows

= 1.5.3.3 =
* Fixes a CSS issue with overlays and soem browsers

= 1.5.3.2 =
* Style Updates for 4.1

= 1.5.3.1 =
* Fixed logic bug in determining debug_backtrace arguements

= 1.5.3 =
* Improved scanner performance (props askapache)
* Fix a CSS conflict in overlays

= 1.5.2 =
 * Fix a race condition in the error detection logic
 * Add a notice about WordPress SEO and Jetpack

= 1.5.1 =
 * Fix a bug which broke debug mode and caused scanning to not work properly for some users.

= 1.5.0 =
 * Fixed a CSS compatibility issue between WordPress 3.8 / MP6 and jQuery UI (props mintfactory)

= 1.4.2 =
 * Fixed a php short tag. Props Dean Taylor
 * Fixed an E_STRICT notice. Props Dean Taylor
 * Fixed an issue with debug_backtrace that broke with php 5.2.4. Props tobbykanin

= 1.4.1 =
 * Fixed a logged php notice during uninstall
 * Fixed a php notice when starting scan. props rrhobbs
 * Removed a reference to a missing stylesheet. props zorl-zorl

= 1.4 =
 * Added a Turkish translation.  Thanks to Hakaner!  http://hakanertr.wordpress.com/
 * Updated some UI elements to allow for longer text strings for translations
 * Refreshed UI to be 3.5.x compatible and use standard admin coloring
 * Added a 'p3_automatic_scan_urls' filter

= 1.3.1 =
 * Fixed an error when upgrading to 1.3.x from 1.1.x and skipping the 1.2.x upgrade.

= 1.3.0 =
 * Internationalized P3
 * Compatibility with WordPress 3.4.0
 * Fixed a bug with European decimalization (0,00 vs. 0.00)
 * Major refactoring for better adherence to best practices, using fewer hooks, and consuming less memory
 * Raised memory limit override to 256M so large backtraces don't kill the site
 * Added a kill switch.  If P3 is causing problems, visit yoursite.com/wordpress/index.php?P3_SHUTOFF=1 to turn off P3
 * Added automatic error detection.  If a page fails to load during profiling, the next page load will turn off P3 automatically
 * Removed ajax error alerts; they weren't helpful
 * Path to the profiles folder is now determined on the init hook

= 1.2.0 =
 * Remove .profiling_enabled file, store profiling flag as a WordPress option
 * Remove code that writes to .htaccess file
 * Removed fix-flag-file page, no longer necessary
 * Added a link to the "no visits recorded" message pointing to the help page
 * Bugfix - with the manual profile "I'm done" button not showing the intended scan
 * On upgrade, remove .htaccess auto_prepend_file code
 * On upgrade, delete .profiling_enabled file
 * Include a data point for all visits for all plugins on the detailed chart (If no data point exists, mark it as 0 to keep the line connected)
 * Add Debug log feature to help diagnose why scans aren't recording properly on some sites
 * Opcode optimizer detection / documentation
 * Opcode optimizer compatibility
 * Update the list of random URLs to scan - use 4 random categories, 4 random tags, 4 random posts, a random search word from the blog description, and the home page
 * Don't include the site's RSS feed in the automated scan, it's causing problems in some browsers which expect the feed to be loaded as a document
 * Support HTTP_X_REAL_IP
 * Remove file locking, it's preventing the profiles from being saved on some hosts
 * Removing calls to filter_var, some 5.2.x builds use --disable-filter so this isn't reliable
 * Bugfix - Pausing a scan and clicking "View results" showed an error message
 * Bugfix - Avoid using "../" for compatibility with open_basedir
 * Upgrade routine was being done in the wrong order

= 1.1.3 =
 * Bugfix - regression bug re-introduced in v 1.1.2.  Thanks to user adamf for finding this so quickly!

= 1.1.2 =
 * Don't show screen options if there is no table
 * Show a "rate us / tweet us" box
 * Add an option to circumvent browser cache
 * Bugfix - Properly work with encrypted plugins (eval based obfuscation)
 * Bugfix - Work with suhosin/safe mode where ini_set / set_time_limit are disabled
 * Bugfix - Remove "Options -Indexes" because it's causing 500 error in some apache setups
 * Bugfix - Fix a warning with theme name detection if the theme is no longer installed

= 1.1.1 =
 * Bugfix - Plugin names with apostrophes broke the UI
 * Bugfix - Fix a deprecated warning with callt-ime pass by reference

= 1.1.0 =
 * Including plugin usage percentage / seconds in e-mail report
 * Including theme name in e-mail report.  Profiles created in older versions will show "unknown"
 * Grammar / wording changes
 * Remembering "disable opcode cache" in options table
 * New option for "use my IP."  If this is set, the current user's IP address will be used, if not, the stored IP pattern will be used
 * IP patterns will be stored as an option
 * Fixed:  IP patterns were incorrectly escaped
 * Now displaying profile name in the top right
 * If the profile didn't record any visits (e.g. wrong IP pattern) then an error will be displayed
 * Fixing pagination on the history page
 * Made the legends on the charts a bit wider for sites with a lot of plugins and plugins with long names
 * Added the ability to toggle series on/off in the "detailed timeline" chart
 * Removed network wide activation code - each site will be "activated" when the admin logs in
 * Removed "sync all profile folders whenever a blog is added/deleted" code.  Profile folders will be added when admins log in, removed when blogs are removed
 * When uninstalling, all profile folders and options will be removed
 * Using get_plugin_data() to get plugin names.  If the plugin doesn't exist anymore, or there's a problem getting the plugin name, the old formatting code is used

= 1.0.5 =
 * Security - Fixed a path disclosure vulnerability
 * Security - sanitized user input before it gets back to the browser
 * Thanks to Julio Potier from [Boiteaweb.fr](http://www.boiteaweb.fr/)

= 1.0.4 =
 * Bugfix - uninstalling the plugin when it hasn't been activated can result in an error message

= 1.0.3 =
 * Enforcing WordPress 3.3 requirement during activation
 * Documented warning about usort() and php bug

= 1.0.2 =
 * Fixed an error message when clicking "stop scan" too fast
 * Brought plugin version from php file in line with version from readme.txt and tag

= 1.0.1 =
 * readme.txt changes

= 1.0 =
 * Automatic site profiling
 * Manual site profiling
 * Profile history
 * Continue a profile session
 * Clear opcode caches (if possible) to improve plugin function detection
 * Limit profiling by IP address (regex pattern)
 * Limit profiling by site URL (for MS compatibility)
 * Rewrite http URLs to https to avoid SSL warnings when using wp-admin over SSL
 * Hide the admin toolbar on the front-end when profiling to prevent extra plugin scripts/styles from loading
 * In-app help / glossary page
 * Activate / deactivate hooks to try different loader methods so the profiler runs as early as possible
 * Uninstall hooks to clean up profiles
 * Hooks add/delete blog to clean up profiles
 * Send profile summary via e-mail
