<?php
namespace App\Helper\src;

use App\Helper\Helper;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Helper
{
    protected $drive = 'public';
    protected $type = 'image'; // image or base64
    protected $path;
    protected $input;

    public function upload()
    {
        return Storage::disk($this->drive)->put("{$this->path}", $this->input);
    }

    public function path($path)
    {
        $this->path = $path;
        return $this;
    }

    public function input($input)
    {
        $this->input = $input;
        return $this;
    }
}
