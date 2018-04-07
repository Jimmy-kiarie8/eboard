@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">Chat room</div>
                    
                <div class="card-body">
                    <ul class="list-group" v-chat-scroll>
                      <message v-for="value in chat.message" 
                        :key=value.index
                        color="warning">
                        @{{value}}
                      </message>
                    </ul>
                    <input type="text" v-model="message" class="form-control" placeholder="Type your message" @keyup.enter="send">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
