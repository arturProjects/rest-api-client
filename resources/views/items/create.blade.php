@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add new item</b></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <div class="col-md-12"> 
                        <div class="row">
                            <div class="col-md-12"></div>
                        </div>
                       <form action="{{ url('store') }}" method="post">
                       {{ csrf_field() }}
                         <table class="table table-striped table-hover">
                           <tr><td class="col-md-2">Name</td><td class="col-md-10"><input name="name" class="form-control" type="text" size="100" /></td></tr>
                           <tr><td class="col-md-2">Amount</td><td class="col-md-10"><input name="amount" class="form-control" type="text" size="100" /></td></tr>
                                        
                          </table>
                          <div class="row">
                              <div class="col-md-3">
                                  <button type="submit" class="btn btn-primary btn-sm">Add item</button>
                              </div>
                          </div>
                       </form>
                    </div>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


