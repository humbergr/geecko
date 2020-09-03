@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            Profiles
                        </div>
                        <div class="col-2">
                            <a href="/new-profile" type="button" class="btn btn-default">New</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-body"> -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Score</th>
                                <th scope="col">State</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                            <tr>
                                <td>
                                    {{$profile->first_name.' '.$profile->middle_name.' '.$profile->last_name}}
                                </td>
                                <td>
                                    {{$profile->credit_score}}
                                </td>
                                <td>
                                    {{$profile->name}}
                                </td>
                                <td>
                                    <a href="/profile/{{$profile->id}}">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
