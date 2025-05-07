# JaiTalk AI Translator

### Realtime Eng-Thai Voice and Text Translation
### การแปลเสียงและข้อความภาษาอังกฤษ-ไทยแบบเรียลไทม์
<br>

JaiTalk listens and then translates between English and Thai. It also speaks the translation out loud. The settings in the code can be easily mofified to support other languages.

Live Demo:<br>
https://jaitalk.woza.work/

<br>
<img src="https://github.com/vbookshelf/JaiTalk-AI-Translator/blob/main/images/image1.png" width="500"></img>
<br>

## Uses
- Use JaiTalk as a translator to chat with a foreign friend.
- Use with E-Bot or T-Bot to learn English or Thai.
- Let JaiTalk listen in a meeting and quietly text translate for you. You may need an external mic.
- Doctors can use Jaitalk to talk with patients who don't speak their language, especially patients who are refugees and immigrants.
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

### Why do we need to toggle between languages?

Because the Javascript speech to text system does not automatically detect the spoken language. You could try replacing the speech to text system with with a paid system like OpenAi Whisper, which auto detects the spoken language. This could create a more natural conversation flow when two people are talking.
