<?php
namespace SONRest\Service;

use Zend\Http\Response;
class ProcessJson
{

    private $response;
    private $data;
    private $serializer;

    public function __construct(Response $response = null, $data=null, $serializer = null)
    {
        $this->response = $response;
        $this->data = $data;
        $this->serializer = $serializer;
    }

    public function process()
    {
        $serializer = $this->serializer;
        $result = $serializer->serialize($this->data, 'json');

        $this->response->setContent($result);

        $headers = $this->response->getHeaders();
        $headers->addHeaderLine('Content-type','application/json');
        $this->response->setHeaders($headers);

        return $this->response;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $serializer
     */
    public function setSerializer($serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @return mixed
     */
    public function getSerializer()
    {
        return $this->serializer;
    }



} 