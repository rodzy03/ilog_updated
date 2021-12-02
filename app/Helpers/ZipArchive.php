<?php
namespace App\Helpers;

class ZipArchive 
{
	public function createZip($zip,$dir)
    {
		if (is_dir($dir))
	  	{
		  	if ($dh = opendir($dir))
		    {
		       while (($file = readdir($dh)) !== false)
		       {
		 
		         // If file
		         if (is_file($dir.$file)) 
		         {
		            if($file != '' && $file != '.' && $file != '..')
		            {
		 
		               $zip->addFile($dir.$file);
		            }
		         }
		         else
		         {
		            // If directory
		            if(is_dir($dir.$file) )
		            {

		              if($file != '' && $file != '.' && $file != '..')
		              {

		                // Add empty directory
		                $zip->addEmptyDir($dir.$file);

		                $folder = $dir.$file.'/';
		 
		                // Read data of the folder
		                createZip($zip,$folder);
		              }
		            }
		         }
		       }
		       closedir($dh);
		    }
	  	}
	}
}


?>