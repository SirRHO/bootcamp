@extends('login.main')

@section('content')
    <div class="form-small">
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <h2 style="margin-bottom: 5%">Sign in</h3>
            <div class="input-wrapper">
                <label for="username" class="input-label" style="margin-right: 70%; color: #939393">Username</label>
                <input type="text" name="username" placeholder="Enter Username" required style="margin-top: 5px"/>
            </div>
            <div class="input-wrapper">
                <label for="username" class="input-label" style="margin-right: 70%; color: #939393">Password</label>
                <input type="password" name="password" placeholder="Enter Password" required style="margin-top: 5px"/>
            </div>
            <button type="submit">Login</button>
            <p style="color: #9f9e9e;">No Account? <a href="{{ route('login.registrasi')}}" style="color: rgb(49, 49, 255);">Register</a></p>
            @if (session('gagal'))
                <p class="text-danger">{{ session('gagal') }}</p>
            @endif
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
