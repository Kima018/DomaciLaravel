@extends('layouts.layout')
@section('title','Home')
@section('homeSection')

    <section class="w-full py-20">
        <div class="relative px-2 overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$city->name}}
                        </th>
                        <td class="px-6 py-4 max-w-[500px]">
                            {{$city->description}}
                        </td>
                        <td class="px-6 py-4">
                            {{$city->amount}}
                        </td>
                        <td class="px-6 py-4">
                            {{$city->price}}
                        </td>
                        <td class="px-6 py-4">
                            coming soon...
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('city.single',['city' => $city->id ])}}"
                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>

                @endforeach








                </tbody>
            </table>
        </div>
    </section>

@endsection
