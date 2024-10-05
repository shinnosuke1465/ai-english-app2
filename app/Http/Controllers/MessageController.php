<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request, int $threadId)
    {
        // 音声データを保存
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            // ファイル名を日時に指定して保存
            $timestamp = now()->format('YmdHis');
            $path = $audio->storeAs('audio', "audio_{$timestamp}.wav", 'public'); // 音声データを保存
            // 必要に応じて、データベースに保存する処理を追加
        }


        // $message = Message::create([
        //     'thread_id' => $threadId,
        //     'message_en' => $request->message_en,
        //     'message_ja' => $request->message_ja,
        // ]);
    }
}
