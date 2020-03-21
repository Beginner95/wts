<?php

namespace App\Http\Controllers;

use App\Email;
use App\Http\UploadFile;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'phone' => '',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if (!empty($request->file)) {
            $fileName = $this->getFileName();
            if ($fileName === false) {
                return back()->with('errors', 'Недопустимый формат файла');
            }

            $data['file'] = $fileName;
        }

        Mail::to('vaha-22@mail.ru​')->send(new ContactForm($data));

        $this->saveMessage($data);

        return redirect('/')->with('success', 'Письмо успешно отправлено');
    }

    public function getFileName()
    {
        $file = request()->file('file');
        $fileExtension = $file->getClientOriginalExtension();
        $validFileFormats = config('settings.valid_file_formats');
        $fileName = $file->hashName();

        if (!in_array($fileExtension, $validFileFormats)) {
            return false;
        }

        if (!$file->isValid()) {
            return false;
        }

        $file->move(config('settings.folder_email_files'), $fileName);

        return $fileName;
    }

    public function saveMessage($data)
    {
        return Email::create($data);
    }
}
