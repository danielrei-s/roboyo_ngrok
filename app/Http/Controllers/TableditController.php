<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TableditController extends Controller
{
    function index()
    {
    	$data = DB::table('contacts')->get();
    	return view('table_edit', compact('data'));
    }

    function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'contact_name'	=>	$request->contact_name,
    				'contact_title'		=>	$request->contact_title,
    				'contact_email'		=>	$request->contact_email,
            'contact_phone'		=>	$request->contact_phone
    			);
    			DB::table('contacts')
    				->where('id', $request->id)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('contacts')
    				->where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }
}

