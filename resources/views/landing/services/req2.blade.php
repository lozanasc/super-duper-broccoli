@extends('landing.layout')
@section('root')
  <section class="text-gray-600 body-font">
    <p class="sm:text-lg text-base font-semibold text-center title-font mt-6 mb-2 text-gray-900">
      REQUEST FOR VICINITY MAP, VERIFICATION OF MAP, AND PROPERTY INDEX NUMBER (PIN)
    </p>
    <div class="container px-5 py-8 mx-auto flex flex-wrap">
      <div class="flex flex-wrap w-full">
        <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
          <div class="flex relative pb-12">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 1</h2>
              <p class="leading-relaxed">Filled-up Request Form .</p>
            </div>
          </div>
          
          <div class="flex relative">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">FINISH</h2>
              <p class="leading-relaxed">Provide Valid I.D. of property owner, requestor or authorized representative</p>
            </div>
          </div>
        </div>
        <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="https://thumbs.dreamstime.com/b/street-map-113326.jpg" alt="step">
      </div>
    </div>
  </section>
@endsection