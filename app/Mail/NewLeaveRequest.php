<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Leaves;

class NewLeaveRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($leaves)
    {
        $this->leaves = $leaves;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.leaves.leaverequestemail')
                    ->with([
                        'startdate' => $this->leaves->startdate,
                        'enddate' => $this->leaves->enddate,
                        'leaveType' => $this->leaves->leavetype,
                        'reason' =>  $this->leaves->reason,
                    ]);
                    // ->attach('/path/to/file');
    }
}
