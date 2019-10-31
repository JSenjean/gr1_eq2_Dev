<?php

    include_once("model/faq.php");

    //Add a new question/answer
    if (isset($_POST['addQA'])){
        addQA();
    }
    //Add a new category
    if (isset($_POST['addCategory'])){
        addCategory();
    }
    //Delete a category
    if (isset($_POST['delCategory'])){
        delCategory();
    }
    //Search in the FAQ
    if(isset($_POST['search_faq'])){
        $keywords = $_POST['search'];
        $search = searchQA($keywords);
    }
    if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin'))
        include_once("view/modHeader.php");
    else if (isset($_SESSION['role']) && $_SESSION['role'] == 'member')
        include_once("view/memberHeader.php");
    else
        include_once("view/header.php");
    include_once("view/faq.php");

?>