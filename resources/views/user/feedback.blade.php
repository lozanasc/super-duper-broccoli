<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Feedback
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
<section class="text-gray-600 body-font relative">
  <form action="{{ route("submit_feedback") }}" method="POST" class="container px-5 py-24 mx-auto">
    @csrf
    <div class="flex flex-col text-center w-full mb-4">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Feedback</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">To bring you the best service possible we need your feedback.</p>
    </div>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-wrap -m-2">
        <div class="p-2 w-full">
          <div class="relative">
            <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
            <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          </div>
        </div>
        <div class="p-2 w-full">
          <button type="submit" class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">Submit</button>
        </div>
      </div>
    </div>
  </form>
</section>
</x-app-layout>
