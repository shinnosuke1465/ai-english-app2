<?php

use App\Models\Thread;

it('タイトルを指定してThreadを作成できる', function () {
    $thread = Thread::create(['title' => 'Sample Thread Title']);

    expect($thread)->toBeInstanceOf(Thread::class);
    expect($thread->title)->toBe('Sample Thread Title');
});

it('fillableプロパティに"title"が含まれている', function () {
    $thread = new Thread();

    expect($thread->getFillable())->toContain('title');
});

it('Threadを更新できる', function () {
    $thread = Thread::factory()->create(['title' => 'Old Title']);
    $thread->update(['title' => 'New Title']);

    expect($thread->title)->toBe('New Title');
});

it('Threadを削除できる', function () {
    $thread = Thread::factory()->create();
    $threadId = $thread->id;
    $thread->delete();

    expect(Thread::find($threadId))->toBeNull();
});
