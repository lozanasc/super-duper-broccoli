@extends('landing.layout')
@section('root')
  <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
      <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-bold text-gray-900">ABOUT US 
          <br>
          <span class="font-light">
            Dumaguete City Assessor's Office
          </span>
        </h1>
        <p class="mb-8 leading-relaxed">
          An assessor is a local government official who determines the value of a property for local real estate taxation purposes.The figures assessors derive are used to calculate future property taxes. The assessor estimates the value of real property within a city or town’s boundaries. This value is converted into an assessment, which is one component in the computation of real property tax bills.
        </p>
        <div class="flex justify-center">
          <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Learn More</button>
        </div>
      </div>
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
        <img class="object-cover object-center rounded" alt="hero" src="https://dumaguete.com/wp-content/uploads/2014/08/Dumaguete-GSO-Building-.jpg">
      </div>
    </div>
  </section>
@endsection