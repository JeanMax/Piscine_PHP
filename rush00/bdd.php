<?php

//user.csv : id, pw, mail, admin, cmd[]
//product.csv : name, category[], stock, price, img

//set bdd
function set_bdd()
{
    //check if directorie exists
    if (!file_exists("bdd"))
        mkdir("bdd");

    //add default user (admin)
    $new_user["id"] = "admin"; 
    $new_user["pw"] = hash("whirlpool", "admin"); 
    $new_user["mail"] = "admin@student.42.fr"; 
    $new_user["admin"] = 1; 
    $new_user["cmd"] = null; 
    $user[] = $new_user;
        
    //add main products
    $new_product["name"] = "product1";
    $new_product["category"] = ["cool", "flex"];
    $new_product["stock"] = 21;
    $new_product["price"] = 42;
    $new_product["img"] = "http://www.ecommerce-webmarketing.com/wp-content/uploads/2013/11/produit.jpg";
    $product[] = $new_product;

    //store data into files
    file_put_contents('bdd/user.csv', serialize($user));
    file_put_contents('bdd/product.csv', serialize($product));

    return true; //is there somewhere to return false?
}


/*
//add key+value
function add_bdd($key, $value, $bdd)
{

}
*/

//get value from a key, searching with a login/product name
function get_value_bdd($key, $name, $bdd)
{
    if (!file_exists("bdd/".$bdd))
        return false;

    $tab = unserialize(file_get_contents("bdd/".$bdd));
    $type = ($bdd === "user.csv") ? "id" : "name";
    
    foreach ($tab as $stuff)
        if ($stuff[$type] === $name)
                return $stuff[$key];
        
    return false;
}

//check a key/value couple
function check_bdd($key, $value, $bdd)
{
    if (!file_exists("bdd/".$bdd))
        return false;

    $tab = unserialize(file_get_contents("bdd/".$bdd));

    foreach ($tab as $stuff)
        if ($stuff[$key] === $value)
            return true;

    return false;
}


//edit value of a key in specified bdd, searching with a login/product name
function edit_bdd($key, $name, $new_val, $bdd)
{
    if (!file_exists("bdd/".$bdd))
        return false;

    $tab = unserialize(file_get_contents("bdd/".$bdd));
    $type = ($bdd === "user.csv") ? "id" : "name";

    for ($i = 0; $tab[$i]; $i++)
        if ($tab[$i][$type] === $name)
        {
            $tab[$i][$key] = $new_val;
            file_put_contents("bdd/".$bdd, serialize($tab));
            return true;
        }
    
    return false;
}


//del a "block" (ex: id, pw, mail, admin && cmd[] for a specified name)
function del_bdd($name, $bdd)
{
    if (!file_exists("bdd/".$bdd))
        return false;

    $tab = unserialize(file_get_contents("bdd/".$bdd));
    $type = ($bdd === "user.csv") ? "id" : "name";

    for ($i = 0; $tab[$i]; $i++)
        if ($tab[$i][$type] === $name)
        {
            print_r($tab); //debug
            unset($tab[$i]);
            print_r($tab); //debug
            file_put_contents("bdd/".$bdd, serialize($tab));
            return true;
        }

    return false;
}

/*
set_bdd();

echo get_value_bdd("mail", "admin", "user.csv")."\n";

if (check_bdd("id", "admin", "user.csv"))
    echo "found\n";
else
    echo "not found\n";

if (edit_bdd("mail", "admin", "toto@titi.tutu", "user.csv"))
    echo "edition successful\n";
else
    echo "edition failed\n";

echo get_value_bdd("mail", "admin", "user.csv")."\n";

del_bdd("admin", "user.csv");
*/
?>