<?php

namespace App\Http\Controllers;

use App\Models\Users\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Users\UserLog;
use Artesaos\SEOTools\Facades\SEOMeta;

class RoleController extends Controller
{

    /**
     * @var Role
     */
    protected $roles;

    /**
     * UserController constructor.
     * @param Role $roles
     */
    public function __construct(Role $roles)
    {
        $this->roles = $roles;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        SEOMeta::setTitle('Роли' );
        $frd = $request->all();
        $roles = $this->roles::filter($frd)->paginate(5);

        return view('role.index', compact('roles', 'frd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        SEOMeta::setTitle('Создать роль' );
        return view('role.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request)
    {

        $data = $request->all();
        $this->validate($request, [
            'name' => 'required|min:1|max:50|unique:roles',
            'display_name' => 'required|min:1|max:50|unique:roles',
            'description' => 'required|min:1|max:50',
        ]);

        $role = Role::create($data);
        $role->save();
        return redirect()->route('role.index');
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
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        SEOMeta::setTitle('Редактировать роль '. $role->getDisplayName() );
        return view('role.edit',compact('role'));
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */

    public function update(Request $request, Role $role)
    {
        $frd = $request->all();

        $this->validate($request, [
            'display_name' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        /**
         * @var Role $role
         */
        $role->setDisplayname($frd['display_name']);
        $role->setName($frd['name']);
        $role->setDescription($frd['description']);
        $role->save();

        return redirect('role');
    }

    /**
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index');
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */

    public function massDestroy(Request $request){
        $rolesIds=$request->only('roless');
        dd($rolesIds);
        Role::whereIn('id',$rolesIds)->delete();
        return redirect()->back();
    }
}
