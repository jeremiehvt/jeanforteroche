<?php

function controlerautoloader($classsname)
{
	if (file_exists($file = __DIR__.'/'.$classsname.'.php')) 
	{
		require $file;
	}
}

spl_autoload_register('controlerautoloader');