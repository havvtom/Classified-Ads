@component('mail::message')
# {{$sender->name}} sent you a message about <a href="{{ route('listing.show', [$listing->area, $listing]) }}">{{$listing->title}}</a>

Hi {{$listing->user->name}}

{!! nl2br(e($message))!!}

Reply directly to <a>{{$sender->email}}</a> to get back to them.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
