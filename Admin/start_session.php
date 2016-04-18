<?php
session_start();
 	if(!isset($_SESSION['admin_id']))
 	 { 
    	if (isset($_COOKIE['admin_id']))
		{
			$_SESSION['admin_id'] = $_COOKIE['admin_id'];
		}
	}
?>