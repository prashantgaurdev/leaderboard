<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class GenerateQRCodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $url = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($this->user->address);
        $response = Http::get($url);

        if ($response->successful()) {
            // Define the filename and path
            $fileName = 'qrcodes/' . $this->user->id . '.png';

            // Save the QR code image to storage
            Storage::disk('public')->put($fileName, $response->body());

            // Save the file path to the user's record
            $this->user->qr_code_path = $fileName;
            $this->user->save();
        }
    }
}
