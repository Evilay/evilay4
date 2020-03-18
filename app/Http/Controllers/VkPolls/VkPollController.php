<?php

namespace App\Http\Controllers\VkPolls;

use App\Http\Controllers\Controller;
use App\Jobs\VkUsersAfterCreateJob;
use App\Models\API\VKApi;
use App\Models\VK\VKusers;
use ATehnix\VkClient\Client;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Collection;


class VkPollController extends Controller
{
    /**
     * @var VKApi
     */
    protected $client;

    /**
     * VkPollController constructor.
     */
    public function __construct()
    {
        $client = new VKApi();
        $this->client = $client;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \ATehnix\VkClient\Exceptions\VkException
     */
    public function index(Request $request)
    {
        SEOMeta::setTitle('mirage ');



//        $usersIds = $this->client->groupsGetMembers(13336295, 2000)['items'];
//        $fieldsString  = array();
//
//        $users = $this->client->usersGet($usersIds);
//        //$users = $this->client->usersBDateGet($usersIds);
//
//        foreach ($users as $user){
//            $vkUser =  VKusers::firstOrCreate([
//                'id_user'=>$user['id'],
//            ]);
//            if(isset($user['bdate'])){
//                $date = explode('.',$user['bdate']);
//                $vkUser->setBday($date[0]);
//                $vkUser->setBmonth($date[1]);
//                if(isset($date[2])){
//                    $vkUser->setByear($date[2]);
//                }else{
//                    $date = NULL;
//                }
//            }else{
//                $date = NULL;
//            }
//            $vkUser->setFirstName($user['first_name']??'NULL');
//            $vkUser->setLastName($user['last_name']??'NULL');
//            $vkUser->setCity($user['city']['title']??'NULL');
//            $vkUser->setSex($user['sex']??'NULL');
//            $vkUser->setPhotoUrl($user['photo_400_orig']??'NULL');
           // $vkUser->save();
   //     }


        return view('vkpolls.index', compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
