<?php

use Illuminate\Support\Facades\Storage;
// upload image
if (!function_exists('uploadImage ')) {
    function uploadImage($image, $path, $old_image = null)
    {
        if ($old_image) {
            deleteImage($old_image);
        }
        return $image->store($path, 'public');
    }

    // delete image
    if (!function_exists('deleteImage ')) {
        function deleteImage($image)
        {
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        }
    }
}
// display image
if (!function_exists('displayImage')) {
    function displayImage($object)
    {
        if (Storage::exists('public/' . $object)) {
            return asset('storage/' . $object);
        }
        return asset($object);
    }
}
// get model data
if (!function_exists('getModel')) {

    function getModel($model, array $params)
    {
        return $model::get($params);
    }
}



if (!function_exists('responseSuccessData')) {
    function responseSuccessData($data, string $message = 'Success', int $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
            'data'       => $data,
        ], $status);
    }
}

if (!function_exists('responseSuccessMessage')) {
    function responseSuccessMessage(string $message = 'Success', int $status = 200)
    {
        return response()->json([
            'statusType' => true,
            'status'     => $status,
            'message'    => $message,
        ], $status);
    }
}

if (!function_exists('responseErrorMessage')) {
    function responseErrorMessage($error, int $status = 400)
    {
        return response()->json([
            'statusType' => false,
            'status'     => $status,
            'error'      => $error,
        ], $status);
    }
}
