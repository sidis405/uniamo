<?php

namespace Uniamo\Utils;

use Storage;

class FileUtility {

    
    protected $paths = [

                        'news_immagine' => 
                            [
                                'folder' => 'news',
                                'disk' => 'public_images'
                            ],

                        'news_allegati' => 
                            [
                                'folder' => 'news',
                                'disk' => 'public_allegati'
                            ],

                        'pages_immagine' => 
                            [
                                'folder' => 'pages',
                                'disk' => 'public_images'
                            ],

                        'pages_allegati' => 
                            [
                                'folder' => 'pages',
                                'disk' => 'public_allegati'
                            ],


                        ];

    public function putfile($prodotto_id, $type, $file, $data = [])
    {
        $filename = $this->makeFilename($prodotto_id, $type, $file, $data);
        
        if(Storage::disk($this->paths[$type]['disk'])->put($filename, file_get_contents($file->getRealPath()))){
            return $filename;
        }

        return false;

    }

    public function getFile($path)
    {
        if(Storage::disk('uploads')->has($path)){

            $mimetype = Storage::disk('uploads')->mimeType($path);
            $contents = Storage::disk('uploads')->get($path);

            return ['mimetype' => $mimetype, 'contents' => $contents];

        }

        return false;
    }

    protected function makeFilename($prodotto_id, $type, $file , $data)
    {
        

        return $this->paths[$type]['folder'] . '/' . $type. '-' . $this->makeId($prodotto_id) . '-' . $file->getClientOriginalName();
    }

    protected function makeId($prodotto_id)
    {
        return md5(bcrypt(microtime()));
    }

}