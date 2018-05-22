<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Categories;
use App\Http\Requests\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Port;
use App\Articles;
use App\Clients;
use App\PricingPlan;
use App\Services;
use App\Settings;
use App\Skills;
use App\Team_members;
use App\testimony;
use Illuminate\Mail\Mailer;

class HomeController extends Controller
{
    private $mailer;
    public  function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $copyright = Settings::where('name','copyright')->get();
        $social = Settings::where('name','social')->get();
        $contactinfo = Settings::where('name','contactinfo')->get();
        $contact = Settings::where('name','contact')->get();
        $ports = Port::take(4)->get();
        $portspage = Settings::where('name','port')->get();
        $Pcats = Categories::where('type','port')->get();


        $counts =Settings::where('name','count')->get();

        #region Articles
        $articles = Articles::orderBy('id', 'desc')->take(3)->get();
        $articlespage=Settings::where('name','articles')->get();
        #endregion
        #region plans data
        /**
         * @var planpage data
         * @var $plans data
         */
        $planspage=Settings::where('name','plans')->get();
        $plans = PricingPlan::all();
        #endregion
        #region client data
        /**
         * @var clientpage data
         * @var client data
         */
        $clientspage=Settings::where('name','clients')->get();
        $clients = Clients::all();
        #endregion
        #region servic data
        /**
         * @var servicespage  page header date
         * @var services  date
         */
        $servicespage = Settings::where('name','services')->get();
        $services = Services::all();
        #endregion
        #region slider data
        $sliders = Settings::where('name','slider')->get();
        #endregion
        #region about data
        $about = Settings::where('name','about')->get();
        #endregion
        #region Skills
        /**
         * begin team data
         * @var skills page headers
         * @var skills  */
        $skillspage = Settings::where('name','skills')->get();
        $skills = Skills::all();
        #endregion
        #region members
        /**
       * begin team data
       * @var team page headers
       * @var members  */
        $team = Settings::where('name','team')->get();
        $members = Team_members::all();
        /**
         * end team data
         */
        #endregion
        #region testimonies data
        $testimonies = testimony::all();
        #endregion

        return View::make('index')->with('ports',$ports)
                                  ->with('portspage',$portspage)
                                  ->with('contactinfo',$contactinfo)
                                  ->with('contact',$contact)
                                  ->with('Pcats',$Pcats)
                                  ->with('counts',$counts)
                                  ->with('articles',$articles)
                                  ->with('articlespage',$articlespage)
                                  ->with('planspage',$planspage)
                                  ->with('plans',$plans)
                                  ->with('clientspage',$clientspage)
                                  ->with('clients',$clients)
                                  ->with('servicespage',$servicespage)
                                  ->with('services',$services)
                                  ->with('sliders',$sliders)
                                  ->with('about',$about)
                                  ->with('skillspage',$skillspage)
                                  ->with('skills',$skills)
                                  ->with('team',$team)
                                 ->with('members',$members)
                                 ->with('testimonies',$testimonies)
                                 ->with('copyright',$copyright)
                                 ->with('social',$social);

    }

    /**
     * get load more data from database limit by 4 using jquery and display the result
     * @param Request $request
     * @return array|null
     */

    public function getmore(Request $request){
        $id = $request->id;
        $ports = Port::where('id','>',$id)->take(4)->get();
        if(count($ports)==0){
            return null;
        }
        $top= $request->top;
        ($top == null)?  $top = 287  : $top = $top+287 ;
        $div ="";
        $btn="";
        $left=-15;
        foreach($ports as $port){
            $div .= " <div class='col-sm-12  col-lg-12 col-md-12 col-xs-12 port' style=\"position: absolute; left:". $left."px; top:".$top ."px;\">
                        <div class='single-portfolio {$port->categories->name}'>
                            <img class='img-responsive' src='{$port->img}'>
                        </div>
                    </div>
            ";
                $left +=277;
        }
        $btn .= "
                <div class=\"post_btn\" >
                <div class=\"hover_effect_btn\" id=\"hover_effect_btn\">
                    <a  href=\"#hover_effect_btn\" id='btn-more' class=\"getmore\" data-target=\"$top\" data-id=\"$port->id\" data-hover=\"view more post\"><span>view more post</span></a>
                </div>
            </div>
        </div>

        ";
        $output=[$div,$btn];
        return $output;

    }

    /**
     * send mail
     * @param contact $request
     */
    public function mail(contact $request){
        $this->mailer->to("radwanmohamed334@gmail.com")->send(new \App\Mail\mail());
        return view('email');
    }
}
