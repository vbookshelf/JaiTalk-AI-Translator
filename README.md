# JaiTalk AI Translator

### Realtime Eng-Thai Voice and Text Translation
### การแปลเสียงและข้อความภาษาอังกฤษ-ไทยแบบเรียลไทม์
<br>

JaiTalk is an AI powered web app translator that listens and then translates between English and Thai. It also speaks the translation out loud. The settings in the code can be easily mofified to support other languages.

Live Demo:<br>
https://jaitalk.woza.work/

<br>
<img src="https://github.com/vbookshelf/JaiTalk-AI-Translator/blob/main/images/image1.png" width="500"></img>
<br>

## Uses
- Use JaiTalk as a translator to chat with a foreign friend.
- Use with E-Bot or T-Bot to learn English or Thai.
- Let JaiTalk listen in a meeting and quietly text translate for you. You may need an external mic.
- Doctors can use Jaitalk to talk with patients who don't speak their language, especially patients who are refugees or immigrants.
- School teachers can use JaiTalk when talking to the parents of their foreign students. Usually immigrant children can speak the local language but their parents's can't.
- Other uses still to be imagined...

<br>

## Quick Info
- Easy to modify the code to support other languages
- Supports both voice and text inputs
- Web app
- Only usable on desktop
- Minimalist and visually calm UI design
- Frontend: Html, CSS, Javascript
- Backend: PHP
- Uses the Gemini 2.0 Flash API (Free version)
- Uses Javascript SpeechRecognition to convert the user's speech into text.
- Uses Javascript SpeechSynthesis to convert text to speech
- Can be deployed on any website hosting platform

<i>Powered by Google Gemini 2.0 Flash (Free version)<br>
15 RPM (requests per minute)<br>
1 million TPM (tokens per minute)<br>
1,500 RPD (requests per day)</i>
<br>
<br>

### How to deploy this web app

### How to modify the code to support other languages

The settings in the code can be easily modified to change the languages. For best results I suggest you use languages that are supported by the Google Gemini model. You can find a list of supported languages here:<br>
https://ai.google.dev/gemini-api/docs/models/gemini#available-languages

Now let's say the you wanted to change Thai to Spanish. These are the steps you should follow.

1. Get the available voices for Spanish. Run this Javascript code in the index.php file. The code will print out the available voices for Spanis. The output will appear in the console. Note that in the code we are using the language code for Spanish: es-ES. One of the voices printed out will be Jorge.

```
<script>
speechSynthesis.onvoiceschanged = () => {
  const voices = speechSynthesis.getVoices();
  voices
    .filter(v => v.lang === 'es-ES')
    .forEach(v => console.log(`${v.name} (${v.lang})`));
};
</script>
```

2. In the config.js file modify the code like this:
(Use IETF language tags e.g. es-ES)
```
// English
language1 = "English";
language1_code = "en-UK"; 
language1_voice_orig = "Serena";

// Spanish
language2 = "Spanish";
language2_code = "es-ES";
language2_voice_orig = "Jorge";

// This is the language that the speech recognition 
// system is detecting when the page loads.
lang_code = language1_code;
```

3. In the name_config.php file modify the code like this:
```
$bot_name = 'Translation'; 	// Give the bot a name
$user_name = 'Input';	// Set the user's name 

// English
$language1 = "English";
$language1_code = "en-UK";
$language1_voice = "Serena";

// Spanish
$language2 = "Spanish";
$language2_code = "es-ES";
$language2_voice = "Jorge";
```

That's all that you need to do. JaiTalk will now work in Spanish. You can also update the button descriptions and other text in the index.php file.



### Why do we need to toggle between languages?

Because the Javascript speech to text system does not automatically detect the spoken language. You could try replacing the speech to text system with with a paid system like OpenAi Whisper, which auto detects the spoken language. This could create a more natural conversation flow when two people are talking.

### Similar projects

### Revision history
