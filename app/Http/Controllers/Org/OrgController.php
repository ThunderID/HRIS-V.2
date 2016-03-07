<?php namespace App\Http\Controllers\Org;

use App\API\Connectors\APIOrg;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Helper\SortList;
use Input, Route;

/**
 * { OrgController Class }
 * @author Budi
 * 
 * public functions :
 * 1. index()                           : public function display index org
 * 
 */

class OrgController extends BaseController 
{
    //init 
    protected $view_source_root                     = 'pages.org';
    
    public function __construct()
    {
        parent::__construct();

        $this->page_attributes->page_title             = 'Perusahaan';
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
     * 1. Layout
     * 2. page_attributes
     * 3. page_datas
     * 
     * steps
     * 1. set page attributes
     * 2. get data parameter
     * 3. get data
     * 4. set page datas
     * 5. generate view
     */
	public function index()
	{
        //1. set page attributes
        $SortList                                   = new SortList;

        $this->page_attributes->page_subtitle       = 'index';
        //dummy
        $this->page_attributes->filters             =   [
                                                            'b'             => ['ab', 'ba'],
                                                            'c'             => ['ac', 'ca'],
                                                        ];
        //dummy
        $this->page_attributes->sorts               =   [
                                                            'nama'          => $SortList->getSortingList('nama')
                                                        ];       

        //2. get data parameter
        $data_parameter                             = $this->setPageDataParameter();
       
        //3. get data
        $APIOrg                                     = new APIOrg;
        $search                                     = array_merge(
                                                            ['name' => $data_parameter['search']],
                                                            $data_parameter['filter']
                                                        );


        $data                                       = $APIOrg->getIndex([
                                                        'search'    => $search,
                                                        'sort'      => $data_parameter['sort'],
                                                        'take'      => $data_parameter['take'],
                                                        'skip'      => ($data_parameter['page'] - 1) * $data_parameter['take'],
                                                        ]);

        //4. set page datas
        $this->page_datas->datas                    = $data['data'];


        //5. generate view
        $view_source                                = $this->view_source_root . '.index';
        $route_source                               = route(Route::CurrentRouteName());

        return $this->generateView($view_source, $route_source);
	}

    /**
     * { show }
     *
     * @param     
     *1. id
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
    public function show($id = null)
    {
        //1. validate
        if(is_null($id))
        {
            App::abort(403, 'Id Organisasi tidak ada');
        }

        //2. get data
        $APIOrg                                     = new APIOrg;
        $data                                       = $APIOrg->getShow($id);        

        //3. set page attributes
        $this->page_attributes->page_subtitle       = 'detail';     
        $this->page_attributes->breadcrumb          = array_merge(
                                                            $this->page_attributes->breadcrumb,
                                                            [$data['data']['name'] => route(Route::CurrentRouteName(),['id' => $id])]
                                                        );

        //4. set page datas
        $this->page_datas->datas                    = $data['data'];
        $this->page_datas->cust_paging              = count($data['data']['branches']);
        
        //5. generate view
        $view_source                                = $this->view_source_root . '.show';
        $route_source                               = route(Route::CurrentRouteName(),['id' => $id]);

        return $this->generateView($view_source, $route_source);
    }    
}