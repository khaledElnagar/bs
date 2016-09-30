<?php
/**
 * Created by PhpStorm.
 * User: KAT
 * Date: 25/09/2016
 * Time: 10:13 ص
 */

namespace App\Library;

use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;


class ActivationService
{
    protected $mailer;

    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {

        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);

        $link = route('user.activate', $token);
        $info['username']= $user->name;
        $info['id']= $user->id;
        $info['link']= $link;

        $this->mailer->send('auth.emails.activate',$info, function (Message $m) use ($user) {
            $m->to($user->email)->subject('Activation mail');
        });


    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}