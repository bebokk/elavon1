<?php

function smarty_modifier_count_array($input)
{
	if (!is_array($input)) {
		return 0;
	}
	
	return count($input);
}

?>
