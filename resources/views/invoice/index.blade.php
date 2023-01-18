<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoices') }}
        </h2>
    </x-slot>

    <div class="py-5 ">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5  shadow-xl sm:rounded-lg pt-12">
                <div class="mr-6 ml-4 mt-10  mb-20">
                    <a class="  btn btn-primary  " href="{{route('invoice.create')}}">{{ __('New Invoice') }}</a>
                </div>
                <table class="table table-striped ">
                    <thead class="border-b">
                        <tr>
                            <th>#</th>
                            <th scope="col">Company name</th>
                            <th scope="col">invoice_no</th>
                            <th scope="col">Total</th>
                            <th scope="col">statues</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Invoices as $Invoice )
                        <tr>
                            <td scope="col"   >{{$loop->iteration}}</td>
                            <td scope="col"   >{{$Invoice->Company->name}}</td>
                            <td scope="col"   >{{$Invoice->invoice_no}}</td>
                            <td scope="col"   >{{$Invoice->total_due}}</td>
                            <td scope="col"   > {{$Invoice->statue ? 'Paid' : 'Unpaid'}} </td>
                            <td scope="col"   >
                                <a href="{{route('invoice.edit', $Invoice->id)}}" class="btn btn-outline-success mr-2 btn-sm">Edit</a>
                               <form action="{{route('invoice.destroy', $Invoice->id)}}" method="POST" class="btn btn-danger  btn-sm">
                                    @csrf
                                    @method('DELETE')
                                   <button type="submit" onclick="alert('Are you sure want remove this Invoice?')" >Delete</button>
                               </form>

                            </td>
                        </tr>
                        @empty
                        <tr>

                            <td class=""> Have not Any Invoice</td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>
                {{$Invoices->links()}}

            </div>
        </div>
    </div>
</x-app-layout>
