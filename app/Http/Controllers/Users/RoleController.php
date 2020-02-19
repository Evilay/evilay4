<?php

namespace App\Http\Controllers;

use App\Models\Users\Role;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        return view('role.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request)
    {
        /*$data = $request->all();
        $this->validate($request, [
            'name' => 'required|min:1|max:50|unique:roles',
            'display_name' => 'required|min:1|max:50|unique:roles',
            'description' => 'required|min:1|max:50',
        ]);

        $role = Role::create($data);
        $role->save();
        return redirect()->route('role.index'); */

        $frd = $request->only([
            'name',
            'display_name',
            'description',
        ]);

        $frd['name'] = Str::slug($frd['name']);
        $frd['display_name'] = Str::title($frd['display_name']);

        $this->validate($request, [
            'name' => 'required|min:1|max:50|unique:roles',
            'display_name' => 'required|min:1|max:50|unique:roles',
        ]);



        $role = Role::create($frd);

        $flashMessages = [['type' => 'success', 'text' => 'Роль '.$role->getDisplayName().' добавлена']];

        return redirect()->route('roles.index')->with(compact('flashMessages'));
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
}
