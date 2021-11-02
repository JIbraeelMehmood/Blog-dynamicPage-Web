@extends('layouts.app')
<style>
</style>
@section('content')  
   <div class="card bg-light mt-3">
      <div class="card-header">
         <h3> Update User Status </h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Page Name</th>
                  <th>Page Favicon</th>
                  <th>Page URL</th>
                  <th>Status</th>
               </tr> 
            </thead>
            <tbody>
               @foreach($all_dynamic as $user)
                  <tr>
                     <td>{{ $user->page_name }}</td>
                     <td>{{ $user->page_favicon }}</td>
                     <td>{{ $user->page_url }}</td>
                     <td>
                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
                     </td>
                  </tr>
               @endforeach
            </tbody>
        </table>
      </div>
   </div>
@endsection
