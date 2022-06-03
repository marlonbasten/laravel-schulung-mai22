<?php

namespace App\Exports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $posts = Post::with('board')->get();

        return $posts->map(fn($post) => [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content,
            'board' => $post->board->name
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Titel',
            'Inhalt',
            'Board'
        ];
    }
}
