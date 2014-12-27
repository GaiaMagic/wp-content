<?php

/*
	Plugin Name: TwitThis
	Version: 1.1
	Plugin URI: http://twitthis.com/
	Author: Chuug
	Author URI: http://chuug.com/
	Description: Places the TwitThis badge on your site.
	
	Changelog:
	1.1 - Fixed reference on line 149 to PHP 5 only "self::". Now
		works with 4.
	
*/

class TwitThis {
	
	var $version = "1.1";
	
	var $saved = false;
	
	function TwitThis () {
		
		add_action('admin_menu', array(&$this, 'admin_menu'));
		
		if($_POST['twitthis']) {
			$this->update_vars($_POST['twitthis']);
			$this->saved = true;
		}
		
	}
	
	function update_vars ($vars) {
		foreach($vars as $key => $value) {
			if(get_option($key)) {
				update_option($key, $value);
			} else {
				add_option($key, $value);
			}
		}
	}
	
	function admin_menu () {
		add_options_page('TwitThis Options', 'TwitThis', 8, __FILE__, array(&$this, 'plugin_options'));
	}
	
	function check_updates () {
		
		$request  = "GET /chuug.twitthis.downloads/wordpress_version.xml HTTP/1.1\n";
		$request .= "Host: s3.amazonaws.com\n";
		$request .= "Referer: ".$_SERVER["SCRIPT_URI"]."\n";
		$request .= "Connection: close\n";
		$request .= "\n";
		
		$fp = fsockopen("s3.amazonaws.com", 80);
		fputs($fp, $request);
		while(!feof($fp)) {
	   		$result .= fgets($fp, 128);
		}
		fclose($fp);
		
		preg_match("/<current>(.*?)<\/current>/is", $result, $_current);
		preg_match("/<location>(.*?)<\/location>/is", $result, $_location);
		preg_match("/<filesize>(.*?)<\/filesize>/is", $result, $_filesize);
				
		if($_current[1] != $this->version) {
			
			print "<div id=\"message\" class=\"confirm fade\"><p><strong>A new version of TwitThis is available.</strong> You currently have version ".$this->version." and the new version is ".$_current[1].". The update is <a href=\"".$_location[1]."\">available here</a> (".$_filesize[1].", immediate download).</p></div>\n\n";
			
			return true;
			
		} else {
			return false;
		}
						
	}
	
	function plugin_options () {
		
		$update_trigger = $this->check_updates();
		
		if($this->saved && $update_trigger != true) {
			print "<div id=\"message\" class=\"updated fade\"><p><strong>Options saved.</strong></p></div>\n\n";
		}
		
		print('<div class="wrap">');
		print('<h2>TwitThis Options</h2>');
		print('<form style="padding-left:25px;" method="post">');
		
		print "<p>Button Style: <select name=\"twitthis[button_style]\">
			<option value=\"normal\"".((get_option("button_style") == "normal") ? " selected=\"selected\"" : NULL).">Normal</option>
			<option value=\"text\"".((get_option("button_style") == "text") ? " selected=\"selected\"" : NULL).">Text Link</option>
		</select><br /><br />
		Align: <select name=\"twitthis[align]\">
			<option value=\"left\"".((get_option("align") == "Left") ? " selected=\"selected\"" : NULL).">Left</option>
			<option value=\"center\"".((get_option("align") == "center") ? " selected=\"selected\"" : NULL).">Center</option>
			<option value=\"right\"".((get_option("align") == "right") ? " selected=\"selected\"" : NULL).">Right</option>
		</select><br /><br />
		Display on: <select name=\"twitthis[display_on]\">
			<option value=\"both\"".((get_option("display_on") == "both") ? " selected=\"selected\"" : NULL).">Both</option>
			<option value=\"permalink\"".((get_option("display_on") == "permalink") ? " selected=\"selected\"" : NULL).">Permalink Pages</option>
			<option value=\"listings\"".((get_option("display_on") == "listings") ? " selected=\"selected\"" : NULL).">Listing Pages</option>
		</select></p>";
		
		print "<p><input type=\"submit\" value=\"Save &raquo;\"></p>";
		
		print('</form></div>');
		
	}
	
	function set_filters () {
		add_filter('the_content', array(&$this, 'display'));
	}
	
	function write_script () {
		
		$style = ((get_option("button_style")) ? get_option("button_style") : "normal");
		$align = ((get_option("align")) ? get_option("align") : "left");
		
		$script .= "\n\n<!-- Begin TwitThis script (http://twitthis.com/) -->\n";
		$script .= "<div style=\"text-align:".$align.";\">\n";
		$script .= "<script type=\"text/javascript\" src=\"http://s3.chuug.com/chuug.twitthis.scripts/twitthis.js\"></script>\n";
		$script .= "<script type=\"text/javascript\">\n<!--\n";
		$script .= "document.write('";
		
		switch($style) {
			case "normal":
				$script .= "<a href=\"javascript:;\" onclick=\"TwitThis.pop();\"><img src=\"http://s3.chuug.com/chuug.twitthis.resources/twitthis_grey_72x22.gif\" alt=\"TwitThis\" style=\"border:none;\" /></a>";
			break;
			case "text":
				$script .= "<a href=\"javascript:;\" onclick=\"TwitThis.pop();\">TwitThis</a>";
			break;
		}
		
		$script .= "');\n";
		$script .= "//-->\n</script>\n";
		$script .= "</div>";
		$script .= "\n<!-- /End -->\n\n";
		
		return $script;

	}
	
	function display ($content) {
		
		$display = ((get_option("display_on")) ? get_option("display_on") : "both");
		$is_single = is_single();
		$print = $content.$this->write_script();
		
		switch ($display) {
			case "both":
				return $print;
			break;
			case "permalink":
				if($is_single) {
					return $print;
				}
			break;
			case "listings":
				if($is_single == false) {
					return $print;
				}
			break;
		}
		
	}
	
}

$Twit =& new TwitThis;
$Twit->set_filters();

?>