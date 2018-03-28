<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'balance',
        'currency_id'
    ];


    // Relationships BEGIN
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function deposit()
    {
        return $this->hasMany('App\Deposit');
    }

    public function withdraw()
    {
        return $this->hasMany('App\Withdraw');
    }
    // Relationships END


    // Mutators BEGIN
    public function getBalanceAttribute($value)
    {
        return $value / (pow(10, $this->currency->decimal_digits));
    }

    public function setBalanceAttribute($value)
    {
        $this->attributes['balance'] = intval($value * pow(10, $this->currency->decimal_digits));
    }

    // Mutators END



    public function getWithdrawnAmount()
    {
        $result = 0;

        foreach ($this->withdraw as $withdraw) {
            if (!is_null($withdraw->confirmed_by)) {
                $result += $withdraw->amount;
            }
        }

        return $result;
    }

    public function getDepositedAmount()
    {
        $result = 0;

        foreach ($this->deposit as $deposit) {
            if ($deposit->aviable) {
                $result += $deposit->amount;
            }
        }

        return $result;
    }

    /**
     * Function returns string in money format from given money amount.
     * Example, 1 234.56 USD.
     *
     * @param $value
     * @return string
     */
    public function moneyFormat($value)
    {
        return (number_format($value, $this->currency->decimal_digits, '.', ' ') . " " . $this->currency->code);
    }

    /**
     * Function returns money balance of the wallet in money format
     *
     * @return string
     */
    public function getBalanceMoney()
    {
        return self::moneyFormat($this->balance);
    }

    /**
     * Function returns all withdrawn money form the wallet in money format
     *
     * @return string
     */
    public function getWithdrawnMoney()
    {
        $value = self::getWithdrawnAmount();
        return self::moneyFormat($value);
    }

    /**
     * Function returns all deposited money on the wallet in money format
     *
     * @return string
     */
    public function getDepositedMoney()
    {
        $value = self::getDepositedAmount();
        return self::moneyFormat($value);
    }


    /**
     * Function checks if all deposited money minus withdrawn money equals to current wallet balance
     *
     * @return bool
     */
    public function checkBalance()
    {
        return $this->balance == (self::getDepositedAmount() - self::getWithdrawnAmount());
    }
}
