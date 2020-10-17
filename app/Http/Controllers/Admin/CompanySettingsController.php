<?php

namespace App\Http\Controllers\Admin;

use App\CompanySetting;
use App\Helper\Files;
use App\Helper\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompanySettingsController extends AdminBaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'menu.companySettings';
        $this->pageIcon = 'icon-settings';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(! $this->user->can('manage_settings'), 403);

        $this->timezones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
        $setting = Company::findOrFail(company()->id);

        if(!$setting){
            abort(404);
        }

        return view('admin.settings.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort_if(! $this->user->can('manage_settings'), 403);

        $setting = Company::findOrFail($id);
        $setting->company_name      = $request->input('company_name');
        $setting->company_email     = $request->input('company_email');
        $setting->company_phone     = $request->input('company_phone');
        $setting->website           = $request->input('website');
        $setting->address           = $request->input('address');
        $setting->timezone          = $request->input('timezone');
        $setting->locale            = $request->input('locale');
        $setting->job_opening_text  = $request->input('job_opening_text');
        $setting->job_opening_title = $request->input('job_opening_title');
        $setting->career_page_link  = $request->input('slug');

        if ($request->hasFile('logo')) {
            $setting->logo = Files::upload($request->logo,'company-logo');
        }
        if ($request->hasFile('login_background')) {
            $setting->login_background = Files::upload($request->login_background,'login-background-image');
        }

        $setting->save();


        return Reply::redirect(route('admin.settings.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
