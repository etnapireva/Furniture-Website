<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Kontakti</title>
    <link rel="stylesheet" href="kontakti.css">
</head>

<?php include 'header.php';?>
<body>


<body>
    <form id="contactForm">
      <input type="text" id="name" placeholder="Name">
      <input type="email" id="email" placeholder="Email">
      <textarea type="message" id="message" placeholder="message" cols="30" rows="10"></textarea>
      <button id="butoni"  type="submit">Submit</button>
    </form>

    <script>
   document.getElementById('contactForm').addEventListener('submit',function(event){
    const name=document.getElementById('name').value.trim();
    const email=document.getElementById('email').value.trim();
    const message=document.getElementById('message').value.trim();

   })

   
   if (name ==='' || email === '' || message === '' ){
    alert('Please fill in all fields.');
    event.preventDefault();
   } else if(!isValidEmail(email)){
       alert('Please enter a valid email. ');
       event.preventDefault();
   }
 
   function isValidEmail(email){
    const emailRegex=/[^\s@]+@[^\s@]+\.[^\s@]+/;
    return emailRegex.test(email);
   }



    </script>
    
</body>

<?php include 'footer.php'; ?>
</html>
