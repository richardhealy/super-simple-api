<?php
namespace Vanilla\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class IndexController extends BaseController
{
    public function load(Request $request, Application $app) {

        return json_encode(
            array('message' => 'hi!')
        );

    }
}
