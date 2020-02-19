<?php

namespace App\Http\Controllers;

use App\Models\Users\Permission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Artesaos\SEOTools\Facades\SEOMeta;

class PermissionController extends Controller
{

    /**
     * @var Permission
     */
    protected $permissions;

    /**
     * UserController constructor.
     * @param Permission $permissions
     */
    public function __construct(Permission $permissions)
    {
        $this->permissions = $permissions;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        SEOMeta::setTitle('Разрешения');
        $frd = $request->all();
        $permissions = $this->permissions::filter($frd)->paginate(5);

        return view('permissions.index', compact('permissions', 'frd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        SEOMeta::setTitle('Создать разрешение');
        return view('permissions.create');
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
            'name' => 'required|min:1|max:50|unique:permissions',
            'display_name' => 'required|min:1|max:50|unique:permissions',
            'description' => 'required|min:1|max:50',
        ]);

        $permission = Permission::create($data);
        $permission->save();
        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        SEOMeta::setTitle('Редактировать разрешение '. $permission->getDisplayName() );
        return view('permissions.edit', compact('permission'));
    }

    /**
     * @param Request $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */

    public function update(Request $request, Permission $permission)
    {
        $frd = $request->all();

        $this->validate($request, [
            'display_name' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        /**
         * @var Permission $permission
         */
        $permission->setDisplayname($frd['display_name']);
        $permission->setName($frd['name']);
        $permission->setDescription($frd['description']);
        $permission->save();

        return redirect('permissions');
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index');
    }
}
