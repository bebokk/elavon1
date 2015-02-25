<?php

if (strstr($_SERVER['HTTP_REFERER'], 'slt')) {	
	$type=10;		
} elseif (strstr($_SERVER['HTTP_REFERER'], 'top100')) {
	$type=9;		
}
echo $type;

?> 