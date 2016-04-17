@extends('template.master')
@section('content')
    <div class="row">
        <div class="large-8 columns">
            <iframe src="http://player.twitch.tv/?channel=critgamer" width="800" height="500" allowfullscreen></iframe>
        </div>
        <div class="large-4 columns">
            <iframe frameborder="0" scrolling="no" id="chat_embed" src="http://www.twitch.tv/critgamer/chat" height="500" width="370">
            </iframe>
        </div>
    </div>
@stop