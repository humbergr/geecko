@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    <form method="POST" action="/new-profile" aria-label="New Profile">
                        @csrf
                        <div align="center">
                            <h5>Real Info</h5>
                        </div>
                        <div style="border: 1px solid #00008B;border-radius: 15px">
                        <br>
                            <div class="form-group row">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" required autofocus value="{{$profile->first_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>
                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control" name="middle_name" required autofocus value="{{$profile->middle_name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" required autofocus value="{{$profile->last_name}}">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="real_phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                                <div class="col-md-6">
                                    <input id="real_phone" type="text" class="form-control" name="real_phone" required autofocus value="{{$profile->phone}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ssn" class="col-md-4 col-form-label text-md-right">SSN</label>
                                <div class="col-md-6">
                                    <input id="ssn" type="text" class="form-control" name="ssn"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">DOB</label>
                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control" name="dob"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="credit_score" class="col-md-4 col-form-label text-md-right">Credit Score</label>
                                <div class="col-md-6">
                                    <input id="credit_score" type="text" class="form-control" name="credit_score"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="real_state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <select name="real_state" id="real_state" class="form-control" required autofocus>
                                        <option value="null">Select</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="real_address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <textarea id="real_address" type="text" class="form-control" name="real_address" required autofocus>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zip" class="col-md-4 col-form-label text-md-right">Zip</label>
                                <div class="col-md-6">
                                    <input id="zip" type="text" class="form-control" name="zip" required autofocus>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div align="center">
                            <h5>Fake Info</h5>
                        </div>
                        <div style="border: 1px solid #DC143C;border-radius: 15px">
                            <br>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control" name="password"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="textnow" class="col-md-4 col-form-label text-md-right">TextNow</label>
                                <div class="col-md-6">
                                    <input id="textnow" type="text" class="form-control" name="textnow"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="textnow_password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="textnow_password" type="text" class="form-control" name="textnow_password"  autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="textnow_date" class="col-md-4 col-form-label text-md-right">Date</label>
                                <div class="col-md-6">
                                    <input id="textnow_date" type="date" class="form-control" name="textnow_date"  autofocus>
                                </div>
                            </div>

                            <!-- <div class="form-group row">
                                <label for="fake_state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <select name="fake_state" id="fake_state" class="form-control" required autofocus>
                                        <option value="null">Select</option>
                                    @foreach ($states as $state)
                                        <option value="{{$state->code}}">{{$state->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fake_address" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <textarea id="fake_address" type="text" class="form-control" name="fake_address" required autofocus>
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fake_zip" class="col-md-4 col-form-label text-md-right">Zip</label>
                                <div class="col-md-6">
                                    <input id="fake_zip" type="text" class="form-control" name="fake_zip" required autofocus>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="intern_address_id" class="col-md-4 col-form-label text-md-right">Address</label>
                                <div class="col-md-6">
                                    <select name="intern_address_id" id="intern_address_id" class="form-control" required autofocus>
                                        <option value="null">Select</option>
                                    @foreach ($addresses as $address)
                                        <option value="{{$address->id}}">{{$address->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-9">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
