@extends('layouts.app')

@section('content')
    <h1>Email Verification Required</h1>
    <p>Before proceeding, please check your email for a verification link.</p>
    <p>If you did not receive the email, click below:</p>

    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
@endsection
