<x-app-layout>
@if(session('status'))
    <div role="alert" class="p-4">
        <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
        </div>
        <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
            <p>{{session('status')}}</p>
        </div>
    </div>
@endif

<form action="{{ route("add_declaration") }}" method="POST" enctype="multipart/form-data" class="bg-white py-2 px-6">
    @csrf
    <label class="block mt-2 p-2 rounded-md">
        <span class="text-gray-800 font-bold">Owner</span>
        <input
            type="text"
            name="owner"
            id="owner"
            class="
            mt-1
            block
            w-full
            rounded-md
            border-gray-300
            shadow-sm
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            "
            placeholder=""
        />
    </label>
    <label class="block mt-4 p-2 rounded-md">
        <span class="text-gray-800 font-bold">Scanned Tax Declaration</span>
        <input
            type="file"
            name="file"
            id="file"
            class="
            mt-1
            block
            w-full
            rounded-md
            border-gray-300
            shadow-sm
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            "
            placeholder=""
        />
    </label>
    <span class="text-gray-800 font-bold">Date Declared</span>
    <input
        type="date"
        name="date_declared"
        id="date_declared"
        class="
        my-2
        block
        w-full
        rounded-md
        border-gray-300
        shadow-sm
        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
        "
        placeholder=""
    />
    <button
        type="submit"
        class="border border-blue-500 bg-blue-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
    >
        Add Declaration
    </button>
</form>
@if(count($declarations) > 0)
<div class="flex flex-col px-8">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <form action="{{ route("search_declaration") }}" method="POST" class="bg-white px-6">
    @csrf
    <label class="block mt-2 p-2 rounded-md">
        <span class="text-gray-800 font-bold">Search tax declarations by owner</span>
        <input
            type="text"
            name="query"
            id="query"
            class="
            mt-1
            block
            w-full
            rounded-md
            border-gray-300
            shadow-sm
            focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
            "
            placeholder=""
        />
    </label>
</form>
    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="border-b">
            <tr>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                ID
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Owner
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Date Declared
                </th>
                <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Actions
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($declarations as $item)
                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $item->id }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->owner }}
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->date_declared }}
                </td>
                
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('view_declaration', $item->id) }}" class="bg-green-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                    <a href="{{ route('delete_declaration', $item->id) }}" class="bg-red-500 p-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>
@else
<section class="text-gray-600 body-font mt-4">
    <div class="container mx-auto flex px-5 py-4 items-center justify-center flex-col">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">No declarations recorded!</h1>
        </div>
    </div>
</section>
@endif
</x-app-layout>