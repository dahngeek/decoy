<?php

namespace Bkwld\Decoy\Markup;

use Illuminate\Pagination\UrlWindow as LaravelUrlWindow;

/**
 * Sub class UrlWindow so I can control the size of the window to make it
 * smaller on mobile
 */
class UrlWindow extends LaravelUrlWindow {

    /**
     * How many links to show on the edges
     *
     * @var integer
     */
    protected $edge_count = 2;

    /**
     * Set edge count
     *
     * @param  int  $edge_count
     * @return $this
     */
    public function setEdgeCount($edge_count)
    {
        $this->edge_count = $edge_count;
        return $this;
    }

    /**
     * Get the slider of URLs when too close to beginning of window.
     *
     * @param  int  $window
     * @return array
     */
    protected function getSliderTooCloseToBeginning($window)
    {
        return [
            'first'  => $this->paginator->getUrlRange(1, $window + max(1, $this->edge_count)),
            'slider' => null,
            'last'   => $this->getFinish(),
        ];
    }

    /**
     * Get the slider of URLs when too close to ending of window.
     *
     * @param  int  $window
     * @return array
     */
    protected function getSliderTooCloseToEnding($window)
    {
        $last = $this->paginator->getUrlRange(
            $this->lastPage() - ($window + max(1, $this->edge_count)),
            $this->lastPage()
        );

        return [
            'first'  => $this->getStart(),
            'slider' => null,
            'last'   => $last,
        ];
    }

    /**
     * Get the starting URLs of a pagination slider.
     *
     * @return array
     */
    public function getStart()
    {
        return $this->paginator->getUrlRange(1, $this->edge_count);
    }

    /**
     * Get the ending URLs of a pagination slider.
     *
     * @return array
     */
    public function getFinish()
    {
        return $this->paginator->getUrlRange(
            $this->lastPage() - $this->edge_count + 1,
            $this->lastPage()
        );
    }

}
