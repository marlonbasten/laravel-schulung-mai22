<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin:3']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function settings()
    {
//        $token = auth()->user()->createToken('Lese Token', [
//            'post.index',
//            'post.show'
//        ]);
//        dd($token->plainTextToken);
        return view('settings');
    }

    public function deleteAccount()
    {
        auth()->user()->delete();
        auth()->logout();
        return redirect()->route('login');
    }

    public function setLanguage($locale)
    {
        session([
            'locale' => $locale
        ]);

        return redirect()->back();
    }
}
