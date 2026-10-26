<?php

class Bank
{
    public $name = "Uzair";
    private $balance = 0;

    public function set_balance($set_amount)
    {
        $this -> balance += $set_amount;
        echo "You Depositing $set_amount in $this->name's account <br>";
    }
    public function cash_withdrawl($set_amount)
    {
        if($set_amount > $this->balance)
            {
                echo "INSUFFICIENT BALANCE IN YOUR ACCOUNT <br>";

            }
            else{
            $this->balance -= $set_amount;
            echo "you are withdrawing $set_amount from $this->name's account <br>";
            }
        
    }


    public function get_balance()
    {
        return "The current balance of your account is $this->balance <br>";
    }
}


$myaccount = new Bank();
$myaccount->set_balance(4000);
$myaccount->set_balance(4000);
echo $myaccount->cash_withdrawl(8000);
echo $myaccount->get_balance();

?>