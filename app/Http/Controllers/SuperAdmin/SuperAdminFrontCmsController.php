<?php

namespace App\Http\Controllers\SuperAdmin;

use App\FrontCmsHeader;
use App\FrontCmsHeaderTranslation;
use App\FrontImageFeatureTranslation;
use App\Helper\Files;
use Illuminate\Http\Request;
use App\Helper\Reply;
use App\FrontImageFeature;
use App\Http\Requests\SuperAdmin\StoreImageFeature;
use App\Http\Requests\SuperAdmin\UpdateImageFeature;

class SuperAdminFrontCmsController extends SuperAdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageIcon = 'icon-screen-desktop';
        $this->pageTitle = 'menu.frontCms';
    }

    public function index()
    {
        $this->headerData = FrontCmsHeader::first();
//        dd($this->headerData); exit;
        return view('super-admin.front-cms.index', $this->data);
    }

    public function updateHeader(Request $request)
    {
        $data = $request->all();
        $headerData = FrontCmsHeader::first();

        foreach ($data['translations'] as $language_id => $translation) {
            FrontCmsHeaderTranslation::query()
                ->updateOrCreate(
                    [
                        'front_cms_header_id' => $headerData->id,
                        'language_id' => $language_id,
                    ],
                    [
                        'title' => $translation['title'],
                        'description' => $translation['description'],
                        'call_to_action_title' => $translation['call_to_action_title'],
                        'contact_text' => $translation['contact_text'],
                        'meta_details' => $translation['meta_details']
                    ]);
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = Files::upload($request->logo, 'front-logo');
        }

        if ($request->hasFile('header_image')) {
            $data['header_image'] = Files::upload($request->header_image, 'header-image');
        }

        if ($request->hasFile('header_backround_image')) {
            $data['header_backround_image'] = Files::upload($request->header_backround_image, 'header-background-image');
        }
        if ($request->remove_header_background == 'yes') {
            $data['header_backround_image'] = null;
        }

        $register_background = null;
        $login_background = null;

        if ($request->hasFile('login_background_image')) {
            $login_background = Files::upload($request->login_background_image, 'login-background-image');
        }

        if ($request->hasFile('register_background_image')) {
            $register_background = Files::upload($request->register_background_image, 'register-background-image');
        }

        if ($request->remove_login_background == 'yes') {
            $login_background = null;
        }

        if ($request->remove_register_background == 'yes') {
            $register_background = null;
        }

        unset($data['login_background_image']);
        unset($data['register_background_image']);

        $headerData->update($data);

        $headerData->login_background = $login_background;
        $headerData->register_background = $register_background;
        $headerData->save();

        return Reply::redirect(route('superadmin.front-cms.index'), __('menu.settings') . ' ' . __('messages.updatedSuccessfully'));
    }

    public function imageFeatures()
    {
        $this->features = FrontImageFeature::all();
        return view('super-admin.front-cms.features', $this->data);
    }

    public function saveImageFeatures(StoreImageFeature $request)
    {
        $headerData = new FrontImageFeature();

        if ($request->hasFile('image')) {
            $headerData->image = Files::upload($request->image, 'front-features');
        }

        $headerData->save();

        foreach ($request->get('translations') as $language_id => $translation) {
            FrontImageFeatureTranslation::query()
                ->updateOrCreate(
                    [
                        'front_image_feature_id' => $headerData->getAttribute('id'),
                        'language_id' => $language_id,
                    ],
                    [
                        'title' => $translation['title'],
                        'description' => $translation['description']
                    ]);
        }

        return Reply::redirect(route('superadmin.front-cms.features'), __('menu.settings') . ' ' . __('messages.updatedSuccessfully'));
    }

    public function updatefeatures(UpdateImageFeature $request, $id)
    {
        $headerData = FrontImageFeature::findOrFail($id);

        if ($request->hasFile('image')) {
            $headerData->image = Files::upload($request->image, 'front-features');
        }

        $headerData->save();

        foreach ($request->get('translations') as $language_id => $translation) {
            FrontImageFeatureTranslation::query()
                ->updateOrCreate(
                    [
                        'front_image_feature_id' => $headerData->getAttribute('id'),
                        'language_id' => $language_id,
                    ],
                    [
                        'title' => $translation['title'],
                        'description' => $translation['description']
                    ]);
        }

        return Reply::redirect(route('superadmin.front-cms.features'), __('menu.settings') . ' ' . __('messages.updatedSuccessfully'));
    }

    public function editImageFeatures($id)
    {
        $this->feature = FrontImageFeature::findorFail($id);
        return view('super-admin.front-cms.edit_feature', $this->data);
    }

    public function deleteFeature(Request $request, $id)
    {
        $feature = FrontImageFeature::findorFail($id);
        Files::deleteFile($feature->image, 'front-features');
        $feature->delete();
        return Reply::success(__('messages.recordDeleted'));
    }

}
