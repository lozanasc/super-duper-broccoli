@extends('landing.layout')
@section('root')
  <section class="text-gray-600 body-font">
  @if(session('status'))
    <div role="alert" class="p-4">
        <div class="bg-blue-500 text-white font-bold rounded-t px-4 py-2">
        </div>
        <div class="border border-t-0 border-blue-400 rounded-b bg-blue-100 px-4 py-3 text-blue-700">
            <p>{{session('status')}}</p>
        </div>
    </div>
  @endif
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="https://woman.ph/wp-content/uploads/2019/11/dumaguete-seal.jpg">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-bold text-gray-900">ASSESSOR'S OFFICE</h1>
      <p class="mb-8 leading-relaxed">
        Aiming to provide better quality assesment and
        appraisal of Real Property Units for Tax Relations
      </p>
      <div class="flex justify-center">
        <a href="{{ route('login') }}" class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Schedule Now</a>
        <a href="{{ route('about') }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg cursor-pointer">About</a>
      </div>
    </div>
  </div>
</section>
@endsection