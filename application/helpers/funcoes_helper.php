<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	if ( ! function_exists('data_para_sql')){
		function data_para_sql($data){
			$campos = explode("/", $data);
			return date("Y-m-d", strtotime($campos[2]."/".$campos[1]."/".$campos[0]));
		}
	}