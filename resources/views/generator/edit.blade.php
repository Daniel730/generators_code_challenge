@extends('layouts.app')

@section('content')
    <div class="w-full px-4">
        <div class="sm:mx-auto p-4 sm:w-full sm:max-w-sm grid justify-items-center">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Edit Generator</h2>
        </div>

        <form method="POST" action="{{ route('update-generator') }}" class="mt-10 sm:mx-auto p-4 sm:w-full sm:max-w-sm grid justify-items-center">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" max="2023" value="{{ $year }}" name="year" id="year" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                    <label for="year" class="peer-focus:font-medium absolute text-sm text-white dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Year of entry: </label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <select id="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="month">
                        <option value='' disabled>Month of Entry</option>
                        <option value='01' {{ $month == 1 ? 'selected' : false }}>January</option>
                        <option value='02' {{ $month == 2 ? 'selected' : false }}>February</option>
                        <option value='03' {{ $month == 3 ? 'selected' : false }}>March</option>
                        <option value='04' {{ $month == 4 ? 'selected' : false }}>April</option>
                        <option value='05' {{ $month == 5 ? 'selected' : false }}>May</option>
                        <option value='06' {{ $month == 6 ? 'selected' : false }}>June</option>
                        <option value='07' {{ $month == 7 ? 'selected' : false }}>July</option>
                        <option value='08' {{ $month == 8 ? 'selected' : false }}>August</option>
                        <option value='09' {{ $month == 9 ? 'selected' : false }}>September</option>
                        <option value='10' {{ $month == 10 ? 'selected' : false }}>October</option>
                        <option value='11' {{ $month == 11 ? 'selected' : false }}>November</option>
                        <option value='12' {{ $month == 12 ? 'selected' : false }}>December</option>
                    </select>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="brand" id="brand" value="{{ $brand }}" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                    <label for="brand" class="peer-focus:font-medium absolute text-sm text-white dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Brand: </label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="model" id="model" value="{{ $model }}" class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                    <label for="model" class="peer-focus:font-medium absolute text-sm text-white dark:text-white duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Model: </label>
                </div>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>
@endsection
