<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Routing\Controller as BaseController;
use Kris\LaravelFormBuilder\FormBuilder;

use App\Forms\SongForm;

class MarkdownController extends BaseController
{
    public function create(FormBuilder $formBuilder)
    {
      $form = $formBuilder->create(SongForm::class, [
          'method' => 'POST',
          'url' => route('markdown.show')
      ]);
      return view('markdown.create', compact('form'));
    }

    public function show()
    {
      return view('markdown.show');
    }
}
