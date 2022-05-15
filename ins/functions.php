<?php
function connect(){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $myDB="best-shop";
  
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  
  return $conn;
}

function getCategories(){

$conn=connect();   

$requette ="SELECT * FROM categorie";
$resultat=$conn->query($requette);
$categories=$resultat->fetchAll();
return $categories;


}

function getProduit(){
$conn=connect();

$requette ="SELECT * FROM produit";
$resultat=$conn->query($requette);
$produits=$resultat->fetchAll();
return $produits;


}



function searchProduits($keyword){
  $conn=connect();
  
  $requette ="SELECT * FROM produit WHERE nom LIKE '%$keyword%' ";

  $resultat=$conn->query($requette);

  $produits=$resultat->fetchAll();

  return $produits;
}

function getProduitById($id){
  $conn=connect();
  $requette ="SELECT * FROM produit WHERE id=$id";

  $resultat=$conn->query($requette);

  $produit=$resultat->fetch();

  return $produit;
  
}

function AddVisiteur($data){
  $conn=connect();
  $mphash=md5($data['mp']);
  $requette="INSERT INTO visiteurs (nom,prenom,email,mp,telephone) VALUES ('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mphash."','".$data['telephone']."' )";

  $resultat=$conn->query($requette);

  if($resultat){
    return true;

  }else{
    return false;
  }
}

function ConnectVisiteur($data){
  $conn=connect();
  $email=$data['email'];
  $mp=md5($data['mp']);
  $requette="SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp'";

  $resultat=$conn->query($requette);

  $user= $resultat->fetch();

  return $user;
}

function ConnectAdmin($data){
  $conn=connect();
  $email=$data['email'];
  $mp=md5($data['mp']);
  $requette="SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";

  $resultat=$conn->query($requette);

  $user= $resultat->fetch();

  return $user;
}

function getAllUsers(){
  $conn=connect();
 
  $requette="SELECT * FROM visiteurs WHERE etat = 0 ";

  $resultat=$conn->query($requette);
  
  $users= $resultat->fetchAll();

  return $users;
}

function getStocks(){
  $conn=connect();
  
  $requette ="SELECT s.id,nom,quantite FROM produit p,stock s WHERE p.id=s.produit";

  $resultat=$conn->query($requette);

  $stocks=$resultat->fetchAll();

  return $stocks;
}

function getAllBasket(){
  $conn=connect();
  
  $requette ="SELECT v.nom,v.prenom,v.telephone,p.id,p.total,p.etat,p.date_cr FROM panier p,visiteurs v WHERE p.visiteur=v.id";

  $resultat=$conn->query($requette);

  $baskets=$resultat->fetchAll();

  return $baskets;
}

function getAllCommandes(){
  $conn=connect();
  
  $requette ="SELECT p.nom,p.image,c.quantite,c.panier,c.total FROM commande c,produit p WHERE c.produit=p.id";

  $resultat=$conn->query($requette);

  $commandes=$resultat->fetchAll();

  return $commandes;
}

function changerEtatPanier($data){
  $conn=connect();
  $requette="UPDATE panier SET etat='".$data['etat']."' WHERE id='".$data['panier_id']."' ";
  $resultat=$conn->query($requette);
}

function searchByState($paniers,$etat){
  $panier_etat=array();
    
  foreach($paniers as $p){

      if($p['etat']==$etat){
        
        array_push($panier_etat,$p);

      }
  
    }
    return $panier_etat;
}

function editAdmin($data){

  $conn=connect();

  if( !empty($data) ){
    $requette="UPDATE administrateur SET nom='".$data['nom']."' , email='".$data['email']."' , mp='".md5($data['mp'])."' WHERE id='".$data['id_admin']."' ";

  }
  $resultat=$conn->query($requette);
  return true;

}

function getStat(){
  $data=array();
  $conn=connect();
  
  $requette ="SELECT COUNT(*) FROM produit ";
  $res=$conn->query($requette);
  $nbrprod=$res->fetch();

  $requette1 ="SELECT COUNT(*) FROM categorie ";
  $res1=$conn->query($requette1);
  $nbrcat=$res1->fetch();

  $requette2 ="SELECT COUNT(*) FROM visiteurs ";
  $res2=$conn->query($requette2);
  $nbrvis=$res2->fetch();

  $data['produits']=$nbrprod[0];
  $data['categories']=$nbrcat[0];
  $data['visiteurs']=$nbrvis[0];

  return $data;

}


  
  

  
?>