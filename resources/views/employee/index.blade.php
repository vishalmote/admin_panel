@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{$view_data['company']['name']}} Employees</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-2"><a class="btn btn-secondary" href="/home">Back</a></div>
                            <div class="col-md-2"><a class="btn btn-primary" href="employee/create">Add</a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($view_data['data'] as $single)
                                        <tr>
                                            <td>{{ $single->first_name }}</td>
                                            <td>{{ $single->last_name }}</td>
                                            <td>{{ $single->email }}</td>
                                            <td>{{ $single->phone }}</td>
                                            <td>
                                                <form action="/company/{{$single->company_id}}/employee/{{$single->id}}" method = "post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  class="btn btn-link" type="submit">Delete</button>
                                                </form>/ &nbsp;&nbsp;
                                                <a href="/company/{{$single->company_id}}/employee/{{$single->id}}/edit" style="">
                                                    Edit
                                                </a> 
                                            </td>
                                        </tr>
                                        @endforeach
                                        @if(!count($view_data['data']))
                                        <tr><td colspan="5" style="text-align: center">No data exist!</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $view_data['data']->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
