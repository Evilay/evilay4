<?php

namespace App\Http\Controllers;

use App\Events\Auth\ChangePas;
use App\Events\User\RegisterUse;
use App\Events\User\UpdateUse;
use App\Models\Users\Role;
use App\Models\Users\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Hash;
use App\Models\Users\UserLog;
use Intervention\Image\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\FilesystemAdapter;



class UserController extends Controller
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
     * UserController constructor.
     * @param User $users
     * @param Role $roles
     */
    public function __construct(User $users,
                                Role $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        SEOMeta::setTitle('Пользователи ');
        $frd = $request->all();
        $users = $this->users::filter($frd)->paginate(5);


        return view('users.index', compact('users', 'frd','image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        SEOMeta::setTitle('Создание пользователя ' );
        return view('users.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request)
    {

        $data = $request->all();
        $dateTo = Carbon::now()->subYears(18);
        $this->validate($request, [
            'f_name' => 'required|min:1|max:50',
            'l_name' => 'required|min:1|max:50',
            'm_name' => 'required|min:1|max:50',
            'email' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'age' => ['required', 'before:'.$dateTo],
        ],[
            'age.before'=>'Вам должно быть больше 18'
        ]);


        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $user->setName($data['f_name'], 1);
        $user->setName($data['m_name'], 2);
        $user->setName($data['l_name'], 0);
        $user->setPassword($data['password']);
        $user->save();



        event(new RegisterUse($user));

        return redirect()->route('users.index');
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
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        //
       // $image = \Storage::disk('public')->url('images/qwe.jpeg');

      //  dd($image);
        SEOMeta::setTitle('Редактирование — '.$user->getName() );
        return view('users.edit',compact('user','image'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Illuminate\Validation\ValidationException
     */

    public function update(Request $request, User $user)
    {
        $frd = $request->all();

        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required',
            'm_name' => 'required',
            'image' => 'required|mimes:jpeg,jpg|dimensions:min_width=100,min_height=400']);

        /**
         * @var User $user
         */

        //$image = $request->file('image');

        //$storage = Storage::disk('public');
        //dd(url('storage/images/0SF3dcRIVhqgFMZKCSuVa59bHkbYdUclRPlUVeLM.jpeg'));
        //$user->setAvatar($image);
        $user->setFirstName($frd['f_name']);
        $user->setLastName($frd['l_name']);
        $user->setMiddleName($frd['m_name']);
        $user->save();


        $storage = Storage::disk('public');
        $localPath = '/images/'.$user->getKey().'-'.time().'.jpg';
        $image = $request->file('image');
        $oldAvatarLocalPath = $user->getImageUrl();
        if (null !== $oldAvatarLocalPath && $storage->has($oldAvatarLocalPath)) {
            $storage->delete($oldAvatarLocalPath);
        }

        $image = $request->file('image');
        /**
         * @var FilesystemAdapter $storage
         */
        $storage->put($localPath, $image->get());
        $publicPath = $storage->url($localPath);
        $user->setImageUrl($publicPath);
        $user->save();


        event(new UpdateUse($user));

        return redirect('users');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function roles(User $user)
    {
        SEOMeta::setTitle('Роли — '.$user->getName() );

        $roles = $this->roles::get();

        return view('users.roles', compact('user','roles'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function rolesUpdate(Request $request,User $user)
    {

        $frd = $request->only('roles');

        $user->roles()->sync($frd['roles']);

        $flashMessages = [['type' => 'success', 'text' => 'Роли пользователя «'.$user->getName() .'» обновлены']];

        return redirect()->route('users.index')->with(compact('flashMessages'));

    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function password(User $user)
    {
        SEOMeta::setTitle('Пароль — '.$user->getName());
        return view('users.password', compact('user'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function passwordUpdate(Request $request,User $user)
    {
        $this->validate($request,[
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $frd = $request->only('password');
        $user->setPassword(Hash::make($frd['password']));
        $user->save();
        $flashMessages = [['type' => 'success', 'text' => 'Пароль пользователя «'.$user->getName() .'» сохранен']];
        event(new ChangePas($user));

        return redirect()->back()->with(compact('flashMessages'));


    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logs(Request $request,User $user)
    {
        SEOMeta::setTitle('Логи — '.$user->getName() );
        $frd = $request->all();
        $logs = $user->logs()->filter($frd)->orderBy('id','desc')->paginate($frd['perPage'] ?? 20);
        return view('users.logs', compact('user','logs'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logsDestroy(Request $request, User $user){
        $logsIds=$request->only('logs');
        UserLog::whereIn('id',$logsIds)->delete();
        return redirect()->back();
    }
}
