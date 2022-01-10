<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    private static $main;

    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;

    protected static function getImageURL($request)
    {
        self::$image = $request->file('image');
        if(self::$image)
        {
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'user-images/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory. self::$imageName;
        }
        else {
            return '';
        }
    }

    public static function newMain($request)
    {
        self::$main = new Main();
        self::$main->name       = $request->name;
        self::$main->email      = $request->email;
        self::$main->password   = $request->password;
        self::$main->mobile     = $request->mobile;
        self::$main->image      = self::getImageUrl($request);
        self::$main->save();
    }

    public static function updateUser($request)
    {
        self::$main = Main::find($request->id);
        if($request->file('image'))
        {
            if(file_exists(self::$main->image))
            {
                unlink(self::$main->image);
            }
            self::$imageUrl = self::getImageURL($request);
        }
        else
        {
            self::$imageUrl = self::$main->image;
        }
        self::$main->name       = $request->name;
        self::$main->email      = $request->email;
        self::$main->password   = $request->password;
        self::$main->mobile     = $request->mobile;
        self::$main->image      = self::$imageUrl;
        self::$main->save();
    }

    public static function deleteUser($id)
    {
        self::$main = Main::find($id);
        if(file_exists(self::$main->image))
        {
            unlink(self::$main->image);
        }
        self::$main->delete();
    }
}
