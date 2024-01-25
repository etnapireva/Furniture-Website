<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="produktet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produktet</title>
  <link rel="stylesheet" href="produktet.css">

  

  <style>

body{
  background: rgb(244,239,230);
background: linear-gradient(0deg, rgba(244,239,230,1) 0%, rgba(244,239,230,1) 31%, rgba(244,239,230,1) 100%);
}

.product-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around; 
  max-width: 1200px; 
  margin: 0 auto; 
}

.product {
  width: 30%; 
  margin: 10px; 
  text-align: center;
}

.product img {
  max-width: 100%;
  height: 200px; 
  object-fit: cover;
}
.buy-button {
  display: block;
  padding: 8px 16px;
  margin-top: 10px;
  text-align: center;
  text-decoration: none;
  background-color: #DEB887;
  color: #fff;
  border-radius: 4px;
}

.buy-button:hover {
  background-color: #CD853F;
}




  </style>
</head>

<?php

include 'header.php';

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "limon";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __destruct() {
        $this->conn->close();
    }
}

?>

<body>
  <header>
    <h1>Produktet</h1>
    <nav>
      <ul>
        <li><a href="#garnitura">Garnitura</a></li>
        <li><a href="#dhomagjumi">Dhoma Gjumi</a></li>
        <li><a href="#kuzhina">Kuzhina</a></li>
        <li><a href="#tavolina">Tavolina Buke</a></li>
      </ul>
    </nav>
  </header>

  <div class="product-container">
  <?php
$database = new Database();
$sql = "SELECT product_id, price,  image_path,description FROM products";
$result = $database->conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="product" id="' . $row["product_id"] . '">';
    echo '<img src="' . $row["image_path"] . '" alt=" ">';
    echo '<p>#' . $row["product_id"] . '</p>';
    echo '<p>"' . $row["description"] . '"</p>';
    echo '<a href="kontakti.php" class="buy-button">BLEJ</a>';
    echo '</div>';
  }
} else {
  echo "Nuk ka produkte në bazën e të dhënave.";
}

?>

