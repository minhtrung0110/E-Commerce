<?php

namespace App\Jobs;

use App\Mail\OrderShipped;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Http\Services\OrderDetailService;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected  $customer;
    protected $order_id;
    protected $order_details;
    protected $orderDetailsService;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {

      $this->customer = $data['customer'];
      $this->order_id = $data['order_id'];

    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
    //dd( $this->order_id);
     Mail::to($this->customer['email'])->send(new OrderShipped($this->customer,$this->order_id));
    }
}
