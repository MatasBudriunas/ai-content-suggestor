# ai-content-suggestor

A web-application using openAI library GPT-3 model. It comes with active prompt and passive prompt that generates suggestions asynchronically based on content provided.

## Requirements

Composer 2+ : https://getcomposer.org/ <br/>
PHP 7.4 or higher : https://www.php.net/downloads.php <br/>
Node 18.14.2 : https://nodejs.org/en/download/ <br/>
NPM 9.5.0 : https://www.npmjs.com/package/download <br/>
OpenAI account with tokens and an API key : https://platform.openai.com/overview

## Setup guide

1. Clone the repository locally
2. Navigate to the project directory via terminal, gitbash or any other command line application
3. Run ```composer install``` to download dependencies 
4. Run ```npm install``` to install required packages
5. Create .env file based on .env.example
6. Assign your OpenAI API key value to OPEN_AI_API_KEY parameter
7. Launch the webserver with ```php artisan serve```
8. Compile resources and launch VITE webserver with ```npm run dev```
9. Access the application using browser via address: 127.0.0.1:8000
