<?php

namespace App\Http\Controllers\SaasFront;

use App\Http\Controllers\Controller;
use App\LanguageSetting;
use App\ThemeSetting;
use Illuminate\Support\Facades\App;

class SaasFrontBaseController extends Controller
{
    /**
     * @var array
     */
    public $data = [];

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    /**
     * UserBaseController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->adminTheme = ThemeSetting::whereNull('company_id')->first();
        $this->companyName = $this->global->company_name;
        $this->languages = LanguageSetting::where('status', 'enabled')->orderBy('language_name', 'asc')->get();

        if (request()->hasCookie('language_code')) {
            App::setLocale(decrypt(request()->cookie('language_code'), false));
        }
        else {
            App::setLocale($this->global->locale);
        }

    }
}
