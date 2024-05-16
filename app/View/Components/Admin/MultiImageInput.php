<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class MultiImageInput extends Component
{
    private $galleryNameKey;
    private $maxImages;
    /**
     * @var array
     */
    private $images;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($galleryNameKey,$maxImages = 4,$images = [])
    {
        $this->galleryNameKey = $galleryNameKey;
        $this->maxImages = $maxImages;
        $this->images = $images;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('Components.admin.multi-image-input', [
            'galleryNameKey' => $this->galleryNameKey,
            'maxImages' => $this->maxImages,
            'images' => $this->images,
        ]);
    }
}
