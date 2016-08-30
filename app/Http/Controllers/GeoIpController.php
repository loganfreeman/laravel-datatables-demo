<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use GeoIP;

class GeoIpController extends Controller
{
  /**
   * Displays datatables front end view
   *
   * @return \Illuminate\View\View
   */
  public function getIndex()
  {
      $location = GeoIP::getLocation();
      return view('geoip.index')->with(compact('location'));
  }

}
