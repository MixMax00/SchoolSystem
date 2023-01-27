<?php

function image_upload ($image,$directory,$width,$height){
//    $image = $request->file('image');
    $imageName = uniqid().$image->getClientOriginalName();
//    $directory = 'assets/backend/img/general_settings/';
    $imageUrl = $directory.$imageName;
    \Intervention\Image\Facades\Image::make($image)->resize($width, $height)->save($imageUrl);

    return $imageUrl;
}

function file_upload ($file,$directory){
//    $image = $request->file('image');
    $fileName = uniqid().$file->getClientOriginalName();
//    $directory = 'assets/backend/img/general_settings/';
    $fileUrl = $directory.$fileName;
    $file -> move($directory,$fileName);
    return $fileUrl;
}
