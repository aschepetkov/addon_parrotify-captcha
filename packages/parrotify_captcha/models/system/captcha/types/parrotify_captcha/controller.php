<?php     defined('C5_EXECUTE') or die(_("Access Denied."));

class ParrotifyCaptchaSystemCaptchaTypeController extends SystemCaptchaTypeController {
 
	public function __construct() {

    }
	/** 
	 * Display the captcha
	 */ 
	public function display() {

	   echo '<script src="http://api.parrotify.com/start.js"></script>';

	}

/** Displays the text input field that must be entered when used with a corresponding image. */
	public function showInput($args = false) { 

    }

	public function label() {

	}

	/** 
	 * Print the captcha image. You usually don't have to call this method directly.
	 * It gets called by captcha.php from the tools 
	 */	 	
	public function displayCaptchaPicture() {

	}

    /** Save the ParrotifyCaptcha options.
	* @param array $options
	*/
	public function saveOptions($options) {

	}

	/** 
	 * Checks the captcha code the user has entered.
	 * @param string $fieldName Optional name of the field that contains the captcha code
	 * @return boolean true if the code was correct, false if not
	 */
	public function check() {
	
		if ( count($_POST) ) {
			$data = array(
				'captcha[value]' => $_POST["captcha_name"],
				'captcha[key]'   => $_COOKIE["_cpathca"],
			);
			$c = curl_init("http://api.parrotify.com/validate");
			curl_setopt($c, CURLOPT_POST, true);
			curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($data));
			$result = curl_exec($c);
			curl_close($c);

			return ($result == 1) ? TRUE : FALSE;
		}

	}
}