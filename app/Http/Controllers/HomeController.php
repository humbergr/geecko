<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Account;
use App\Address;
use App\Email;
use App\Profile;
use App\State;
use App\Textnow;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    
    public function profilesIndex()
    {
        $profiles = Profile::join('states','profiles.real_state_id','states.id')->select('profiles.id as id','first_name','middle_name','last_name','credit_score','name')->get();
        return view('profiles')->with(compact('profiles'));
    }
    
    public function profileIndex($id)
    {
        $states = State::all();
        $addresses = Address::all();
        $profile = Profile::join('states','profiles.real_state_id','states.id')
            ->leftjoin('accounts','accounts.profile_id','profiles.id')
            // ->select('profiles.id as id','first_name','middle_name','last_name','credit_score')
            ->first();
        // dd($profile);
        return view('profile')->with(compact('profile','states','addresses'));
    }

    public function getNewProfile()
    {
        $states = State::all();
        $addresses = Address::all();
        return view('new-profile')->with(compact('states','addresses'));
    }
    
    public function postNewProfile(Request $request)
    {
        $first_name = $request->input('first_name');
        $middle_name = $request->input('middle_name');
        $last_name = $request->input('last_name');
        $real_phone = $request->input('real_phone');
        $ssn = $request->input('ssn');
        $dob = $request->input('dob');
        $credit_score = $request->input('credit_score');
        $real_state_id = $request->input('real_state');
        $real_address = $request->input('real_address');
        $zip = $request->input('zip');
        $intern_address_id = $request->input('intern_address_id');
        $emailfield = $request->input('email');
        $password = $request->input('password');
        $textnow_number = $request->input('textnow');
        $textnow_password = $request->input('textnow_password');
        $textnow_date = $request->input('textnow_date');
        // $fake_state = $request->input('fake_state');
        // $fake_address = $request->input('fake_address');
        // $fake_zip = $request->input('fake_zip');

        $profile = new Profile();
        $profile->first_name = $first_name;
        $profile->middle_name = $middle_name;
        $profile->last_name = $last_name;
        $profile->real_address = $real_address;
        $profile->zip = $zip;
        $profile->real_state_id = $real_state_id;
        $profile->intern_address_id = $intern_address_id;
        $profile->phone = $real_phone;
        $profile->ssn = $ssn;
        $profile->dob = $dob;
        $profile->credit_score = $credit_score;
        $profile->created_by = Auth::user()->id;
        $profile->created_at = now();
        $profile->updated_at = now();
        $profile->save();
        
        $email = new Email();
        $email->profile_id = $profile->id;
        $email->email = $emailfield;
        $email->password = $password;
        $email->created_at = now();
        $email->updated_at = now();
        $email->save();
        
        $textnow = new Textnow();
        $textnow->email_id = $email->id;
        $textnow->password = $textnow_password;
        $textnow->number = $textnow_number;
        $textnow->date = $textnow_date;
        $textnow->created_at = now();
        $textnow->updated_at = now();
        $textnow->save();

        $profile_update = Profile::findOrFail($profile->id);
        $profile_update->email_id = $email->id;
        $profile_update->textnow_id = $textnow->id;
        $profile_update->save();

        // $address = new Address();
        // $address->updated_at = now();

        return $this->profilesIndex();
    }
    
    public function accountIndex()
    {
        $accounts = Account::all();
        return view('accounts')->with(compact('accounts'));
    }
}
