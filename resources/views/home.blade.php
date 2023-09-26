@extends('layouts.app')

@section('content')
    <div class="w-full px-4">
        <div class="sm:mx-auto p-4 sm:w-full sm:max-w-sm grid justify-items-center">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Your generators</h2>
        </div>

        <div class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4">
            @foreach ($generators as $generator)
                <div class="flex flex-col justify-between px-1 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="flex flex-col justify-between p-1 leading-normal w-full">
                        <div class="flex flex-row justify-between">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Internal Code: {{ $generator->internal_code }}</h5>
                            <a href="{{ route('edit-generator', ['id' => $generator->id]) }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">
                                Edit
                            </a>
                        </div>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400">Brand: {{ $generator->brand }}</p>
                        <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400">Model: {{ $generator->model }}</p>
                        <div class="flex flex-col">
                            <div class="flex flex-row">
                                <p class="text-center mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    State:
                                    @foreach ($states as $state)
                                        <a href="{{ route('update-state', ['id' => $generator->id, 'state_id' => $state->id]) }}" class="{{ ($generator->state_id == $state->id ? "bg-blue-100 text-blue-800" : false) }} state text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-green-300">
                                            {{ $state->state }}
                                        </a>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
