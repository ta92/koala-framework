<?php
/**
 * Plugin Interface that can process the view output *before* all child components are rendered
 *
 * gets called also for cached contents
 */
interface Kwf_Component_Plugin_Interface_ViewBeforeChildRender
{
    public function processOutput($output);
}
