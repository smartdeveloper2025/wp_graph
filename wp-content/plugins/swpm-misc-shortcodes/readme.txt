View the full documentation here:
--------------------------------------
https://simple-membership-plugin.com/simple-membership-miscellaneous-shortcodes-addon/

Shortcode:
------------------------------
[swpm_update_level_to]

Options:

level="%number%" - required. Level ID (numeric) to upgrade membership to.
If omitted, warning message will be displayed.
If specified level doesn't exist, corresponding message will be displayed.

class="%string%" - optional. CSS class name(s) to apply to button.
If omitted, none will be applied.

button_text="%string%" - optional. Text to be displayed on the upgrade button.
If omitted, addon will try to generate the text itself like "Upgrade to %membership_level_alias%".

redirect_to="%URL%" - optional. URL to redirect to when button is clicked.
Must be full URL, e.g. http://example.com/some-page
If omitted, will return to the same page.

Example:

[swpm_update_level_to level="3" button_text="Upgrade now" redirect_to="http://example.com/congratulations" class="green-button"]
