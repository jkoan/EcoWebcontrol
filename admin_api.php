<?php


/**  ╔══════════════════════════════════════════════════════════════════════════╗ 
  *  ║ This file is part of EcoWebcontrol.                                      ║
  *  ║ Copyright (c) 2013 the EcoWebcontrol Team (see authors).                 ║
  *  ╠══════════════════════════════════════════════════════════════════════════╣ 
  *  ║ For the full copyright and license information, please view the COPYING  ║
  *  ║ file that was distributed with this source code. You can also view the   ║
  *  ║ COPYING file online at http://files.froxlor.org/misc/COPYING.txt         ║
  *  ║                                                                          ║
  *  ║ @copyright  (c) the authors                                              ║
  *  ║ @author     Jkoan <jkoan@eco-webcontrol.com>                             ║
  *  ║ @license    GPLv2 http://files.froxlor.org/misc/COPYING.txt              ║
  *  ║ @package    API                                                          ║
  *  ╚══════════════════════════════════════════════════════════════════════════╝ 
  */
 define('AREA', 'admin');
 function generate_password($length){
                $pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $pool .= "abcdefghijklmnopqrstuvwxyz";
                $pool .= "1234567890";
 
                $password="";
                for ($i = 0; $i < $length; $i++) {
                        $password .= $pool{rand(0, strlen($pool)-1)};
                }
                return $password;
        }
 
 require ("./lib/init.php");
	 include './lib/userdata.inc.php';
 
	$db_link = mysql_connect ($sql['host'],$sql['user'],$sql['password']);
	mysql_select_db($sql['db']);
	
	$page = $_GET['page'];
	if ($page == 'key') {
		if ($action == 'add') {
			
				$sql = "INSERT INTO `".TABLE_API_KEY."` (`key_1`, `key_2`, `user`, `allow`) VALUES ('".generate_password('40')."', '".generate_password('40')."', '123', '1');";
				$result = mysql_query($sql);
				standard_success('passwordok');
				
			}
			
			elseif ($action == '') {
			eval("echo \"" . getTemplate("api/key") . "\";");
			}
			
		}
		
		elseif($page == 'doc'){
			eval("echo \"" . getTemplate("api/doc") . "\";");
		}
 
?>