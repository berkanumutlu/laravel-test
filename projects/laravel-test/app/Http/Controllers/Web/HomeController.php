<?php
// php artisan make:controller Web/HomeController
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //Debugbar::startMeasure('render', 'Time for HomeController rendering');
        $name = 'berkan';
        $age = 25;
        $person = new \stdClass();
        $person->name = $name;
        $person->age = $age;
        //return view('web.home.index', ['name_view' => $name]);
        //return view('web.home.index', compact('name'));
        //return view('web.home.index')->with('name', $name)->with('age', $age);
        //return view('web.home.index')->with(['name' => $name, 'age' => $age]);
        /*
         * Request - Retrieving the Request Path
         * e.g. http://example.com/foo/bar, path => foo/bar
         */
        $uri = $request->path();
        /*
         * Request - Inspecting the Request Path / Route
         */
        if ($request->is('admin/*') || $request->routeIs('admin.*')) {
            // ...
        }
        /*
         * Request - Retrieving the Request URL
         */
        $url = $request->url();
        $urlWithQueryString = $request->fullUrl();
        $fullUrlWithQuery = $request->fullUrlWithQuery(['type' => 'phone']);
        $fullUrlWithoutQuery = $request->fullUrlWithoutQuery(['type']);
        /*
         * Request - Retrieving the Request Host
         */
        $host = $request->host();
        $httpHost = $request->httpHost();
        $schemeAndHttpHost = $request->schemeAndHttpHost();
        /*
         * Request - Retrieving the Request Method
         */
        $requestMethod = $request->method();
        $requestIsMethodGet = $request->isMethod('get');
        $requestIsMethodPost = $request->isMethod('post');
        $bearerToken = $request->bearerToken();
        /*
         * Request - IP Address
         */
        $ipAddress = $request->ip();
        $ipAddresses = $request->ips();
        /*
         * Request - Content Negotiation
         */
        $contentTypes = $request->getAcceptableContentTypes();
        if ($request->accepts(['text/html', 'application/json'])) {
            // ...
        }
        $preferred = $request->prefers(['text/html', 'application/json']);
        if ($request->expectsJson()) {
            // ...
        }
        /*
         * Request - Retrieving a Portion of the Input Data
         */
        $input = $request->only(['username', 'password']);
        $input = $request->only('username', 'password');
        $input = $request->except(['credit_card']);
        $input = $request->except('credit_card');
        $request->whenHas('name', function (string $input) {
            // The "name" value is present...
        }, function () {
            // The "name" value is not present...
        });
        $request->whenFilled('name', function (string $input) {
            // The "name" value is filled...
        }, function () {
            // The "name" value is not filled...
        });
        if ($request->missing('name')) {
            // ...
        }
        /*$request->whenMissing('name', function (array $input) {
            // The "name" value is missing...
        }, function () {
            // The "name" value is present...
        });*/
        /*
         * Request - Merging Additional Input
         */
        $request->merge(['votes' => 0]);
        $request->mergeIfMissing(['votes' => 0]);
        /*
         * Request - Input Trimming and Normalization
         */
        \App\Http\Middleware\TrimStrings::skipWhen(function (Request $request) {
            return $request->is('admin/*');
        });
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::skipWhen(function (Request $request) {
            // ...
        });
        /*
         * Request - Retrieving Uploaded Files
         */
        $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            // ...
        }
        /*if ($request->file('photo')->isValid()) {
            $path = $request->photo->path();
            $extension = $request->photo->extension();
            $path = $request->photo->store('images');
            $path = $request->photo->store('images', 's3');
            $path = $request->photo->storeAs('images', 'filename.jpg');
            $path = $request->photo->storeAs('images', 'filename.jpg', 's3');
        }*/
        /*
         * Writing Log Messages
         */
        $message = 'This is a log message';
        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);
        return view('web.home.index', compact([
            'person', 'name', 'age', 'uri', 'url', 'urlWithQueryString', 'fullUrlWithQuery', 'fullUrlWithoutQuery',
            'host', 'httpHost', 'schemeAndHttpHost', 'requestMethod', 'requestIsMethodGet', 'requestIsMethodPost',
            'bearerToken', 'ipAddress', 'ipAddresses'
        ]));
        //Debugbar::stopMeasure('render');
    }
}
