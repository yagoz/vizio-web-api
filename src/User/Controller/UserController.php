<?php
namespace User\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\Capsule\Manager as Capsule;
use User\Model\User;

class UserController
{    
    public function indexAction(Request $request)
    {

        $user = 'Leer las instrucciones en el README.txt';
        $response = $user;
        return $response;
    }

    public function createAction(Request $request)
    {
        $user = new User;
        $user->fill($request->request->all());
        $user->save();

        $response = $user;
        return $response;
    }

    public function updateAction(Request $request, $userId)
    {
        $user = User::find($userId);

        if(!$user){
            throw new HttpException(400, 'User not found'); 
        }
        
        $user->fill($request->request->all());

        $user->save();

        $response = $user;
        return $response;
    }

    public function deleteAction(Request $request, $userId)
    {

        $user = User::find($userId);
        if(!$user){
            throw new HttpException(400, 'User not found');
        }
        $response = "User deleted " . $user->id;

        $user->delete();
        
        return $response;
    }

    public function uploadImageAction(Request $request, $userId)
    {

        if(isset($request->files)) {
            $image = $request->files->get('picture');
        }

        if($image->getError()) {
            throw new HttpException(400, 'Error retrieving image');
        }

        if(!$this->validateImage($image)) {
            throw new HttpException(400, 'Not valid image. Only jpeg images allowed.');
        }

        $user = User::find($userId);
        $user->saveImage($image);
        $user->save();

        $response = $user;

        return $response;
    }

    public function getAction(Request $request, $userId)
    {
        $user = User::find($userId);

        if(!$user){
            throw new HttpException(404, 'User not found');
        }
        
        return $user;
    }

    public function listAction(Request $request)
    {
        $users = User::all();

        if(!$users){
            throw new HttpException(404, 'Users not found');
        }
        
        return $users;
    }

    private function validateImage($image)
    {
        if(in_array($image->getMimeType(), array('image/jpeg')))
        {
            return true;
        }

        return false;
    }
}
