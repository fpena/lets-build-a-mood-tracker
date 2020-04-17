@component('mail::message')
    Your new mood entry is live!
    Today you're feeling {!! $moodUpdate->moodDescription !!}
@endcomponent
