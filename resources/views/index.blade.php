@extends('layouts.index')

@section('content')
    <div class="card py-4 px-4">
        <div class="page-header flex-wrap">
            <h3 class="mb-0"> Hi, @if (Auth::check())
                    <span class="profile-name">{{ Auth::user()->name }}!</span>
                    <p class="lead">Welcome back to our website</p>

                @endif
            </h3>

        </div>

      


    </div>
@endsection
