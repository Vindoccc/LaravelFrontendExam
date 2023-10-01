<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laravel Frontend Exam') }}
        </h2>
    </x-slot>
@extends('company.layout')
@section('content')
<br>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/company/create') }}" class="btn btn-success btn-sm" title="Add New Company">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Logo</th>
                                        <th>Website</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $item)
                                    <tr>
                                        <td>{{ $item->company_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><img class="gallery-item" src="{{ asset('storage/images/'.$item->name) }}" width="60" height="40"></td>
                                        <td>{{ $item->website }}</td>
 
                                        <td>
                                            <a href="{{ url('/company/' . $item->id . '/edit') }}" title="Edit Company"><button class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/company' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete Company" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection