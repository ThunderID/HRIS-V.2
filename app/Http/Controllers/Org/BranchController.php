<?php namespace App\Http\Controllers\Org;

use App\API\Connectors\APIOrg;
use App\API\Connectors\APIBranch;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Helper\SortList;
use Input, Route;

/**
 * { OrgController Class }
 * @author Budi
 * 
 * public functions :
 * 1. index()                           : public function display index org
 * 2. show()                            : public function display show org
 * 3. create()                          : public function display create org
 * 4. edit()                            : public function display edit org
 * 5. store()                           : public function store data org
 * 6. update()                          : public function update data org
 * 7. destroy()                         : public function destroy data org
 * 
 */

class BranchController extends BaseController 
{
    //init 
    protected $view_source_root                     = 'pages.branch';
    
    public function __construct()
    {
        parent::__construct();

        $this->page_attributes->page_title             = 'Cabang';
        $this->page_attributes->breadcrumb             =    [
                                                                'Perusahaan'    => route('org.index'),
                                                            ];        
    }

    /**
     * { index }
     *
     * @param     
     *
     * @return
     */
	public function index()
	{

	}

    /**
     * { show }
     *
     * @param     
     * 1. id
     * 2. org_id
     *
     * @return
     * 1. Layout
     * 2. page_attributes
     * 3. page_datas
     * 
     * steps
     * 1. validate
     * 2. get data
     * 3. set page attributes
     * 4. set page datas
     * 5. generate view
     */
    public function show($org_id = null, $id = null)
    {
        //1. validate
        if(is_null($org_id))
        {
            App::abort(403, 'Id Organisasi tidak ada');
        }
        if(is_null($id))
        {
            App::abort(403, 'Id cabang tidak ada');
        }        

        //2. get data
        $APIBranch                                  = new APIBranch;
        $data                                       = $APIBranch->getShow($org_id, $id);  


        //3. set page attributes
        $this->page_attributes->page_subtitle       = $data['data']['name'];     
        $this->page_attributes->breadcrumb          = array_merge(
                                                            $this->page_attributes->breadcrumb,
                                                            [
                                                                $data['data']['organisation']['name'] => route('org.show', ['id' => $org_id]),
                                                                $data['data']['name'] => route(Route::CurrentRouteName(), ['org_id' => $org_id, 'id' => $id]),
                                                            ]
                                                        );

        //4. set page datas
        $this->page_datas->datas                    = $data['data'];
        $this->page_datas->cust_paging              = 0;
        
        //5. generate view
        $view_source                                = $this->view_source_root . '.show';
        $route_source                               = route(Route::CurrentRouteName(),['org_id' => $org_id, 'id' => $id]);

        return $this->generateView($view_source, $route_source);
    }  

    /**
     * { create }
     *
     * @param     
     * 1. id
     * 2. org_id
     *
     * @return
     * 1. Layout
     * 2. page_attributes
     * 3. page_datas
     * 
     * steps
     * 1. validate
     * 2. get data
     * 3. set page attributes
     * 4. set page datas
     * 5. generate view
     */
    public function create($org_id = null, $id = null)
    {
        //1. validate
        if(is_null($org_id))
        {
            App::abort(403, 'Id Organisasi tidak ada');
        }

        // 2 & 3        
        $APIOrg                                      = new APIOrg;
        $org                                         = $APIOrg->getShow($org_id);  

        if(!is_null($id))
        {
            //2. get data
            $APIBranch                               = new APIBranch;
            $data                                    = $APIBranch->getShow($org_id, $id);  

            //3. set page attributes
            $current_route                           = route(Route::CurrentRouteName(),['org_id' => $org_id ,'id' => $id]);


            $this->page_attributes->page_subtitle    = 'edit';     
            $this->page_attributes->breadcrumb       = array_merge(
                                                            $this->page_attributes->breadcrumb,
                                                            [
                                                                $org['data']['name'] => route('org.show', ['id' => $org_id]),
                                                                'Edit Cabang ' . $data['data']['name'] => $current_route,
                                                            ]
                                                        );                           
        }
        else
        {
            //2. get data
            $data['data']['id']                      = ""; 
            $data['data']['organisation_id']         = $org_id;
            $data['data']['name']                    = null;
            $data['data']['address']                 = null;
            $data['data']['phone']                   = null;
            $data['data']['email']                   = null;
            $data['data']['charts']                  = [];

            //3. set page attributes
            $current_route                           = route(Route::CurrentRouteName(),['org_id' => $org_id]);

            $this->page_attributes->page_subtitle    = 'data baru';     
            $this->page_attributes->breadcrumb       = array_merge(
                                                            $this->page_attributes->breadcrumb,
                                                            [
                                                                $org['data']['name'] => route('org.show', ['id' => $org_id]),
                                                                'Cabang Baru' => $current_route,
                                                            ]
                                                        );               
        }      

        //4. set page datas
        $this->page_datas->datas                    = $data['data'];

        //5. generate view
        $view_source                                = $this->view_source_root . '.create';
        $route_source                               = $current_route;

        return $this->generateView($view_source, $route_source);        
    }


