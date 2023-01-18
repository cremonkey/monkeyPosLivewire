<form method="POST" wire:submit.prevent="save">
    @csrf

    <div>
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('Company Name') }}" />
        <x-jet-input wire:model.lazy="company.name" class="inline-block mt-2 mr-3 w-100" type="text"  required autofocus />
        @error('company.name')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror


        <x-jet-label for="text" class="mt-3 w-40 ms-10" value="{{ __('Company Address') }}" />
        <x-jet-input wire:model.lazy="company.address" class="inline-block mt-2 mr-3 w-100" type="text"  autofocus />
        @error('company.address')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror

    </div>
<br>
    <div>
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('Company phone') }}" />
        <x-jet-input wire:model.lazy="company.phone" class="inline-block mt-2 mr-3 w-100" type="number"   autofocus />
        @error('company.phone')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('Tax No.') }}" />
        <x-jet-input wire:model.lazy="company.tax" class="inline-block mt-2 mr-3 w-100" type="text"   autofocus />
        @error('company.tax')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror
    </div>




        <x-jet-button  class="ml-4 mt-3">
            {{ __('Create') }}
        </x-jet-button>
    </div>
</form>
