<?php 
 namespace App\Controller\User; 
 use App\Controller\BaseController;
use App\Models\Notebook as UserNotebook;
use App\Models\Supermarket;
use System\Http\Request\Request as HttpRequest;
class Notebook extends BaseController 
 { 

    protected $active_user;
    #
    public function __construct()
    {
        if(!$this->session()->contains('user'))
        {
            return redirect();
        }
        $this->active_user = session('user')->email;

    }


    public function index()
    {
        $context = [
            'title' => "USER | DASHBOARD | NOTEBOOKS",
            'collection' => UserNotebook::where('user_id', $this->active_user)->orderBy('created_at', "DESC")->get()
        ];

        return render('user/notebook', $context);
    }


    public function store(HttpRequest $request)
    {
        $notebook_name = $request->body->note_name;

        $notebook = [
            'user_id' => session('user')->email,
            'note_name' => $notebook_name
        ];

        $notebook = new UserNotebook($notebook);

        if(!$notebook->save())
        {
            return redirect()->back()->withInput()->with('failed', "Notebook not created. Please try again later.");
        }

        session(['notebook' => alert()->success("Notebook created successfully. You can  now create your notes under the {$notebook_name} notebook")]);
        return redirect("user/dashboard/notebook/{$notebook_name}/notes");
    }


    public function create($notebook_name)
    {
        $context = [
            'title' => "USER | DASHBOARD | NOTEBOOKS",
            'collection' => Supermarket::all(),
            'notebook_id' => UserNotebook::find($notebook_name, 'note_name')->value('id'),
            'notebook_name' => $notebook_name
        ];

        return render('user/notes', $context);
    }


    public function update(HttpRequest $request)
    {
        $notebook_id = $request->body->notebook_id;
        $supermarket_name = $request->body->supermarket_name;
        $items = $request->body->items;

        $notes = [
            'supermarket_name' => $supermarket_name,
            'notes' => $items
        ];

        if(!UserNotebook::find($notebook_id)->update($notes))
        {
             return redirect()->back()->withInput()->with('failed', "Oops, Notebook items not saved. Please try again.");
        }
        return redirect("user/dashboard/notebooks");
    }
 }