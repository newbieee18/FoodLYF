<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn1($table, $phoneNumber)
    {
        $phoneNumber = $this->prepareData($phoneNumber);
        $this->sql = "select * from " . $table . " where phone = '" . $phoneNumber . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbPhone = $row['phone'];
            $dbid = $row['id'];
            if ($dbPhone == $phoneNumber) {
                $login = true;
                $_SESSION['phone']=$dbPhone;
                $_SESSION['id']=$dbid;
            } else $login = false;
        } else $login = false;

        return $login;
    }


    function logIn2($table, $phoneNumber)
    {
        $phoneNumber = $this->prepareData($phoneNumber);
        $this->sql = "select * from " . $table . " where phone = '" . $phoneNumber . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbPhone = $row['phone'];
            $dbid = $row['store_id'];
            if ($dbPhone == $phoneNumber) {
                $login = true;
                $_SESSION['phone']=$dbPhone;
                $_SESSION['id']=$dbid;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function logIn3($table, $phoneNumber, $status)
    {
        $phoneNumber = $this->prepareData($phoneNumber);
        $status = $this->prepareData($status);
        $this->sql = "select * from " . $table . " where phone = '" . $phoneNumber . "' and status = '" . $status . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbPhone = $row['phone'];
            $dbid = $row['id'];
            if ($dbPhone == $phoneNumber) {
                $login = true;
                $_SESSION['phone']=$dbPhone;
                $_SESSION['id']=$dbid;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function logIn4($table, $phoneNumber)
    {
        $phoneNumber = $this->prepareData($phoneNumber);
        $this->sql = "select * from " . $table . " where phone = '" . $phoneNumber . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbPhone = $row['phone'];
            $dbid = $row['id'];
            if ($dbPhone == $phoneNumber) {
                $login = true;
                $_SESSION['phone']=$dbPhone;
                $_SESSION['id']=$dbid;
            } else $login = false;
        } else $login = false;

        return $login;
    }

    function customerRegistration($table, $phoneNumber, $fullname, $address, $email)
    {
        $phoneNumber = $this->prepareData(htmlspecialchars_decode($phoneNumber));
        $fullname = $this->prepareData(htmlspecialchars_decode($fullname));
        $address = $this->prepareData(htmlspecialchars_decode($address));
        $email = $this->prepareData(htmlspecialchars_decode($email));

        $this->sql =
            "INSERT INTO " . $table . " (phone, fullname, email, address) VALUES ('".$phoneNumber."', '".$fullname."', '".$email."', '".$address."')";

        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
        

    }

    function riderApplication($table, $phone, $fullname, $gender, $birth_date, $email, $display_picture, $drivers_license, $nbi, $tin, $contact_person, $person_relationship, $person_number)
    {
        $phone = $this->prepareData(htmlspecialchars_decode($phone));
        $fullname = $this->prepareData(htmlspecialchars_decode($fullname));
        $gender = $this->prepareData(htmlspecialchars_decode($gender));
        $birth_date = $this->prepareData(htmlspecialchars_decode($birth_date));
        $email = $this->prepareData(htmlspecialchars_decode($email));
        $display_picture = $this->prepareData($display_picture);
        $drivers_license = $this->prepareData($drivers_license);
        $nbi = $this->prepareData($nbi);
        $tin = $this->prepareData($tin);
        $contact_person = $this->prepareData(htmlspecialchars_decode($contact_person));
        $person_relationship = $this->prepareData(htmlspecialchars_decode($person_relationship));
        $person_number = $this->prepareData(htmlspecialchars_decode($person_number));

        $this->sql =
            "INSERT INTO " . $table . " (phone, fullname, gender, birth_date, email, display_picture, drivers_license, nbi, tin, contact_person, person_relationship, person_number, status) VALUES ('".$phone."', '".$fullname."', '".$gender."', '".$birth_date."', '".$email."', '".$display_picture."', '".$drivers_license."', '".$nbi."', '".$tin."', '".$contact_person."', '".$person_relationship."', '".$person_number."', 'Not Verified')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

    function storeApplication($table, $phone, $business_name, $store_name, $merchant_address, $city, $outlets, $name, $email, $dti_certification, $business_permit, $form9, $form13, $form49, $valid_id, $halal_certificate)
    {
        $phone = $this->prepareData(htmlspecialchars_decode($phone));
        $business_name = $this->prepareData(htmlspecialchars_decode($business_name));
        $store_name = $this->prepareData(htmlspecialchars_decode($store_name));
        $merchant_address = $this->prepareData(htmlspecialchars_decode($merchant_address));
        $city = $this->prepareData(htmlspecialchars_decode($city));
        $outlets = $this->prepareData(htmlspecialchars_decode($outlets));
        $name = $this->prepareData(htmlspecialchars_decode($name));
        $email = $this->prepareData(htmlspecialchars_decode($email));
        $dti_certification = $this->prepareData($dti_certification);
        $business_permit = $this->prepareData($business_permit);
        $form9 = $this->prepareData($form9);
        $form13 = $this->prepareData($form13);
        $form49 = $this->prepareData($form49);
        $valid_id = $this->prepareData($valid_id);
        $halal_certificate = $this->prepareData($halal_certificate);

        $this->sql =
            "INSERT INTO " . $table . " (phone, business_name, store_name, merchant_address, city, outlets, name, email, dti_certificate, business_permit, form9, form13, form49, valid_id, halal_certificate, status) VALUES ('".$phone."', '".$business_name."', '".$store_name."', '".$merchant_address."', '".$city."', '".$outlets."', '".$name."', '".$email."', '".$dti_certification."', '".$business_permit."', '".$form9."', '".$form13."', '".$form49."', '".$valid_id."', '".$halal_certificate."', 'Not Verified')";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }

}

?>
