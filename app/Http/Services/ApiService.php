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

        dd('$response->json()', $response->json());

        return $response->json();
    }
}