    /**
     * { edit }
     *
     * @param     
     * 1. id
     * 2. org_id
     *
     * @return
     * 1. call function create()
     */
    public function edit($org_id = null, $id = null)
    {
        return $this->create($org_id, $id);
    }

    /**
     * { store }
     *
     * @param     
     * 1. id
     * 2. org_id
     * 3. input name
     * 4. input address
     * 5. input email
     * 6. input phone
     *
     * @return
     * 1. response
     * 
     * steps
     * 1. validate
     * 2. get input
     * 3. get data
     * 4. post to API
     * 5. return response
     */
    public function store($org_id = null, $id = null)
    {
        //1. validate
        if(is_null($org_id))
        {
            App::abort(403, 'Id Organisasi tidak ada');
        }

        //2. get input
        $input['name']                              = Input::get('name');                          
        $input['address']                           = Input::get('address');
        $input['phone']                             = Input::get('phone');
        $input['email']                             = Input::get('email');

        //3. get data
        if(!is_null($id))
        {
            $APIBranch                               = new APIBranch;
            $data                                    = $APIBranch->getShow($org_id,$id)['data'];

            $data['name']                            = $input['name'];
            $data['address']                         = $input['address'];
            $data['phone']                           = $input['phone'];
            $data['email']                           = $input['email'];
        }
        else
        {
            $data['id']                              = ""; 
            $data['organisation_id']                 = $org_id;
            $data['name']                            = $input['name'];
            $data['address']                         = $input['address'];
            $data['phone']                           = $input['phone'];
            $data['email']                           = $input['email'];
            $data['charts']                          = [];
        }

        //3. post to API
        $APIBranch                                  = new APIBranch;
        $result                                     = $APIBranch->postData($org_id,$data);

        //4. return response 
        if($result['status'] != 'success')
        {
            $this->errors                           = $result['message'];
        }

        if(!empty($id))
        {
           $this->page_attributes->msg              = "Data Cabang Telah Diedit";
        }
        else
        {
            $this->page_attributes->msg             = "Data Cabang Telah Ditambahkan";           
        }

        return $this->generateRedirectRoute('org.show',['id' => $org_id]);        
    }

    /**
     * { update }
     *
     * @param     
     * 1. id
     * 2. org_id
     *
     * @return
     * 1. call function store()
     */
    public function Update($org_id = null, $id = null)
    {
        return $this->store($org_id, $id);
    }

    /**
     * { destroy }
     *
     * @param     
     * 1. id
     * 2. org_id
     *
     * @return
     * 1. response
     * 
     * Step:
     * 1. post delete
     * 2. return response
     * 
     */
    public function Destroy($org_id = null, $id = null)
    {
        //1.post delete 
        $APIBranch                                  = new APIBranch;

        $result                                     = $APIBranch->deleteData($org_id, $id);

        //2. return response
        if($result['status'] != 'success')
        {
            $this->errors                           = $result['message'];
        }

        $this->page_attributes->msg                 = "Data cabang telah dihapus";
        
        return $this->generateRedirectRoute('org.show', ['org_id' => $org_id]); 
    }        
}