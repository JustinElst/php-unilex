<?php

namespace Remorhaz\UniLex\Parser\SyntaxTree;

use Remorhaz\UniLex\Exception;

class Node
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
     * @return Node
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

    /**
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function getAttribute(string $name)
    {
        if (!isset($this->attributeMap[$name])) {
            throw new Exception("Attribute '{$name}' is not defined in syntax tree node {$this->getId()}");
        }
        return $this->attributeMap[$name];
    }

    public function addChild(Node $node): self
    {
        $this->childMap[] = $node;
        return $this;
    }

    /**
     * @return Node[]
     */
    public function getChildList(): array
    {
        return $this->childMap;
    }
}
