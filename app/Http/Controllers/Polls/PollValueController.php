<?php

namespace App\Http\Controllers\Polls;

use App\Http\Controllers\Controller;
use App\Models\Polls\Poll;
use App\Models\Polls\PollValue;
use App\Models\Polls\Vote;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use DB;
use ATehnix\LaravelVkRequester\Models\VkRequest;
use ATehnix\VkClient\Client;


class PollValueController extends Controller
{


    /**
     * @param Request $request
     * @param Poll $poll
     * @param Vote $vote
     * @param PollValue $values
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \ATehnix\VkClient\Exceptions\VkException
     */
    public function index(Request $request, Poll $poll, Vote $vote, PollValue $values)
    {

        dd(1);
       // $api = new Client;

       // $response = $api->request('wall.get', ['owner_id' => 1]);
       // $response = $api->request('users.get', ['users_id' => 194977616], '7063452ae643c524ec15ef619e480cfb9fee01a2ac63e08bc099bb863724c492e6e76163aba2abe82972f');


  //      $api = new Client;

        // Token in the request is a higher priority than the default token.
     //  $response = new Request('users.get', ['user_ids' => 194977616], '7063452ae643c524ec15ef619e480cfb9fee01a2ac63e08bc099bb863724c492e6e76163aba2abe82972f');

//        $response = VkRequest::creating([
//            'method'     => 'users.get',
//            'parameters' => ['owner_id' => 194977616],
//            'token'      => '7063452ae643c524ec15ef619e480cfb9fee01a2ac63e08bc099bb863724c492e6e76163aba2abe82972f',
//        ]);

//        $response = VkRequest::create([
//            'method'     => 'users.get',
//            'parameters' => ['user_ids' => 194977616],
//            'access_token'      => '7063452ae643c524ec15ef619e480cfb9fee01a2ac63e08bc099bb863724c492e6e76163aba2abe82972f',
////            v=5.103
//            ]);

        $api = new Client('5.60');
        $request = $api->request('users.get', ['user_ids' => 194977616],env('VKONTAKTE_TOKEN'));
        dd($request);
      //  $request = new Request('wall.get', ['owner_id' => 194977616],"7063452ae643c524ec15ef619e480cfb9fee01a2ac63e08bc099bb863724c492e6e76163aba2abe82972f");
       $response = $api->send($request);

        dd($response);

        $pollValues = $poll->getValues();

        SEOMeta::setTitle('Голосование — '.$poll->getName() );
        $frd = $request->all();


        $values = PollValue::
        withCount('votes')
            ->where('poll_id',$poll->getKey())->get();



        $votes = Vote::
        withCount('users')
            ->where('user_id',auth()->user()->id)
            ->where('poll_id',$poll->getKey())
            ->count();

        return view('Polls.result', compact('poll', 'frd','pollValues','values','votes'));
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
