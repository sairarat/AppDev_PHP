<?php
/*
challenge 1 -> total of 20pts

1. Create a class called `BankTransaction` that has the following properties: (2pts)

- `bank_name`    note: example  BDO
- `transaction`  note: the value for this is 'D' for deposit or 'W' for withdraw
- `account_no`   note: example ACN0000001
- `amount`       note: the value for this is the amount to deposit or to withdraw
- `savings_amount` note: Balance amount money savings.

2. The `account_no` `amount` and savings_amount property should be `private`. And savings_amount  default is 10000. (2pts)

3. Create a constructor that takes in the bank_name,transaction,account_no and amount as arguments and sets the values of the properties. (3pts)

4. Create a method called `getInfo` that will show the following: (3pts)

   Bank Name: BDO
   Customer Account No: ACNO0000001
   Type of Transaction: W
   Current Balance: 10000
   Amount: 3000


5. Create a method called `newBalance` that returns the new balance after  deposit or withdraw (4pts)

6. Create 3 new instances/objects of the `BankTransaction` class and call the `getInfo`  and `newBalance` method (5pts)


Sample Output:

Object: customer1

Bank Name: BDO
Customer Account No: ACNO0000001
Type of Transaction: W
Current Balance: 10000
Amount: 3000
New Balance: 7000

Object customer2

Bank Name: BPI
Customer Account No: ACNO0000002
Type of Transaction: D
Current Balance: 10000
Amount: 3000
New Balance: 13000

Object customer3

Bank Name: METROBANK
Customer Account No: ACNO0000003
Type of Transaction: AB
Current Balance: 10000
Amount: 3000
Unable to process this transaction! Invalid Transaction type!
*/
?>

<?php
class BankTransaction
{
    public $bank_name;
    public $transaction;
    private $account_no;
    private $amount;
    private $savings_amount = 10000;
    public function __construct($bank_name, $account_no, $transaction, $amount)
    {
        $this->bank_name = $bank_name;
        $this->transaction = strtoupper($transaction);
        $this->account_no = $account_no;
        $this->amount = $amount;
    }

    public function getAccountNo() {
        return $this->account_no;
    }

    public function setAccountNo($account_no) {
        $this->account_no = $account_no;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        if ($amount < 0) {
            echo "Invalid amount!\n";
        } else {
            $this->amount = $amount;
        }
    }
    public function getSavingsAmount() {
        return $this->savings_amount;
    }

    public function setSavingsAmount($savings_amount) {
        $this->savings_amount = $savings_amount;
    }
    public function getInfo()
    {
        echo "Bank Name: ". $this->bank_name. '<br>';
        echo "Customer Account No: ". $this->getAccountNo(). '<br>';
        echo "Type of Transaction: ". $this->transaction. '<br>';
        echo "Current Balance: ". $this->getSavingsAmount(). '<br>';
        echo "Amount: ". $this->getAmount(). '<br>';
    }

    public function newBalance()
    {
        switch($this->transaction)
        {
            case 'D':
                $this->setSavingsAmount($this->getSavingsAmount() + $this->getAmount());
                echo 'New Balance: '. $this->getSavingsAmount(). '<br>';
            break;

            case 'W':
                if ($this->getAmount() > $this->getSavingsAmount())
                {
                    echo 'Insufficient funds!'. '<br>';
                }
                else
                {
                    $this->setSavingsAmount($this->getSavingsAmount() - $this->getAmount());
                    echo 'New Balance: '. $this->getSavingsAmount(). '<br>';
                }
            break;

            default:
            echo 'Unable to process this transaction! Invalid Transaction type!'. '<br>';
        }
    }
}

$customer1 = new BankTransaction('BDO', 'ACNO0000001', 'W', 3000);
$customer2 = new BankTransaction('BPI', 'ACNO0000002', 'D', 3000);
$customer3 = new BankTransaction('METROBANK', 'ACNO0000003', 'AB', 3000);

echo 'CUSTOMER 1: Yna Marie'. '<br>';
$customer1->getInfo(). '<br>';
$customer1->newBalance(). '<br>';
echo '<br>';

echo 'CUSTOMER 2: Zaira'. '<br>';
$customer2->getInfo(). '<br>';
$customer2->newBalance(). '<br>';
echo '<br>';

echo 'CUSTOMER 3: Francine'. '<br>';
$customer3->getInfo(). '<br>';
$customer3->newBalance(). '<br>';