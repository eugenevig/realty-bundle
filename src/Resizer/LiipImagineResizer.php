<?php

namespace App\Resizer;

use Sonata\MediaBundle\Model\MediaInterface;
use Sonata\MediaBundle\Resizer\ResizerInterface;
use Gaufrette\File;
use Imagine\Image\Box;

class LiipImagineResizer implements ResizerInterface
{
    public function resize(MediaInterface $media, File $in, File $out, string $format, array $settings): void
    {
        if (!$in->exists()) {
            return;
        }

        $out->setContent($in->getContent());
    }

    public function getBox(MediaInterface $media, array $settings): Box
    {
        return new Box($settings['width'], $settings['height']);
    }
}
