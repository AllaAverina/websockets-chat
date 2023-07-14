@extends('layouts.app')

@section('content')
<div class="container col-md-8">
    <div class="card">
        <div id="chatbox" class="card-body overflow-auto" style="max-height: 75vh;">
            <chat-messages :messages="messages"></chat-messages>
        </div>
        <div class="card-footer">
            <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
        </div>
    </div>
</div>
@endsection