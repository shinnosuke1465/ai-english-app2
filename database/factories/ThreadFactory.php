<?php

namespace Database\Factories;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    protected $model = Thread::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence, // タイトルを生成する
            // 他のフィールドがあればここに追加
        ];
    }
}
