<?php
namespace App\Http\Controllers;

use Lang;
use App\Helpers\User;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        User::Permissions();
        $top = Array
        (
            0 => Array
            (
                "sub_title_color" => "success",
                "sub_title" => "Today",
                "title" => "Income",
                "value" => "$0",
                "name" => "Total Income"
            ),

            1 => Array
            (
                "sub_title_color" => "info",
                "sub_title" => "In Month",
                "title" => "Income",
                "value" => "$493",
                "name" => "Total Income"
            ),

            2 => Array
            (
                "sub_title_color" => "primary",
                "sub_title" => "New",
                "title" => "Orders",
                "value" => "54",
                "name" => "New Orders"
            ),

            3 => Array
            (
                "sub_title_color" => "danger",
                "sub_title" => "Processing",
                "title" => "Orders",
                "value" => "19",
                "name" => "Orders Processing"
            )
        );

        return view($this->layout, [
            'content' => view('dashboard.dashboard', ['top' => $top]),
            'pageTitle' => Lang::get('general.dashboard')
        ]);
    }


}
