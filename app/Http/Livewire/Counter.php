<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $posts;

    public function mount()
    {
        $this->loadPosts();
    }

    public function render()
    {
        return view('livewire.counter');
    }

    public function countUp($number = 1)
    {
        $this->count += $number;
    }

    public function rerenderPosts()
    {
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $this->posts = Post::all();
    }
}
