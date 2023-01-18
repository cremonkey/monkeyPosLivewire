<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-validation-errors class="mb-4" />
                <a class="  btn btn-primary  " href="{{route('company.index')}}">{{ __('Show Company') }}</a>

                @livewire('company.form',['company'=>$companies])


            </div>
        </div>
    </div>
</x-app-layout>
