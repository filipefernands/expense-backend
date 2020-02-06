<?php
require_once('endpoint.php');
# API
define("API", "expense/api");

define("GET_ALL_USERS", endpoint::endpointFactory('user', 'listUsers')['query']);
define("GET_USER", endpoint::endpointFactory('user', 'getUser/{id}')['query']);
define("CREATE_USER", endpoint::endpointFactory('user', 'createUser')['action']);
define("UPDATE_USER", endpoint::endpointFactory('user', 'updateUser')['action']);
define("DELETE_USER", endpoint::endpointFactory('user', 'deleteUser/{id}')['action']);
define("CHANGE_PASSWORD", endpoint::endpointFactory('user', 'changePassword')['action']);

# Accounts
define("GET_ALL_ACCOUNTS", endpoint::endpointFactory('account', 'listAccounts')['query']);
define("GET_ACCOUNT", endpoint::endpointFactory('account', 'getAccount/{id}')['query']);
define("CREATE_ACCOUNT", endpoint::endpointFactory('account', 'createAccount')['action']);
define("UPDATE_ACCOUNT", endpoint::endpointFactory('account', 'updateAccount')['action']);
define("DELETE_ACCOUNT", endpoint::endpointFactory('account', 'deleteAccount/{id}')['action']);

# Categories
define("GET_ALL_CATEGORIES", endpoint::endpointFactory('category', 'listCategories')['query']);
define("GET_CATEGORY", endpoint::endpointFactory('category', 'getCategory/{id}')['query']);
define("CREATE_CATEGORY", endpoint::endpointFactory('category', 'createCategory')['action']);
define("UPDATE_CATEGORY", endpoint::endpointFactory('category', 'updateCategory')['action']);
define("DELETE_CATEGORY", endpoint::endpointFactory('category', 'deleteCategory/{id}')['action']);

# Subacategory
define("GET_ALL_SUBCATEGORIES", endpoint::endpointFactory('subcategory', 'listSubcategories')['query']);
define("GET_SUBCATEGORY", endpoint::endpointFactory('subcategory', 'getSubCategory/{id}')['query']);
define("CREATE_SUBCATEGORY", endpoint::endpointFactory('subcategory', 'createSubcategory')['action']);
define("UPDATE_SUBCATEGORY", endpoint::endpointFactory('subcategory', 'updateSubcategory')['action']);
define("DELETE_SUBCATEGORY", endpoint::endpointFactory('subcategory', 'deleteSubcategory/{id}')['action']);
