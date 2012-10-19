<?php
/*
 * @TODO: Make a name propery for link path twig purposes,
 * or solve this in some way!!
 */
namespace Quant\Utilities\MongoRouterBundle\Document;

class Route
{
    protected $pattern;
    protected $destinationParameters;
    protected $destinationController;
    protected $destinationAction;
    protected $priority;
    protected $postRequired;
    protected $active;
    protected $name;
    /**
     * @var MongoId $id
     */
    protected $id;


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pattern
     *
     * @param string $pattern
     * @return Route
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * Get pattern
     *
     * @return string $pattern
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set destinationParameters
     *
     * @param string $destinationParameters
     * @return Route
     */
    public function setDestinationParameters($destinationParameters)
    {
        $this->destinationParameters = $destinationParameters;
        return $this;
    }

    /**
     * Get destinationParameters
     *
     * @return string $destinationParameters
     */
    public function getDestinationParameters()
    {
        return $this->destinationParameters;
    }

    /**
     * Set destinationController
     *
     * @param string $destinationController
     * @return Route
     */
    public function setDestinationController($destinationController)
    {
        $this->destinationController = $destinationController;
        return $this;
    }

    /**
     * Get destinationController
     *
     * @return string $destinationController
     */
    public function getDestinationController()
    {
        return $this->destinationController;
    }

    /**
     * Set destinationAction
     *
     * @param string $destinationAction
     * @return Route
     */
    public function setDestinationAction($destinationAction)
    {
        $this->destinationAction = $destinationAction;
        return $this;
    }

    /**
     * Get destinationAction
     *
     * @return string $destinationAction
     */
    public function getDestinationAction()
    {
        return $this->destinationAction;
    }

    /**
     * Set priority
     *
     * @param int $priority
     * @return Route
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * Get priority
     *
     * @return int $priority
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set postRequired
     *
     * @param boolean $postRequired
     * @return Route
     */
    public function setPostRequired($postRequired)
    {
        $this->postRequired = $postRequired;
        return $this;
    }

    /**
     * Get postRequired
     *
     * @return boolean $postRequired
     */
    public function getPostRequired()
    {
        return $this->postRequired;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Route
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean $active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Route
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
}
