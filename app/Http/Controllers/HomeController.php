<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $role_id = Auth::user()->role_id;
        switch ($role_id) {
            case Roles::ADMIN :
                return redirect('/admin');
                break;
            case Roles::USER :
                return redirect('/user');
                break;
            case Roles::MP :
                return redirect('/mp');
                break;
            case Roles::ADVERTISEMENT :
                return redirect('/ads');
                break;
            case Roles::DMP :
                return redirect('/dmp');
                break;
            case Roles::SSP :
                return redirect('/ssp');
                break;
            case Roles::DSP :
                return redirect('/dsp');
                break;
            case Roles::PUBLISHER :
                return redirect('/publisher');
                break;
            default:break;
        }


        $data = $this->adRequest();
        $response_data = $this->postAdRequest($data);
        echo $response_data;
    }

    public function adRequest()
    {
        $user = Auth::user();
        $faker = Faker::create();
        $content_cat = ['IAB1-3', 'IAB2-4'];
        $ad_request = AdRequest::create([
            'client_ip' => $faker->ipv4,
            'timezone' => $faker->timezone,
            'latitude' => $faker->latitude,
            'longitude' => $faker->longitude,
            'pgid' => 1,
            'content_cat' => $faker->randomElement($content_cat),
            'url' => URL::current(),
            'tid' => 1,
            'zipcode' => $faker->postcode,
            'aus' => '728x90',
            'xemail' => $user->email,
            'product_id' => 1,
            'c_key' => 'c.gender=m&c.age=40&c.topic=sports',
            'token' => '123',
            'bidfloor' => $faker->randomFloat(null, 0.5, 20),
        ]);
        return $this->transform($ad_request);
    }

    public function transform($data)
    {
        $result = [];
        $result['_token'] = csrf_token();
        $result['device']['ip'] = $data->client_ip;
        $result['device']['timezone'] = $data->timezone;
        $result['device']['latitude'] = $data->latitude;
        $result['device']['longitude'] = $data->longitude;
        $result['imp']['banner'] = $data->aus;
        $result['imp']['bidfloor'] = $data->bidfloor;
        $result['site']['pgid'] = $data->pgid;
        $result['site']['url'] = $data->url;
        $result['site']['cat'] = $data->content_cat;
        $result['user']['xemail'] = $data->xemail;
        $result['user']['zipcode'] = $data->zipcode;
        return $result;
    }

    public function postAdRequest($data)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://apikkk.herokuapp.com/api/check', [
            'form_params' => [
                'data' => $data,
            ]
        ]);
        return $response->getBody();
    }
}
