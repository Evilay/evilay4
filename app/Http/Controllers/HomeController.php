<?php

namespace App\Http\Controllers;

use App\Models\Users\User;
use ATehnix\VkClient\Client;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use ATehnix\LaravelVkRequester\Models\VkRequest;

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
    public function index(User $users)
    {
        SEOMeta::setTitle('Evilay CRM' );
        $usersCount = $users->count();

        return view('home',[
            'usersCount'=>$usersCount
        ]);

    }

    public function debug(){
        $api = new Client;

        //$request = $api->request('messages.send' , ['user_ids' => 194977616], env('VKONTAKTE_TOKEN'));
        $request = $api->request('groups.getMembers', ['group_id' => 13336295],env('VKONTAKTE_TOKEN'));
        //$request = $api->request('users.get', ['user_ids' => 156614668,'fields' =>'first_name,last_name,music,crop_photo,status,screen_name'],env('VKONTAKTE_TOKEN'));
        dd($request);


        //  $request = new Request('wall.get', ['owner_id' => 194977616],"7063452ae643c524ec15ef619e480cfb9fee01a2ac63e08bc099bb863724c492e6e76163aba2abe82972f");
       // $response = $api->send($request);

       // var ids = vk.Groups.GetMembers(new GroupsGetMembersParams() { GroupId = "1", Fields = UsersFields.All});

//        $response = VkRequest::creating([
//            'method'     => 'users.get',
//            'parameters' => ['owner_id' => 194977616],
//            'token'      => env('VKONTAKTE_TOKEN'),
//        ]);

       // dd($response);

    }


}
