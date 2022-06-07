<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ $declaration->owner }}'s Tax Declaration
        </h2>
    </x-slot>
@if(session('status'))
  <div role="alert" class="p-4">
      <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
      </div>
      <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
          <p>{{session('status')}}</p>
      </div>
  </div>
@endif
  <div class="bg-white min-h-full min-w-full px-8">
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Owner</h1>
      <p class="font-light mb-1 text-gray-800 block">{{ $declaration->owner }}</p>
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <h1 class="text-lg font-bold mb-1 text-gray-700 block">Date Declared</h1>
      <p class="font-light mb-1 text-gray-800 block">{{ $declaration->date_declared }}</p>
    </div>
    <div class="bg-gray-200 p-4 rounded-lg mb-2">
      <a
        href="{{ Storage::url($declaration->file) }}"
        type="submit"
        class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
      >
          View Tax Declaration
      </a>
      <a
        href="{{ route('delete_declaration', $declaration->id) }}"
        type="submit"
        class="border border-red-500 bg-red-500 text-white rounded-md ml-2 px-4 py-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
      >
          Delete Tax Declaration
      </a>
    </div>
  </div>
</x-app-layout>
