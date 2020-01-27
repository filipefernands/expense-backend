<?php

class resource {
    
    const BASE = "expense/api";

    # Users
    const CREATE_USER = "/user/createUser";
    const UPDATE_USER = "/user/updateUser";
    const DELETE_USER = "/user/deleteUser/{id}";
    const GET_ALL_USERS = "/user/listUsers";
    const GET_USER = "/user/getUser/{id}";
    const CHANGE_PASSWORD = '/user/changePassword';

    # Account 
    const GET_ALL_ACCOUNTS = "/account/listAccounts";
    const GET_ACCOUNT = "/account/getAccout/{id}";
    const CREATE_ACCOUNT = "/account/createAccount";
    const UPDATE_ACCOUNT = "/account/updateAccount";
    const DELETE_ACCOUNT = "/account/deleteAccount/{id}";

    # Categories
    const GET_ALL_CATEGORIES = "/category/listCategories";
    const GET_CATEGORY = "/category/getCategory/{id}";
    const CREATE_CATEGORY = "/category/createCategory";
    const UPDATE_CATEGORY = "/category/updateCategory";
    const DELETE_CATEGORY = "/category/deleteCategory/{id}";

    # Sub categories
    const GET_ALL_SUBCATEGORIES = "/subcategory/listSubcategories";
    const GET_SUBCATEGORY = "/subcategory/getSubCategory/{id}";
    const CREATE_SUBCATEGORY = "/subcategory/createSubcategory";
    const UPDATE_SUBCATEGORY = "/subcategory/updateSubcategory";
    const DELETE_SUBCATEGORY = "/subcategory/deleteSubcategory/{id}";    
    
}