<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Code extends CI_Controller {
	
	/**
	* Index function to fetch view.
	*
	*/
	function index()
	{
		$this->load->view('code_view');
	}
	
	/**
	* Ajax call: function to Create log.
	*
	*@return completion message if the Log file is created/updated in folder
	*/
	function createLog()
	{
		// For creating Log folder
		if (!is_dir("logs")) {
			@mkdir("logs", 0777, true);
		}
		
		// To write log into file.
		if($_POST){
			$date  		= date('d_m_Y');
			$filename 	= "logs/Log_$date.log";
			$time		= date('g:i a');
			
			$file 	= fopen($filename, "a+");
			$txt 	= "Log is created at ". $time . " - " .$_POST['text_value'] . PHP_EOL;
			$fwrite = fwrite($file, $txt);
			
			if ($fwrite === false) {
				echo 'Error';
			}else{
				fclose($file);
				echo 'Log Created';
			}		
		}else{
			echo 'Error: Empty String';			
		}
	}
}
/* End of file Code.php */
/* Location: ./application/controllers/Code.php */