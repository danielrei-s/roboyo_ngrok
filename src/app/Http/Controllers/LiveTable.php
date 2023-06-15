<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class LiveTable extends Controller
{
    function index()
    {
      return view('livetable');  //used for testing
    }

    public function fetch_data($id)
    {
      if(request()->ajax())
      {
          $data = DB::table('contacts')
              ->where('client_id', $id)
              ->orderBy('id', 'desc')
              ->get();
          return response()->json($data);
      }
  }


    function add_data(Request $request)  // not used
    {
      if($request->ajax())
      {
          $data = array(
              'contact_name'    =>  $request->contact_name,
              'contact_title'     =>  $request->contact_title
          );
          $id = DB::table('contacts')->insert($data);
          if($id > 0)
          {
              echo '<div class="alert alert-success">Data Inserted</div>';
          }
      }
    }

    function update_data(Request $request)
    {
      if ($request->ajax()) {
          $data = [
              $request->column_name => $request->column_value
          ];
          DB::table('contacts')
              ->where('id', $request->id)
              ->update($data);
          $contact = DB::table('contacts')->where('id', $request->id)->first();
          echo '<div class="alert alert-success">Contact ' . $contact->contact_email . ' Updated</div>';
          echo '<script>
          setTimeout(function() {
              var div = document.querySelector(".alert.alert-success");
              if (div) {
                  div.remove();
              }
          }, 3000);
        </script>';
      }
    }


    function delete_data(Request $request)
    {
      if($request->ajax())
      {
          DB::table('contacts')
              ->where('id', $request->id)
              ->delete();
          echo '<div class="alert alert-success">Contact Deleted</div>';
          echo '<script>
          setTimeout(function() {
              var div = document.querySelector(".alert.alert-success");
              if (div) {
                  div.remove();
              }
          }, 5000);
        </script>';
      }
    }

    public function checkEmail(Request $request)
    {
      $contact_email = $request->input('contact_email');
      $id = $request->input('id');

      $validator = Validator::make(
        ['contact_email' => $contact_email],
        ['contact_email' => 'email:rfc']
    );

    if ($validator->fails()) {
        return 'invalid_email';
    }

      // Check if the email address already exists in the database, excluding the current contact being edited.
      $contact = Contact::where('contact_email', $contact_email)->where('id', '!=', $id)->first();

      if ($contact) {
        return 'exists';
      } else {
        return 'unique';
      }
    }


}
?>
