<?php

namespace App\Http\Controllers\Polls;

use App\Http\Controllers\Controller;
use App\Models\Polls\Poll;
use App\Models\Polls\PollValue;
use App\Models\Polls\Vote;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;

class PollValueController extends Controller
{


    /**
     * @param Request $request
     * @param Poll $poll
     * @param Vote $vote
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Poll $poll, Vote $vote)
    {

        $pollValues = $poll->getValues();

        SEOMeta::setTitle('Голосование — '.$poll->getName() );
        $qwe = $poll->getName();

        $frd = $request->all();

        dd($poll ->getResult() ->groupBy('poll_value_id')
);


        /**dddddd*/
        $data = [];

        $qwe = $vote ->getPollValueId();
        dd($qwe);
//            ->select()
//            ->groupBy('poll_value_id')
//            //->count()
//         ;

dd($qwe);

        return view('Polls.result', compact('poll', 'frd','pollValues','data'));
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
