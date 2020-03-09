<?php

namespace App\Http\Controllers\Polls;

use App\Http\Controllers\Controller;
use App\Models\Polls\PollValue;
use App\Models\Users\User;
use App\Models\Polls\Poll;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemAdapter;

use App\Models\Users\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;

class PollController extends Controller
{
    /**
     * @var Poll
     */
    protected $polls;

    /**
     * @var PollValue
     */
    protected $poll_value;

    /**
     * PollController constructor.
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {


        SEOMeta::setTitle('Голосования ');
        $frd = $request->all();
        $polls = $this->polls::filter($frd)->paginate(5);


        return view('Polls.index', compact('polls', 'frd'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        SEOMeta::setTitle('Создание пользователя ' );
        return view('Polls.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'name' => 'required|min:1|max:50',
            'description' => 'required|min:1|max:50',
            //'image' => 'required|mimes:jpeg,jpg|dimensions:min_width=100,min_height=400'
        ]);

        $poll = new Poll();
        $poll->setName($data['name']);
        $poll->setDescription($data['description']);
        $poll->save();


        $storage = Storage::disk('public');
        $localPath = '/images/'.$poll->getKey().'-'.time().'.jpg';
        $image = $request->file('image');
        $oldAvatarLocalPath = $poll->getImageUrl();
        if (null !== $oldAvatarLocalPath && $storage->has($oldAvatarLocalPath)) {
            $storage->delete($oldAvatarLocalPath);
        }

        $image = $request->file('image');
        /**
         * @var FilesystemAdapter $storage
         */
        $storage->put($localPath, $image->get());
        $publicPath = $storage->url($localPath);
        $poll->setImageUrl($publicPath);
        $poll->save();


        $members = $data['members'];

        $pollValues = array();

        foreach ($members as $member) {
            /**
             * @var Poll $pollValue
             */
           $pollValue = $poll->values()->create([
                'name'=>$member,
            ]);
            $pollValues[] = $pollValue;
        }



        return redirect()->route('polls.index');
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
     * @param Poll $poll
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Poll $poll)
    {
        SEOMeta::setTitle('Редактировать голосование '. $poll->getName() );
        return view('Polls.edit',compact('poll'));
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
