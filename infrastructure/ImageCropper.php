<?php

namespace infrastructure;

use App\Models\Images\Image;
use Illuminate\Support\Facades\Config;
use infrastructure\Facades\FileFacade;
use Intervention\Image\ImageManager;
use infrastructure\Facades\ImageCropperFacade;

/**
 * Created by VS  CODE.
 * User: Supun
 * Date: 11/18/19
 * Time: 10:47 AM
 */

class ImageCropper
{
    const CROP = "/crop";
    const THUMB = "/thumb";
    const CROP_50 = "/thumb/50x50";
    const CROP_100 = "/thumb/100x100";
    const CROP_300 = "/thumb/300x300";
    protected $upload_path;
    public function __construct()
    {
        $this->upload_path =  storage_path('app/public/uploads/images');
    }

    public function up($image, $dimensions)
    {
        if ($image) {
            //get filename with extension
            $filename_with_extension = $image->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filename_with_extension, PATHINFO_FILENAME);

            //get file extension
            $extension = $image->getClientOriginalExtension();

            //filename to store
            $filename_to_store = FileFacade::makeName($image);

            /**
             * * Original image
             */
            $image->move($this->upload_path . '/', $filename_to_store);

            if (!is_dir($this->upload_path . self::CROP)) {
                mkdir($this->upload_path . self::CROP, 0755);
            }
            if (!is_dir($this->upload_path . self::THUMB)) {
                mkdir($this->upload_path . self::THUMB, 0755);
            }
            if (!is_dir($this->upload_path . self::CROP_50)) {
                mkdir($this->upload_path . self::CROP_50, 0755);
            }
            if (!is_dir($this->upload_path . self::CROP_100)) {
                mkdir($this->upload_path . self::CROP_100, 0755);
            }
            if (!is_dir($this->upload_path . self::CROP_300)) {
                mkdir($this->upload_path . self::CROP_300, 0755);
            }
            // crop image
            $manager = new ImageManager(array('driver' => Config::get('images.driver')));

            $img = $manager->make($this->upload_path . '/' . $filename_to_store);

            $crop_path = $this->upload_path . self::CROP . '/' . $filename_to_store;
            $crop_path_50 = $this->upload_path . self::CROP_50 . '/' . $filename_to_store;
            $crop_path_100 = $this->upload_path . self::CROP_100 . '/' . $filename_to_store;
            $crop_path_300 = $this->upload_path . self::CROP_300 . '/' . $filename_to_store;

            /** 
             * * Cropper size
             */
            $img->crop((int) $dimensions['w'], (int) $dimensions['h'], (int) $dimensions['x1'], (int) $dimensions['y1']);
            $img_50 = $img_100 = $img_300  = $img;
            $img->save($crop_path);

            /** 
             * * Resize 50*50 size
             */
            $img_50->resize(50, 50);
            $img_50->save($crop_path_50);

            /** 
             * * Resize 100*100 size
             */
            $img_100->resize(100, 100);
            $img_100->save($crop_path_100);

            /** 
             * * Resize 300*300 size
             */
            $img_300->resize(300, 300);
            $img_300->save($crop_path_300);

            $output = $this->storeToDb($filename_to_store);
            return ['status' => 1, 'data' => $output];
        }
        return ['status' => 0, 'data' => ''];
    }

    public function storeToDb($image)
    {
        return Image::create([
            'name' => $image,
            // 'status' => 1,
        ]);
    }
}
