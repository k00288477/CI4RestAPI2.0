<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    // params create for testing - Thiago
    protected $table = 'oauth_users'; // Table name
    protected $primaryKey = 'user_id'; // Primary key

    protected $allowedFields = [
        'username',
        'email',
        'f_name',
        'l_name',
        'city',
        'country',
        'rank',
        'wasteLogScore',
        'password'
    ]; // Accessible fields


    public function login($email, $password){
        // Call stored procedure
        $this->db->query("Call loginValidation( ?, ?, @p_user_id)", [$email, $password]);

        // get the out param
        $query = $this->db->query("SELECT @p_user_id as user_id");

        log_message('debug', 'returned from UserModel::login: '. print_r($query->getRow(), true));

        // return the user_id
        return $query->getRow();
    }
}