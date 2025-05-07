<?php
session_start();

include "php/name_config.php";
include "php/php_utils_revised.php";



// ERROR LOGGING
// Php errors are logged to a file named: php-errors.log
// This file will be automatically created the first time
// an error occurs.


// ADD YOUR GOOGLE API KEY
// Add your gemini API key to the ebot_config.ini.txt file.
// Change the file name from ebot_config.ini.txt to ebot_config.ini
// The ebot_config.ini file gets loaded in the php funtion that
// makes the API request.


// *** IMPORTANT SECURITY NOTE ***
// The ebot_config.ini file is currently located inside the website root folder.
// Please Secure your API Key by moving the ebot_config.ini file
// to a folder that's located outside your website root folder.
// Specify the path to the ebot_config.ini file here.

$path_to_config_ini = 'ebot_config.ini';


$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash-001:generateContent";



//-----------
// Settings
//-----------

$temperature = 0;

$max_tokens = 300;

// Set how fast the text is spoken
$speech_rate = 1;


/*
// English
$bot_language = "English";
$speech_lang_code = "en-UK";

/* 
It's important to choose a voice that can speak
the selected language i.e. that matches the lang code.
This is the JS code that you can run to get the available
voices. Change the language code to suit.

<script>
speechSynthesis.onvoiceschanged = () => {
  const voices = speechSynthesis.getVoices();
  voices
    .filter(v => v.lang === 'en-US')
    .forEach(v => console.log(`${v.name} (${v.lang})`));
};
</script>

$speech_voice_name = "Serena"; 
*/





// This function cleans and secures the user input
function test_input(&$data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = strip_tags($data);
		//$data = htmlentities($data);
		
		return $data;
	}
	


// This code is triggered when the user submits a message.
// The form data arrives here via Ajax.
if (isset($_REQUEST["my_message"]) && empty($_REQUEST["robotblock"])) {
	
	
	
	// Initialize variables
	$corrected_user_message = "none";
	$translated_chat_agent_response = "none";
	
	
	// Check the status of the radio buttons
	if (isset($_REQUEST["speak1"])) {
		$speak_request = 'selected';
	} else {
		$speak_request = 'not_selected';	
	}
	
	if (isset($_REQUEST["listening_lang_code"])) {
		$listening_lang_code = $_REQUEST["listening_lang_code"];
	} else {
		$listening_lang_code = $language1_code;
	}
	
	if (isset($_REQUEST["translate1"])) {
		$translation_request = 'selected';
	} else {
		$translation_request = 'not_selected';	
	}
	
	
	
	// Get the user's first language
	//$translation_language = $_REQUEST["user_language"];
	
	// "en-UK"
	if ($listening_lang_code == $language1_code) {
		
		$translation_language = $language2;
		$bot_language = $language2;
		$speech_lang_code = $language2_code;
		$speech_voice_name = $language2_voice;
		
	} else {
		
		$translation_language = $language1;
		$bot_language = $language1;
		$speech_lang_code = $language1_code;
		$speech_voice_name = $language1_voice;
		
	}
	
	
	// Get the user's message
	$user_message = $_REQUEST["my_message"];
	
	
	
	// Clean and secure the user's text input
	$user_message = test_input($user_message);
	
	
	
	
	//---------------------------
	// Run the translation agent
	//---------------------------
	// Translates the chat agent's response
	// into the user's first language.

	
	if ($translation_request == 'selected' && $user_message != 'api_error' && $user_message != 'Sorry. Something went wrong. Please try again.') {
			
		
// Translation Agent
$translation_agent_system_message = <<<EOT
You are a highly skilled {$translation_language} translator. You will be given text. You task is to translate the text into {$translation_language}. Return your translated text.
	Respond in a consistent format. Output a JSON string with the following schema:
{
"translation": "<Your translated version of the text.>"
}
	
EOT;
		
		// Remove any html
		$input_message = strip_tags($user_message);
		//$chat_agent_response = "สบายดีครับ แล้วคุณล่ะ?  เป็นไงบ้าง?";
		
		$translated_chat_agent_response_list = run_agent_without_memory($translation_agent_system_message, $input_message);
		
		
		// Process the response
		if ($translated_chat_agent_response_list[0] != "is_plain_text") {
			// It is json
			$translated_chat_agent_response = $translated_chat_agent_response_list[1]["translation"];
		} else {
			// It is plain text
			$translated_chat_agent_response = $translated_chat_agent_response_list[1];
		}
	
	} else {
		
		$translated_chat_agent_response = 'none';
		
	}
	
	
	
	
	
	//------------------------
	// Create the output text
	//------------------------
	// This is sent to the main 
	// web page via Ajax.
	
	
	
	
	$check_array = array(
		'user_message' => $user_message,
		'input_message' => $input_message,
		"translated_chat_agent_response" => $translated_chat_agent_response);
	
	
	$response = array('success' => true, 
		'check_array' => $check_array,
		'speech_lang_code' => $speech_lang_code,
		'speech_voice_name' => $speech_voice_name,
		'speech_rate' => $speech_rate,
		'check_text' => $user_message,
		'translation_language' => $translation_language, 
		'text_to_speak' => $translated_chat_agent_response, 
		'speak_status' => $speak_request,
		"translated_text" => $translated_chat_agent_response);
	
  	echo json_encode($response);
	
	
}

?>