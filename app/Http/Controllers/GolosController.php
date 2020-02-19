<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Auth\ChangePas;
use App\Events\User\RegisterUse;
use App\Events\User\UpdateUse;
use App\Models\Users\Role;
use App\Models\Users\User;
use Carbon\Carbon;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Hash;
use App\Models\Users\UserLog;
use Intervention\Image\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemAdapter;
use App\Models\Users\Poll;

class GolosController extends Controller
{

    /**
     * @var User
     */
    protected $users;

    /**
     * @var Role
     */
    protected $roles;

    /**
     * @var Poll
     */
    protected $poll;


    /**
     * GolosController constructor.
     * @param User $users
     * @param Role $roles
     * @param Poll $poll
     */
    public function __construct(User $users, Role $roles, Poll $poll)
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->poll = $poll;

    }


    /**
     * @param Poll $poll
     * @param Role $roles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Poll $poll, Role $roles )
    {

        $rubrics = Poll::with('news')
            ->get();

        SEOMeta::setTitle('Пользователи ');


        return view('golosovanie.index',compact('poll','rubrics'));
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

    /**
     * @param Poll $poll
     * @param Role $roles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function left(Poll $poll, Role $roles )
    {
        dd(1);
        return view('golosovanie.left');
    }

    /**
     * @param Poll $poll
     * @param Role $roles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ctrl(Poll $poll, Role $roles )
    {
        dd(1);
        return view('golosovanie.ctrl');
    }

    /**
     * @param Poll $poll
     * @param Role $roles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function right(Poll $poll, Role $roles )
    {

        dd(1);
        return view('golosovanie.right');
    }

}
