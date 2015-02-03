<?php


namespace Verdikt\States;


use Verdikt\Contracts\StateDisplayerContract;
use \View;

class StateDisplayer implements StateDisplayerContract {


    protected $states = [];
    protected $class  = '';

    /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------

    /**
     * @param string $states
     */
    public function setState($state)
    {
        $this->states[] = $state;
    }

    // ------------------------------------------------------------------------------------------------

    /**
     * @param string $states
     */
    public function setStates($states)
    {
        $this->states = $states;
    }


    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------


    public function getRenderStateMenu($template = 'admin.form.state.menu')
    {
        return \View::make($template, [
            'states' => $this->getTableState(),
            'action' => $this->class.'@'
        ]);
    }


    // ------------------------------------------------------------------------------------------------

    protected function getTableState()
    {
        $table = [];

        foreach ($this->states as $state)
        {
            $config = \Config::get('state.' . $state);

            if (!empty($config))
            {
                $table[] = $config;
            }
        }

        return $table;
    }

} 