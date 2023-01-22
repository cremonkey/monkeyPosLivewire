


    <div class="row mt-5">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" wire:submit.prevent="save">
                        @csrf

                        <div class="row">

                            <div class="col-4">
                                <div class="form-group">

                                    <label for="inputName" class="control-label">Client Name </label>

                                    <input wire:model.lazy="invoice.Company_id" class="client_name form-control select2">
                                    @error('invoice.Company_id')
                                    <span class="text-red-500">{{$message}}</span><br>
                                    @enderror


                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label">Invoice Date</label>
                                    <input class="client_name form-control select2" wire:model.lazy="invoice.Data"
                                          required>
                                          @error('invoice.Data')
                                          <span class="text-red-500">{{$message}}</span><br>
                                          @enderror                                  </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="control-label">Invoice Date</label>
                                    <input class="client_name form-control select2" wire:model.lazy="invoice.invoice_no"
                                          required>
                                          @error('invoice.invoice_no')
                                          <span class="text-red-500">{{$message}}</span><br>
                                          @enderror                                  </div>
                            </div>

                        </div>

                        <div>


                            <form class="">
                                <div class=" add-input mt-3 mb-1">
                                <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Item </label>
                                    <input  class="form-control" wire:model="name.0">
                                @error('name.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                </div>
                                <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Price </label>
                                <input  class="form-control" wire:model="price.0" >
                                @error('price.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                </div>
                                <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Quintity </label>
                                <input  class="form-control" wire:model="qy.0" >
                                @error('qy.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Sub Total </label>
                                <input  class="form-control" wire:model="sub_total.0" >
                                @error('sub_total.0') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                </div>
                                <div class="col-md-1">
                                    <label class="control-label">Add Row </label>
                                <button class="btn text-white btn-info btn-sm" wire:click.prevent="add({{$i}})">Add</button>
                                </div>
                                </div>
                                </div>
                                @foreach($items as $key => $value)
                                <div class=" add-input mt-1 mb-1">
                                <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                <input  class="form-control"  wire:model="name.{{ $value }}">
                                @error('name.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                </div>
                                <div class="col-md-2">
                                <div class="form-group">
                                <input  class="form-control" wire:model="price.{{ $value }}" >
                                @error('price.'.$value) <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                    <input  class="form-control" wire:model="qy.{{ $value }}" >
                                    @error('qy.{{ $value }}') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="form-group">
                                    <input  class="form-control" wire:model="sub_total.{{ $value }}" >
                                    @error('sub_total.{{ $value }}') <span class="text-danger error">{{ $message }}</span>@enderror
                                    </div>
                                    </div>
                                <div class="col-md-1">

                                <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$key}})">remove</button>
                                </div>
                                </div>
                                </div>
                                @endforeach
                                <div class="row">
                                <div class="col-md-12">
                                </div>
                                </div>
                                </form>


{{--
                        @foreach ( $as $key=>$)
                        <div class="row mt-3">
                            <div class="col-1">
                                <label>#</label>
                               <a wire:click.prevent="remove({{$key}})" class="form-control btn btn-danger btn-sm">-</a>
                            </div>
                            <div class="col-5">
                                <label>/label>
                                <input wire:model="[name]" name="name[]" class="form-control" >
                                @error('name')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label>Price</label>
                                <input wire:model="{{$key}}.[price]" name="price[]" class="form-control" >
                                @error('price')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label>Quintity</label>
                                <input wire:model="{{$key}}.[qy]" name="qy[]" class="form-control" />
                                @error('qy')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>
                            <div class="col-2">
                                <label>Sub Total</label>
                                <input wire:model="{{$key}}.[sub_total]" name="sub_total[]" class="form-control">
                                @error('sub_total')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>
                        </div>
                        @endforeach
                    </div>
                        <div class="btn btn-primary mt-3 mb-3">
                            <a wire:click.prevent="newItem" >Add New /a>
                        </div>--}}

                        <div class="row mt-2">
                            <div class="col-8">

                            </div>
                            <div class="col-2">
                                <label>Total</label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" wire:model="invoice.total" value="0">
                                @error('invoice.total')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-8">

                            </div>
                            <div class="col-2">
                                <label>discount</label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" wire:model="invoice.discount" value="0">
                                @error('invoice.discount')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-8">

                            </div>
                            <div class="col-2">
                                <label>tax</label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" wire:model="invoice.tax">
                                @error('invoice.tax')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-8">

                            </div>
                            <div class="col-2">
                                <label>ship</label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" wire:model.lazy="invoice.ship">
                                @error('invoice.ship')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-8">

                            </div>
                            <div class="col-2">
                                <label>total_due</label>
                            </div>
                            <div class="col-2">
                                <input class="form-control" wire:model.lazy="invoice.total_due">
                                @error('invoice.total_due')
                                <span class="text-red-500">{{$message}}</span><br>
                                @enderror
                            </div>

                        </div>




                        <x-jet-button  class="ml-4 mt-3">
                            {{ __('Save') }}
                        </x-jet-button>


                    </form>
                </div>
            </div>
        </div>
    </div>


{{-- <---Old ---> --}}
    {{-- <div>
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('Company_id') }}" />
        <x-jet-input wire:model.lazy="invoice.Company_id" class="inline-block mt-2 mr-3 w-100" type="text"  required autofocus />
        @error('invoice.invoice_id')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror


        <x-jet-label for="text" class="mt-3 w-40 ms-10" value="{{ __('Data') }}" />
        <x-jet-input wire:model.lazy="Data" class="inline-block mt-2 mr-3 w-100" type="text"  autofocus />
        @error('Data')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror

    </div>
<br>
    <div>
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('invoice_no') }}" />
        <x-jet-input wire:model.lazy="invoice.invoice_no" class="inline-block mt-2 mr-3 w-100" type="number"   autofocus />
        @error('invoice.invoice_no')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('total') }}" />
        <x-jet-input wire:model.lazy="invoice.total" class="inline-block mt-2 mr-3 w-100" type="text"   autofocus />
        @error('invoice.total')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror
    </div>
    <div>
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('discount') }}" />
        <x-jet-input wire:model.lazy="invoice.discount" class="inline-block mt-2 mr-3 w-100" type="number"   autofocus />
        @error('invoice.discount')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('tax') }}" />
        <x-jet-input wire:model.lazy="invoice.tax" class="inline-block mt-2 mr-3 w-100" type="text"   autofocus />
        @error('invoice.tax')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror
    </div>
    <div>
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('ship') }}" />
        <x-jet-input wire:model.lazy="invoice.ship" class="inline-block mt-2 mr-3 w-100" type="number"   autofocus />
        @error('invoice.ship')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('total_due') }}" />
        <x-jet-input wire:model.lazy="invoice.total_due" class="inline-block mt-2 mr-3 w-100" type="text"   autofocus />
        @error('invoice.total_due')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror
    </div>
    <div>
        <x-jet-label for="text" class="mt-3 w-40" value="{{ __('statue') }}" />
        <x-jet-input wire:model.lazy="invoice.statue" class="inline-block mt-2 mr-3 w-100" type="number"   autofocus />
        @error('invoice.statue')
        <span class="text-red-500">{{$message}}</span><br>
        @enderror

    </div> --}}





    </div>
</form>
