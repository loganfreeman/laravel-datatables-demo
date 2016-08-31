<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Yajra\Datatables\Datatables;

use App\User;

use SEOMeta;
use OpenGraph;
use Twitter;
use SEO;


class DatatablesController extends Controller
{
  /**
   * Displays datatables front end view
   *
   * @return \Illuminate\View\View
   */
  public function getIndex()
  {
      return view('datatables.index');
  }

  /**
   * Process datatables ajax request.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function anyData()
  {
      return Datatables::of(User::query())->make(true);
  }

  public function users()
  {
    SEOMeta::setTitle('Home');
    SEOMeta::setDescription('This is my page description');
    SEOMeta::setCanonical('https://codecasts.com.br/lesson');

    OpenGraph::setDescription('This is my page description');
    OpenGraph::setTitle('Home');
    OpenGraph::setUrl('http://current.url.com');
    OpenGraph::addProperty('type', 'articles');

    Twitter::setTitle('Homepage');
    Twitter::setSite('@LuizVinicius73');

    ## Or

    SEO::setTitle('Home');
    SEO::setDescription('This is my page description');
    SEO::opengraph()->setUrl('http://current.url.com');
    SEO::setCanonical('https://codecasts.com.br/lesson');
    SEO::opengraph()->addProperty('type', 'articles');
    SEO::twitter()->setSite('@LuizVinicius73');

    return view('datatables.users', ['users' => \App\User::simplePaginate(5)]);
  }
}
