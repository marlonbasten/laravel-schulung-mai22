<?php

namespace App\Imports;

use App\Models\Board;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $board = Board::where('name', $row['board'])->first();

        if (!$board) {
            return null;
        }

        return new Post([
            'title' => $row['titel'],
            'board_id' => $board->id,
            'content' => $row['inhalt']
        ]);
    }
}
