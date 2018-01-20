<?php

function modelbackendautoloader($classsname)
{
	if (file_exists($file = __DIR__.'/'.$classsname.'.php')) 
	{
		require $file;
	}
}

spl_autoload_register('modelbackendautoloader');