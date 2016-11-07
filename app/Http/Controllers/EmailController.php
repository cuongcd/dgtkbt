<?php namespace App\Http\Controllers;

use Input;
use App\Blocks\Email\Grid;
use App\Blocks\Email\Tabs as EmailTabs;
use Redirect;
use Lang;
use App;
use File;
use Mail;

class EmailController extends Controller
{
    protected $data;
    protected $content;

    function __construct()
    {
        $this->middleware('auth');
        $this->setGridId('emailTemplate');
        $this->setTabsId('emailTemplate');
        $this->setResource('App\Models\Email');
        $this->setSingularKey('emailTemplate');
        $this->setPluralKey('emailTemplate');
        $this->setModelClass('App\Models\Email');
    }

    /*
     * Index Controller
     * */
    public function indexWithoutParam()
    {
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
        $this->setGrid($grid);
        $this->setPageTitle(Lang::get('labels.manage_email_template'));
        return $this->loadGrid();
    }

    /*
     * Index Controller
     * */
    public function index($filter = null)
    {
        $params = $this->_parseFilter($filter);
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey(), $params);
        $this->setGrid($grid);
        $this->setPageTitle(Lang::get('labels.manage_email_template'));
        return $this->loadGrid();
    }

    /*
    * Grid Controller
    * */
    public function grid($filter)
    {
        $params = $this->_parseFilter($filter);
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey(), $params);
        $this->setGrid($grid);
        echo $this->loadAjaxGrid();
    }

    /*
     * return View
     * */
    public function create()
    {
        $this->setPageTitle(Lang::get('labels.emails'));
        $tabs = new EmailTabs($this->getTabsId());
        $this->setTabs($tabs);
        return $this->loadTabs();
    }

    /*
    * Save Controller
    * */
    public function save($id = null)
    {
        $input = $this->_processData(Input::all());
        $file = $input['content'];
        $key = $input['key'];
        File::put('../resources/views/emails/' . $key . '.blade.php', $file);
        if (!$id)
            $data = $this->store($input);
        else
            $data = $this->update($id, $input);

        if (isset($data['errors']))
            return $id ?
                Redirect::route('emails.edit', [$id])
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput() :

                Redirect::route('emails.create')
                    ->with('error', $data['errors'][0]['message'])
                    ->withInput();
        elseif (Input::get('tab')) {
            $id = $data['_id'];
            return Redirect::route('emails.edit', [$id, 'tab' => Input::get('tab')])->with('success',
                Lang::get('messages.save_email_successfully'));
        } else {
            return Redirect::route('emails.list')
                ->with('success', Lang::get('messages.save_email_successfully'));
        }
    }

    /*
    * Edit Controller
    * */
    public function edit($id)
    {
        $data = $this->show($id);
        if (isset($data['errors'])) {
            return Redirect::route('emails.list')
                ->with('error', $data['errors'][0]['message'])
                ->withInput();
        }
        App::instance($this->getTabsId(), $data);
        $this->setPageTitle(Lang::get('labels.edit_email_teamplate') . ' # ' . $data['name']);
        $tabs = new EmailTabs($this->getTabsId());
        $this->setTabs($tabs);
        return $this->loadTabs();
    }

    /*
    * Export CSv Controller
    * */
    public function export($type)
    {
        $grid = new Grid($this->getGridId(), $this->getResource(), $this->getPluralKey());
        return $this->exportFile($type, $grid);
    }

    /*
    * Mass delete Controller
    * */
    public function massDelete()
    {
        $idsString = Input::get($this->getGridId());
        $ids = explode(',', $idsString) ? explode(',', $idsString) : $idsString;
        $data = $this->massDestroy($ids);
        if (isset($data['errors)'])) {
            return Redirect::route('emails.list')->with('error', $data['errors'][0]['message'])->withInput();
        } else {
            $count = count($data);
            return Redirect::route('emails.list')->with('success',
                Lang::get('messages.number_records_have_been_deleted', ['count' => $count]));
        }
    }


    public function delete($id)
    {
        if ($id) {
            $data = $this->destroy($id);
            if (isset($data['errors']))
                return $id ?
                    Redirect::route('emails.edit', [$id])
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput() :

                    Redirect::route('emails.list')
                        ->with('error', $data['errors'][0]['message'])
                        ->withInput();
            else {
                return Redirect::route('emails.list')
                    ->with('success', Lang::get('messages.the_email_has_been_deleted'));
            }
        } else {
            return Redirect::route('emails.list')
                ->with('error', Lang::get('messages.does_not_exist'));
        }
    }

    public function templateFile()
    {
        $getFile = Input::get('file');
        $getContent = File::get('../public/template/' . $getFile);
        echo $getContent;
    }

    /**
     * send email
     * @param $input
     * @return mixed
     */
    public function sendEmail($input)
    {
        $temp = App\Models\Email::where('key', '=', $input['key'])->first()->toArray();
        $content = [
            'sender_email' => $temp['sender_email'],
            'sender_name' => $temp['sender_name']
        ];
        $data['recipient'] = $input['first_name'] . ' ' . $input['last_name'];
        $data['receive'] = $input['email'];
        $data['password'] = $input['pass'];
        $data['subject'] = $temp['subject'];
        $this->data = $data;
        $this->content = $content;
        Mail::send('emails.' . $input['key'], array('content' => $content, 'data' => $data), function ($message) {
            $message->from($this->content['sender_email'], $this->content['sender_name']);
            $message->to($this->data['receive'], $this->data['recipient'])->subject($this->data['subject']);
        });
    }
}