@extends('layouts.app')

@section('title')
    {{ $drink->name }}
@endsection

@section('content')
    <div class="w-1/2 bg-white shadow-xl mt-6 mb-10 p-5 rounded-md">
        <div>
            <h1 class="text-3xl mb-4 font-bold">{{ $drink->name }}</h1>
            <p class="mb-5">{{ $drink->description }}</p>
            <div>
                <ul>
                    <li><strong>Ilość cukru na 100ml (g):</strong> {{ $drink->sugar_grams_per_100ml }}</li>
                </ul>
            </div>
            <hr>
            <div style="padding-bottom: 2rem;"></div>
        </div>
        <figure>
            <a href="{{ $drink->image_url }}">
                @if(filter_var($drink->image_url, FILTER_VALIDATE_URL))
                    <img src="{{ $drink->image_url }}" alt="Drink illustration." class="rounded-md"/>
                @endif
            </a>
        </figure>
    </div>
@endsection