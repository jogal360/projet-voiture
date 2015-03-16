<?php
use Voiture\Repositories\VoituresRepo;

class VoituresController extends BaseController {


    protected $voituresRepo;

    public function __construct( VoituresRepo $voituresRepo)
    {
        $this->voituresRepo = $voituresRepo;
    }

    public function listVoitures($sortby=null , $order = null)
    {
        $dataUsers   = $this->voituresRepo->getAllVoitures();
        $users= '';

        $sortbyP = $sortby;
        $orderP = $order;
        $search = false;
        if ($sortby  && $order )
        {
            $dataUsers = $this->voituresRepo->orderBy($sortbyP, $orderP);
        } else {
            $dataUsers =  $dataUsers;
        }

        $usr = Auth::user()->role_id;
        switch($usr)
        {
            case 1 :
                $entity = "mod";
                $extends = 'moderateur-com/home-mod';

                break;
            case 7:
                $entity = "sadmin";
                $extends = 'superadmin/home-admin';
        }
        return View::make('voitures/list-voitures',compact('dataUsers', 'entity','sortbyP','orderP','search','extends'));
    }
    public function detailVoiture()
    {
        $id = Input::get('id');
        $user = $this->voituresRepo->getAVoiture($id);
        $entity = '';
        $search = Input::get('joueur');
        if(Auth::user()->role_id == 7)
        {
            $entity = 'sadmin';
        }
        if(Auth::user()->role_id == 1)
        {
            $entity = 'mod';
        }
        $view = View::make('voitures/detail-voiture',compact('user','entity','search'))->render();
        return $view;
    }
    public function deleteVoiture()
    {
        $usr = "";
        $data = "";
        $ids = Input::get('id');

        foreach ($ids as $id){
            if($id)
            {
                $usr = $this->voituresRepo->getAVoiture($id);
                $nom = $usr->nom_voiture;
                try {
                    //$usr->bankAccount()->delete();
                    $usr->delete();
                }catch(\Exception $e){
                    $author = Auth::user()->role_id;
                    $page = '';
                    switch ($author)
                    {
                        case 1:
                            $page = "mod-com";
                            break;
                        case 7:
                            $page = "home-admin";
                            break;
                        default:
                            $page = "home";
                    }
                    return Response::json(array('success'=>false));
                }
                $data .= "Le voiture  ".$nom." a été suprimée ";
            }
        }
        if( Input::get('numberUsers') == 'all')
        {
            $data = "Tous les voitures sélectionnés ont été supprimées";
        }
        return Response::json(array('success'=>true, 'data'=> $data));
    }

}
