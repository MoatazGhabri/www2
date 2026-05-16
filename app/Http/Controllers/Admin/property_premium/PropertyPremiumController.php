<?php

namespace App\Http\Controllers\Admin\property_premium;

use App\Models\Service;
use App\Models\Property;
use App\Models\Classified;
use Illuminate\Http\Request;
use App\Models\PromoteurProperty;
use App\Models\Property_features;
use App\Http\Controllers\Controller;

class PropertyPremiumController extends Controller
{
    public function __construct(){
        try {
            $this->middleware(function($request,$next){
                if(auth()->check() && auth()->user()->is_admin==1){
                    return $next($request);
                }
                return redirect('/');

            });
        } catch (\Throwable $e) {
            redirect()->back();
        }
    }
    public function index(Request $request)
    {
        try {
            $type=$request->type;
            // dd($type);
            if($type=="ep"){
            $properties = Property_features::where("type__","property")->paginate(12);

            }elseif($type=="p"){
                $properties = Property_features::where("type__","promoteur_property")->paginate(12);
            }elseif($type=="c"){
                $properties = Property_features::where("type__","classified")->paginate(12);
            }elseif($type=="s"){
                $properties = Property_features::where("type__","service")->paginate(12);
            }else{
            // dd("e");

                $properties = Property_features::paginate(12);

            }
            // dd($properties);
            return view("dashboard_admin.property_premium.index", compact("properties"));
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    public function store(Request $request, $id)
    {
        try {
            $type = $request->type;
            $property = null;
            
            if ($type == "property") {
                $property = Property::find($id);
                if (!$property || $property->state !== "valid") {
                    return redirect()->back()->with("error", "L'annonce n'est pas active ou introuvable.");
                }
            } elseif ($type == "promoteur_property") {
                $property = PromoteurProperty::find($id);
                if (!$property || $property->status !== 1) {
                    return redirect()->back()->with("error", "L'annonce promoteur n'est pas active ou introuvable.");
                }
            } elseif ($type == "classified") {
                $property = Classified::find($id);
                if (!$property || $property->status !== 1) {
                    return redirect()->back()->with("error", "L'annonce de débarras n'est pas active ou introuvable.");
                }
            } elseif ($type == "service") {
                $property = Service::find($id);
                if (!$property || $property->status !== 1) {
                    return redirect()->back()->with("error", "L'annonce de service n'est pas active ou introuvable.");
                }
            } else {
                return redirect()->back()->with("error", "Type d'annonce invalide.");
            }

            $existingFeature = Property_features::where('property_id', $property->id)
                ->where('type__', $type)
                ->first();

            if ($existingFeature) {
                return redirect()->back()->with("error", "Cette annonce est déjà en vedette.");
            }

            $property_premium = new Property_features();
            $property_premium->property_id = $property->id;
            $property_premium->type__ = $type;
            $property_premium->save();

            \Log::info("Added premium feature: Type: {$type}, Property ID: {$property->id}");
            
            return redirect()->back()->with("success", "Annonce ajoutée aux vedettes avec succès.");
        } catch (\Throwable $e) {
            \Log::error("Error adding premium feature: " . $e->getMessage());
            return redirect()->back()->with("error", "Une erreur s'est produite lors de l'ajout aux vedettes.");
        }
    }


    public function destroy($id)
    {
        try {
            $property_feature = Property_features::find($id);
            
            if (!$property_feature) {
                return redirect()->back()->with("error", "Annonce vedette introuvable.");
            }

            // Log the deletion for debugging
            \Log::info("Removing premium feature: ID {$id}, Type: {$property_feature->type__}, Property ID: {$property_feature->property_id}");

            $property_feature->delete();

            return redirect()->back()->with("success", "Annonce retirée des vedettes avec succès.");
        } catch (\Throwable $e) {
            \Log::error("Error removing premium feature: " . $e->getMessage());
            return redirect()->back()->with("error", "Une erreur s'est produite lors du retrait de l'annonce des vedettes.");
        }
    }
}
