# JaiTalk AI Translator

### Realtime Eng-Thai Voice and Text Translation
### การแปลเสียงและข้อความภาษาอังกฤษ-ไทยแบบเรียลไทม์
<br>

Live Demo:<br>
https://jaitalk.woza.work/

<br>
<img src="https://github.com/vbookshelf/JaiTalk-AI-Translator/blob/main/images/image1.png" width="500"></img>
<br>

<br>

## Quick Info
- Supports both voice and text inputs
- Mobile optimized web app
- Minimalist and visually calm UI design
- Frontend: Html, CSS, Javascript
- Backend: PHP
- Uses the Gemini 2.0 Flash API (Free version)
- Set up as a three-agent LLM system - chat, correction, translation
- Uses Javascript SpeechRecognition to convert the user's speech into text.
- Uses Javascript SpeechSynthesis to convert text to speech
- Has visual audio cues for deaf learners
- Can be deployed on any website hosting platform

<i>Powered by Google Gemini 2.0 Flash (Free version)<br>
15 RPM (requests per minute)<br>
1 million TPM (tokens per minute)<br>
1,500 RPD (requests per day)</i>
<br>
<br>

### Why do we need to toggle between languages?

Because the Javascript speech to text system does not automatically detect the spoken language. You could try replacing the speech to text system with with a paid system like OpenAi Whisper, which auto detects the spoken language. This could create a more natural conversation flow when two people are talking.
