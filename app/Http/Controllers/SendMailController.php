<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
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

    public function send(Campaign $campaign)
    {
        $subscriber = Subscriber::where('bunches_id', '=', $campaign['bunch_id'])->owned()->get();
        $template = Template::where('id', '=', $campaign['template_id'])->owned()->first();
        $mail = new SendMail($template);

        for ($i = 0; $i < $subscriber->count(); $i++) {
            $subscriber = $subscriber[$i];

        /*foreach ($subscriber as $subs) {*/

            Mail::to($subscriber->email, $subscriber->name)->send($mail);
        }
        return redirect()->route('campaign.index');
    }
}



