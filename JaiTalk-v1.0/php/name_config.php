<?php

$bot_name = 'Translation'; 	// Give the bot a name
$user_name = 'Input';	// Set the user's name 

// English
$language1 = "English";
$language1_code = "en-UK";
$language1_voice = "Serena";

// Thai
$language2 = "Thai";
$language2_code = "th-TH";
$language2_voice = "Kanya";



/* 
It's important to choose a voice that can speak
the selected language i.e. that matches the lang code.
This is the JS code that you can run in the index.php file to get the available
voices. Change the language code below ('en-US') to match the language you want.
Note: You can't run this JS code in this php file.

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

?>