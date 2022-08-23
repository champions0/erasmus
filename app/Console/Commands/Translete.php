<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Translete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $translations = DB::table('ltm_translations')
            ->where('locale', 'en')
            ->whereNull('value')->get();
        $url = config('services.ayfie.translate_url');
        $key = config('services.ayfie.key');

        foreach (LaravelLocalization::getSupportedLocales() as $lng_code => $language) {
            dump($lng_code);
            foreach ($translations as $translation) {
                $response = Http::withHeaders([
                    'content-type' => 'application/json',
                    'x-api-key' => $key,
                    'accept' => 'application/json'
                ])->post($url, [
                    'language' => $lng_code,
                    'text' => $translation->key,
                ]);
                $responseData = $response->json();
                $r = DB::table('ltm_translations')->updateOrInsert(
                    [
                        'locale' => $lng_code,
                        'group' => $translation->group,
                        'key' => $translation->key
                    ],
                    [
                        'locale' => $lng_code,
                        'group' => $translation->group,
                        'key' => $translation->key,
                        'value' => $responseData['result'],
                    ]);
            }
        }
        dd('translated');
    }
}
