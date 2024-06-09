<?php
class Inputs
{
    private array $inputs;
    public function __construct()
    {
        $this->inputs = [];
    }

    public function displayAll()
    {
        foreach ($this->inputs as $x)
        {
            echo "{$x->getContent()} {$x->getErrorMsg()} <br>";
        }
    }
    public function updateContent()
    {
        if(!isset($_SESSION['user']))
            return;

        foreach ($_SESSION['user'] as $id => $val)
        {
            $this->getInput($id)->setContent($_SESSION['user'][$id]);
        }
    }
    public function updateErrorMsgs()
    {
        foreach ($this->inputs as $x)
        {
            $content = $x->getContent();

            if ($content == '')
            {
                $x->setErrorMsg('*required');
            }
            else
            {
                $x->setErrorMsg('');
            }
        }
    }

    public function getInput($id)
    {
        if (empty($this->inputs))
            return null;

        foreach ($this->inputs as $x)
            if ($id == $x->getID())
                return $x;
        
        return null;
    }
    public function add($id, $type, $required)
    {
        if (! ($this->checkID($id) && $this->checkType($type)))
        {
            echo "invalid id or type";
            return 0;
        }

        $this->inputs[] = new Input($id, $type, $required);
        return 1;
    }

    private function checkID($id)
    {
        if (empty($this->inputs))
            return 1;

        foreach ($this->inputs as $x)
            if ($id == $x->getID())
                return 1;

        return 0;
    }

    private function checkType($type)
    {
        global $INPUT_TYPES;
        foreach ($INPUT_TYPES as $x)
            if ($type == $x)
                return 1;
        
        return 0;
    } 
}
class Input
{
    private string $content;
    private string $type;
    private string $id;
    private bool $required;
    private string $errorMsg;

    function __construct($id, $type, $required)
    {
        $this->content = '';
        $this->id = $id;
        $this->required = $required;
        $this->type = $type;
        $this->errorMsg = '';
    }

    public function setErrorMsg($msg)
    {
        $this->errorMsg = $msg;
    }
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }
    public function getRequired()
    {
        return $this->required;
    }
    public function getID()
    {
        return $this->id;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setContent($content)
    {
        $this->content = $content;
    }
}

global $inputs;
$inputs = new Inputs();

global $INPUT_TYPES;
$INPUT_TYPES = [
    'name',
    'number',
    'email',
    'password'
];

global $ERROR_MSGS;
$ERROR_MSGS = [
    'required' => '*required',
    'invalid' => '*invalid input'
];