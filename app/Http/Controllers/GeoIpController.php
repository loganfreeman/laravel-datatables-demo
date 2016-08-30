<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GeoIP;

use Hashids;

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

  public function getHash(Request $request, $id)
  {
      $hash = Hashids::encode(intval($id));
      return view('geoip.hash', ['id' => $id, 'hash' => $hash]);
  }

}
