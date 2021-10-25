<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\AdminAddImagesRequest;
use App\Mail\galleryNotification;
use App\Mail\PdfSender;
use App\Models\Image;
use App\Models\Wedding;
use App\Models\Weddings_email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;

class GalleryController extends Controller
{


    public function addImages($id, AdminAddImagesRequest $request)
    {

        if ($wedding = Wedding::find($id)) {
            $uploadedFile = $request->file('file');
            if ($uploadedFile->extension() == 'mp4') {
                $name = Str::random(32) . '.mp4';
                $type = 'file';
            } else {
                $name = Str::random(32) . '.png';
                $type = 'image';
            }
            Storage::disk('local')->putFileAs(
                'public/gallery/' . $wedding->token,
                $uploadedFile,
                $name
            );
            Image::create(['wedding' => $wedding->id, 'path' => 'public/storage/gallery/' . $wedding->token . "/" . $name, 'type' => $type]);
            return 1;
        } else
            return 0;

    }

    public function deleteImages($id)
    {
        if ($wedding = Wedding::find($id)) {

            $message = new MessageBag();
            $message->add('success', 'Pomyślnie wyczyszczono galerię!');
            Storage::disk('local')->deleteDirectory('public/gallery/' . $wedding->token);
            $wedding->images()->delete();
            return $message->jsonSerialize();
        } else return abort(404);

    }

    public function sendNotifications($id)
    {
        $message = new MessageBag();
        if ($wedding = Wedding::find($id)) {


            $message->add('success', 'Pomyślnie wysłano powiadomienia!');
            foreach ($wedding->emails()->get() as $email) {
                Mail::to($email)->send(new galleryNotification($wedding));

            }
            Mail::to($wedding->groom_email)->send(new galleryNotification($wedding));
            Mail::to($wedding->bride_email)->send(new galleryNotification($wedding));
            return $message->jsonSerialize();
        } else  return abort(404);
    }
}
