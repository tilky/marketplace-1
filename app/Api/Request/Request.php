<?php

namespace App\Api\Request;


use App\Api\Response\ExceptionSerializer;
use App\Api\Response\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

/**
 * API request base class
 */
abstract class Request
{

    /**
     * HTTP request
     *
     * @var \Illuminate\Http\Request
     */
    protected $httpRequest;

    /**
     * Decides whether the request will be resolved.
     * If the request should not run, returns the error message. Otherwise returns true.
     *
     * @return true|string
     */
    protected function shouldResolve()
    {
        return true;
    }

    /**
     * Returns validation rules for the request parameters
     *
     * @param Collection $parameters
     * @param Validator  $validator
     *
     * @return array
     */
    protected function rules(
        Collection $parameters,
        Validator $validator = null
    )
    {
        return [];
    }

    /**
     * Returns validation rules for the request parameters. Should be used by abstract classes and should always
     * concatenate result with parent implementation
     *
     * @param Collection $parameters
     * @param Validator  $validator
     *
     * @return array
     */
    protected function _rules(
        Collection $parameters,
        Validator $validator = null
    )
    {
        return $this->rules($parameters, $validator);
    }

    /**
     * Returns an array of parameters that are JSON and should be converted to an array
     *
     * @return string[]
     */
    protected function jsonParameters()
    {
        return [];
    }

    /**
     * @param \Illuminate\Http\Request $httpRequest
     */
    public function setHttpRequest(HttpRequest $httpRequest)
    {
        $this->httpRequest = $httpRequest;
    }

    /**
     * This function is called only when all validation passed.
     * Should return a Response.
     *
     * @param            $name
     * @param Collection $parameters
     *
     * @return Response
     * @throws ValidationException
     */
    protected abstract function doResolve($name, Collection $parameters);

    /**
     * Call this to resolve the request and get a Response instance
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return Response
     * @internal param $url
     */
    public final function resolve($name, $parameters)
    {
        $jsonParameters = $this->jsonParameters();
        foreach ($jsonParameters as $key) {
            $parameters[$key] = json_decode($parameters[$key], true);
        }

        if ( ! $parameters instanceof Collection) {
            $parameters = Collection::make($parameters);
        }

        try {
            if (($errorMsg = $this->shouldResolve()) !== true) {
                $response = new Response(false, $errorMsg);
                $response->setName($name);

                return $response;
            }

            $validator = \Validator::make($parameters->all(), []);
            $validator->addRules($this->_rules($parameters, $validator));
            $validator->validate();

            $response = $this->doResolve($name, $parameters);
            $response->setName($name);

            return $response;
        } catch (ValidationException $e) {
            $response = new Response(false, [
                'validation' => $e->errors(),
            ]);

            $response->setName($name);

            return $response;
        } catch (\Exception $e) {
            $response = new Response(false, [
                'exception' => (new ExceptionSerializer($e))->toArray(),
            ]);

            $response->setName($name);

            return $response;
        }
    }

    /**
     * @throws AuthorizationException
     */
    protected function authorizationError()
    {
        throw new AuthorizationException("User not authorized.", 403);
    }
}