</div>
</body>
  

  <hr>

  <main>
    
    <!-- <section id="garnitura">
      <h2>Garnitura</h2>
      <div class="products">
        <div class="product" id='k100'>
          <img src="Garniture 6.jpg" alt="" >
          <p>"Divani me shpërndarje 2-2-1 është një set elegant i mobiljeve për ambientet më të mëdha dhe të rehatshme. Ky set përfshin dy divane të mëdhenj, të cilët ofrojnë vend të mjaftueshëm për të ulur njerëzit me komoditet dhe stil. Dy divanet e mesëm shtohen për të plotësuar hapësirën dhe për të shtuar një atmosferë të përshtatshme për takime sociale ose relaksim në familje."</p>
          <p>#k100</p>
        </div>
        <div class="product" id='k101'>
          <img src="furniture3.jpg" alt="" >
          <p>"Divani në ngjyrën e qetë pembë sjell butësi dhe modernitet në ambient. Materiali i lartë cilësisë dhe dizajni i përsosur e bëjnë atë një zgjedhje tërheqëse për relaksim të përditshëm. Ngjyra e pembës së qetë harmonizohet bukur me stilin e ambienteve të ndryshme, duke sjellë një ndjesi të rafinuar dhe të ngrohtë në hapësirën tuaj."</p>
          <p>#k101</p>
        </div>
        <div class="product" id='k102'>
          <img src="furniture5.jpg" alt="" >
          <p>"Divani në ngjyrën pembe të thellë është një element i shkëlqyer i dizajnit të salloneve. Ky divan përmban një kombinim të përshtatshëm të elegancës dhe komoditetit, duke ofruar një përvojë të mrekullueshme të uljes. Materiali i tij cilësor dhe forma e veçantë e bëjnë atë jo vetëm një pikë fokale estetike, por edhe një zgjedhje të shkëlqyer për momentet e relaksimit dhe socializmit në ambiente të shumëllojshme."</p>
          <p>#k102</p>
        </div>
        <div class="product" id='k103'>
          <img src="Ganiture.jpg" alt="" >
          <p>"Divani në ngjyrën blu dhe krem sjell një kombinim harmonik të modernitetit dhe qetësisë. Ndërthurja e ngjyrës blu të ndezur me ngrohtësinë e kremit krijon një atmosferë të butë dhe të përshtatshme për çdo ambient. Materiali i lartë cilësisë dhe forma e veçantë e bëjnë atë jo vetëm një element dekorativ, por gjithashtu një pikë fokale komode për çdo moment të relaksimit dhe takimeve të rehatshme në shtëpi."</p>
          <p>#k103</p>
        </div>
        <div class="product" id='k104'>
          <img src="Kend.jpg" alt="" >
          <p>"Divani shfaq një dizajn tërheqës dhe komod, ofron një përvojë të përshtatshme për të shëtitur dhe relaksuar. Materiali i lartë cilësisë dhe forma e tij e bëjnë atë një zgjedhje të shkëlqyer për çdo ambient. Divani sjell një ndjesi të butësisë dhe elegancës në sallone dhe ambiente të ngjashme, duke u përshtatur mirë me shijet dhe stilin e të gjithëve."</p>
          <p>#k104</p>
        </div>
        <div class="product" id='k105'>
          <img src="Ganiture11.webp" alt="" >
          <p>"Divani në ngjyrën krem përfaqëson një elegancë të butë dhe një ndjenjë të ngrohtësisë në çdo ambient. Ky divan, me pamjen e tij të pastër dhe të ndritshme, sjell një ndjesi të qetësisë dhe të lehtësisë. Materiali i tij i cilësisë së lartë dhe dizajni i veçantë e bëjnë atë një shtesë tërheqëse për stilin dhe komfortin e çdo salloni. Divani në ngjyrën krem përshkruan një ndjenjë të sofistikuar dhe një pasqyrim të bukur të pamjes së brendshme të ambientit."</p>
          <p>#k105</p>
        </div>
        <div class="product" id='k106'>
          <img src="Ganiture 12.jpg" alt="" >
          <p>"Divani i bardhë është një shtesë e përshtatshme për çdo ambient, duke sjellë një ndjenjë të hapësirës dhe të pastërtisë. Ngjyra e tij e ndritshme dhe pamja moderne e bëjnë atë një element tërheqës për sallone apo dhoma të banesës. Materiali i cilësisë së lartë dhe forma e tij komode e bëjnë këtë divan një zgjedhje elegante për çdo ambient ku thjeshtësia dhe stilizimi modern shfaqen si prioritet."</p>
          <p>#k106</p>
        </div>
        <div class="product" id='k107'>
          <img src="Ganiture13.jpg" alt="" >
          <p>"Divani në ngjyrën hiri shfaq një elegancë të hollësishme dhe një ndjenjë të ngrohtësisë në ambient. Ngjyra e hirit përfaqëson një ton të butë dhe të sofistikuar, duke sjellë një ndjenjë të qetësisë dhe të përshtatshme. Materiali i lartë cilësisë dhe forma e tij e bëjnë atë një shtesë tërheqëse për çdo ambient, duke ofruar një përvojë të rehatshme dhe një ndjesi të rafinuar në shikim dhe prekje."</p>
          <p>#k107</p>
        </div>
        <div class="product" id='k108'>
          <img src="Ganiture 14.webp" alt="" >
          <p>"Divani i zi sjell një elegancë të ndritshme dhe një ndjesi të rëndësishme në ambient. Ngjyra e zezë përfaqëson një ton të sofistikuar dhe të klasit, duke i dhënë sallonit një atmosferë të misterit dhe elegancës së hollësishme. Materiali i lartë cilësisë dhe forma e tij e bëjnë atë një pikë fokale tërheqëse për çdo ambient, duke shtuar një ndjesi të veçantë të stilizuar dhe të sofistikuar."</p>
          <p>#k108</p>
        </div>

        
      </div>
    </section>

    
    <section id="dhomagjumi">
      <h2>Dhoma Gjumi</h2>
      <div class="products">
        <div class="product" id='k109'>
          <img src="Dhome gjumi.jpg" alt="">
          <p>"Dhoma e gjumit me krevat të zi sjell një atmosferë të rëndësishme dhe elegante. Krevati i zi përfaqëson një ton të fortë dhe të sofistikuar, duke krijuar një ndjesi të qetë dhe të përshtatshme për relaksim. Materiali i lartë cilësisë dhe dizajni i hollësishëm bëjnë që ky krevat të jetë një qëndër e bukur në dhome, duke shtuar një ndjesi të veçantë të stilizuar dhe të sofistikuar për ambientin e gjumit."</p>
          <p>#k109</p>
        </div>
        <div class="product" id='k110'>
          <img src="Dhome gjumi2.jpg" alt="">
          <p>"Krevati në ngjyrat krem dhe kafe përshkruan një harmoni të butë midis ngjyrës së pastër dhe të ngrohtësisë së kafes. Ky kombinim ngjyrash sjell një atmosferë të qetë dhe të përshtatshme për zonën e gjumit. Materiali i lartë cilësisë dhe dizajni i kujdesshëm bëjnë këtë krevat një element tërheqës dhe të përshtatshëm për çdo ambient, duke sjellë një ndjesi të qetë dhe të sofistikuar për zonën e gjumit."</p>
          <p>#k110</p>
        </div>
        <div class="product" id='k111'>
          <img src="dhoma1.jpg" alt="">
          <p>"Dhoma e gjumit e veshur me ngjyrën krem ofron një ambient të butë dhe të pastër. Ngjyra krem krijon një atmosferë të hapur dhe të ndriçuar në dhome, duke krijuar një ndjesi të qetë dhe të relaksuar. Përdorimi i kësaj ngjyre bën që dhome e gjumit të duket më e madhe dhe më e hapur, duke krijuar një ambient të përshtatshëm për momente të qeta dhe të rehatshme gjatë kohës së gjumit dhe relaksimit në shtëpi."</p>
          <p>#k111</p>
        </div>
        <div class="product" id='k112'>
          <img src="dhoma2.jpg" alt="">
          <p>"Dhoma e gjumit e dizajnuar në ngjyrën hiri dhe të bardhë përmban një kombinim të harmonishëm të ngjyrave të buta dhe të sofistikuara. Kjo përbërje ngjyrash krijon një atmosferë të qetë dhe të pastër në ambient. Kontrasti i ngjyrave jep një ndjenjë të hapësirës së gjerë dhe të qetësisë, duke ofruar një vend të përshtatshëm për relaksim dhe qetësi gjatë kohës së gjumit."</p>
          <p>#k112</p>
        </div>
        <div class="product" id='k113'>
          <img src="dhoma3.jpeg" alt="">
          <p>"Dhoma e gjumit e dizajnuar në ngjyrën hiri dhe të bardhë përmban një kombinim të harmonishëm të ngjyrave të buta dhe të sofistikuara. Kjo përbërje ngjyrash krijon një atmosferë të qetë dhe të pastër në ambient. Kontrasti i ngjyrave jep një ndjenjë të hapësirës së gjerë dhe të qetësisë, duke ofruar një vend të përshtatshëm për relaksim dhe qetësi gjatë kohës së gjumit."</p>
          <p>#k113</p>
        </div>
        <div class="product" id='k114'>
          <img src="dhoma4.jpg" alt="">
          <p>"Dhoma e gjumit e dizajnuar në ngjyrën hiri dhe të bardhë përmban një kombinim të harmonishëm të ngjyrave të buta dhe të sofistikuara. Kjo përbërje ngjyrash krijon një atmosferë të qetë dhe të pastër në ambient. Kontrasti i ngjyrave jep një ndjenjë të hapësirës së gjerë dhe të qetësisë, duke ofruar një vend të përshtatshëm për relaksim dhe qetësi gjatë kohës së gjumit."</p>
          <p>#k114</p>
        </div>
        <div class="product" id='k115'>
          <img src="dhoma5.jpg" alt="">
          <p>"Ngjyra hiri në një dhomë gjumi sjell një atmosferë të ngrohtë dhe të përshtatshme për relaksim. Kombinimi i kësaj ngjyre të butë dhe të ngrohtë krijon një ambient të qetë dhe të mrekullueshëm për momente të qeta dhe për të rënë në gjumë në një atmosferë të rehatshme."</p>
          <p>#k115</p>
        </div>
        <div class="product" id='k116'>
          <img src="dhoma6.jpg" alt="">
          <p>"Ngjyra e kafte në një dhomë gjumi sjell një ndjesi të ngrohtë dhe të relaksuar. Kjo ngjyrë e butë dhe e ngrohtë krijon një ambient të qetë dhe të përshtatshëm për relaksim, duke krijuar një atmosferë të mrekullueshme për gjumin dhe për momente të qeta në shtëpi."</p>
          <p>#k116</p>
        </div>
        <div class="product" id='k117'>
          <img src="dhoma7.jpg" alt="">
          <p>"Ngjyra hiri në një dhomë gjumi sjell një atmosferë të ngrohtë dhe të përshtatshme për relaksim. Kombinimi i kësaj ngjyre të butë dhe të ngrohtë krijon një ambient të qetë dhe të mrekullueshëm për momente të qeta dhe për të rënë në gjumë në një atmosferë të rehatshme."</p>
          <p>#k117</p>
        </div>
      </div>
    </section>

    <section id="kuzhina">
      <h2>Kuzhina</h2>
      <div class="products">
        <div class="product" id='k118'>
          <img src="kuzhina1.jpg" alt="">
          <p>"Hapësira e kuzhinës është e projektuar me kujdes për të pasqyruar një përputhje të bukur midis traditës dhe modernitetit. Stili minimal dhe pa detaje të ngarkuara e bëjnë atë të duket e thjeshtë, por njëkohësisht shumë elegante. Kjo kuzhinë përfaqëson një mjeshtëri në harmoninë midis formës dhe funksionalitetit, duke krijuar një ambient të përshtatshëm për gatim dhe ndarje të këndshme me familjen dhe miqtë."</p>
          <p>#k118</p>
        </div>
        <div class="product" id='k119'>
          <img src="kuzhina2.jpg" alt="">
          <p>"Kuzhina e ngjyrës hiri shfaq një elegancë të butë dhe një ndjesi të ngrohtësisë në ambient. Ngjyra e hirit sjell një atmosferë të përshtatshme dhe të pastër për gatim. Përdorimi i kësaj ngjyre krijon një ndjenjë të qetë dhe të relaksuar, duke e bërë kuzhinën të duket tërheqëse dhe të përshtatshme për përdorim të përditshëm. "</p>
          <p>#k119</p>
        </div>
        <div class="product" id='k120'>
          <img src="kuzhina3.jpeg" alt="">
          <p>"Hapësira e kuzhinës është e projektuar me kujdes për të pasqyruar një përputhje të bukur midis traditës dhe modernitetit. Stili minimal dhe pa detaje të ngarkuara e bëjnë atë të duket e thjeshtë, por njëkohësisht shumë elegante. Kjo kuzhinë përfaqëson një mjeshtëri në harmoninë midis formës dhe funksionalitetit, duke krijuar një ambient të përshtatshëm për gatim dhe ndarje të këndshme me familjen dhe miqtë."</p>
          <p>#k120</p>
        </div>
        <div class="product" id='k121'>
          <img src="kuzhina4.jpg" alt="">
          <p>"Hapësira e kuzhinës është e projektuar me kujdes për të pasqyruar një përputhje të bukur midis traditës dhe modernitetit. Stili minimal dhe pa detaje të ngarkuara e bëjnë atë të duket e thjeshtë, por njëkohësisht shumë elegante. Kjo kuzhinë përfaqëson një mjeshtëri në harmoninë midis formës dhe funksionalitetit, duke krijuar një ambient të përshtatshëm për gatim dhe ndarje të këndshme me familjen dhe miqtë."</p>
          <p>#k121</p>
        </div>
        <div class="product" id='k122'>
          <img src="kuzhina5.jpg" alt="">
          <p>"Hapësira e kuzhinës është e projektuar me kujdes për të pasqyruar një përputhje të bukur midis traditës dhe modernitetit. Stili minimal dhe pa detaje të ngarkuara e bëjnë atë të duket e thjeshtë, por njëkohësisht shumë elegante. Kjo kuzhinë përfaqëson një mjeshtëri në harmoninë midis formës dhe funksionalitetit, duke krijuar një ambient të përshtatshëm për gatim dhe ndarje të këndshme me familjen dhe miqtë."</p>
          <p>#k122</p>
        </div>
        <div class="product" id='k123'>
          <img src="kuzhina6.jpg" alt="">
          <p>"Kuzhina e bardhë dhe e zi është një kombinim i kontrastit dhe elegancës. Ngjyrat e kundërta bashkojnë një ndjesi të qartësisë me sofistikim. Ngjyra e bardhë shpërndan dritën dhe bën hapësirën të duket më e madhe, ndërsa ngjyra e zi jep një ndjesi të thellë dhe të misterit. Kjo bashkëpunim ngjyrash e bën kuzhinën të duket moderne dhe të përshtatshme për momente të rehatshme gatimi, duke krijuar një ambient të harmonishëm dhe të përshtatshëm për përdorim të përditshëm."</p>
          <p>#k123</p>
        </div>
        <div class="product" id='k124'>
          <img src="kuzhina7.jpg" alt="">
          <p>"Kuzhina e zeze është një deklaratë e fortë e stilin dhe elegancën. Ngjyra e zeze jep një ndjesi të thellë, të misterit dhe sofistikimit. Është një zgjedhje shumë moderne dhe e ndjeshme, e cila e bën kuzhinën të shkëlqejë dhe të dallohet. Përdorimi i ngjyrës së zezë e bën kuzhinën të duket elegante dhe të përshtatshme për ndërveprim social në një ambient të sofistikuar dhe të veçantë."</p>
          <p>#k124</p>
        </div>
        <div class="product" id='k125'>
          <img src="kuzhina8.png" alt="">
          <p>"Kuzhina e zeze është një deklaratë e fortë e stilin dhe elegancën. Ngjyra e zeze jep një ndjesi të thellë, të misterit dhe sofistikimit. Është një zgjedhje shumë moderne dhe e ndjeshme, e cila e bën kuzhinën të shkëlqejë dhe të dallohet. Përdorimi i ngjyrës së zezë e bën kuzhinën të duket elegante dhe të përshtatshme për ndërveprim social në një ambient të sofistikuar dhe të veçantë."</p>
          <p>#k125</p>
        </div>
        <div class="product" id='k126'>
          <img src="kuzhina9.jpg" alt="">
          <p>"Kuzhina e zeze është një deklaratë e fortë e stilin dhe elegancën. Ngjyra e zeze jep një ndjesi të thellë, të misterit dhe sofistikimit. Është një zgjedhje shumë moderne dhe e ndjeshme, e cila e bën kuzhinën të shkëlqejë dhe të dallohet. Përdorimi i ngjyrës së zezë e bën kuzhinën të duket elegante dhe të përshtatshme për ndërveprim social në një ambient të sofistikuar dhe të veçantë."</p>
          <p>#k126</p>
        </div>
    
      </div>
    </section>

    <section id="tavolina">
      <h2>Tavolina buke</h2>
      <div class="products">
        <div class="product" id='k127'>
          <img src="tavolina9.jpg" alt="">
          <p>"Tavolina e bardhë për bukë është një element i shkëlqyeshëm në kuzhinë. Ngjyra e bardhë e bën atë të shkëlqejë, duke i dhënë një ndjesi të pastër dhe të ndriçuar. Me dizajnin e saj të thjeshtë, kjo tavolinë bën të jetë një pikë fokale në ambient, e cila përmban një elegancë të butë dhe ndjeshmëri në hapësirën e kuzhinës. Gjithashtu, është një element që përshtatet lehtësisht me shumë stil dhe dekoracione të ndryshme të kuzhinës."</p>
          <p>#k127</p>
        </div>
        <div class="product" id='k128'>
          <img src="tavolina8.jpg" alt="">
          <p>"Tavolina e zeze për bukë është një element i shquar që shton një ndjesi të thellë, moderne dhe të veçantë në kuzhinë. Ngjyra e zeze e bën atë të dallohet dhe të jetë pikë fokale. Me ndjesinë e saj të sofistikuar dhe moderne, kjo tavolinë i jep një prekje të veçantë ambientit të kuzhinës, duke sjellë një kontrast të bukur mes ngjyrave dhe duke shënuar një prezencë të fortë dhe të stilizuar."</p>
          <p>#k128</p>
        </div>
        <div class="product" id='k129'>
          <img src="tavolina1.jpg" alt="">
          <p>"Tavolina e hirit për bukë është një element i ngrohtë dhe i përshtatshëm për kuzhinën. Ngjyra e hirit sjell një ndjesi të butë dhe të ngrohtësisë në ambient. Me pamjen e saj të pastër dhe të butë, kjo tavolinë shpesh integrohet mirë në dizajnin e kuzhinës, duke sjellë një ndjesi të pastër dhe të përshtatshme për të shërbyer si një element funksional dhe estetik."</p>
          <p>#k129</p>
        </div>
        <div class="product" id='k130'>
          <img src="tavolina2.jpg" alt="">
          <p>"Tavolina e hirit për bukë është një element i ngrohtë dhe i përshtatshëm për kuzhinën. Ngjyra e hirit sjell një ndjesi të butë dhe të ngrohtësisë në ambient. Me pamjen e saj të pastër dhe të butë, kjo tavolinë shpesh integrohet mirë në dizajnin e kuzhinës, duke sjellë një ndjesi të pastër dhe të përshtatshme për të shërbyer si një element funksional dhe estetik."</p>
          <p>#k130</p>
        </div>
        <div class="product" id='k131'>
          <img src="tavolina3.jpg" alt="">
          <p>"Tavolina e bukës në ngjyrë krem ofron një ndjesi të butë dhe të pastër në ambientin e kuzhinës. Ngjyra e kremtë e bën të duket tërheqëse dhe të përshtatshme për shumë dekore të ndryshme. Kjo tavolinë sjell një ndjesi të ngrohtë dhe të relaksuar, duke shërbyer si një shtesë elegante dhe praktike për kuzhinën."</p>
          <p>#k131</p>
        </div>
        <div class="product" id='k132'>
          <img src="tavolina4.jpg" alt="">
          <p>"Tavolina e zeze për bukë është një element i shquar që shton një ndjesi të thellë, moderne dhe të veçantë në kuzhinë. Ngjyra e zeze e bën atë të dallohet dhe të jetë pikë fokale. Me ndjesinë e saj të sofistikuar dhe moderne, kjo tavolinë i jep një prekje të veçantë ambientit të kuzhinës, duke sjellë një kontrast të bukur mes ngjyrave dhe duke shënuar një prezencë të fortë dhe të stilizuar."</p>
          <p>#k132</p>
        </div>
        <div class="product" id='k133'>
          <img src="tavolina5.jpg" alt="">
          <p>"Tavolina e hirit për bukë është një element i ngrohtë dhe i përshtatshëm për kuzhinën. Ngjyra e hirit sjell një ndjesi të butë dhe të ngrohtësisë në ambient. Me pamjen e saj të pastër dhe të butë, kjo tavolinë shpesh integrohet mirë në dizajnin e kuzhinës, duke sjellë një ndjesi të pastër dhe të përshtatshme për të shërbyer si një element funksional dhe estetik."</p>
          <p>#k133</p>
        </div>
        <div class="product" id='k134'>
          <img src="tavolina6.jpg" alt="">
          <p>"Tavolina e bardhë për bukë është një element i shkëlqyeshëm në kuzhinë. Ngjyra e bardhë e bën atë të shkëlqejë, duke i dhënë një ndjesi të pastër dhe të ndriçuar. Me dizajnin e saj të thjeshtë, kjo tavolinë bën të jetë një pikë fokale në ambient, e cila përmban një elegancë të butë dhe ndjeshmëri në hapësirën e kuzhinës. Gjithashtu, është një element që përshtatet lehtësisht me shumë stil dhe dekoracione të ndryshme të kuzhinës."</p>
          <p>#k134</p>
        </div>
        <div class="product" id='k135'>
          <img src="tavolina7.jpg" alt="">
          <p>"Tavolina e zeze për bukë është një element i shquar që shton një ndjesi të thellë, moderne dhe të veçantë në kuzhinë. Ngjyra e zeze e bën atë të dallohet dhe të jetë pikë fokale. Me ndjesinë e saj të sofistikuar dhe moderne, kjo tavolinë i jep një prekje të veçantë ambientit të kuzhinës, duke sjellë një kontrast të bukur mes ngjyrave dhe duke shënuar një prezencë të fortë dhe të stilizuar."</p>
          <p>#k135</p>
        </div>
        
      </div>
    </section>
  </main>
</body>
</html> -->


<?php include 'footer.php';?>

</body>
</html>
