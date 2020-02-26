<?php

namespace App\Http\Controllers\Polls;

use App\Http\Controllers\Controller;
use App\Models\Polls\Poll;
use App\Models\Polls\PollValue;
use App\Models\Polls\Vote;
use Illuminate\Http\Request;
use App\Models\Users\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Auth;

class PollVoteController extends Controller
{
    /**
     * PollVoteController constructor.
     * @param User $users
     * @param Poll $polls
     * @param PollValue $pollValue
     */
    public function __construct(User $users,
                                Poll $polls,
                                PollValue $pollValue)
    {
        $this->users = $users;
        $this->polls = $polls;
        $this->poll_value = $pollValue;
    }

    /**
     * @param Request $request
     * @param Poll $poll
     * @param PollValue $pollValue
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */


    public function index(Request $request, Poll $poll)
    {

        $pollValues = $poll->getValues();

        SEOMeta::setTitle('Голосование — '.$poll->getName() );
        $qwe = $poll->getName();

        $frd = $request->all();




        return view('Polls.vote', compact('poll', 'frd','pollValues'));
    }

    /**
     *
     */
    public function create()
    {

    }

    /**
     * @param Request $request
     * @param PollValue $pollValue
     * @param Poll $poll
     * @param Vote $vote
     * @param User $user
     * @param Auth $auth
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, PollValue $pollValue, Poll $poll, Vote $vote, User $user, Auth $auth)
    {
        $data = $request->all();

        $vote = new Vote();
        $vote->setPollId($poll->getId());
        $vote->setUserId($user = Auth::user()->id);
        $vote->setPollValueId($request->get('idValue'));

        $vote->save();

        return redirect()->route('result.index',$poll);

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
