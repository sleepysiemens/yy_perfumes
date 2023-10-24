<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateRequisites(Request $request)
    {
        $data = $request->all();
        $data = \Arr::except($data, ['_token', 'order_id']);

        \Auth::user()->update(['requisites' => $data]);

        return redirect()->back()->with('success', 'Реквизиты были обновлены.');
    }
}
