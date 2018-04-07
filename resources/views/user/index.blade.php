@extends('layouts.app')

@section('title', 'Users')

@section('content')
<mynew :user="{{ Auth::user() }}"></mynew>
<v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-12">
                      <div class="card text-center">
                          <div class="card-header card-primary">
                                {{-- <div class="col-md-5"> --}}
                                    <h3 class="modal-title">{{ $result->total() }} {{ str_plural('User', $result->count()) }} </h3>
                                {{-- </div> --}}
                                {{-- <div class="col-md-7 page-action text-right"> --}}
                                    @can('add_users')
                                        <a href="{{ route('users.create') }}" class="btn pull-right"> <i class="glyphicon glyphicon-plus-sign"></i> Create</a>
                                    @endcan
                                {{-- </div> --}}
                          </div>
                          <div class="card-body">
                              <table class="table table-bordered table-striped table-hover" id="data-table">
                                  <thead>
                                  <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Role</th>
                                      <th>Created At</th>
                                      @can('edit_users', 'delete_users')
                                      <th class="text-center">Actions</th>
                                      @endcan
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($result as $item)
                                      <tr>
                                          <td>{{ $item->id }}</td>
                                          <td>{{ $item->name }}</td>
                                          <td>{{ $item->email }}</td>
                                          <td>{{ $item->roles->implode('name', ', ') }}</td>
                                          <td>{{ $item->created_at->toFormattedDateString() }}</td>

                                          @can('edit_users')
                                          <td class="text-center" style="width: 200px;">
                                              @include('shared._actions', [
                                                  'entity' => 'users',
                                                  'id' => $item->id
                                              ])
                                          </td>
                                          @endcan
                                      </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                              {{ $result->links() }}
                          </div>
                          <div class="card-footer">
                              
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </v-layout>
    </v-container>
</v-content>

{{-- <mynew :user="{{ Auth::user() }}"></mynew>

<v-content>
      <v-container fluid fill-height>
        <v-layout justify-center align-center>
                <div class="row justify-content-center">
                <div id="user" class="card col-md-12">
                    <h1 class="text-center">Users</h1><hr>
                    <div class="card-header">
                        
                    </div>

                    <div class="result-set card-body">
                        <table class="table table-bordered table-striped table-hover" id="data-table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created At</th>
                                @can('edit_users', 'delete_users')
                                <th class="text-center">Actions</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($result as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->roles->implode('name', ', ') }}</td>
                                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                                    @can('edit_users')
                                    <td class="text-center" style="width: 200px;">
                                        @include('shared._actions', [
                                            'entity' => 'users',
                                            'id' => $item->id
                                        ])
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="text-center">
                            {{ $result->links() }}
                        </div>
                    </div>
                </div>
                </div>
            </v-layout>
        </v-container>
</v-content>--}}
@endsection 