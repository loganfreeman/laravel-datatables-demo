<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Routing\Controller as BaseController;
use Kris\LaravelFormBuilder\FormBuilder;

use App\Http\Requests\MarkdownFormRequest;

use GrahamCampbell\Markdown\Facades\Markdown;

use App;

use Illuminate\Http\Response;

use Validator;

class MarkdownController extends BaseController
{
    public function create()
    {

      return view('markdown.show');
    }

    public function show(MarkdownFormRequest $request)
    {
      $validator = Validator::make($request->all(), [
          // Other validation rules...
          'g-recaptcha-response' => 'required|captcha',
      ]);

      if ($validator->fails()) {
          $errors = $validator->messages();

          // return redirect('markdown')->withErrors($validator)->withInput();
      }

      $message = $request->input('markdown_text');
      $markdown = Markdown::convertToHtml($message);
      return \Redirect::route('markdown')
         ->with(compact('message', 'markdown'));
    }

    public function download(MarkdownFormRequest $request)
    {
      $message = $request->input('markdown_text');
      $markdown = Markdown::convertToHtml($message);

      $snappy = App::make('snappy.pdf');
      return new Response(
          $snappy->getOutputFromHtml($markdown),
          200,
          array(
              'Content-Type'          => 'application/pdf',
              'Content-Disposition'   => 'attachment; filename="file.pdf"'
          )
      );
    }
}
