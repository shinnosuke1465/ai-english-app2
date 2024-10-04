<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // メッセージデータを作成
        Message::create([
            'thread_id' => 1,
            'message_en' => 'Hello, how are you?',
            'message_ja' => 'こんにちは、どうですか？',
            'sender' => 1, // 1:ユーザー 2:AI
            'audio_file_path' => 'audio/1.mp3',
        ]);
        Message::create([
            'thread_id' => 1,
            'message_en' => 'I am fine, thank you.',
            'message_ja' => '私は大丈夫です、ありがとう。',
            'sender' => 2, // 1:ユーザー 2:AI
            'audio_file_path' => 'audio/2.mp3',
        ]);
        Message::create([
            'thread_id' => 1,
            'message_en' => 'What is your name?',
            'message_ja' => 'あなたの名前は何ですか？',
            'sender' => 1, // 1:ユーザー 2:AI
            'audio_file_path' => 'audio/3.mp3',
        ]);
        Message::create([
            'thread_id' => 1,
            'message_en' => 'My name is John.',
            'message_ja' => '私の名前はジョンです。',
            'sender' => 2, // 1:ユーザー 2:AI
            'audio_file_path' => 'audio/4.mp3',
        ]);
        Message::create([
            'thread_id' => 1,
            'message_en' => 'How do you say "hello" in Japanese?',
            'message_ja' => '日本語で「こんにちは」と言うにはどうすればいいですか？',
            'sender' => 1, // 1:ユーザー 2:AI
            'audio_file_path' => 'audio/5.mp3',
        ]);
        Message::create([
            'thread_id' => 1,
            'message_en' => 'Hello, how do you say "hello" in Japanese?',
            'message_ja' => 'こんにちは、日本語で「こんにちは」と言うにはどうすればいいですか？',
            'sender' => 2, // 1:ユーザー 2:AI
            'audio_file_path' => 'audio/6.mp3',
        ]);
        Message::create([
            'thread_id' => 1,
            'message_en' => 'Hello, how do you say "hello" in Japanese?',
            'message_ja' => 'こんにちは、日本語で「こんにちは」と言うにはどうすればいいですか？',
            'sender' => 1, // 1:ユーザー 2:AI
            'audio_file_path' => 'audio/7.mp3',
        ]);
    }
}
