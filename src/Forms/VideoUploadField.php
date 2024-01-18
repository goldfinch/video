<?php

namespace Goldfinch\Video\Forms;

use SilverStripe\AssetAdmin\Forms\UploadField;

class VideoUploadField
{
    public static $fields;
    public static $parent;
    public static $name;
    public static $title;
    public static $record;

    public function __construct(...$args)
    {
        $name = $args[0];
        $title = $args[1];
        $fieldList = $args[2];
        $parent = $args[3];

        self::$name = $name;
        self::$title = $title;
        self::$parent = $parent;
        self::$record = $parent;

        $field_enable = CheckboxField::create(
            $name . '_enable',
            'Enable ' . $title,
        )->setDescription(
            'Before uploading your .mp4, make sure to compress it. You can use online free tool to do so <a href="https://www.freeconvert.com/video-compressor" target="_blank">freeconvert.com</a> / <a href="https://www.mp4compress.com/" target="_blank">mp4compress.com</a>',
        );

        $field_MP4 = UploadField::create(
            $name . '_mp4',
            $title . ' (mp4)',
        )->setDescription(
            'Before uploading your .mp4, make sure to compress it. You can use online free tool to do so <a href="https://www.freeconvert.com/video-compressor" target="_blank">freeconvert.com</a> / <a href="https://www.mp4compress.com/" target="_blank">mp4compress.com</a>',
        );

        $field_WEBM = UploadField::create(
            $name . '_webm',
            $title . ' (webm)',
        )->setDescription('You can also supply same video in .webm format');

        self::$fields = [$field_enable, $field_MP4, $field_WEBM];
    }

    public function getFields()
    {
        return self::$fields;
    }

    public static function create(...$args): static
    {
        return new static(...$args);
    }
}
