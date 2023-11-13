<?php
    namespace App\Traits;
    use Illuminate\Http\Request;

    trait UploadImage
    {
        function ulpoadImages( $file , $folderName )
        {
            $photo = $file->getClientOriginalName();
            $path  = $file->store( $folderName , 'osama');
            return $path;
        }

        function test  (Request $request)
        {
          // $photo = $request->photo->getClientOriginalName();
          $photo = $request->file('photo')->getClientOriginalName();
          $path  = $request->file('photo')->store( 'users' , 'osama');              // save as random Name
          // $path  = $request->file('photo')->storeAs('users' , $photo , 'osama');      // Save As Same Name Image
        }
    }
