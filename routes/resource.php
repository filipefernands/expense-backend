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
}