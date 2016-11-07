<?php
namespace App\Http\Controllers;

use Nathanmac\Utilities\Parser\Parser;
use Session;
use App;
use App\Helpers\Home;

class HomeController extends Controller
{
    protected $home;
    protected $menus;
    protected $headers;
    protected $langs;

    public function __construct()
    {
        if (!Session::has('chosen_language_font')) {
            Session::put('chosen_language_font', 'en');
        }
        App::setLocale(Session::get('chosen_language_font'));
        $this->home = New Home();
    }

    public function index()
    {
        $this->partner();
        $data['title'] = 'Sky home';
        $data['page'] = 'home';
        return view('home.index',
            [
                'data' => $data,
                'menus' => $this->home->getMenu(),
                'headers' => $this->home->getHeader(),
                'langs' => $this->home->getLanguages(),
                'slides' => $this->home->getSlide('home-top'),
                'international' => $this->home->getAllPostInCategory(40, 5),
                'local' => $this->home->getAllPostInCategory(41, 5),
                'company' => $this->home->getAllPostInCategory(42, 5),
                'type' => $this->home->getAllPostInCategory(43, 5),
            ]
        );
    }

    /**
     * get contact
     * @return \Illuminate\View\View
     */

    public function contact()
    {
        $data['title'] = 'Contact';
        $data['page'] = 'lienhe';
        return view('home.contact',
            [
                'data' => $data, 'menus' => $this->home->getMenu(),
                'headers' => $this->home->getHeader(),
                'langs' => $this->home->getLanguages(),
                'international' => $this->home->getAllPostInCategory(40, 5),
                'local' => $this->home->getAllPostInCategory(41, 5),
                'company' => $this->home->getAllPostInCategory(42, 5),
                'type' => $this->home->getAllPostInCategory(43, 5),
            ]);
    }

    public function about()
    {
        $data['title'] = 'About';
        $data['page'] = 'gioithieu';
        return view('home.about',
            [
                'data' => $data,
                'menus' => $this->home->getMenu(),
                'headers' => $this->home->getHeader(),
                'langs' => $this->home->getLanguages(),
                'international' => $this->home->getAllPostInCategory(40, 5),
                'local' => $this->home->getAllPostInCategory(41, 5),
                'company' => $this->home->getAllPostInCategory(42, 5),
                'type' => $this->home->getAllPostInCategory(43, 5),
            ]);
    }

    public function pages()
    {
        $data['title'] = 'Vé';
        $data['page'] = 'venoidia';
        return view('home.pages',
            [
                'data' => $data,
                'menus' => $this->home->getMenu(),
                'headers' => $this->home->getHeader(),
                'langs' => $this->home->getLanguages()
            ]);
    }


    public function ticket()
    {
        $data['title'] = "ticket";
        $data['page'] = 'vemaybay';
        $xml_file_path = 'data/Request.xml';
        $parser = new Parser();
        $parsed = $parser->xml("<?xml version = \"1.0\" encoding=\"UTF-8\"?>
                        <xml>
                            <message>
                                <to>Jack Smith</to>
                                <from>Jane Doe</from>
                                <subject>Hello World</subject>
                                <body>Hello, whats going on...</body>
                            </message>
                        </xml>");
        return view('home.ticket',
            [
                'data' => $data,
                'menus' => $this->home->getMenu(),
                'headers' => $this->home->getHeader(),
                'langs' => $this->home->getLanguages(),
                'international' => $this->home->getAllPostInCategory(40, 5),
                'local' => $this->home->getAllPostInCategory(41, 5),
                'company' => $this->home->getAllPostInCategory(42, 5),
                'type' => $this->home->getAllPostInCategory(43, 5),
            ]);
    }


    public function news()
    {
        $data['title'] = "News";
        return view('home.news',
            [
                'data' => $data,
                'menus' => $this->home->getMenu(),
                'headers' => $this->home->getHeader(),
                'langs' => $this->home->getLanguages(),
                'recent_posts' => $this->home->getRecentPost(),
                'category_posts' => $this->home->getPostByCategories(),
                'international' => $this->home->getAllPostInCategory(40, 5),
                'local' => $this->home->getAllPostInCategory(41, 5),
                'company' => $this->home->getAllPostInCategory(42, 5),
                'type' => $this->home->getAllPostInCategory(43, 5),
            ]);
    }

    public function cats($id)
    {
        $data['title'] = "Category";
        return view('home.cats',
            [
                'data' => $data,
                'menus' => $this->home->getMenu(),
                'headers' => $this->home->getHeader(),
                'langs' => $this->home->getLanguages(),
                'posts' => $this->home->getAllPostInCategory($id, 5),
                'international' => $this->home->getAllPostInCategory(40, 5),
                'local' => $this->home->getAllPostInCategory(41, 5),
                'company' => $this->home->getAllPostInCategory(42, 5),
                'type' => $this->home->getAllPostInCategory(43, 5),
            ]);
    }

    public function post($slug)
    {
        $post = $this->home->getPostBySlug(str_replace('.html', '', $slug));
        $data['title'] = $post['title'];
        return view('home.post',
            [
                'data' => $data,
                'menus' => $this->home->getMenu(),
                'headers' => $this->home->getHeader(),
                'langs' => $this->home->getLanguages(),
                'posts' => $post,
                'randoms' => $this->home->randomPost(7),
                'international' => $this->home->getAllPostInCategory(40, 5),
                'local' => $this->home->getAllPostInCategory(41, 5),
                'company' => $this->home->getAllPostInCategory(42, 5),
                'type' => $this->home->getAllPostInCategory(43, 5),
            ]);
    }

    /**
     * partner home page
     *
     */
    public function partner()
    {
        $items = [];
        $slides = $this->home->getSlide('home-button');
        $i = 0;
        if (!empty($slides)) {
            foreach ($slides as $slide) {
                $items[$i]['img'] = $slide['url'];
                $items[$i]['alt'] = $slide['description'];
                $i++;
            }
            \File::put('data/doitac.json', json_encode(['items' => $items]));
        }
    }
}
