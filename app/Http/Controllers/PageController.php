<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @return View
     */
    public function show(): View
    {
        $str = '<b>text</b>';
        return view('page.show', ['var1' => 4, 'var2' => 5, 'color' => 'red', 'var3' => 6, 'text' => 'new link', 'href' => 'https://google.com', 'str' => $str]);
    }
}
