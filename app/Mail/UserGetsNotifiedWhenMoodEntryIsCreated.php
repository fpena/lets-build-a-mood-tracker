<?php

namespace App\Mail;

use App\MoodUpdate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserGetsNotifiedWhenMoodEntryIsCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var MoodUpdate
     */
    protected $moodUpdate;

    /**
     * Create a new message instance.
     *
     * @param MoodUpdate $moodUpdate
     */
    public function __construct(MoodUpdate $moodUpdate)
    {
        $this->subject = 'Your new mood entry is live!';

        $this->moodUpdate = $moodUpdate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user_notified_new_mood_entry', [
            'moodUpdate' => $this->moodUpdate
        ]);
    }
}
