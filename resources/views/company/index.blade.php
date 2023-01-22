<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-5 ">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5  shadow-xl sm:rounded-lg pt-12">
                <div class="mr-6 ml-4 mt-10  mb-20">
                    <a class="  btn btn-primary  " href="{{route('company.create')}}">{{ __('New Company') }}</a>
                </div>
                {{-- <table class="table table-striped ">
                    <thead class="border-b">
                        <tr>
                            <th>#</th>
                            <th scope="col">name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Tax</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($companies as $company )
                        <tr>
                            <td scope="col"   >{{$loop->iteration}}</td>
                            <td scope="col"   >{{$company->name}}</td>
                            <td scope="col"   >{{$company->address}}</td>
                            <td scope="col"   >{{$company->phone}}</td>
                            <td scope="col"   >{{$company->tax}}</td>
                            <td scope="col"   >
                                <a href="{{route('company.edit', $company->id)}}" class="btn btn-outline-success mr-2 btn-sm">Edit</a>
                               <form action="{{route('company.destroy', $company->id)}}" method="POST" class="btn btn-danger  btn-sm">
                                    @csrf
                                    @method('DELETE')
                                   <button type="submit" onclick="alert('Are you sure want remove this Company?')" >Delete</button>
                               </form>

                            </td>
                        </tr>
                        @empty


                            <h2 class=""> Have not Any Company</h2>

                        @endforelse

                    </tbody>

                </table> --}}
                {{-- {{$companies->links()}} --}}
                <livewire:user-table/>
            </div>
        </div>
    </div>
</x-app-layout>
