<?php
class PaymentModel {
    // Access Modifier = public, private, protected
    private $id;
    private $payment_type;
    private $amount;
    private $image;
    private $pay_time;
    private $bank_acc_id;
    private $date;
   
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setPaymentType($payment_type)
    {
        $this->payment_type = $payment_type;
    }
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }
    public function getAmount()
    {
        return $this->amount;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function setPayTime($pay_time)
    {
        $this->pay_time = $pay_time;
    }
    public function getPayTime()
    {
        return $this->pay_time;
    }

    public function setBankAccId($bank_acc_id)
    {
        $this->bank_acc_id = $bank_acc_id;
    }
    public function getBankAccId()
    {
        return $this->bank_acc_id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getDate()
    {
        return $this->date;
    }

    public function toArray() {
        return [
            "id" => $this->getId(),
            "payment_type" => $this->getPaymentType(),
            "amount" => $this->getAmount(),
            "image" => $this->getImage(),
            "pay_time" => $this->getPayTime(),
            "bank_acc_id" => $this->getBankAccId(),
            "date" => $this->getDate()
        ];
    }
}
?>