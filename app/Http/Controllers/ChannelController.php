<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function page_login(Request $request)
    {
      return view('channel.login_channel');
    }
}
