@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All items</b></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <div class="col-md-12"> 
                        <div class="row">
                            <div class="col-md-2 pull-right">
                                <a href="{{ url('create') }}"><button class="btn btn-primary btn-sm">Dodaj nowy item</button></a>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12"></div>
                        </div>
                       <table class="table table-striped table-hover">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                 </tr>
                                @foreach($response as $data)
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td> 
                                           <a href="{{ url('items/'.$item->id) }}"><button class="btn btn-success btn-sm">Show</button></a>
                                           <a href="{{ url('edit/'.$item->id) }}"><button class="btn btn-primary btn-sm">Edytuj</button></a> 
                                           <a href="{{ url('destroy/'.$item->id) }}"><button class="btn btn-danger btn-sm">Delete</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endforeach
                       </table>
                    </div>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


