<?php

namespace Remorhaz\UniLex\RegExp;

use Remorhaz\UniLex\Exception;

class SyntaxTreeNode
{

    private $id;

    private $name;

    private $attributeMap = [];

    private $childMap = [];

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @param $value
     * @return SyntaxTreeNode
     * @throws Exception
     */
    public function setAttribute(string $name, $value): self
    {
        if (isset($this->attributeMap[$name])) {
            throw new Exception("Attribute '{$name}' is already defined in syntax tree node {$this->getId()}");
        }
        $this->attributeMap[$name] = $value;
        return $this;
    }

    public function addChild(SyntaxTreeNode $node): self
    {
        $this->childMap[] = $node;
        return $this;
    }
}
