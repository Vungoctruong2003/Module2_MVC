<?php

class customerController

{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModels();
    }

    function showList()
    {
        $customers = $this->customerModel->getAllCustomer();
        include_once "views/list_customer.php";
    }

    function insertCustomer($customer)
    {
        $this->customerModel->addCustomer($customer);
        header("location:index.php?action=show-list");
    }

    function removeCustomer($id)
    {
        $this->customerModel->deleteCustomer($id);
        header("location:index.php?action=show-list");
    }

    function showEditCustomerById($id)
    {
        $customer = $this->customerModel->getCustomerById($id);
        include_once "views/edit.php";
    }

    function updateCustomer($customer)
    {

        $this->customerModel->updateCustomer($customer);
        header("location:index.php?action=show-list");
    }

    function searchByName($key){
        $customers = $this->customerModel->searchByName($key);
        include_once "views/search.php";
    }
}