<div>
    @foreach ( $item as $index=>$items )

    <div class="row mt-3">
        <div class="col-1">
            <label>#</label>
           <a wire:click.prevent="remove({{$index}})" class="form-control btn btn-danger btn-sm">-</a>
        </div>
        <div class="col-5">
            <label>Item</label>
            <input wire:model="item.[name]" name="name[]" class="form-control" >
            @error('item.name')
            <span class="text-red-500">{{$message}}</span><br>
            @enderror
        </div>
        <div class="col-2">
            <label>Price</label>
            <input wire:model="item.{{$index}}.[price]" name="price[]" class="form-control" >
            @error('item.price')
            <span class="text-red-500">{{$message}}</span><br>
            @enderror
        </div>
        <div class="col-2">
            <label>Quintity</label>
            <input wire:model="item.{{$index}}.[qy]" name="qy[]" class="form-control" />
            @error('item.qy')
            <span class="text-red-500">{{$message}}</span><br>
            @enderror
        </div>
        <div class="col-2">
            <label>Sub Total</label>
            <input wire:model="item.{{$index}}.[sub_total]" name="sub_total[]" class="form-control">
            @error('item.sub_total')
            <span class="text-red-500">{{$message}}</span><br>
            @enderror
        </div>
    </div>
    @endforeach
</div>

<div class="btn btn-primary mt-3 mb-3">
    <a wire:click.prevent="newItem" >Add New Item</a>
</div>
