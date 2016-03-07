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
        $filter_all                                 = array_merge(['name'          => $data_parameter['search']], $data_parameter['filter']);
dd($filter_all);
        //3. get data
        $APIOrg                                     = new APIOrg;

        $data                                       = $APIOrg->getIndex([
                                                        'search'    =>  [
                                                                            $filter_all
                                                                        ],
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
}