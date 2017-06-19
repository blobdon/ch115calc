<?php
#
#	Radio, Checkbox, and Select input state retainers
#
function retain_Radio($groupName, $optionValue){
	if (isset($_SESSION[$groupName])) {
		if ($_SESSION[$groupName] === $optionValue) {
			echo ' checked';
		}
	}
}
function retain_Checkbox($groupName, $optionValue){
	if (isset($_SESSION[$groupName])) {
		foreach ($_SESSION[$groupName] as $value) {
			if ($value === $optionValue) {
				echo ' checked';
			}
		}
	}
}
//	retain_select should work for single & multiple selecs
function retain_Select($groupName, $optionValue){
	if (isset($_SESSION[$groupName])) {
		if (is_array($_SESSION[$groupName])) { // for multiple select
			foreach ($_SESSION[$groupName] as $value) {
				if ($value === $optionValue) {
				echo ' selected';
				}
			}
		} else if ($_SESSION[$groupName] === $optionValue) { //for single select
			echo ' selected';
		}

	}
}

?>