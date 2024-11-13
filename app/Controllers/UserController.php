<?php
namespace App\Controllers;

use \App\Libraries\OAuth;
use App\Models\UserModel;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $modelName = 'App\Models\UserModel'; // Specify what model this controller uses
    protected $format = 'json'; // Specify format
    use ResponseTrait;

    public function index()
    {
        // THIS IS FOR TESTING. DO NOT WRITE METHODS THAT DEPEND ON THIS METHOD

        // Retrieve all users from the database, you may also call stored procedures here
        $users = $this->model->findAll();
        // Return the list using the respond function
        return $this->respond($users);
    }

    public function userLogin()
    {
        $user = new UserModel();
        $email = $this->request->getJSON()->email;
        $password = $this->request->getJSON()->password;
        log_message('debug', "Email: ". $email . " password: ". $password);

        // call login method
        $user_data = $user->login($email, $password);

        log_message('debug', 'returned from stored procedure: '. print_r($user_data, true));

        // check the result
        if($user_data->user_id){

            return $this->respond([
                'user_id' => $user_data->user_id,
                'message' => 'Login successful'
            ], 200, 'application/json');
        
        } else {
            return $this->respond([
                'message' => 'Invalid email or password'
            ], 401);
        }
    }

    // Delete a user function
    public function delete($id = null)
    {
        // Check if the user exists
        $user = $this->model->find($id);
        if (!$user) {
            return $this->failNotFound('User not found.');
        }

        // Attempt to delete the user
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id, 'message' => 'User deleted successfully.']);
        } else {
            return $this->fail('Failed to delete user.');
        }
    }
}
