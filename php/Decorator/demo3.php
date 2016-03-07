<?php

interface IRender{
    public function renderData();
}

class Webservice implements IRender{
    
    private $data;
    
    public function __construct($data=null) {
        $this->data = $data;
    }
    
    public function renderData() {
        return $this->data;
    }    
}


abstract class RenderDecorator implements IRender{
    protected $wrapper;
    
    public function __construct(IRender $wrapper) {
        $this->wrapper = $wrapper;
    }
    
}

class RenderInXml extends RenderDecorator {
    
    private $output;
    
    public function renderData() {
        $this->output = $this->wrapper->renderData();
        $doc = new DOMDocument();

        foreach ($this->output as $key => $val) {
            $doc->appendChild($doc->createElement($key, $val));
        }

        return $doc->saveXML();
    }    
}

class RenderInJson extends RenderDecorator {
    private $output;
    
    public function renderData() {
        $this->output = $this->wrapper->renderData();
        return json_encode($this->output);
    }    
}

$data = array(
    "id" => "10001",
    "name" => "jack",
    "age" => "22"
);

$webservice = new Webservice($data);

$xml = new RenderInXml($webservice);
echo $xml->renderData();

$json = new RenderInJson($webservice);
echo $json->renderData();















?>
