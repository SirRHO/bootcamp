@extends('login.main')

@section('content')
    <div class="form-small">
        <form action="{{ route('login.RegistrasiSubmit') }}" method="POST">
            @csrf
            <h2 style="margin-bottom: 5%">Register</h2>
            <div class="input-wrapper">
                <label for="username" class="input-label" style="margin-right: 70%; color: #939393">Username</label>
                <input type="text" name="username" placeholder="Enter Username" required style="margin-top: 5px"/>
            </div>
            <div class="input-wrapper">
                <label for="username" class="input-label" style="margin-right: 70%; color: #939393">Password</label>
                <input type="password" name="password" placeholder="Enter Password" required style="margin-top: 5px"/>
            </div>
            <button type="submit">Register</button>
            <p style="color: #9f9e9e;">Back To <a href="{{ route('login.login')}}" style="color: rgb(49, 49, 255);">Login</a ></p>
        </form>
    </div>
@endsection
