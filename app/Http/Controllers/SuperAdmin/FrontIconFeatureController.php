<?php

namespace App\Http\Controllers\SuperAdmin;

use App\FrontIconFeature;
use App\FrontIconFeatureTranslation;
use App\Helper\Reply;
use App\Http\Requests\SuperAdmin\StoreIconFeature;

class FrontIconFeatureController extends SuperAdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->pageIcon = 'icon-screen-desktop';
        $this->pageTitle = 'menu.iconFeatures';
    }

    public function index() {
        $this->features = FrontIconFeature::all();
        return view('super-admin.icon-feature.index', $this->data);
    }

    public function store(StoreIconFeature $request) {
        $feature = new FrontIconFeature();
        $feature->setAttribute('icon', $request->get('icon'));
        $feature->save();

        foreach ($request->get('translations') as $language_id => $translation) {
            FrontIconFeatureTranslation::query()
                ->updateOrCreate(
                    [
                        'front_icon_feature_id' => $feature->getAttribute('id'),
                        'language_id' => $language_id,
                    ],
                    [
                        'title' => $translation['title'],
                        'description' => $translation['description']
                    ]);
        }

         return Reply::redirect(route('superadmin.icon-features.index'), __('menu.iconFeatures') . ' ' . __('messages.updatedSuccessfully'));
    }

    public function edit($id) {
        $this->feature = FrontIconFeature::findOrFail($id);
        return view('super-admin.icon-feature.edit', $this->data);
    }


    public function update(StoreIconFeature $request, $id) {
        $feature = FrontIconFeature::findOrFail($id);
        $feature->setAttribute('icon', $request->get('icon'));
        $feature->save();

        foreach ($request->get('translations') as $language_id => $translation) {
            FrontIconFeatureTranslation::query()
                ->updateOrCreate(
                    [
                        'front_icon_feature_id' => $feature->getAttribute('id'),
                        'language_id' => $language_id,
                    ],
                    [
                        'title' => $translation['title'],
                        'description' => $translation['description']
                    ]);
        }

         return Reply::redirect(route('superadmin.icon-features.index'), __('menu.iconFeatures') . ' ' . __('messages.updatedSuccessfully'));
    }

    public function destroy($id) {
        FrontIconFeature::destroy($id);
        return Reply::success(__('messages.recordDeleted'));
    }
}
