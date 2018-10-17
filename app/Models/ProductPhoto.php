<?php

namespace CodeShopping\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class ProductPhoto extends Model
{
    const BASE_PATH = 'app/public';
    const DIR_PRODUCTS = 'products';

    const PRODUCTS_PATH = self::BASE_PATH . '/' . self::DIR_PRODUCTS;

    protected $fillable = [
        'file_name',
        'product_id'
    ];

    public static function photosPath($productId){
        $path = self::PRODUCTS_PATH;
        return storage_path("{$path}/{$productId}");
    }

    public static function uploadFiles($productId, array $files){
        $dir = self::photosDir($productId);
        /** @var UploadedFile $file */
        foreach ($files as $file){
            $file->store($dir,['disk'=>'public']);
        }
    }

    public static function photosDir($productId){
        $dir = self::DIR_PRODUCTS;
        return "{$dir}/{$productId}";
    }

    public function getPhotoUrlAttribute(){
        $path = self::photosDir($this->product_id);
        return asset("algumacoisa/{$path}/{$this->file_name}");
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
