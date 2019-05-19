<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisteredListeners
{
    private $mailer;
    private $eloquent;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer, User $eloquent)
    {
        $this->mailer = $mailer;
        $this->eloquent = $eloquent;
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        /**ユーザー登録時にイベント発火。登録アドレスに登録完了メールを送信する。 */
        $user = $this->eloquent->findOrfail($event->user->getAuthIdentifier());
        $this->mailer->raw('会員登録完了しました。', function ($message) use ($user){
            $message->subject('会員登録メール')->to($user->email);
        });
    }
}
