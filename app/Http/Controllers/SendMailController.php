<?php

namespace App\Http\Controllers;

use App\Model\Bunch;
use App\Model\Campaign;
use App\Model\Subscriber;
use App\Model\Template;
use Bogardo\Mailgun\Facades\Mailgun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Bogardo\Mailgun\Mail\Message;


class SendMailController extends Controller
{

    /*public function send(Campaign $campaign)
    {
        $subscriber = Subscriber::where('bunches_id', '=', $campaign['bunch_id'])->owned()->pluck('email');
        $template = Template::where('id', '=', $campaign['template_id'])->owned()->get();

        Mail::send('mail.preview', [$subscriber, $template, $campaign], function ($message) {
            $message->bcc(
                foreach ($subscriber as $subs) {
                return $subs;
            };
            );

            $message->object($campaign['name']);
        });

        return redirect()->route('campaign.index');
    }*/

    public function send(Campaign $campaign)
    {
        $subscriber = Subscriber::where('bunches_id', '=', $campaign['bunch_id'])->owned();
        $template = Template::where('id', '=', $campaign['template_id'])->owned();

        foreach ($subscriber as $subs){

            Mailgun::send('mail.preview',$template, function($message, $campaign) use($subs){

                $message->to([
                    $subs->email => [
                        $subs->name,
                        $subs->surname,
                    ]
                ]);

                $message->subject($campaign['name']);
            });
        };

        return redirect()->route('campaign.index');
    }

    /*public function send(Campaign $campaign)
    {
        $subscriber = Subscriber::where('bunches_id', '=', $campaign['bunch_id'])->owned();
        $template = Template::where('id', '=', $campaign['template_id'])->owned();
        $data=[$campaign, $subscriber, $template];

        Mailgun::send('mail.preview',$data, function($message){
            $message->to([
                'pl110287mva@gmail.com' => [
                    'name' => 'User One',
                    'surname' => 37
                ],
                'user2@example.com' => [
                    'name' => 'User Two',
                    'surname' => 41
                ]
            ]);
            $message->subject('Email subject');
        });

        return redirect()->route('campaign.index');
    }*/
}



