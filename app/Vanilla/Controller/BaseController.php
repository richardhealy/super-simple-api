<?php
namespace Vanilla\Controller;

use Silex\Application;

class BaseController
{
	private $validator = null;

	public function validate(Application $app, $input) {

		$this->validator = $app['validator'];

		if (count($input) == 0) {
			return false;
		}

		$returnValue = true;
		foreach ($input as $test) {

			if (isset($test['value']) && isset($test['constraint'])) {

				$errors = $this->validator->validateValue($test['value'], $test['constraint']);	

				if (count($errors) > 0) {
					$returnValue = (string) $errors;
				}
			}
		}

		return $returnValue;
	}
}