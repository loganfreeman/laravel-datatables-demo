<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Routing\Controller as BaseController;
use Kris\LaravelFormBuilder\FormBuilder;

use App\Http\Requests\MarkdownFormRequest;

use GrahamCampbell\Markdown\Facades\Markdown;


class MarkdownController extends BaseController
{
    public function create()
    {

      return view('markdown.show');
    }

    public function show(MarkdownFormRequest $request)
    {
      $message = $request->input('markdown_text');
      $markdown = Markdown::convertToHtml($message);
      return \Redirect::route('markdown')
         ->with(compact('message', 'markdown'));
    }
}
