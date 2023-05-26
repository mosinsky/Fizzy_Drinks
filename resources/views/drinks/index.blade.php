@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <section class="flex flex-col w-1/2">
        @foreach($drinks as $drink)
            <div class="hover:scale-105 transition duration-300">
                <div class="w-full shadow-xl bg-white shadow-xl mt-6 p-5 rounded-md">
                    <div class="flex justify-between">
                        <h2 class="font-semibold">{{ $drink->name }}</h2>
                        <div class="w-1/4">
                            <a class="font-semibold mr-12 text-indigo-600" href="{{ route('drinks.show', ['drink' => $drink->id]) }}">Zobacz</a>
                            @if(\Illuminate\Support\Facades\Auth::user()?->isAdmin())
                                <a class="font-semibold text-indigo-600" href="{{ route('drinks.edit', ['drink' => $drink->id]) }}">Edytuj</a>
                                <form method="POST"action="{{ route('drinks.destroy', ['drink' => $drink->id]) }}">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <input
                                            style="cursor: pointer;"
                                            class="font-bold text-red-600"
                                            type="submit"
                                            value="Usuń">
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
@endsection