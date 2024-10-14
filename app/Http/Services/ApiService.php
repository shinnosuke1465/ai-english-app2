<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
    public function callWhiperApi($audioFilePath)
    {
        // $audioFilePashのデータは、'audio/audio_20241005170422.wav' のような文字列が格納されている
        // curlでリクエストする場合は、このようなコマンドになる。
        // curl https://api.openai.com/v1/audio/transcriptions \
        //   -H "Authorization: Bearer $OPENAI_API_KEY" \
        //   -H "Content-Type: multipart/form-data" \
        //   -F file="@/path/to/file/audio.mp3" \
        //   -F model="whisper-1"

        $response = Http::attach(
                'file',
                file_get_contents(
                    storage_path('app/public/' . $audioFilePath)
                ),
                'audio.wav'
            )
            ->withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                // 'Content-Type' => 'multipart/form-data',
            ])
            ->post('https://api.openai.com/v1/audio/transcriptions', [
                'model' => 'whisper-1',
                'language' => 'en',
            ]);

        // dd('$response->json()', $response->json());

        return $response->json();
    }

    /**
     * @param Collection<Message> $modelMessages
     */
    public function callGptApi($modelMessages)
    {
        // curl https://api.openai.com/v1/chat/completions \
        //     -H "Content-Type: application/json" \
        //     -H "Authorization: Bearer $OPENAI_API_KEY" \
        //     -d '{
        //     "model": "gpt-4o-mini",
        //     "messages": [
        //         {
        //         "role": "system",
        //         "content": "You are a helpful assistant."
        //         },
        //         {
        //         "role": "user",
        //         "content": "Hello!"
        //         }
        //     ]
        // }'

        $systemMessage = [
            'role' => 'system',
            'content' => 'You are a friendly person having a casual conversation in English with the user. Respond naturally and keep the conversation engaging. Do not provide lists, extensive advice, or instructional content unless the user specifically asks for it.',
        ];

        $messages = $modelMessages->map(function($message) {
            return [
                'role' => $message->role === 1 ? 'user' : 'assistant',
                'content' => $message->message_en,
            ];
        })->toArray();

        $messages = array_merge([$systemMessage], $messages);

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])
        ->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => $messages,
        ]);

        // dd('$response->json()' , $response->json());
        return $response->json();
    }

    /**
     * @param string $aiMessageText
     */
    public function callTtsApi($aiMessageText)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])
        ->post('https://api.openai.com/v1/audio/speech', [
            'model' => 'tts-1',
            'input' => $aiMessageText,
            // alloy, echo, fable, onyx, nova, shimmer
            'voice' => 'nova',
            'response_format' => 'wav',
        ]);

        // 音声ファイルの保存
        $fileName = 'speech_' . now()->format('Ymd_His') . '.wav';
        $filePath = storage_path('app/public/ai_audio/' . $fileName);
        file_put_contents($filePath, $response->body());

        // 修正: 返すパスを相対パスに変更
        return 'ai_audio/' . $fileName; // 保存した音声のファイルパスを相対パスで返す
    }

    /**
     * 英語の文章を日本語に翻訳するためのAPIリクエスト
     *
     * @param string $englishText
     * @return array
     */
    public function callTranslateApi($englishText)
    {
        $systemMessage = [
            'role' => 'system',
            'content' => 'Please translate the English text provided into Japanese.',
        ];

        $userMessage = [
            'role' => 'user',
            'content' => $englishText,
        ];

        $messages = [$systemMessage, $userMessage];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
        ])
        ->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => $messages,
        ]);

        return $response->json();
    }
}
