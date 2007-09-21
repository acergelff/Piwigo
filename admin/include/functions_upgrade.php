<?php
// +-----------------------------------------------------------------------+
// | PhpWebGallery - a PHP based picture gallery                           |
// | Copyright (C) 2002-2003 Pierrick LE GALL - pierrick@phpwebgallery.net |
// | Copyright (C) 2003-2007 PhpWebGallery Team - http://phpwebgallery.net |
// +-----------------------------------------------------------------------+
// | branch        : BSF (Best So Far)
// | file          : $RCSfile$
// | last update   : $Date$
// | last modifier : $Author$
// | revision      : $Revision$
// +-----------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or modify  |
// | it under the terms of the GNU General Public License as published by  |
// | the Free Software Foundation                                          |
// |                                                                       |
// | This program is distributed in the hope that it will be useful, but   |
// | WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU      |
// | General Public License for more details.                              |
// |                                                                       |
// | You should have received a copy of the GNU General Public License     |
// | along with this program; if not, write to the Free Software           |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, |
// | USA.                                                                  |
// +-----------------------------------------------------------------------+

function check_upgrade()
{
  // Is PhpWebGallery already installed ?
  if (!defined('PHPWG_IN_UPGRADE') or !PHPWG_IN_UPGRADE)
  {
    $message = 'PhpWebGallery is not in upgrade mode. In include/mysql.inc.php,
insert line
<pre style="background-color:lightgray">
define(\'PHPWG_IN_UPGRADE\', true);
</pre>
if you want to upgrade';
    die($message);
  }
}

// Create empty local files to avoid log errors
function create_empty_local_files() 
{
   $files = 
      array (
         PHPWG_ROOT_PATH . 'template-common/local-layout.css',
         PHPWG_ROOT_PATH . 'template/yoga/local-layout.css'
         );
 
   foreach ($files as $path)
   {
      if (!file_exists ($path))
      {
         $file = @fopen($path, "w");
         @fwrite($file , '/* You can modify this file */');
         @fclose($file);
      }
   }
}

?>
