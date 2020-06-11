<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Omniphx\Forrest\Providers\Laravel\Facades\Forrest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index($lang)
    {

        App::setlocale($lang);
        //Forma alternativa de acceder a los datos (Realese2)
        Forrest::authenticate();



        $existe = Lead::where('Id', Auth::user()->IdSalesforce)->get();



        // si es nuevo actualza
        if (!isset($existe[0])) {
           $LeadNuevo = new Lead;
            if (!is_null(Auth::user()->email)) {
                $LeadNuevo->Email = Auth::user()->email;
            } else {
                $LeadNuevo->Email = "";
            }

            $LeadNuevo->LeadSource = "web";

            if (!is_null(Auth::user()->name)) {
                $LeadNuevo->Firstname = Auth::user()->name;
            } else {
                $LeadNuevo->Firstname = " ";
            }


            if (!is_null(Auth::user()->surname)) {
                $LeadNuevo->Lastname = Auth::user()->surname;
            } else {
                $LeadNuevo->Lastname = " ";
            }


            if (!is_null(Auth::user()->companyName)) {
                $LeadNuevo->Company = Auth::user()->companyName;
            } else {
                $LeadNuevo->Company = " ";
            }


            if (!is_null(Auth::user()->mobile)) {
                $LeadNuevo->MobilePhone = Auth::user()->mobile;
            } else {
                 $LeadNuevo->MobilePhone =" ";
            }

            if (!is_null(Auth::user()->phone)) {
                $LeadNuevo->Phone = Auth::user()->phone;
            } else {
                $LeadNuevo->Phone= " ";
            }
            $LeadNuevo->save();
            // grabo el id generado ensaleforce
            $id = Lead::select('Id', 'Email')->where('email', Auth::user()->email)->get();
            Auth::user()->IdSalesforce = $id[0];
            Auth::user()->save();
            //inserto los demas campos

            // añado campos extras
            Forrest::sobjects('Lead/' . $id[0], [
                'method' => 'patch',
                'body'   => [
                    'NumberOfEmployees'=> Auth::user()->companySize()

                 ]
             ]);


             } else {
                 // si no es nuevo lo actualiza con los valores que contenga
                 $lead = Lead::where('Email', Auth::user()->email)->first();
                 Auth::user()->name = $lead->FirstName;
                 Auth::user()->surname = $lead->Lastname;
                 Auth::user()->email = $lead->Email;
                 Auth::user()->companyName = $lead->Company;
                 Auth::user()->mobile = $lead->MobilePhone;
                 Auth::user()->phone = $lead->Phone;
                 Auth::user()->save();
             }
             // actualizao datos de saleforce
             // quedan campos pendientes


             $array = DB::table('users')->where('email', Auth::user()->email)->get();
             return view('home', ['datos' => $array[0], 'lang' => $lang]);
         }










         public function update(Request $request, $lang)
         {

             Forrest::authenticate();
             App::setlocale($lang);
             // actualizo en local

             if (!is_null($request->companyName)) {
                 Auth::user()->companyName = $request->companyName;
             } else {
                 Auth::user()->companyName = " ";
             }

             if (!is_null($request->companyWeb)) {
                 Auth::user()->companyWeb = $request->companyWeb;
             } else {
                 Auth::user()->companyWeb = " ";
             }


             if (!is_null($request->Linkedin)) {
                 Auth::user()->Linkedin = $request->Linkedin;
             } else {
                 Auth::user()->Linkedin = " ";
             }


             if (!is_null($request->name)) {
                 Auth::user()->name = $request->name;
             } else {
                 Auth::user()->name = " ";
             }


             if (!is_null($request->surname)) {
                 Auth::user()->surname = $request->surname;
             } else {
                 Auth::user()->surname = " ";
             }
             if (!is_null($request->email)) {
                 Auth::user()->email = $request->email;
             } else {
                 Auth::user()->email = " ";
             }


             if (!is_null($request->position)) {
                 Auth::user()->position = $request->position;
             } else {
                 Auth::user()->position = " ";
             }


             if (!is_null($request->phone)) {
                 Auth::user()->phone = $request->phone;
             } else {
                 Auth::user()->phone = " ";
             }

             if (!is_null($request->mobile)) {
                 Auth::user()->mobile = $request->mobile;
             } else {
                 Auth::user()->mobile = " ";
             }


             if (!is_null($request->country)) {
                 Auth::user()->country = $request->country;
             } else {
                 Auth::user()->country = " ";
             }


             if (!is_null($request->state)) {
                 Auth::user()->state = $request->state;
             } else {
                 Auth::user()->state = " ";
             }


             if (!is_null($request->postalAddress)) {
                 Auth::user()->postalAddress = $request->postalAddress;
             } else {
                 Auth::user()->postalAddress = " ";
             }


             if (!is_null($request->companySize)) {
                 Auth::user()->companySize = $request->companySize;
             } else {
                 Auth::user()->companySize = 0;
             }


             if (!is_null($request->averageClientSize)) {
                 Auth::user()->averageClientSize = $request->averageClientSize;
             } else {
                 Auth::user()->averageClientSize = 0;
             }


             if (!is_null($request->sector)) {
                 Auth::user()->sector = $request->sector;
             } else {
                 Auth::user()->sector = " ";
             }

             /*eliminado aunque mantenemos el campo vacio
             if (!is_null($request->averageClientsTicket)) {
                 Auth::user()->averageClientsTicket = $request->averageClientsTicket;
             } else {
                 Auth::user()->averageClientsTicket = 0;
             }*/
        Auth::user()->averageClientTicket = 0;

        if (!is_null($request->LMS)) {
            Auth::user()->LMS = $request->LMS;
        } else {
            Auth::user()->LMS = " ";
        }


        if (!is_null($request->ownGames)) {
            Auth::user()->ownGames = $request->ownGames;
        } else {
            Auth::user()->ownGames = " ";
        }


        if (!is_null($request->instructionalDesigner)) {
            Auth::user()->instructionalDesigner = $request->instructionalDesigner;
        } else {
            Auth::user()->instructionalDesigner = " ";
        }


        Auth::user()->save();
        // actualiza en salesforce
        $raw = DB::table('users')->where('id', $request->id)->get();
        $idSalesforce = trim($raw[0]->idSalesforce);

        //Actualizao en saleforce
             Forrest::sobjects('Lead/', [
                 'method' => 'patch',
                 'body'   =>[
                        // compañia
                        'Company' => $request->companyName,
                        'Website' => $request->postalAddress,
                        // usuario
                        'FirstName'  => $request->name,
                        'LastName'  => $request->surname,
                        'Title' => $request->positiom,
                        'MobilePhone'=>$request->mobile,
                        'Phone'=>$request->phone,
                        'Pais__c'=>'ES',
                        'State' =>$request->state,
                        'PostalCode'=>$request->postalAddress,
                     // extra
                        'NumberOfEmployees'=>3,
                     // Sector ?

                  ]
              ]);


        // recojo los valores de la bbdd y los muestro*/
        $array = DB::table('users')->where('email', Auth::user()->email)->first();


        //recopilo provincias /estados
        $states = null; //$countries->where('name.common', $request->country)->first()->hydrateStates()->states->sortBy('name')->pluck('name', 'postal');

        return redirect('/home/' . $lang);
        //      return view('home' ,['datos' => $array,'countries'=>$countries_,'lang'=>$lang]);

    }


    public function recordLogo(Request $request, $lang)
    {
        $request->file('logo')->storePubliclyAs('public', strtolower($request->company) . ".jpg");
        return redirect('/home/' . $lang);
    }

    public function deleteLogo(Request $request, $lang)
    {
        $file = strtolower($request->company) . ".jpg";
        Storage::disk('public')->delete($file);
        return redirect('/home/' . $lang);

    }


}
