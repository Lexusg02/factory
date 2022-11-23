<?php

abstract class Transaction {

abstract public function getBilling(): BillingService;

public function setPayment(int $hour, int $minute){
    $billingService = $this->getBilling();


    $res = $billingService->sendPayments();


}
}


class FirstBilTransaction extends Transaction {
private $currency;

public function __constructor(string $currency){
    $this->currency = $currency;
}

public function getBilling(): BillingService{
    return new FirstBill($this->currency);
}

}

class SecondBilTransaction extends Transaction {
private $currency;
private $account;

public function __constructor(string $currency, string $account){
    $this->currency = $currency;
    $this->account = $account;
}


public function getBilling(): BillingService{
    return new SecondBill($this->currency, $this->account);
}

}


interface BillingService{
public function sendPayments();
public function getStatus();
}

class FirstBilService implements BillingService{
private $currency;

public function __constructor(string $currency){
    $this->currency = $currency;
}

public function sendPayments(){
    echo "send";
}

public function getStatus(){
    echo "get";
}

}

class SecondBilService implements BillingService{
private $currency;


public function __constructor(string $currency, string $account){
    $this->currency = $currency;
    $this->account = $account;
}

public function sendPayments(){
    echo "send";
}

public function getStatus(){
    echo "get";
}

}

