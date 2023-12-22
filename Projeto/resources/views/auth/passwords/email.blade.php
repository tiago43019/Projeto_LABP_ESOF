<!-- resources/views/auth/passwords/email.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="section">
        <!-- ... seu conteúdo existente ... -->
        <form method="POST" action="{{ url('/forgot-password') }}">
            @csrf
            <div class="form-group">
                <input type="email" class="form-style" name="email" placeholder="Email" required>
                <i class="input-icon fa-solid fa-envelope" style="color: #ffffff;"></i>
            </div>
            <button type="submit" class="btn mt-4">Recuperar</button>
        </form>
        <!-- ... seu conteúdo existente ... -->
    </div>
@endsection
